-include .env.docker

init: build \
	up \
	project-composer-install \
	project-migrate

docker-compose:
	docker-compose --project-name phpwork ${COMMAND}
up:
	make docker-compose COMMAND="up -d"
down:
	make docker-compose COMMAND="down --remove-orphans"
docker-restart:
	make docker-compose COMMAND="down --remove-orphans"
	make docker-compose COMMAND="up -d"
docker-pull:
	make docker-compose COMMAND="pull"
build:
	make docker-compose COMMAND="build --pull"
docker-exec:
	make docker-compose COMMAND="exec -it app ${COMMAND}"

project-composer:
	make docker-exec COMMAND="composer ${name}"
project-composer-install:
	make docker-exec COMMAND="composer install"
project-composer-update:
	make docker-exec COMMAND="composer update"

project-migrate:
	make docker-exec COMMAND="php artisan migrate"
project-key-generate:
	make docker-exec COMMAND="php artisan key:generate"
laravel:
	make docker-exec COMMAND="php -d memory_limit=-1 artisan ${name}"

project-cs-check:
	make docker-exec COMMAND="./vendor/bin/php-cs-fixer fix -vvv --dry-run --show-progress=dots --config=./docker/config/.php-cs-fixer.php --allow-risky=yes"
project-cs-fix:
	make docker-exec COMMAND="./vendor/bin/pint --config=./docker/config/pint.json"
project-analyze:
	make docker-exec COMMAND="./vendor/bin/phpstan analyse --memory-limit=2G --configuration='docker/config/phpstan.neon.dist'"
project-test:
	make docker-exec COMMAND="./vendor/bin/phpunit"

check: project-analyze \
	project-cs-check

fix: project-cs-fix \
	project-analyze

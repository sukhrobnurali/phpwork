<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Loyiha haqida

Bu loyiha orqali siz PHP ishlatadigan kompaniyalarni bir joyda topishingiz mumkin. Ularning:
Saytlari 🌐
Ish imkoniyatlari (hh.uz havolasi) 💼
LinkedIn profillari va boshqa ma’lumotlari 🛠️
👉 Nega bu loyiha ochiq manbali?
Men vaqt yetishmasligi tufayli loyihani yakunlay olmayapman, shuning uchun uni ochiq manbali qilib, barchani hamkorlikka taklif qilmoqchiman. Bu loyiha birgalikda rivojlanadi va yanada kuchli bo‘ladi! 💪

- GitHub: https://github.com/SukhrobNuraliev/ph...
- Trello: https://trello.com/b/uGROFkgt/php-work
- Website: https://phpwork.uz/ (https://phpwork.sukhrob.uz/)
- Telegram Guruh: https://t.me/phpwork_uz_collab
- Google Sheet: https://docs.google.com/spreadsheets/...


## Loyihani o'rnatish

### Docker orqali ishlash

Bu uchun sizda docker va docker-compose o'rnatilgan bo'lishi lozim, va Docker desctop container lar bilan ishlash uchun

- git clone git@github.com:SukhrobNuraliev/phpwork.git
- cd phpwork
- make init
- cp .env.example .env
- make project-key-generate
- cp database/test-database.sqlite database.sqlite
- make project-migrate

phpstan va Laravel pint ni zapusk qilish uchun

- make fix


### Local development
                  
- git clone git@github.com:SukhrobNuraliev/phpwork.git
- cd phpwork
- composer install
- cp .env.example .env
- php artisan key:generate
- cp database/test-database.sqlite database.sqlite
- php artisan migrate

phpstan va Laravel pint ni zapusk qilish uchun
 - composer cs-fix
 - composer larastan

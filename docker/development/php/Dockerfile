# Use the official PHP 8.1 FPM image as the base image
FROM php:8.2-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid


# Install required dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libsqlite3-dev \
    libzip-dev \
    libxslt-dev \
    libxml2-dev \
    libicu-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-install zip \
    && docker-php-ext-install xsl \
    && docker-php-ext-install intl \
    && docker-php-ext-install pcntl \
    && docker-php-ext-configure gd \
            --with-freetype \
            --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_sqlite \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install pdo pdo_mysql


# Install Node.js (v18.x as an example) and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Set the working directory
WORKDIR /var/www/

# Copy your application files into the container
COPY . /var/www/

# Expose port if necessary (PHP FPM listens on port 9000 by default)
# EXPOSE 9000
# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user

## Start PHP FPM
#CMD ["php-fpm"]

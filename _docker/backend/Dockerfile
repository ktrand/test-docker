FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    unzip \
    zip \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    zip \
    intl

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

ENV COMPOSER_ALLOW_SUPERUSER=1

COPY --from=composer:2.8.2 /usr/bin/composer /usr/bin/composer

# Настройка пользователя и директорий
RUN usermod -u 1000 www-data && \
    mkdir -p /var/www/backend && \
    mkdir -p /var/www/.composer && \
    mkdir -p /var/www/.config/psysh && \
    chown -R www-data:www-data /var/www/backend && \
    chown -R www-data:www-data /var/www/.composer && \
    chown -R www-data:www-data /var/www/.config

WORKDIR /var/www/backend

# Создаем структуру storage с правильными правами
RUN mkdir -p storage/app && \
    mkdir -p storage/framework/{sessions,views,cache} && \
    mkdir -p storage/logs && \
    chown -R www-data:www-data storage && \
    chmod -R 775 storage

# Переключаемся на www-data
USER www-data

# Копируем файлы с правильными правами
COPY --chown=www-data:www-data ./backend/ .

# Устанавливаем зависимости
RUN composer install
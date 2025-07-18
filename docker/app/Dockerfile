FROM php:8.2-fpm

# Устанавливаем рабочую директорию
WORKDIR /var/www/html

# Устанавливаем зависимости
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    nodejs\
    npm\
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Устанавливаем расширения PHP
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    soap \
    zip \
    intl \
    opcache

# Очищаем кэш
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Устанавливаем Redis
RUN pecl install redis && docker-php-ext-enable redis

# Загружаем актуальную версию Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Создаём пользователя и группу
RUN groupadd --force -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Копируем содержимое текущего каталога в рабочую директорию
COPY --chown=www:www . /var/www/html

# Создаем дерриктории и устанавливаем права
RUN mkdir -p /var/www/html/storage && mkdir -p /var/www/html/bootstrap/cache

RUN chown -R www:www /var/www/html && chmod -R 775 /var/www/html/storage && chmod -R 775 /var/www/html/bootstrap/cache

# Переключаемся на пользователя www
USER www

# В контейнере открываем порт и запускаем сервер php-fpm
EXPOSE 9000
CMD ["php-fpm"]

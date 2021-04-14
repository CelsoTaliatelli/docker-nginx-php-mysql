FROM php:7.4-fpm


#RUN docker-php-ext-install

RUN apt-get update -y && \
    apt-get install -y \
    sendmail \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    libwebp-dev \
    libfreetype6-dev \
    exiftool

RUN apt-get update && \
    apt-get install -y \
        zlib1g-dev \
		libicu-dev g++

RUN docker-php-ext-configure gd  --enable-gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl
RUN docker-php-ext-configure exif
RUN docker-php-ext-install exif
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN sed -i 's/max_execution_time = 30/max_execution_time = 600/g' "$PHP_INI_DIR/php.ini"
RUN sed -i 's/post_max_size = 8M/post_max_size = 128M/g' "$PHP_INI_DIR/php.ini"
RUN sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 128M/g' "$PHP_INI_DIR/php.ini"
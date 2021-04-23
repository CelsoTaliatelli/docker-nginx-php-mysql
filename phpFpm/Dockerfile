FROM php:7.4-fpm


#RUN docker-php-ext-install

RUN apt-get update -y && \
    apt-get install -y \
    #sendmail \
    libpng-dev \
    libjpeg-dev \
    libzip-dev \
    libwebp-dev \
    libfreetype6-dev \
    exiftool \
    wget \
    zip \
    libaio1 \
    zlib1g-dev \
	libicu-dev g++ \
    alien

#RUN docker-php-ext-configure gd  --enable-gd --with-freetype --with-jpeg --with-webp
#RUN docker-php-ext-install gd
#RUN docker-php-ext-configure intl
#RUN docker-php-ext-install intl
#RUN docker-php-ext-configure exif
#RUN docker-php-ext-install exif
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

COPY . .
#RUN unzip /usr/local/instantclient-basic-linux.x64-19.8.0.0.0dbru.zip
#RUN export PATH="$PATH:/opt/oracle/instantclient_19_8"
#RUN rpm -i /usr/local/oracle-instantclient19.6-basic-19.6.0.0.0-1.x86_64.rpm
RUN alien -k --scripts oracle-instantclient19.6-basic-19.6.0.0.0-1.x86_64.rpm
RUN dpkg -i oracle-instantclient19.6-basic_19.6.0.0.0-1_amd64.deb
RUN alien -k --scripts oracle-instantclient19.6-devel-19.6.0.0.0-1.x86_64.rpm
RUN dpkg -i oracle-instantclient19.6-devel_19.6.0.0.0-1_amd64.deb

 RUN ln -s /usr/lib/oracle/19.6/client64/lib/ /usr/local/instantclient && \
     ln -s /usr/include/oracle/19.6/client64/* /usr/local/instantclient &&\
     ln -s /usr/lib/oracle/19.6/client64/lib* /usr/lib

RUN docker-php-ext-configure pdo_oci --with-pdo-oci=instantclient,/usr/local/instantclient 
RUN docker-php-ext-install pdo_oci


RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"


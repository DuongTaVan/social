# Set master image
FROM php:7.4-fpm

RUN apt-get update && \
    apt-get install -y \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libfontconfig1 \
    libxrender1 \
    libpng-dev \
    libxml2-dev \
    zlib1g-dev\
    libpcre3 \
    libpcre3-dev \
    g++ \
    make \
    autoconf \
    openssl \
    git \
    bash \
    libzip-dev \
    zip \
    wget \
    && wget https://github.com/h4cc/wkhtmltopdf-amd64/blob/master/bin/wkhtmltopdf-amd64?raw=true -O /usr/local/bin/wkhtmltopdf \
    && chmod +x /usr/local/bin/wkhtmltopdf

RUN apt-get install fonts-arphic-ukai fonts-arphic-uming fonts-ipafont-mincho fonts-ipafont-gothic fonts-unfonts-core

RUN git clone -b 4.2.0 --depth 1 https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -- && apt-get install -y nodejs

RUN docker-php-ext-install \
pdo_mysql \
redis \
opcache \
gd \
zip \
&& docker-php-ext-configure gd \
--with-freetype \
--with-jpeg

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
&& chmod +x /usr/local/bin/composer

RUN rm -rf /var/cache/apk/*

RUN pecl install xdebug \
&& docker-php-ext-enable xdebug

# Set working directory
WORKDIR /var/www/html

# Install PHP Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy existing application directory
COPY .. .

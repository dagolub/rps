FROM php:7.4-cli
WORKDIR /code
RUN apt-get update && apt-get install -y \
        git \
        unzip \
   --no-install-recommends && rm -r /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php \
  && mv /code/composer.phar /usr/local/bin/composer
COPY . /code/
RUN composer install
CMD php /code/console.php app:game
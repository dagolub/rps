FROM php:7.4-cli
WORKDIR /code
RUN apt-get update && apt-get install -y git unzip \
   --no-install-recommends && rm -r /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php
COPY . /code/
RUN php /code/composer.phar install --no-dev
RUN rm composer.phar
CMD php /code/bin/console.php app:game
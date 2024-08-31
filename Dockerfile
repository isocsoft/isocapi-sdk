FROM php:8.3-cli-alpine

RUN apk add --no-cache \
    curl \
    git \
    unzip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

ENTRYPOINT ["tail"]
CMD ["-f","/dev/null"]

FROM php:8.2-cli-alpine

RUN apk add --no-cache \
    git unzip libpng-dev libjpeg-turbo-dev freetype-dev libzip-dev \
    oniguruma-dev sqlite sqlite-dev nodejs npm bash \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_sqlite gd zip mbstring exif pcntl bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist --no-interaction

COPY package.json package-lock.json ./
RUN npm ci

COPY . .

RUN composer dump-autoload --optimize --no-dev \
    && npm run build \
    && rm -rf node_modules

RUN mkdir -p database storage/framework/{cache,sessions,views} storage/logs bootstrap/cache public/images public/uploads/payments \
    && touch database/database.sqlite \
    && cp -r storage/app/images/* public/images/ 2>/dev/null || true \
    && chmod -R 775 storage bootstrap/cache database public/uploads

ENV PORT=8080
EXPOSE 8080

CMD ["sh", "-c", "php artisan migrate --force && php artisan db:seed --force || true && php artisan config:cache && php artisan route:cache && php artisan view:cache && php -S 0.0.0.0:${PORT} -t public"]

# Officiële PHP + Apache image
FROM php:8.2-apache

# Systeem dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip nodejs npm \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# PHP extensies
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer installeren
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Apache configuratie: public folder
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && a2enmod rewrite

WORKDIR /var/www/html

# Composer dependencies caching
COPY composer.json composer.lock ./
RUN composer install --no-scripts --no-autoloader --no-interaction

# Kopieer alle bestanden
COPY . .

# .env instellen en artisan key
RUN if [ -f ".env.example" ]; then cp .env.example .env; fi \
    && composer dump-autoload --optimize \
    && php artisan key:generate \
    && php artisan config:cache

# NPM dependencies en build
RUN npm install && npm run build

# Rechten instellen
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

EXPOSE 80
CMD ["apache2-foreground"]

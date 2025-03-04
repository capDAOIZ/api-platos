#!/usr/bin/env bash

# Instalar PHP y Composer
apt-get update && apt-get install -y php-cli php-mbstring php-xml php-curl php-zip php-mysqli curl
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependencias de Laravel
composer install --no-dev --optimize-autoloader

# Configuración de Laravel
php artisan config:clear
php artisan cache:clear
php artisan key:generate --force
php artisan migrate --force

#!/bin/sh

chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage

# Run PHP migrations
php artisan migrate --force

# Seed the database
php artisan db:seed --force

php artisan optimize

php artisan cache:clear

exec "$@"

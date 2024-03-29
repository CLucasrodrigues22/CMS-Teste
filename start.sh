#!/bin/bash

composer install

php artisan migrate

php artisan key:generate

sudo chmod -R 775 storage/logs

npm install && npm run build 

php artisan serve
@echo off

composer install

php artisan migrate

php artisan key:generate

icacls storage\logs /grant Everyone:(OI)(CI)F /T /Q

php artisan serve
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Выполненое тз 


- ```docker-compose up -d --build```
- Настройка .env файла (mysql, redis)
- ```php artisan migrate```
- Для парса данных валют Цбрф ```php artisan parse:currency```
- Для запуска планировщика задач используйте комманду ```php artisan schedule:work```, парсинг валют ЦБРФ будет происходить каждый час 
- Файл config/currency.php содержит в себе настройки параметров для парсинга 
- Коннечная апи точка для получения данных по валютам http://localhost/api/v1/currency

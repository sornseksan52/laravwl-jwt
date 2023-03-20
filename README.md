<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## วิธีติดตั้ง

1. git clone https://github.com/sornseksan52/laravwl-jwt.git
2. copy .env.example .env
3. docker-compose exec api php artisan jwt:secret
4. docker-compose exec api php artisan key:generate
5. docker-compose up --build
6. docker-compose exec api php artisan migrate
7. docker-compose exec api php artisan db:seed --class=UserSeeder
8. docker-compose exec api php artisan db:seed --class=Reward


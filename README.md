<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


# Self Notes
Reference: [Laravel Restful Api](https://www.toptal.com/laravel/restful-laravel-api-tutorial).
### Install Laravel environment
```
composer global require laravel/installer
```
Note: To run the command below with laravel, we need to at path of laravel to environment.
Ater running the above command, we will see the change directory message. Go to this directory and then copy link.

Windows:
```C:\Users\MY MSI\AppData\Roaming\Composer\vendor\bin```
### Create new project
```
laravel new <app-name> 
```
Or
```
composer create-project --prefer-dist laravel/laravel <app-name>
```
To checking version of Laravel
```
php artisan --version 
```
### Run Laravel Local
```
cd <app-name>
php artisan serve
```
### Create database for the project
Local, we may use xampp to create a database
### Create a model
```
php artisan make:model <name-of-modal> -m
```
-m: is an option that is  short for ```--migration``` and  it tells Artisan create one for our model
migrations: ```<app-name>/database/migrations```
model: ```<app-name>/Models```

Run command to generate database from migrations
```
php artisan migrate 
```

Adding new column to exist table
```
php artisan make:migration --table=<name-of-table> <name-of-new-migration>
```
Then add column in migration file. After that we just need to run again 
```
php artisan migrate 
```
### Create dummy data for testing
```
php artisan make:seeder <file-seeder-name> 
```
Directory: ```/database/seeds```

Reference: https://laravel.com/docs/8.x/seeding

To run specific seeder:
```
php artisan db:seed --class=<file-seeder-name> 
```
To configure run 1 time for all seeder.
Go to file: ```database/seeder/DatabaseSeeder```.
Then we just need to run command

```php artisan db:seed```

### Routes and Controller
Writing route in ```<app-name>/route/api.php```

Writing controller
```
php artisan make:controller <name-of-controller> 
```

### Http status
200: OK

201: Object Created

204: No content. When an action was executed successfully, but there is no content to return.

206: Partial content. Useful when you have to return a paginated list of resources.

400: Bad request. The standard option for requests that fail to pass validation.

401: Unauthorized. The user needs to be authenticated.

403: Forbidden. The user is authenticated, but does not have the permissions to perform an action.

404: Not found. This will be returned automatically by Laravel when the resource is not found.

500: Internal server error.

503: Service unavailable.

### Handle error 404 return json
[laravel_error_document](https://laravel.com/docs/8.x/errors)

If you want to custom error 404 page, we just need to create file in resources/views/errors/404.blade.php

### Register Feature
Flow: user/pass -> register
user/pass -> login ( server return api_key)
Then when user requests a action, they need to send request with token=<api_key>

### Test
Test command after setup with sqlite
``` 
composer test
```
Create factory before test
```
php artisan make:factory <name-of-factory> 
```
Create test file
```
php artisan make:test <name-of-test-file>
```
Fix error factory with command
``` 
composer require laravel/legacy-factories
```

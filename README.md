## Laravel Guzzle API
[![Total Downloads](https://poser.pugx.org/jtelesforoantonio/laravel-guzzle-api/downloads)](https://packagist.org/packages/jtelesforoantonio/laravel-guzzle-api)
[![License](https://poser.pugx.org/jtelesforoantonio/laravel-guzzle-api/license)](https://packagist.org/packages/jtelesforoantonio/laravel-guzzle-api)

This package provides a quickly integration of [Guzzle](https://github.com/guzzle/guzzle) and [Guzzle Services](https://github.com/guzzle/guzzle-services)
with Laravel to consuming web services.

## Installation

Install the package with Composer.

```shell
composer require jtelesforoantonio/laravel-guzzle-api
```

Laravel 5.5+ uses Package Auto Discovery and you don't need to add the Service Provider manually.

## Usage

Once installed you need to run the following command to publish the config file
this file is the core to create the client and to integrate with web services.
```shell
php artisan vendor:publish --tag=laravel-guzzle-api-config
```
To call yours requests use the Facade.
```php
use JTelesforoAntonio\LaravelGuzzleApi\Api;

$response = Api::myRequest();
```

Or using the helper function.
```php
$response = api()->myRequest();
```

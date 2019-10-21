<?php

namespace JTelesforoAntonio\LaravelGuzzleApi;

use Illuminate\Support\Facades\Facade;

class Api extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'api';
    }
}

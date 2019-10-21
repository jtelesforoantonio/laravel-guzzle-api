<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your API.
    |
    */
    'name' => 'Laravel Guzzle API',

    /*
    |--------------------------------------------------------------------------
    | Base URL
    |--------------------------------------------------------------------------
    |
    | This value is the url of your API.
    |
    */
    'baseUrl' => env('LARAVEL_GUZZLE_API_BASE_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | API Version
    |--------------------------------------------------------------------------
    |
    | This value is the API version.
    |
    */
    'apiVersion' => '',

    /*
    |--------------------------------------------------------------------------
    | Header
    |--------------------------------------------------------------------------
    |
    | The default headers, the key is the header name
    | example:
    |    'Accept' => 'application/json'
    |
    */
    'headers' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Description
    |--------------------------------------------------------------------------
    |
    | This value is the description of your API.
    |
    */
    'description' => '',

    /*
    |--------------------------------------------------------------------------
    | Operations
    |--------------------------------------------------------------------------
    |
    | Here you defines all the web services
    | To check all options see
    |    https://github.com/guzzle/guzzle-services
    |    https://guzzle3.readthedocs.io/_downloads/guzzle-schema-1.0.json
    |
    |
    */
    'operations' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Models
    |--------------------------------------------------------------------------
    |
    | Models can be used to define how an HTTP response is parsed
    | into a Guzzle\Service\Resource\Model object when an operation uses a model responseType.
    |
    */
    'models' => [
        'generic' => [
            'type' => 'object',
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware Requests
    |--------------------------------------------------------------------------
    |
    | Use GuzzleHttp\Middleware::mapRequest() for each middleware.
    | see http://docs.guzzlephp.org/en/stable/handlers-and-middleware.html#middleware
    |
    */
    'middleware_requests' => [
        \GuzzleHttp\Middleware::mapRequest(function (\Psr\Http\Message\RequestInterface $request) {
            //do something
            return $request;
        }),
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware Responses
    |--------------------------------------------------------------------------
    |
    | Use GuzzleHttp\Middleware::mapResponse() for each middleware.
    | see http://docs.guzzlephp.org/en/stable/handlers-and-middleware.html#middleware
    |
    */
    'middleware_responses' => [
        \GuzzleHttp\Middleware::mapResponse(function (\Psr\Http\Message\ResponseInterface $response) {
            //do something
            return $response;
        }),
    ],

    /*
    |--------------------------------------------------------------------------
    | Enable Mocks
    |--------------------------------------------------------------------------
    |
    | This value allow you simulate specific scenarios
    | without needing to send requests over the internet
    | if you set to true you must set some values en mocks key.
    |
    */
    'enable_mocks' => env('LARAVEL_GUZZLE_API_ENABLE_MOCKS', false),

    /*
    |--------------------------------------------------------------------------
    | Mocks
    |--------------------------------------------------------------------------
    |
    | See http://docs.guzzlephp.org/en/stable/testing.html
    |
    */
    'mocks' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Requests
    |--------------------------------------------------------------------------
    |
    | If you want log all requests set to true, the logs file is in /storage/logs.
    |
    */
    'enable_logs' => env('LARAVEL_GUZZLE_API_ENABLE_LOGS', false)
];

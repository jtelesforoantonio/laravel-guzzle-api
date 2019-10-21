<?php

namespace JTelesforoAntonio\LaravelGuzzleApi;

use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Middleware;
use Illuminate\Support\ServiceProvider;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Psr\Log\LogLevel;

class LaravelGuzzleApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('api', function ($app) {
            $configurations = config('laravel_guzzle_api');

            $handler = HandlerStack::create();

            if ($configurations['enable_mocks']) {
                $mocks = new MockHandler($configurations['mocks']);
                $handler = HandlerStack::create($mocks);
            }

            if ($configurations['enable_logs']) {
                $handler->push($this->attachLogger());
            }

            foreach ($configurations['middleware_requests'] as $middleware) {
                $handler->push($middleware);
            }

            foreach ($configurations['middleware_responses'] as $middleware) {
                $handler->push($middleware);
            }

            $client = new Client([
                'headers' => $configurations['headers'],
                'handler' => $handler,
            ]);

            $descriptions = new Description($configurations);

            return new GuzzleClient($client, $descriptions);
        });
    }

    /**
     * Create Middleware Log.
     *
     * @return callable
     * @throws \Exception
     */
    private function attachLogger()
    {
        $logFile = 'laravel-guzzle-api-' . date('Y-m-d') . '.log';
        $logger = new Logger('laravel-guzzle-api');
        $stream = new StreamHandler(storage_path("/logs/{$logFile}"));
        $stream->setFormatter(new LineFormatter(null, 'Y-m-d H:i:s'));
        $logger->pushHandler($stream);

        return Middleware::log($logger, new MessageFormatter(MessageFormatter::DEBUG), LogLevel::DEBUG);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laravel_guzzle_api.php' => config_path('laravel_guzzle_api.php')
        ], 'laravel-guzzle-api-config');
    }
}

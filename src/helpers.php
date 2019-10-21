<?php

if (!function_exists('api')) {
    /**
     * GuzzleClient.
     *
     * @return GuzzleHttp\Command\Guzzle\GuzzleClient
     */
    function api() {
        return app('api');
    }
}

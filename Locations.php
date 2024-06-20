<?php
declare(strict_types=1);

class Locations {
    function __construct(private Api $api)
    {
    }

    function map(): string {
        try {
            $response = $this->api->call();
        } catch (Throwable $e) {
            return 'oops';
        }

        return $response['data']['name'];
    }
}

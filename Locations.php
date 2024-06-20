<?php
declare(strict_types=1);

class Locations {
    function __construct(private Api $api)
    {
    }

    function map(): string {
        $response = $this->api->call();
        return $response['data']['name'];
    }
}

<?php
declare(strict_types=1);

class Test {
    function test_api_returns_string()
    {
        $apiMock = mock(Api::class);

        $expected = 'foo';

        $apiMock->shouldReceive('call')
            ->once()
            ->andReturn($expected);

        $systemUnderTest = new Locations($apiMock);

        $actual = $systemUnderTest->map();

        $this->assertSame($expected, $actual);
    }

    /**
     * @deprecated
     */
    function test_locations_does_not_handle_api_error()
    {
        $this->assertExceptionIsThrown(Exception::class);
        $apiMock = mock(Api::class);

        $apiMock->shouldReceive('call')
            ->once()
            ->andThrow(new Exception());

        $systemUnderTest = new Locations($apiMock);

        $systemUnderTest->map();
    }

    function test_locations_handles_api_error()
    {
        $apiMock = mock(Api::class);

        $apiMock->shouldReceive('call')
            ->once()
            ->andThrow(new Exception());

        $expected = 'oops';

        $systemUnderTest = new Locations($apiMock);

        $actual = $systemUnderTest->map();

        $this->assertSame($expected, $actual);
    }
}

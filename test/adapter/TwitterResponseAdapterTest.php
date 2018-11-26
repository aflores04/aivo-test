<?php


class TwitterResponseAdapterTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @test
     */
    public function adapter_with_valid_array_parameter()
    {
        $tweets = [];

        $adapter = new \TwitterApp\Adapter\TwitterResponseAdapter();

        $this->assertEmpty($adapter->toArray($tweets));
    }

    /**
     * @test
     */
    public function to_array_method_throw_exception()
    {
        $this->expectExceptionMessage('tweets most be an array');
        $adapter = new \TwitterApp\Adapter\TwitterResponseAdapter();
        $adapter->toArray('error');
    }

}
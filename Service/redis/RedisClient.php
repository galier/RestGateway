<?php
namespace RedisClient;
use Predis\Autoloader;

require 'vendor/autoload.php';

Autoloader::register();

class RedisClient
{

    public function Client()
    {
        try {
            return new \Predis\Client([
                'scheme' => 'tcp',
                'host'   => '127.0.0.1',
                'port'   => 6379,
            ]);
        }
        catch (\Exception $exception){

            return $exception;
        }




    }
}
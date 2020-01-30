<?php
require 'vendor/predis/predis/autoload.php';
require 'Service/redis/RedisClient.php';
require 'Service/RedisServiceInterface.php';
require 'RedisSender.php';

use Predis\Autoloader;

require 'vendor/autoload.php';
Autoloader::register();

class RedisService extends \RedisClient\RedisClient implements RedisServiceInterface
{

    public function Save($posts)
    {

        $result=new RedisSender($posts);

        if($this->is_Key($result->getKey()))
        {
            if(strcasecmp($this->Client()->get($result->getKey()),$result->getValue())===0)
            {
                return 'no update';
            }else{

                $this->Client()->set($result->getKey(), $result->getValue());
                return 'update';
            }
        }
        else
        {
            $this->Client()->set($result->getKey(), $result->getValue());
            return 'insert';
        }


    }

    private function is_Key($key)
    {
        return  $this->Client()->get($key);
    }

}
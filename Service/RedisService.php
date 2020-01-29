<?php
require 'vendor/predis/predis/autoload.php';
require 'Service/redis/RedisClient.php';
require 'Service/RedisServiceInterface.php';
use Predis\Autoloader;

require 'vendor/autoload.php';
Autoloader::register();

class RedisService extends \RedisClient\RedisClient implements RedisServiceInterface
{

    public function Save($posts)
    {

       $this->Client()->set('UserId:1:id:3', '[[{"userId":1,"id":2,"title":"qui est esse","body":"est rerum tempore vitae\nsequi sint nihil reprehenderit dolor beatae ea dolores neque\nfugiat blanditiis voluptate porro vel nihil molestiae ut reiciendis\nqui aperiam non debitis possimus qui neque nisi nulla"}]]');
     return  $this->Client()->get('UserId:1:id:3');

    }

}
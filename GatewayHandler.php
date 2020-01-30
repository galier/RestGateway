<?php

require 'Service/RedisService.php';

class GatewayHandler
{
    /**
     * @var PostsServiceInterface
     */
    private $service;

    /**
     * @var RedisService
     */
    private $redis;

    /**
     *
     * @param PostsServiceInterface $postsService
     * @param RedisServiceInterface
     */
    public function __construct(PostsServiceInterface $postsService)
    {
        $this->service = $postsService;
        $this->redis=new RedisService();
    }

    public function handle($id){

       $result=$this->service->pushPosts($id);
       if($id){
         $this->redis->Save($result);
       }
       return $result;

    }



}
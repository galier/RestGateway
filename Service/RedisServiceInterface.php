<?php


interface RedisServiceInterface
{

    /**
     * @param $posts
     * @throws \Exception
     */
    public function Save($posts);

}
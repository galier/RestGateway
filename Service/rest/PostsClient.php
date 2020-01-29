<?php
if (!class_exists('CurlClient')) {
    require( 'Service/rest/CurlClient.php');
}
class PostsClient extends CurlClient
{

    public function pull($id){

        $this->configure('https://jsonplaceholder.typicode.com/posts',$id?['id'=>$id]:'');

      return  $this->execute();
    }
}
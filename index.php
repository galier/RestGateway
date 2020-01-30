<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


require 'Service/PostsService.php';
require 'GatewayHandler.php';
require 'vendor/autoload.php';


$app = new \Slim\App();

$app->get('/items[/{id:[0-9]+}]', function (Request $request, Response $response)
{
    $data=(new GatewayHandler(new PostsService()))->handle($request->getAttribute('id'));

    if($data) {
        return $response->withStatus(200)
            ->withHeader('Content-type', 'application/json')
            ->withJson([$data]);
    }else{
        return $response->withStatus(404)
            ->withHeader('Content-type', 'application/json');
    }

});
$app->run();
//phpinfo();
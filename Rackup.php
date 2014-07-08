<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-23
    * Time: 20:48
    * To change this template use File | Settings | File Templates.
    */
   require_once('Application/Environment/Autoloader.php');

   Application\Environment\AutoLoader::initialize();

   $requestHandler = new Application\Environment\RequestHandler();
   $request        = $requestHandler->buildRequestObject();

   $router = new Application\Environment\Router($request);
   $route  = $router->getRoute($request->getRoute());

   $requestDispatcher = new Application\Environment\RequestDispatcher($request);
   $response          = $requestDispatcher->dispatch($route);

   echo '<pre>' . json_encode($response) . '</pre>';
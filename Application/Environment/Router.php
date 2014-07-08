<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-24
    * Time: 21:31
    * To change this template use File | Settings | File Templates.
    */

   namespace Application\Environment;


   /**
    * Class Router
    * @package Application\Environment
    */
   class Router {

      private $_routes = [];
      private $_request;


      /**
       * @param Request $request
       */
      public function __construct(Request $request) {
         $this->_request = $request;

         $this->_addRoute('promise', new Route(['controller' => 'PromiseController', 'GET' => true]));
      }


      /**
       * @param $path
       * @return Route
       */
      public function getRoute($path) {
         $route = $this->_getRoute($path);

         $this->_checkAllowedRequestMethod($route);

         return $route;
      }


      /**
       * @param $route
       * @throws \Exception
       * @return Route
       */
      private function _getRoute($route) {
         if (!array_key_exists($route, $this->_routes)) {
            throw new \Exception('No such route');
         }

         return $this->_routes[$route];
      }


      /**
       * @param $path
       * @param Route $route
       */
      private function _addRoute($path, Route $route) {
         $this->_routes[$path] = $route;
      }


      /**
       * @param Route $route
       * @throws \Exception
       */
      private function _checkAllowedRequestMethod(Route $route) {
         $allowed = false;

         switch ($this->_request->getMethod()) {
            case 'GET':
               $allowed = $route->isAllowedGET();
               break;
            case 'PUT':
               $allowed = $route->isAllowedPUT();
               break;
            case 'POST':
               $allowed = $route->isAllowedPOST();
               break;
            case 'DELETE':
               $allowed = $route->isAllowedDELETE();
               break;
         }

         if (!$allowed) {
            throw new \Exception('Not allowed!');
         }
      }

   }
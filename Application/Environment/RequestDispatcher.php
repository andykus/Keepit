<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-24
    * Time: 22:17
    * To change this template use File | Settings | File Templates.
    */

   namespace Application\Environment;


   /**
    * Class RequestDispatcher
    * @package Application\Environment
    */
   class RequestDispatcher {

      private $_request;


      /**
       * @param Request $request
       */
      public function __construct(Request $request) {
         $this->_request = $request;
      }


      /**
       * @param Route $route
       * @return string
       * @throws \Exception
       */
      public function dispatch(Route $route) {
         $controllerClass = $route->getController();

         if (!class_exists($controllerClass)) {
            throw new \Exception('Controller class does not exist');
         }

         $controller = new $controllerClass();
         $response   = $this->_callControllerMethod($controller);

         return $response;
      }


      /**
       * @param $controller
       * @return string
       * @throws \Exception
       */
      private function _callControllerMethod($controller) {
         switch ($this->_request->getMethod()) {
            case 'PUT':
               return $controller->{Configuration::CONTROLLER_METHOD_PUT}($this->_request->getData());
            case 'POST':
               return $controller->{Configuration::CONTROLLER_METHOD_POST}($this->_request->getData());
            case 'GET':
               return $controller->{Configuration::CONTROLLER_METHOD_GET}($this->_request->getId());
            case 'DELETE':
               return $controller->{Configuration::CONTROLLER_METHOD_DELETE}($this->_request->getId());
         }

         throw new \Exception('Unable to call controller method');
      }

   }
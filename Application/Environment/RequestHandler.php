<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-24
    * Time: 19:47
    * To change this template use File | Settings | File Templates.
    */

   namespace Application\Environment;


   /**
    * Class RequestHandler
    * @package Application\Environment
    */
   class RequestHandler {

      /**
       * @return Request
       */
      public function buildRequestObject() {
         $request = new Request();

         $request
            ->setData($this->_getRequestData())
            ->setMethod($this->_getRequestMethod())
            ->setRoute($this->_getRequestRoute())
            ->setQueryParameters($this->_getRequestQueryParameters());

         return $request;
      }


      /**
       * @return array|mixed
       */
      private function _getRequestData() {
         $data = json_decode(file_get_contents('php://input'), true);

         return empty($data) ? [] : $data;
      }


      /**
       * @return mixed
       */
      private function _getRequestMethod() {
         return $_SERVER['REQUEST_METHOD'];
      }


      /**
       * @return mixed
       */
      private function _getRequestRoute() {
         $path = $_SERVER['REQUEST_URI'];

         if (($position = strpos($path, '?')) !== FALSE) {
            $path = substr($path, 0, $position);
         }

         return str_replace(Configuration::BASE_URI, '', $path);
      }


      /**
       * @return array
       */
      private function _getRequestQueryParameters() {
         return empty($_GET) ? [] : $_GET;
      }

   }
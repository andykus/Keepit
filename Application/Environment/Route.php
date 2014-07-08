<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-24
    * Time: 21:34
    * To change this template use File | Settings | File Templates.
    */

   namespace Application\Environment;


   /**
    * Class Route
    * @package Application\Environment
    */
   class Route {

      public $controller;
      public $POST = false;
      public $PUT = false;
      public $GET = false;
      public $DELETE = false;


      /**
       * @param array $data
       */
      public function __construct(array $data) {
         foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
               $this->$key = $value;
            }
         }
      }


      /**
       * @return string
       */
      public function getController() {
         return Configuration::CONTROLLER_PATH . $this->controller;
      }


      /**
       * @return bool
       */
      public function isAllowedGET() {
         return $this->GET;
      }


      /**
       * @return bool
       */
      public function isAllowedPUT() {
         return $this->PUT;
      }


      /**
       * @return bool
       */
      public function isAllowedPOST() {
         return $this->POST;
      }


      /**
       * @return bool
       */
      public function isAllowedDELETE() {
         return $this->DELETE;
      }

   }
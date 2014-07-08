<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-23
    * Time: 20:51
    * To change this template use File | Settings | File Templates.
    */

   namespace Application\Environment;

   /**
    * Class AutoLoader
    * @package Application\Environment
    */
   class AutoLoader {

      /**
       * Initialize script auto loader
       */
      public static function initialize() {
         spl_autoload_extensions('.php');
         spl_autoload_register();
      }

   }

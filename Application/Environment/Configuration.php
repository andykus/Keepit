<?php
   /**
    * Created by JetBrains PhpStorm.
    * User: Andy
    * Date: 2014-06-24
    * Time: 20:13
    * To change this template use File | Settings | File Templates.
    */

   namespace Application\Environment;


   /**
    * Class Configuration
    * @package Application\Environment
    */
   class Configuration {

      const CONTROLLER_METHOD_POST   = 'create';
      const CONTROLLER_METHOD_PUT    = 'update';
      const CONTROLLER_METHOD_GET    = 'show';
      const CONTROLLER_METHOD_LIST   = 'list';
      const CONTROLLER_METHOD_DELETE = 'delete';

      const CONTROLLER_PATH = 'Application\Controllers\\';
      const BASE_URI        = '/keepit/';

   }
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Andy
 * Date: 2014-06-23
 * Time: 21:31
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Environment;


/**
 * Class Request
 * @package Application\Environment
 */
class Request {

    private $_method;
    private $_route;
    private $_queryParameters;
    private $_data;


    /**
     * @param $method
     * @return $this
     */
    public function setMethod($method) {
        $this->_method = $method;
        return $this;
    }


    /**
     * @param $route
     * @return $this
     */
    public function setRoute($route) {
        $this->_route = $route;
        return $this;
    }


    /**
     * @param $queryParameters
     * @return $this
     */
    public function setQueryParameters($queryParameters) {
        $this->_queryParameters = $queryParameters;
        return $this;
    }


    /**
     * @param $data
     * @return $this
     */
    public function setData($data) {
        $this->_data = $data;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getMethod() {
        return $this->_method;
    }


    /**
     * @return mixed
     */
    public function getRoute() {
        return $this->_route;
    }


    /**
     * @return array
     */
    public function getQueryParameters() {
        return $this->_queryParameters;
    }


    /**
     * @return array
     */
    public function getData() {
        return $this->_data;
    }


   /**
    * @return null
    */
   public function getId() {
      return null;
   }

}
<?php

require_once 'conexao.php';
require_once 'SearchService.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ServiceController
 *
 * @author PedroAlberto
 */
class ServiceController {
    
    public $serviceState = null;

    static function getController($service) {
        if (empty($service)) {
            return FALSE;
        } else {

            $item = new ReflectionClass($service."Service");
            $serviceState = $item->newInstance();
            return $this;
        }
    }
    
    function __construct($service) {
    
            $item = new ReflectionClass($service."Service");
            $this->serviceState = $item->newInstance();
           
        
    }


}

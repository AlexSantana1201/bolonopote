<?php

namespace App\Core;
use Exception;

class CoreMethod{
    
    private object $controller ;
    private string $uri;
    private const DEFAULT_METHOD = 'index';
  
    public function __construct( Object $controller, String $uri){
        $this->controller = $controller;
        $this->uri= $uri;
    }


    private function GetMethodInUri() : String{
        $explodeUri = array_filter(explode('/', $this->uri));
        if(empty($explodeUri[2]) ){
            return self::DEFAULT_METHOD;
        }
        return $explodeUri[2];
    }


    public function GetMethodInController(){

      if(method_exists($this->controller, $this->GetMethodInUri())){

          return $this->GetMethodInUri();

      }

      return throw new Exception('O method '.$this->GetMethodInUri(). ' não existe');
      

    }


}
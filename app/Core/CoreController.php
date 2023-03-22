<?php

namespace App\Core;

use FFI\Exception;

/**
 * Summary of CoreController
 */
class CoreController
{

    private const NAMESPACE_CONTROLLER = "App\\Controllers\\";
    private const DEFAULT_CONTROLLER = "HomeController";

    private String $uri;



    public function __construct(String $uri)
    {

        $this->uri = $uri;
    }


    private function GetControllerInUri(): string
    {
        $explodeUri = array_filter(explode('/', $this->uri));

        if (empty($explodeUri[1]) ||  $explodeUri[1] == '/') {
            return self::DEFAULT_CONTROLLER;
        }
        return ucfirst($explodeUri[1]) . 'Controller';
    }


    /**
     * Summary of GetControllerInNameSpace
     * @return string
     */
    public function GetControllerInNameSpace(): String
    {


        if (class_exists(self::NAMESPACE_CONTROLLER. $this->GetControllerInUri())) {

            return self::NAMESPACE_CONTROLLER. $this->GetControllerInUri();
        }

        return throw new Exception("Controller " .self::NAMESPACE_CONTROLLER.$this->GetControllerInUri() . " não encontrado");
    }
}

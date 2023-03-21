<?php

namespace App\Classes;

class Uri
{

    private $uri;


    public function getUri(): String
    {
        $this->uri = $_SERVER['REQUEST_URI'];

        if ($this->VerifyUri($this->uri)) {

            return $this->uri;
        } else {
            return $this->uri = "/";
        }
    }


    private function VerifyUri($uri): Bool
    {

        if (!empty($uri)) {
            return true;
        } else {
            return false;
        }
    }
}

<?php
namespace App\Classes;
class ConvertArrays
{
    public function strArray($data, $value): array
    {
        $qdtData = count($data);
        $array = [];

        for ($i = 0; $i < $qdtData; $i++) {

            array_push($array, $value);
        }

        return $array;
    }
}

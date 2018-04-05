<?php
namespace App\Helpers;

class General
{
    public static function dateToBase($param)
    {
        $data = date('Y-m-d',strtotime($param));

        return $data;
    }

    
}
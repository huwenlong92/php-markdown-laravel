<?php
/**
 * Created by PhpStorm.
 * User: henly
 * Date: 2016/12/21
 * Time: 22:09
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class FileFacades extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'FileService';
    }

}
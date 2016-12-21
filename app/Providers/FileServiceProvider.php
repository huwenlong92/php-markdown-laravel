<?php
/**
 * Created by PhpStorm.
 * User: henly
 * Date: 2016/12/21
 * Time: 22:07
 */

namespace App\Providers;


use App\Services\File;
use Illuminate\Support\ServiceProvider;

class FileServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('FileService', function () {
            return new File();
        });
    }

}
<?php namespace App\Facades;
/**
 * Created by PhpStorm.
 * User: Alejandro
 * Date: 01/05/14
 * Time: 21:09
 */
use Illuminate\Support\Facades\Facade;

class ImageFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return new \App\Services\Image;
    }

}
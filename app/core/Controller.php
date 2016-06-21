<?php

/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 20/06/16
 * Time: 14:50
 */
class Controller
{
    protected $model='home';

    public function model($model)
    {
        //echo $model;
        require_once '../app/models/' . $model . '.php';
        $namespace = 'model\\'.$model;

        return new $namespace();

    }

    public function view($view, $data)
    {
        require_once '../app/views/'. $view . '.php';

    }
}
<?php

/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 21/06/16
 * Time: 09:27
 */



class Book extends Controller
{
    protected $data;

    public function __construct()
    {
        $this->data=$this->model('BookData');
    }

    public function index(){
       $class = get_class($this);


        echo $class;
        echo'pppft';
    }


}
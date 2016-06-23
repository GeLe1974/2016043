<?php
/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 21/06/16
 * Time: 20:17
 */

namespace model;


class Author extends \RedBean_SimpleModel
{
    public $name;

    public function __construct()
    {
        $this->data=$this->model('Author');
    }

    public function add($name='')
    {

    }
}
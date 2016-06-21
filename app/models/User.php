<?php

/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 20/06/16
 * Time: 15:44
 */


class User
{
    public $name;
    public $timestamps = false;
    protected $fillable =[
        'name',
        'email'
    ];


}
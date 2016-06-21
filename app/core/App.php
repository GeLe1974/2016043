<?php

/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 20/06/16
 * Time: 14:48
 */
class App
{
    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
     //echo'OK!';
    // print_r($this->parseUrl());
        $url = $this->parseUrl();
        if(file_exists('../app/controllers/'. $url[0] . '.controller.php'))
        {
            $this->controller = $url[0];
           unset($url[0]);

        }

        require_once '../app/controllers/' . $this->controller . '.controller.php';
        //echo $this->controller;

        $this->controller = new $this->controller;

        //var_dump($this->controller);

        if(isset($url[1]))
        {
            if(method_exists($this->controller,$url[1]))
            {
                //echo 'OK';
                $this->method = $url[1];
                unset($url[1]);

            } else {
                $this->method ='index';
            }
            $this->params = array_values($url);


            call_user_func_array([$this->controller,$this->method], $this->params);

        }else{

        }
    }

    public function parseUrl()
    {
        if(isset($_GET['url']))
        {
            //echo $_GET['url'];
            return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));


        }
    }
}
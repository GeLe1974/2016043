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
        $this->data=$this->model('Book');
    }

    public function
    index(){
       //$class = get_class($this);
       //echo $class;
        //$this->view('book/index',[]);
        //echo $this->twig()->render('home/home.twig');
        //echo 'nest';
        $this->twig('home/home.twig', []);
    }

    public function add()
    {
        if(!$_POST){
            $this->twig('author/index.twig');
        }

        $book = R::dispense('book');
        $book->title = $title;
        $book->author = $author;
        $book->ISBN = $ISBN;
        $id= R::store($book);
    }
}
<?php
use rock\sanitize\Sanitize;

/**
 * Created by PhpStorm.
 * User: Geert
 * Date: 21/06/16
 * Time: 20:19
 */
class Author extends Controller
{


    public function __construct()
    {

        $this->model('Author');


    }

    public function index()
    {

    }

    public function add()
    {
        if(!$_POST){
            $this->twig('author/add.twig',['title' => 'Auteur']);
        }else{
            //var_dump($_POST);
            $data = $_POST['name'];
            $data = Sanitize::removeTags()->sanitize($data);
            $author = R::dispense('author');
            $author->name = $data;
            $id = R::store($author);
            $this->twig('author/add.twig',[
               'message' => 'auteur toegevoegd',
                'data' => $data,
            ]);



        }
    }

    public function show($page =''){
        //$authors = R::findAll('author', 'ORDER BY name ASC');

        $currentPage = isset($page) ? $page : 1;
        $limit = 10;


        $authors = R::count('author');
        $maxPages=ceil($authors/$limit);

        $authors = R::findAll('author', 'ORDER BY name LIMIT '.(($currentPage-1)*$limit).', '.$limit);


        $this->twig('author/show.twig',[
            'authors'   => $authors,
            'page'      => $currentPage,
            'maxPage'   => $maxPages,
        ]);

    }

    /*
if(!$_POST){
$this->twig('author/index.twig');
}

    */

}
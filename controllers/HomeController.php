<?php

class HomeController extends BaseController
{

//    function indexLogedIn(){
//    $this->posts = $this->model->getAll();
//    }

    function index()
    {
//        $this->addErrorMessage("some error");
//        $this->addInfoMessage("info error");

        $this->posts = $this->model->getAllPosts();

        $posts = $this->model->getLastPosts(5);
        $this->postsSideBar = $posts;
    }

	function view(int $id)
    {
        $post = $this->model->getPostById($id);
        if(!$post){
            $this->addErrorMessage("Error: invalid post id.");
            $this->redirect("");
        }
        $this->post = $post;
    }

}

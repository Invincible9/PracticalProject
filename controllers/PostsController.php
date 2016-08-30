<?php

class PostsController extends BaseController
{
    function onInit(){
        $this->authorize();
    }

    function index()
    {
        $this->posts = $this->model->getALL();
    }

//    function index1()
//    {
//        $this->posts = $this->model->getALLPosts();
//    }

    function createUserPost(){
        if($this->isPost){
            $title = $_POST['post_title'];
            if(strlen($title) < 1){
                $this->setValidationError("post_title", "Title cannot be empty");
            }

            $content = $_POST['post_content'];
            if(strlen($content) < 1){
                $this->setValidationError("post_content", "Content cannot be empty");
            }

            if($this->formValid()){
                $userId = $_SESSION['user_id'];
                if($this->model->create($title, $content, $userId)){
                    $this->addInfoMessage("Post created");
                    $this->redirect("users", "myposts");
                }else{
                    $this->addErrorMessage("Error: cannot create post.");
                }
            }
        }
    }

    function createAdminPost(){
        if($this->isPost){
            $title = $_POST['post_title'];
            if(strlen($title) < 1){
                $this->setValidationError("post_title", "Title cannot be empty");
            }

            $content = $_POST['post_content'];
            if(strlen($content) < 1){
                $this->setValidationError("post_content", "Content cannot be empty");
            }

            if($this->formValid()){
                $userId = $_SESSION['user_id'];
                if($this->model->create($title, $content, $userId)){
                    $this->addInfoMessage("Post created");
                    $this->redirect("admins", "myposts");
                }else{
                    $this->addErrorMessage("Error: cannot create post.");
                }
            }
        }
    }


    function createAdminComment($post_id){
        if($this->isPost){

            $content = $_POST['comments_content'];

            if(strlen($content) < 2){
                $this->setValidationError("comments_content", "Content cannot be empty");
            }

            $author_id = $_SESSION['user_id'];

            $postId = $this->model->createAdminComment($content, $post_id, $author_id);

            if($this->formValid()){
                if($postId){
//                    $_SESSION['id'] = $postId;
                    $this->addInfoMessage("Comment created");
//                    $this->redirect("home", "view", $post_id);
                    header("Location: " . APP_ROOT . '/home/view/' . $post_id);
                }else{
                    $this->addErrorMessage("Error: cannot create comment.");
                }
            }

        }
 }


    function createUserComment($post_id){
        if($this->isPost){

            $content = $_POST['comments_content'];

            if(strlen($content) < 2){
                $this->setValidationError("comments_content", "Content cannot be empty");
            }

            $author_id = $_SESSION['user_id'];

            $postId = $this->model->createUserComment($content, $post_id, $author_id);

            if($this->formValid()){

                if($postId){
                    $this->addInfoMessage("Comment created");
//                    $this->redirect("home", "view");
                    header("Location: " . APP_ROOT . '/home/view/' . $post_id);
                }else{
                    $this->addErrorMessage("Error: cannot create comment.");
                }
            }

        }
    }


    public function delete(int $id){
        if ($this->isPost){
            //HTTP POST
            //Delete the request post by id
            if($this->model->delete($id)){
                $this->addInfoMessage("Post deleted");
            }else{
                $this->addErrorMessage("Error: cannot delete post. ");
            }
            $this->redirect('posts');
        }
        else{
            //HTTP GET
            //Show "confirm delete" form
            $post = $this->model->getPostById($id);
            if(!$post){
                $this->addErrorMessage("Error: post does not exist. ");
                $this->redirect("posts");
            }
            $this->post = $post;
        }
    }

    public function deleteUserPost(int $id){
        if ($this->isPost){
            //HTTP POST
            //Delete the request post by id
            if($this->model->delete($id)){
                $this->addInfoMessage("Post deleted");
            }else{
                $this->addErrorMessage("Error: cannot delete post. ");
            }
            $this->redirect('users', 'myposts');
        }
        else{
            //HTTP GET
            //Show "confirm delete" form
            $post = $this->model->getPostById($id);
            if(!$post){
                $this->addErrorMessage("Error: post does not exist. ");
                $this->redirect("users", "myposts");
            }
            $this->post = $post;
        }
    }


    public function deleteAdminPost(int $id){
        if ($this->isPost){
            //HTTP POST
            //Delete the request post by id
            if($this->model->delete($id)){
                $this->addInfoMessage("Post deleted");
            }else{
                $this->addErrorMessage("Error: cannot delete post. ");
            }
            $this->redirect('admins', "myposts");
        }
        else{
            //HTTP GET
            //Show "confirm delete" form
            $post = $this->model->getPostById($id);
            if(!$post){
                $this->addErrorMessage("Error: post does not exist. ");
                $this->redirect("admins", "myposts");
            }
            $this->post = $post;
        }
    }

    public function edit(int $id){
        if($this->isPost){
            //Edit the request post (update its fields)
            $title = $_POST['post_title'];
            if(strlen($title) < 1){
                $this->setValidationError("post_title", "Title cannot be empty!");
            }
            $content = $_POST['post_content'];
            if(strlen($content) < 1){
                $this->setValidationError("post_content", "Content cannot be empty!");
            }
            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';

            if(!preg_match($dateRegex, $date)){
                $this->setValidationError("post_date", "Invalid date!");
            }

//            $username = $_POST['username'];
//            $user_id = $this->model->getUserByUsername($username);
//            if($user_id <= 0 || $user_id > 1000000){
//                $this->setValidationError("user_id", "Invalid author user ID!");
//            }

            $postId = $this->model->edit($id, $title, $content, $date);

            if($this->formValid()){
                if($postId){
                    $_SESSION['id'] = $postId;
                    $this->addInfoMessage("Post edited");
                }else{
                    $this->addErrorMessage("Error: cannot edit post.");
                }
                $this->redirect('posts');
                }

            }
            //HTTP GET
            //Show "confirm delete" form
            $this->post = $this->model->getPostById($id);
            if(!$this->post){
                $this->addErrorMessage("Error: post does not exist. ");
                $this->redirect("posts");
            }
//            $this->post = $post;
        }


    public function editAdminPost(int $id){
        if($this->isPost){
            //Edit the request post (update its fields)
            $title = $_POST['post_title'];
            if(strlen($title) < 1){
                $this->setValidationError("post_title", "Title cannot be empty!");
            }
            $content = $_POST['post_content'];
            if(strlen($content) < 1){
                $this->setValidationError("post_content", "Content cannot be empty!");
            }
            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';

            if(! preg_match($dateRegex, $date)){
                $this->setValidationError("post_date", "Invalid date!");
            }

            $username = $_POST['username'];
            $user_id = $this->model->getUserByUsername($username);
            if($user_id <= 0 || $user_id > 1000000){
                $this->setValidationError("user_id", "Invalid author user ID!");
            }

            if($this->formValid()){
                if($this->model->edit($id, $title, $content, $date, $user_id)){
                    $this->addInfoMessage("Post edited");
                }else{
                    $this->addErrorMessage("Error: cannot edit post.");
                }
                $this->redirect('admins','myposts');
            }

        }
        //HTTP GET
        //Show "confirm delete" form
        $post = $this->model->getPostById($id);
        if(!$post){
            $this->addErrorMessage("Error: post does not exist. ");
            $this->redirect("admins","posts");
        }
        $this->post = $post;
    }



    public function editUserPost(int $id){
        if($this->isPost){
            //Edit the request post (update its fields)
            $title = $_POST['post_title'];
            if(strlen($title) < 1){
                $this->setValidationError("post_title", "Title cannot be empty!");
            }
            $content = $_POST['post_content'];
            if(strlen($content) < 1){
                $this->setValidationError("post_content", "Content cannot be empty!");
            }
            $date = $_POST['post_date'];
            $dateRegex = '/^\d{2,4}-\d{1,2}-\d{1,2}( \d{1,2}:\d{1,2}(:\d{1,2})?)?$/';

            if(! preg_match($dateRegex, $date)){
                $this->setValidationError("post_date", "Invalid date!");
            }

            $username = $_POST['username'];
            $user_id = $this->model->getUserByUsername($username);
            if($user_id <= 0 || $user_id > 1000000){
                $this->setValidationError("user_id", "Invalid author user ID!");
            }

            if($this->formValid()){
                if($this->model->edit($id, $title, $content, $date, $user_id)){
                    $this->addInfoMessage("Post edited");
                }else{
                    $this->addErrorMessage("Error: cannot edit post.");
                }
                $this->redirect('users','myposts');
            }

        }
        //HTTP GET
        //Show "confirm delete" form
        $post = $this->model->getPostById($id);
        if(!$post){
            $this->addErrorMessage("Error: post does not exist. ");
            $this->redirect("users","myposts");
        }
        $this->post = $post;
    }






}
<?php

class AdminsController extends BaseController
{
    public function index()
    {
        $this->authorize();
        $this->admins = $this->model->getAllUsers();
    }

    public function myposts()
    {
        $id = $_SESSION['user_id'];
        $this->posts = $this->model->getAllPostsById($id);
    }

    public function mycomments()
    {
        $id = $_SESSION['user_id'];
        $this->comments = $this->model->getAllCommentsById($id);
    }

    public function editUser(int $id)
    {
        if($this->isPost){
            //Edit the request post (update its fields)
//            $username = $_POST['username'];

//            if(strlen($username) < 2){
//                $this->setValidationError("username", "Username cannot be empty!");
//            }
//            $full_name = $_POST['full_name'];
//            if(strlen($full_name) < 2){
//                $this->setValidationError("full_name", "FullName cannot be empty!");
//            }

            $check_isAdmin = isset($_POST['admin']) ? 1 : 0;

            if($this->formValid()){
                if($this->model->edit($id, $check_isAdmin)){
                    $_SESSION['val'] = $check_isAdmin;
                     $this->addInfoMessage("User edited");
                }else{
                    $this->addErrorMessage("Error: cannot edit user.");
                }
                $this->redirect('admins');
            }
        }

        //HTTP GET
        //Show "confirm delete" form
        $this->user = $this->model->getById($id);
        if(!$this->user){
            $this->addErrorMessage("Error: post does not exist. ");
            $this->redirect("admins");
        }
    }

    public function deleteAdminComment(int $id){
        if ($this->isPost){
            //HTTP POST
            //Delete the request post by id
            if($this->model->deleteAdminComments($id)){
                $this->addInfoMessage("Comment deleted");
            }else{
                $this->addErrorMessage("Error: cannot delete comment. ");
            }
            $this->redirect('admins', "mycomments");
        }
        else{
            //HTTP GET
            //Show "confirm delete" form
            $this->comments = $this->model->getAllCommentsById($_SESSION['user_id']);
            if(!$this->comments){
                $this->addErrorMessage("Error: comment does not exist. ");
                $this->redirect("admins", "mycomments");
            }
//            $this->comment = $comment;
        }
    }


    public function deleteUser(int $id){

//        $posts = $this->model->delete($id);

        if ($this->isPost){
            //HTTP POST
            //Delete the request post by id
            if($this->model->deleteUser($id)){
                $this->addInfoMessage("User deleted");
            }else{
                $this->addErrorMessage("Error: cannot delete user. ");
            }
            $this->redirect('admins');
        }
        else{
            //HTTP GET
            //Show "confirm delete" form
            $this->user = $this->model->getById($id);
            if(!$this->user){
                $this->addErrorMessage("Error: User does not exist. ");
                $this->redirect("admins");
            }
//            $this->post = $post;
        }
    }


    public function logout()
    {
        session_destroy();
        $this->redirect("");
    }

}

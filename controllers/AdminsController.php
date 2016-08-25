<?php

class AdminsController extends BaseController
{
    public function index()
    {
        $this->authorize();
        $this->users = $this->model->getAll();
    }

    public function edit(int $id)
    {
        if($this->isPost){
            //Edit the request post (update its fields)
            $username = $_POST['username'];
            if(strlen($username) < 2){
                $this->setValidationError("username", "Username cannot be empty!");
            }
            $full_name = $_POST['full_name'];
            if(strlen($full_name) < 2){
                $this->setValidationError("full_name", "FullName cannot be empty!");
            }

            if($this->formValid()){
                if($this->model->edit($id, $username, $full_name)){
                    $this->addInfoMessage("User edited");
                }else{
                    $this->addErrorMessage("Error: cannot edit user.");
                }
                $this->redirect('users');
            }
        }

        //HTTP GET
        //Show "confirm delete" form
        $user = $this->model->getById($id);
        if(! $user){
            $this->addErrorMessage("Error: post does not exist. ");
            $this->redirect("users");
        }
        $this->user = $user;

    }

    public function logout()
    {
        session_destroy();
        $this->redirect("");
    }


}

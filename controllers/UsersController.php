<?php

class UsersController extends BaseController
{

//    public function allUsers(){
//        $this->users = $this->model->getAllUsers();
//    }

    public function myposts()
    {
        $id = $_SESSION['user_id'];
        $this->posts = $this->model->getAllPostsById($id);
    }

    public function login()
    {
        if ($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userId = $this->model->login($username, $password);

            $isAdmin = $this->model->loginAdmin($userId);

            if ($userId) {
                $_SESSION['isAdmin'] = $isAdmin['isAdmin'];
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $userId;

                $this->addInfoMessage("Login successful.");
                $this->redirect("");
        } else {
            $this->addErrorMessage("Error: Login Failed");
        }
    }
}

    public function register()
    {
		if($this->isPost) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $full_name = $_POST['full_name'];

            if (strlen($username) <= 1) {
                $this->setValidationError("username", "Username invalid");
            }

            if (strlen($password) <= 1) {
                $this->setValidationError("password", "Password is too short");
            }

            if ($password != $password_confirm) {
                $this->setValidationError("password_confirm", "Password do not match");
                return;
            }

            if ($this->formValid()) {
                $userId = $this->model->register($username, $password, $full_name);
                if ($userId !== false) {
                    $_SESSION['isAdmin'] = 0;
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $userId;
                    $this->addInfoMessage("Registration successful. ");
                    $this->redirect("");
                } else {
                    $this->addErrorMessage("Error: registration failed.");
                }
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect("");
    }


}

<?php

class UsersModel extends BaseModel
{

    public function deleteUserComments(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    function getAllCommentsById()
    {
        $statement = self::$db->prepare(
            "SELECT comments.id, comments.text, posts.title, users.username, comments.date FROM comments " .
            "LEFT JOIN posts ON comments.post_id = posts.id " .
            "LEFT JOIN users ON comments.author_id= users.id " .
            "WHERE comments.author_id = ?");
        $id = $_SESSION['user_id'];
        $statement->bind_param("i", $id);
        $statement->execute();
//        $_SESSION['commentID'] = $id;
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    //function all posts by user
    function getAllPostsById(){
        $statement = self::$db->prepare(
            "SELECT posts.id, title, content, date FROM posts JOIN users " .
            "ON posts.user_id = users.id WHERE users.id = ?");
        $id = $_SESSION['user_id'];
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function register(string $username, string $password, string $full_name){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $statement = self::$db->prepare(
            "INSERT INTO users (username, password_hash, full_name) VALUES (?,?,?)");
        $statement->bind_param("sss", $username, $password_hash, $full_name);
        $statement->execute();
        if($statement->affected_rows != 1)
            return false;
        $user_id = self::$db->query("SELECT LAST_INSERT_ID()")->fetch_row()[0];
        return $user_id;
    }

    public function loginAdmin(int $id){
        $statement = self::$db->prepare(
            "SELECT users.isAdmin FROM users WHERE users.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function login(string $username, string $password)
    {
        $statement = self::$db->prepare(
            "SELECT id, password_hash FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();

        $result = $statement->get_result()->fetch_assoc();
        if(password_verify($password, $result['password_hash']))
            return $result['id'];
            return false;
    }

//    public function editPass(int $id, string $title, string $content,
//                         string $date) : bool
//    {
//        $password_hash = password_hash($password, PASSWORD_DEFAULT);
//        $statement = self::$db->prepare("UPDATE posts SET title = ?, " .
//            "content = ?, date = ? WHERE id = ?");
//        $statement->bind_param("sssi", $title, $content, $date, $id);
//        $statement->execute();
//        return $statement->affected_rows >= 0;
//    }


}

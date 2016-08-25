<?php

class UsersModel extends BaseModel
{
    function getALL()
    {
        $statement = self::$db->query(
            "SELECT * FROM  users ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    //function all posts by user
//    function getAllPostsById($id){
//        $statement = self::$db->query(
//            "SELECT title, content, date FROM posts JOIN users " .
//            "ON posts.user_id = users.id WHERE users.id = ?");
//        $statement->bind_param("i", $id);
//        $statement->execute();
//        $result = $statement->get_result()->fetch_assoc();
//        return $result;
//    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id= ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function edit(int $id, string $username, string $full_name) : bool
    {
        $statement = self::$db->prepare("UPDATE users SET username = ?, " .
            "full_name = ? WHERE id = ?");
        $statement->bind_param("ssi", $username, $full_name, $id);
        $statement->execute();
        return $statement->affected_rows >= 0;
    }





}

<?php

class AdminsModel extends BaseModel
{

    public function deleteAdminComments(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM comments WHERE comments.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    function getAllCommentsById()
    {
        $statement = self::$db->prepare(
            "SELECT comments.id, comments.text, posts.title, users.username, comments.date FROM comments " .
            "LEFT JOIN posts ON comments.post_id = posts.id " .
            "LEFT JOIN users ON comments.author_id = users.id " .
            "WHERE comments.author_id = ?");
        $id = $_SESSION['user_id'];
        $statement->bind_param("i", $id);
        $statement->execute();
        $_SESSION['commentID'] = $id;
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    function getAllUsers()
    {
        $statement = self::$db->query(
            "SELECT * FROM users ORDER BY username");
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    function getAllPostsById(){
        $statement = self::$db->prepare(
            "SELECT posts.id, title, content, date FROM posts JOIN users " .
            "ON posts.user_id = users.id WHERE users.id = ?");
        $id = $_SESSION['user_id'];
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
//        $_SESSION['result'] = $result;
        return $result;
    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM users WHERE id= ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function edit(int $id, int $isAdmin) : bool
    {
        $statement = self::$db->prepare("UPDATE users SET  " .
            " isAdmin = ? WHERE id = ?");
        $statement->bind_param("ii", $isAdmin, $id);
        $statement->execute();

        return $statement->affected_rows >= 0;
    }

    //??????
    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE user_id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function deleteUser(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM users WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();

        return $statement->affected_rows == 1;
    }


}

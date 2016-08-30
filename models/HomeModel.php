<?php

class HomeModel extends BaseModel
{

    function getAllCommentsById($id)
    {
        $statement = self::$db->prepare(
            "SELECT text, posts.title, users.username ,comments.date FROM comments " .
            "LEFT JOIN posts ON comments.post_id = posts.id " .
            "LEFT JOIN users ON comments.author_id = users.id " .
            "WHERE post_id = ?");
//        $id = $_SESSION['user_id'];
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function getAllPosts(){
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, username " .
            "FROM posts JOIN users On posts.user_id = users.id " .
            "ORDER By date DESC");

        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getLastPosts(int $maxCount = 5)
    {
        $statement = self::$db->query(
            "SELECT posts.id, title, content, date, username " .
            "FROM posts LEFT JOIN users On posts.user_id = users.id " .
            "ORDER By date DESC LIMIT $maxCount");
        
        return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getPostById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT posts.id, title, content, date, username, user_id " .
            "FROM posts LEFT JOIN users On posts.user_id = users.id " .
            "WHERE posts.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
//        $_SESSION['postId'] = $id;

        $result = $statement->get_result()->fetch_assoc();

        return $result;
    }

}

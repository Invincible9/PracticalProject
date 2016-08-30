<?php

class PostsModel extends HomeModel
{
    function getALL()
    {
        $statement = self::$db->query(
         "SELECT posts.id, title, content, date, username, user_id " .
        "FROM posts LEFT JOIN users On posts.user_id = users.id " .
        "ORDER By date DESC");

    return $statement->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(int $id)
    {
        $statement = self::$db->prepare(
            "SELECT * FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result;
    }

    public function getUserByUsername(string $username)
    {
        $statement = self::$db->prepare(
            "SELECT id FROM users WHERE username = ?");
        $statement->bind_param("s", $username);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        if($result)
            return $result['id'];
        return false;
    }

    public function create(string $title, string $content, int $user_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO posts(title, content, user_id) VALUES(?, ?, ?)");
        $statement->bind_param("ssi", $title, $content, $user_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function createAdminComment(string $text, int $posts_id, int $author_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO comments(text, post_id, author_id) VALUES(?, ?, ?)");
        $statement->bind_param("sii", $text, $posts_id, $author_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function createUserComment(string $text, int $posts_id, int $author_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO comments(text, post_id, author_id) VALUES(?, ?, ?)");
        $statement->bind_param("sii", $text, $posts_id, $author_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }



    public function delete(int $id) : bool
    {
        $statement = self::$db->prepare(
            "DELETE FROM posts WHERE id = ?");
        $statement->bind_param("i", $id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function edit(int $id, string $title, string $content,
            string $date) : bool
        {
            $statement = self::$db->prepare("UPDATE posts SET title = ?, " .
                    "content = ?, date = ? WHERE id = ?");
            $statement->bind_param("sssi", $title, $content, $date, $id);
            $statement->execute();
            return $statement->affected_rows >= 0;
        }

}


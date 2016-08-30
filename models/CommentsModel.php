<?php

class CommentsModel extends HomeModel
{

//    public function getPostId($id){
//        $statement = self::$db->prepare(
//            "SELECT comments.id, text, date, post_id FROM comments WHERE posts.id=?");
////        $id = $_SESSION['post_id'];
//        $statement->bind_param("i", $id);
//        $statement->execute();
//        $result = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
//        $_SESSION['result'] = $result;
//        return $result;
//    }

    public function createAdminComment(string $text,int $posts_id, int $author_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO comments(text, post_id, author_id) VALUES(?, ?)");
        $posts_id = 1;
        $statement->bind_param("sii", $text, $posts_id, $author_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }


    public function createUserComment(string $text,int $posts_id, int $author_id) : bool
    {
        $statement = self::$db->prepare(
            "INSERT INTO comments(text, post_id, author_id) VALUES(?, ?)");
        $posts_id = 1;
        $statement->bind_param("sii", $text, $posts_id, $author_id);
        $statement->execute();
        return $statement->affected_rows == 1;
    }


//    public function delete(int $id) : bool
//    {
//        $statement = self::$db->prepare(
//            "DELETE FROM posts WHERE id = ?");
//        $statement->bind_param("i", $id);
//        $statement->execute();
//        return $statement->affected_rows == 1;
//    }
//
//    public function edit(int $id, string $title, string $content,
//            string $date) : bool
//        {
//            $statement = self::$db->prepare("UPDATE posts SET title = ?, " .
//                    "content = ?, date = ? WHERE id = ?");
//            $statement->bind_param("sssi", $title, $content, $date, $id);
//            $statement->execute();
//            return $statement->affected_rows >= 0;
//        }

}


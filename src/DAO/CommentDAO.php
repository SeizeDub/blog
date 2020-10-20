<?php
namespace App\src\DAO;

class CommentDAO extends DAO {
    public function getAllComments($id) {
        $sql = "SELECT * FROM comment WHERE article_id = $id";
        return $this->createQuery($sql);
    }

    // public function getComment($id) {
    //     $sql = "SELECT * FROM comment WHERE id = $id";
    //     return $this->createQuery($sql);
    // }
}
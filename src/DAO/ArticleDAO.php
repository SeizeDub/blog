<?php
namespace App\src\DAO;

class ArticleDAO extends DAO {
    public function getAllArticles() {
        $sql = "SELECT * FROM article";
        return $this->createQuery($sql);
    }

    public function getArticle($id) {
        $sql = "SELECT * FROM article WHERE id = $id";
        return $this->createQuery($sql);
    }
}
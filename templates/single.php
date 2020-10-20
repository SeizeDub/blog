<?php
require '../vendor/autoload.php';
require 'header.php';

use \App\src\DAO\ArticleDAO;
use \App\src\DAO\CommentDAO;

$aDAO = new ArticleDAO();
$cDAO= new CommentDAO();
$article = $aDAO->getArticle($_GET['id'])->fetch();
$comments = $cDAO->getAllComments($_GET['id']);
?>

<main>

<h2><?= $article->title ?> <p class="infos">Par <span><?= $article->author ?></span> le <?= $article->createdAt ?></p></h2>
<p class="content"><?= $article->content ?></p>

<hr>

<section id="comments">
    <div>
        <h3>Commentaires</h3>
        <?php while ($comment = $comments->fetch()): ?>
            <article class="comment">
            <p><span><?= $comment->author ?></span></p>
            <p><?= $comment->content ?></p>
            </article>
            
        <?php endwhile; ?>
    </div>
    <div>
        <h3>Ajouter un commentaire</h3>
        <form action="">
            <div class="input-row">
                <label for="input-author">Auteur</label>
                <input type="text" id="input-author" name="author">
            </div>
            <div class="input-row">
                <label for="input-title">Titre</label>
                <input type="text" id="input-title" name="title">
            </div>
            <div class="input-row">
                <label for="input-content">Contenu</label>
                <textarea name="content" id="input-content" rows="4"></textarea>
            </div>
            <div class="input-row">
                <input class="main-button" type="submit" value="Envoyer">
            </div>
        </form>
    </div>
</section>

</main>

<?php require 'footer.php' ?>


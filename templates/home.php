<?php 
require '../vendor/autoload.php';
require 'header.php';

use \App\src\DAO\ArticleDAO;

$aDAO = new ArticleDAO();
$articles = $aDAO->getAllArticles();
?>

<main>
<h2>Liste des articles</h2>

<?php while($article = $articles->fetch()): ?>  
    <a href="single.php?id=<?= $article->id ?>"><article>
        <div class="article-header">
            <h3><?= $article->title ?></h3>
            <p class="infos">Par <span><?= $article->author ?></span> le <?= $article->createdAt ?></p>
        </div>
        <p class="content clamp"><?= $article->content ?></p>
    </article></a>
<?php endwhile; ?>

</main>

<?php require 'footer.php'; ?>



<?php
$title = $article->getName();
require dirname(__DIR__) . '/header.php';
?>

<div class="card" style="width: 100%;">
    <div class="card-body">
        <h5 class="card-title"><?= $article->getName(); ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">Author: <?= $article->getAuthor()->getNickname(); ?></h6>
        <p class="card-text"><?= $article->getText(); ?></p>
        
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId() ?>/edit" class="btn btn-primary">Edit</a>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId() ?>/delete" class="btn btn-danger">Delete</a>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>" class="btn btn-secondary">Back to home</a>
    </div>
</div>

<!-- Секция комментариев -->
<div class="mt-4">
    <h3>Комментарии</h3>
    <?php 
    use src\Models\Comments\Comment;
    $comments = Comment::getByArticleId($article->getId()); 
    ?>
    <?php foreach ($comments as $comment): ?>
        <div class="card mb-2">
            <div class="card-body">
                <p><?= htmlspecialchars($comment->getText()) ?></p>
                <small class="text-muted">Author: <?= $comment->getAuthor()->getNickname() ?></small>
                <div class="mt-2">
                    <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comment/<?= $comment->getId() ?>/edit" class="btn btn-sm btn-warning">Edit</a>
                    <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comment/<?= $comment->getId() ?>/delete" class="btn btn-sm btn-danger">Delete</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<!-- Форма добавления комментария -->
<div class="mt-4">
    <h3>Create comment</h3>
    <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId() ?>/comment/store" method="POST">
        <div class="mb-3">
            <label for="text" class="form-label">Your comment</label>
            <textarea class="form-control" id="text" name="text" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
</div>

<?php require dirname(__DIR__) . '/footer.php'; ?>
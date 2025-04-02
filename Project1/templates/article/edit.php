<?php
$title = 'Edit Article: ' . $article->getName();
require dirname(__DIR__) . '/header.php';
?>

<div class="container mt-4">
    <h2>Edit Article</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId() ?>/update" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Article title</label>
            <input type="text" class="form-control" id="name" name="name" 
                   value="<?= htmlspecialchars($article->getName()) ?>">
        </div>
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" id="text" name="text" rows="5"><?= 
                htmlspecialchars($article->getText()) 
            ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/article/<?= $article->getId() ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php require dirname(__DIR__) . '/footer.php'; ?>
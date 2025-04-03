<?php
$title = 'Edit comment';
require dirname(__DIR__) . '/header.php';
?>

<div class="container mt-4">
    <h2>Edit comment</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    
    <form action="<?= dirname($_SERVER['SCRIPT_NAME']) ?>/comment/<?= $comment->getId() ?>/update" method="POST">
        <div class="mb-3">
            <label for="text" class="form-label">Text</label>
            <textarea class="form-control" id="text" name="text" rows="3" required><?= htmlspecialchars($comment->getText()) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php require dirname(__DIR__) . '/footer.php'; ?>
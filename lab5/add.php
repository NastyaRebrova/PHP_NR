<form action="index.php" method="POST">
    <div class="mb-3">
        <label for="firstname" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Отчество</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Дата рождения</label>
        <input type="date" class="form-control" id="date" name="date" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Электронная почта</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Номер телефона</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Комментарий</label>
        <textarea name="comment" class="form-control" id="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
<?php require('footer.php'); ?>

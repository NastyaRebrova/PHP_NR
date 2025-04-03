<?php
$sort_field = $_GET['sort'] ?? 'id';
$sort_order = $_GET['order'] ?? 'ASC';

$allowed_fields = ['id', 'firstname', 'date'];
$allowed_orders = ['ASC', 'DESC'];

if (!in_array($sort_field, $allowed_fields)) $sort_field = 'id';
if (!in_array($sort_order, $allowed_orders)) $sort_order = 'ASC';

$sql = "SELECT * FROM `notes` ORDER BY `$sort_field` $sort_order";
$result = mysqli_query($mysqli, $sql);
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th><a href="?elem=menu&sort=id&order=<?= $sort_field === 'id' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">ID</a></th>
            <th><a href="?elem=menu&sort=firstname&order=<?= $sort_field === 'firstname' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Фамилия</a></th>
            <th>Имя</th>
            <th>Отчество</th>
            <th><a href="?elem=menu&sort=date&order=<?= $sort_field === 'date' && $sort_order === 'ASC' ? 'DESC' : 'ASC' ?>">Дата рождения</a></th>
            <th>Email</th>
            <th>Телефон</th>
            <th>Комментарий</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><a href="edit.php?id=<?= $row['id'] ?>"><?= htmlspecialchars($row['firstname']) ?></a></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= htmlspecialchars($row['lastname']) ?></td>
            <td><?= htmlspecialchars($row['date']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td><?= htmlspecialchars($row['comment']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<?php

$sort_field = $_GET['sort'] ?? 'id';
$sort_order = $_GET['order'] ?? 'ASC';

$per_page = 10;
$page = max(1, $_GET['page'] ?? 1);
$offset = ($page - 1) * $per_page;

$count_sql = "SELECT COUNT(*) as total FROM `notes`";
$count_result = mysqli_query($mysqli, $count_sql);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $per_page);

$sql = "SELECT * FROM `notes` ORDER BY `$sort_field` $sort_order LIMIT $offset, $per_page";
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

<?php if ($total_pages > 1): ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mt-4">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                <a class="page-link" href="?elem=menu&page=<?= $i ?>&sort=<?= $sort_field ?>&order=<?= $sort_order ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
<?php endif; ?>
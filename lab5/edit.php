<?php 
require('header.php');

$mysqli = mysqli_connect('localhost', 'root', '', 'friends');
if(mysqli_connect_errno()) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}

$sql = "SELECT * FROM `notes` WHERE `id`=".$_GET['id'];
$result = mysqli_query($mysqli, $sql);
if(mysqli_errno($mysqli)) echo mysqli_error($mysqli);
$row = mysqli_fetch_assoc($result);
?>

<form action="index.php?id=<?=$_GET['id'];?>" method="POST">
    <div class="mb-3">
        <label for="firstname" class="form-label">Firstname</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?=$row['firstname'];?>" required>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$row['name'];?>" required>
    </div>
    <div class="mb-3">
        <label for="lastname" class="form-label">Lastname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?=$row['lastname'];?>" required>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Date birthday</label>
        <input type="date" class="form-control" id="date" name="date" value="<?=$row['date'];?>" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$row['email'];?>" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone number</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="<?=$row['phone'];?>" required>
    </div>
    <div class="mb-3">
        <label for="comment" class="form-label">Comment</label>
        <textarea name="comment" class="form-control" id="comment"><?=$row['comment'];?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?php 
mysqli_close($mysqli);
require('footer.php');
?>

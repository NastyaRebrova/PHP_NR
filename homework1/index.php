<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <a href="#" class="header_link">
            <img src="mospolytech-logo-white.svg" alt="logo" class="header_link_image">
        </a>
        <p class="header_text">
            Hello, World!
        </p>
    </header>
    <main>
        <h1 class="main_header">Текущая дата:</h1>
        <p class=main_text>
            <?php echo date('Y-m-d'); ?>
        </p>
    </main>
    <footer>
        <p class="footer_text">Создать веб-страницу с динамическим контентом. Загрузить код в удаленный репозиторий.</p>
    </footer>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <a href="#" class="header_link">
            <img src="mospolytech-logo-white.svg" alt="logo" class="header_link_image">
        </a>
        <p class="header_text">
            Feedback form
        </p>
    </header>
    <main>
        <h1 class="main_header">Служба поддержки</h1>
        <form action="//httpbin.org/post" method="post" class="form">
            <label class="form_label">
                Имя: 
                <input name = "name" type="text" class="form_input">
            </label>
            <label class="form_label">
                Телефон: 
                <input name = "tel" type = "tel" class="form_input">
            </label>
            <label class="form_label">
                Email: 
                <input name = "email" type = "email" class="form_input">
            </label>
            <p class="text_form">
                Удобный интервал для связи:
            </p>
            <div class="box_checkbox">
                <label class="form_label_label">
                    утро
                    <input type = "checkbox" name = "morning" value="morning">
                </label>
                <label class="form_label_label">
                    день
                    <input type = "checkbox" name = "day" value="day">
                </label>
                <label class="form_label_label">
                    вечер
                    <input type = "checkbox" name = "evening" value="evening">
                </label>
                <label class="form_label_label">
                    ночь
                    <input type = "checkbox" name = "night" value="night">
                </label>
            </div>
            <label class="form_label">
                Опишите проблему:
                <textarea name="problem" class="form-textarea"></textarea>
            </label>
            <button type="submit" class="form-button">
                Отправить
            </button>
        </form>
        <a href="index1.php" class="main_link">Ссылка на следующую станицу</a>
    </main>
    <footer>
        <p class="footer_text">Реброва Анастасия. Группа 241-3210.</p>
    </footer>
</body>
</html>
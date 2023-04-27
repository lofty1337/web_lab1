<?php
session_start(); // открываем сессию

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // проверяем, была ли отправлена форма
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['firstname'] = $_POST['firstname'];
    $_SESSION['age'] = $_POST['age'];
    header('Location: page2.php'); // перенаправляем на другую страницу
    exit();
}
?>

    <!DOCTYPE html>
    <html>
    <head>
        <title>Страница 1</title>
    </head>
    <body>
    <form method="post">
        Фамилия: <input type="text" name="lastname"><br>
        Имя: <input type="text" name="firstname"><br>
        Возраст: <input type="text" name="age"><br>
        <input type="submit" value="Отправить">
    </form>
    </body>
    </html>

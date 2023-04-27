<?php
session_start(); // открываем сессию

if (!isset($_SESSION['lastname']) || !isset($_SESSION['firstname']) || !isset($_SESSION['age'])) {
    header('Location: page1.php'); // если данные не были введены, перенаправляем на первую страницу
    exit();
}

$lastname = $_SESSION['lastname'];
$firstname = $_SESSION['firstname'];
$age = $_SESSION['age'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Страница 2</title>
</head>
<body>
<h2>Ваши данные:</h2>
Фамилия: <?php echo $lastname; ?><br>
Имя: <?php echo $firstname; ?><br>
Возраст: <?php echo $age; ?><br>
</body>
</html>
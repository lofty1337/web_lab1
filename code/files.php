<?php
session_start();

if (!isset($_SESSION['categories'])) {
    $_SESSION['categories'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $category = $_POST['category'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    $fileName = 'categories/' . $category . '/' . $title . '.txt';
    if (!file_exists('categories/' . $category)) {
        mkdir('categories/' . $category, 0777, true);
    }
    $file = fopen($fileName, 'w');
    fwrite($file, $text);
    fclose($file);

    $ad = [
        'email' => $email,
        'category' => $category,
        'title' => $title,
        'fileName' => $fileName
    ];

    $_SESSION['categories'][] = $ad;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Доска объявлений</title>
</head>

<body>
<h1>Доска объявлений</h1>

<form method="POST">
    <label>Email:</label>
    <input type="email" name="email" required><br><br>

    <label>Категория:</label>
    <select name="category" required>
        <option value="">Выберите категорию</option>
        <option value="category1">Категория 1</option>
        <option value="category2">Категория 2</option>
        <option value="category3">Категория 3</option>
    </select><br><br>

    <label>Заголовок объявления:</label>
    <input type="text" name="title" required><br><br>

    <label>Текст объявления:</label><br>
    <textarea name="text" required></textarea><br><br>

    <button type="submit">Добавить</button>
</form>

<br>

<h2>Объявления:</h2>
<?php if (!empty($_SESSION['categories'])): ?>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Категория</th>
            <th>Заголовок объявления</th>
            <th>Ссылка</th>
        </tr>
        <?php foreach ($_SESSION['categories'] as $ad): ?>
            <tr>
                <td><?= $ad['email'] ?></td>
                <td><?= $ad['category'] ?></td>
                <td><?= $ad['title'] ?></td>
                <td><a href="<?= $ad['fileName'] ?>">Ссылка</a></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php else: ?>
    <p>Объявлений пока нет.</p>
<?php endif ?>
</body>

</html>
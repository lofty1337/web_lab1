<?php
require_once 'vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

session_start();

// Параметры подключения к базе данных
$host = 'db';
$dbName = 'web';
$username = 'root';
$password = 'helloworld';

try {
    // Создание подключения к базе данных
    $db = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);

    function getClient()
    {
        $client = new Client();
        $client->setApplicationName('tablici');
        $client->setScopes([Sheets::SPREADSHEETS]);
        $client->setAuthConfig('credentials.json');
        $client->setAccessType('offline');

        return $client;
    }

    $client = getClient();
    $service = new Sheets($client);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        // Подготовка и выполнение запроса на вставку объявления в базу данных
        $stmt = $db->prepare('INSERT INTO ad (email, category, title, description) VALUES (?, ?, ?, ?)');
        $stmt->execute([$email, $category, $title, $text]);
    }

    // Получение объявлений из базы данных
    $stmt = $db->query('SELECT email, category, title, description FROM ad');
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo  $e->getMessage();
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
<?php if (!empty($values)): ?>
    <table border="1">
        <tr>
            <th>Email</th>
            <th>Категория</th>
            <th>Заголовок объявления</th>
            <th>Текст объявления</th>
        </tr>
        <?php foreach ($values as $row): ?>
            <tr>
                <td><?= $row['email'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['description'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
<?php else: ?>
    <p>Объявлений пока нет.</p>
<?php endif ?>
</body>

</html>
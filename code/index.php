<?php

require_once 'vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

session_start();

function getClient()
{
    $client = new Client();
    $client->setApplicationName('tablici');
    $client->setScopes([Sheets::SPREADSHEETS]);
    $client->setAuthConfig('credentials.json');
    $client->setAccessType('offline');

    return $client;
}

function addAnnouncement($service)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $category = $_POST['category'];
        $title = $_POST['title'];
        $text = $_POST['text'];

        $values = [
            [$email, $category, $title, $text]
        ];

        $spreadsheetId = '12tjKabprR0E6_NlX6KMySLpHbWQfwBt-dkftdEfjIlk';
        $range = 'qwe!A1:D1';

        $requestBody = new Google_Service_Sheets_ValueRange([
            'values' => $values
        ]);

        $response = $service->spreadsheets_values->append($spreadsheetId, $range, $requestBody, [
            'valueInputOption' => 'RAW'
        ]);
    }
}

function getAnnouncements($service)
{
    $spreadsheetId = '12tjKabprR0E6_NlX6KMySLpHbWQfwBt-dkftdEfjIlk';
    $range = 'qwe!A:D';
    $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    $values = $response->getValues();
    return $values;
}

$client = getClient();
$service = new Sheets($client);

addAnnouncement($service);
$values = getAnnouncements($service);

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
                    <td><?= $row[0] ?></td>
                    <td><?= $row[1] ?></td>
                    <td><?= $row[2] ?></td>
                    <td><?= $row[3] ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php else: ?>
        <p>Объявлений пока нет.</p>
    <?php endif ?>
</body>

</html>

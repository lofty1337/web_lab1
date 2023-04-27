<?php
session_start();

if(isset($_POST['submit'])) {
    $_SESSION['user_data'] = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'salary' => $_POST['salary'],
        'other_data' => $_POST['other_data']
    ];
    header('Location: page4.php');
    exit;
}
?>

<form method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="age">Age:</label>
    <input type="number" name="age" id="age" required><br>

    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" required><br>

    <label for="other_data">Other data:</label>
    <textarea name="other_data" id="other_data"></textarea><br>

    <input type="submit" name="submit" value="Submit">
</form>
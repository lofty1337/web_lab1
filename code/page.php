<?php

if (isset($_POST['submit'])) {
    $text = $_POST['text'];
    $words_count = str_word_count($text);
    $chars_count = strlen($text);
    echo "Количество слов: " . $words_count . "<br>";
    echo "Количество символов: " . $chars_count;
}
?>

<form method="post">
    <textarea name="text"></textarea><br>
    <input type="submit" name="submit" value="Посчитать">
</form>
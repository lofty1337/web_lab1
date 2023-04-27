<?php
session_start();

if(isset($_SESSION['user_data'])) {
    echo '<ul>';
    foreach($_SESSION['user_data'] as $key => $value) {
        echo '<li>' . $key . ': ' . $value . '</li>';
    }
    echo '</ul>';
} else {
    echo 'No user data found';
}
?>

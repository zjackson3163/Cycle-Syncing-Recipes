<?php
    $dsn = 'mysql:host=localhost;dbname=cycle_syncing_recipes';
    $username = 'web_user';
    $password = ']S@97*Jd866_[T2k'; // 

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>
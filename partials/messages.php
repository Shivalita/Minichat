<?php

    // include('./app/connection.php'); => marche pas (why ?)

    try
    {
        $database = new PDO('mysql:host=127.0.0.1;dbname=minichat;charset=utf8',
                    'root',
                    '',
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    global $database;
    $messagesQuery = $database->query('SELECT * FROM users INNER JOIN posts ON posts.user_id = users.id ORDER BY posts.created_at DESC');
    $messages = $messagesQuery->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($messages);

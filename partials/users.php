<?php

    // include('./app/connection.php');

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

    $query = $database->query('SELECT * FROM users ORDER BY nickname');
    $users = $query->fetchAll();
    echo json_encode($users);

    // foreach ($nicknames as $nickname) {
    //     echo ('<div class="text_list">');
    //     echo ($nickname['nickname'].'<br>');
    //     echo ('</div>');
    // }

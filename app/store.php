<?php

    include('connection.php');

    function getIp() {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }


    $json = file_get_contents('php://input');
    $data = json_decode($json);


    if (!empty($_POST['nickname']) && !empty($_POST['message'])) {
        writeMessage();
    } else {
        getMessages();
    }

    function getMessages() {
        global $database;
        $messagesQuery = $database->query('SELECT * FROM users INNER JOIN posts ON posts.user_id = users.id ORDER BY posts.created_at DESC');
        $messages = $messagesQuery->fetchAll(PDO::FETCH_ASSOC);
    }

    function writeMessage() {
        global $database;
        $nickname = htmlspecialchars($_POST['nickname']);
        $message = htmlspecialchars($_POST['message']);
        $ip_address = getIp();
        $datetime = date('Y-m-d H:i:s');   
        setcookie('nickname', $nickname, time() + 365*24*3600, '/', null, false, true);
    
        $checkUserRecord = $database->prepare("SELECT * from users WHERE nickname = ?");
        $checkUserRecord->execute(array($nickname));
        $userAlreadyRecorded = $checkUserRecord->fetch(PDO::FETCH_ASSOC);
   
        if (!$userAlreadyRecorded) { 
            $userRequest = $database->prepare('INSERT INTO users(nickname, ip_address, color, created_at) 
            VALUES(:nickname, :ip_address, :color, :created_at)');
        
            $userRequest->execute(array(
            'nickname' => $nickname,
            'ip_address' => $ip_address,
            'color' => '',
            'created_at' => $datetime
            ));
        }

        $userQuery = $database->query("SELECT * FROM users WHERE nickname = '".$_POST['nickname']."'");
        $user = $userQuery->fetch();
        $user_id = $user['id'];
        
        $postRequest = $database->prepare('INSERT INTO posts(user_id, message, ip_address, created_at) 
                                            VALUES(:user_id, :message, :ip_address, :created_at)');
    
        $postRequest->execute(array(
        'user_id' => $user_id,
        'message' => $message,
        'ip_address' => $ip_address,
        'created_at' => $datetime
        )); 
    }

    header('location: ../index.php');
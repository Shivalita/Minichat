<?php

if (isset($_COOKIE['nickname'])) {
    $currentUser = $_COOKIE['nickname'];
} else {
    $currentUser = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap" rel="stylesheet">
<title>Mini-chat</title>
</head>
<body>

    <div class="container border_box chat" style="background-image: linear-gradient(to bottom, rgba(255,255,255,0.3) 0%,rgba(255,255,255,0.7) 100%), url(images/cat.jpg); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="row justify-content-center align-items-center text-center mt-3">
            <div class="col-2">
                <h2>MINI-CHAT</h2>
            </div>
            <div class="col-4">
                <h5 class="mt-3">Un chat, mais en tout pitit.</h5>
            </div>
        </div>

        <div class="row justify-content-around my-3 display_messages">
            <div class="col-8 text_box reverse_border_box messages">
                <!-- Messages content -->
            </div>
            <div class="col-2 text_box reverse_border_box users">
                <!-- Users content -->
            </div>
        </div>

        <form id="form" class="form">
            <div class="row justify-content-center my-3 input-group send_message">
                <div class="col-2 mt-3">
                    <input type="text" id="nickname" name="nickname" minlength="2" class="enter_input reverse_border_box enter_nickname" placeholder="Pseudo" value="<?=$currentUser?>">
                </div>
                <div class="col-12 mt-4 text-center">
                    <input type="text" id="message" name="message" minlength="1" maxlength="255" class="enter_input reverse_border_box enter_message" placeholder="Ton message">
                </div>
            </div>
            <div class="row justify-content-center">
            <button type="submit" id="submitBtn" class="btn reverse_border_box submitBtn">Envoyer<i class="far fa-comment-dots ml-2"></i></button>
            </div>   
        </form>
    </div>
        

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="javascript/messages.js"></script>
<script type="text/javascript" src="javascript/users.js"></script>
</body>
</html>
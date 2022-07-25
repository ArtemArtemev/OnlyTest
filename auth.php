<?php
    $email = trim($_POST['mail']);
    $pass = trim($_POST['pass']);

    $mysql = mysqli_connect('localhost', 'root', 'root', 'register-bd');

    $result = mysqli_query($mysql, "SELECT * FROM `users` WHERE `e-mail` = '$email' AND `pass` = '$pass'");  
    $user = mysqli_fetch_assoc($result);
    if(!empty($user)){
        echo "Вы авторизированны";
        exit();
    }else{
        echo"Неверный почта или пароль";
        exit();
    }
    

    print_r($user);
    exit();

    $mysql->close();
    header('Location: /');
?>
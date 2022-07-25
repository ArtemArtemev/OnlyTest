<?php
    $name = trim($_POST['name']);
    $email = trim($_POST['e-mail']);
    $pass = trim($_POST['pass']);
    $dubl_pass = trim($_POST['dubl-pass']);

    if(strlen($name) == 0){
        echo"Введите имя";
        exit();
    }

    if($pass !== $dubl_pass){
       echo"Пароли не совпадают";
       exit();
    }

    $mysql = mysqli_connect('localhost', 'root', 'root', 'register-bd');

    $result1 = mysqli_query($mysql, "SELECT * FROM `users` WHERE `e-mail` = '$email'");  
    $user1 = mysqli_fetch_assoc($result1);
    if(!empty($user1)){
        echo "Такая почта уже зарегестрированна";
        exit();
    }

    $mysql->query("INSERT INTO `users` (`name`, `e-mail`, `pass`) VALUES('$name', '$email', '$pass')");

    $mysql->close();
    header('Location: /');
?>
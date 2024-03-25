<?php
    session_start();

    include "dbconnect.php";

    $login = $_POST['login'];
    $password = md5($_POST['password']);

    if(isset($_POST['submit'])&&!empty($_POST['submit'])) {

            $query = "SELECT login, password FROM public.users WHERE login= '$login' and password = '$password'";
            $result = $conn->query($query);

            if($result->fetch() > 0){
                $_SESSION['message'] = 'Добро пожаловать';
                $_SESSION["login"] = 1;
            }else{
                $_SESSION['message'] = 'Неверный логина или пароль';
            }
        }
?>




<?php

session_start();

require  "menu.php";
require "dbconnect.php";

$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password === $password_confirm) {
    if (isset($_POST['submit']) && !empty($_POST['submit'])) {
        if (empty($_POST['full_name']) || empty($_POST['login']) || empty($_POST['email']) || empty($_POST['password'])) {
            $_SESSION['message'] = 'Заполните все поля';
        }
        else {
        $sql = "insert into public.users(full_name,login,email,password)values('" . $_POST['full_name'] . "','" . $_POST['login'] . "','" . $_POST['email'] . "','" . md5($_POST['password']) . "')";
            $ret = $conn->query($sql);
            $_SESSION['message'] = 'Регистрация успешна';
            header('location:index.php');
        }
    }
}
else{
    $_SESSION['message'] = 'Пароли не совподают';
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<div class="container">
    <h2>Регистрация</h2>
    <form method="post">
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="Введите свое полное имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите свой пароль">
        <label>Подтверждение пароля</label>
        <input type="password"  name="password_confirm" placeholder="Введите пароль повторно">
        <input type="submit" name="submit"  value="Регистрация">
        <p>
            У вас уже есть аккаунт?  <a href="index.php">Авторизуйтесь</a>
        </p>
        <?php
        if($_SESSION['message']){
            echo '<p class="msg"> '. $_SESSION['message'] .' </p>';
        }
        //unset($_SESSION['message'])
        ?>
    </form>
</div>
</body>
</html>
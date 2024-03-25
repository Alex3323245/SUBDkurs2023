<?php
    session_start();
    require "dbconnect.php";
    require "menu.php";
    require "footer.php";
    require "signin.php";
    
    switch ($_GET['page'])
    {
        case '1':
            require "cat.php";
            break;
        case '2':
            require "cat2.php";
            break;
        case 'logout':
            session_destroy();
            header("location:index.php");
            break;
    }
?>

<div>
    <!doctype html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Авторизация</title>
            <link rel="stylesheet" href="assets/css/main.css">
        </head>

        <style >body {background: center  url("https://www.made-in-china.es/archivos/slides/made-in-china3.jpg");}</style>

        <body>

        <?php
        if($_SESSION['login'] != '1' && !isset($_GET['page'])) {
        ?>

            <!--форма авторизации -->
            <form  method="post" style="opacity: 0.8;background: #e3d8d8;padding: 10px;">
                <label>Логин</label>
                <input type="text" name="login" placeholder="Введите свой логин">
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите свой пароль">
                <input type="submit" name="submit"  class="btn btn-secondary" value="Войти в систему">
                <p>
                    У вас нет аккаунта?  <a href="/registr.php">зарегистрироваться</a>
                </p>

        <?php
        if($_SESSION['message']){echo '<p class="msg"> '. $_SESSION['message'] .' </p>';}
        unset($_SESSION['message'])
        ?>

            </form>

        <?php
        }else{
            echo '<h1> '. $_SESSION['message'] .' </h1>';
        }
        unset($_SESSION['message'])
        ?>

        </body>
    </html>
</div>


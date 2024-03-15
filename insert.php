
<?php
require "menu.php";
require "dbconnect.php";
session_start();

if(isset($_POST['submit'])&&!empty($_POST['submit'])){

    $sql = "insert into public.товар(наименование,id_категории,вес)values('".$_POST['наименование']."','".$_POST['id_категории']."','".$_POST['вес']."' )";
    $ret = $conn->query($sql);

    if($ret->fetch() > 1){
                $_SESSION['message'] = 'Товар добавлен';
        header("location:index.php?page=1");
            }

}
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавление товара</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<style>body {
        background: center  url("https://www.made-in-china.es/archivos/slides/made-in-china3.jpg");
    }
</style>
<body >

<div class="container" >
    <h1 style="text-align: center; ">Добавление товара</h1>
    <form method="post" >
        <label>Наименование товара</label>

        <input type="text" name="наименование" placeholder="Введите наименование" >
        <label>Категория</label>
        <input type="text" name="id_категории" placeholder="Укажите категорию товара 1 - 3" maxlength="1" pattern="[1-3]">
        <label>Вес</label>
        <input type="text" name="вес" placeholder="Укажите вес товара (килограммах)" pattern="[[0-9]{10}]">

        <?php
        if($_SESSION['message']){
            echo '<p class="msg" > '. $_SESSION['message'] .' </p>';
        }
        //unset($_SESSION['message'])
        ?>
        <input type="submit" name="submit" class="btn btn-secondary" value="Добавить товар">
        <a href="index.php?page=1" class="btn btn-danger">Отмена</a>
    </form>
</div>
</body>
</html>
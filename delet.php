<?php
require "dbconnect.php";
session_start();
try {

    $result = $conn->query("SELECT * FROM товар WHERE товар.id=" . $_GET['id']);
    $row = $result->fetch();
    if ($result->rowCount() == 0) throw new PDOException('Товар не найден', 1111);
    $sql = 'DELETE FROM товар WHERE id=:id';
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':id', $_GET['id']);
    $stmt->execute();
    $_SESSION['message']="Товар удален";
    header("location:index.php?page=1");

} catch (PDOexception $error) {
    $_SESSION['message']="Товар не может быть удален";
    }
exit();
?>
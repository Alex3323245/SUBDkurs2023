<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/modal.js"></script>
</head>

<?php
    require "menu.php";
    require "dbconnect.php";
    session_start();

    echo '<main class="container" style="margin-top: 100px">';

    if ($_SESSION["login"] == 0) {
    header("location:index.php");

    }else{

        echo '<div style="text-align: center; font-size: 100px; opacity: 0.8;background: #e3d8d8;padding: 5px; " >Товар</div>';
        echo '<main class="container" style="margin-top: 10px">';

?>
 <div style="text-align: center; opacity: 0.8;background: #e3d8d8;padding: 5px; ">
     <?php
     if($_SESSION['message']){
         echo '<p class="msg"> '. $_SESSION['message'] .' </p>';
     }
     unset($_SESSION['message'])
     ?>
 </div>
        <div class="album bg-body-tertiary">
            <div class="container">
                <div class="row row-cols-1 ">
<?php
            $result = $conn->query("SELECT * FROM public.товар");
            while ($row = $result->fetch()) {
            echo '
                   <div class="card border-dark mb-1" >
                        <div class="card-header">№' . $row['id'] . '.' . $row['наименование'] . '</div>
                        <div class="card-body text-dark">
                            <div class="row g-0">
                               <div class="col-md-4">  
                                   <p class="card-text">Масса =' . $row['вес'] . ' (кг)</p>
                                   <p class="card-text">Категория товара:' . $row['id_категории'] . '</p>
                               </div>
                               <div class="col-md-6"></div>
                               <div class="col-md-1">
                                   <a href="delet.php?id=' . $row['id'] . '" class="btn btn-danger">Удалить</a>
                               </div>
                            </div>
                        </div>
                   </div>
                 
        ';}
            echo '<div class="d-flex justify-content-center">
                  <a href="insert.php" class="btn btn-secondary">Добавить товар</a>
             </div>';

  }?>
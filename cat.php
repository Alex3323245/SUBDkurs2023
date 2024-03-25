<?php
    echo '<main class="container" style="margin-top: 100px">';

    if ($_SESSION["login"] == 0)
    {
    header("Location:index.php");

    }else{
        echo '<div style="text-align: center; font-size: 100px; opacity: 0.8;background: #e3d8d8;padding: 5px; " >Товар</div>';
        echo '<main class="container" style="margin-top: 10px">';
?>
    <div style="text-align: center; opacity: 0.8;background: #e3d8d8;padding: 5px; ">
        <?php
        if($_SESSION['message'])
        {
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
    while ($row = $result->fetch())
    {echo '
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
<?php
    echo '<main class="container" style="margin-top: 100px">';
    if ($_SESSION["login"] == 0) {
        header("location:index.php");
    }else{

echo '<div style="text-align: center; font-size: 50px; opacity: 0.8;background: #e3d8d8;padding: 9px; ">Категории  товара</div>';
$result = $conn->query("SELECT * FROM public.категория_товара");
echo '<main class="container" style="margin-top: 50px">';
?>
    <div class="album bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?php
while ($row = $result->fetch()){

    echo'<header class="container">
            <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" style="height: 10px;">
                        </svg>
                        <img src="img/' . $row['image'] . '.jpg">
                        </svg>
                        <div class="card-body">
                            <h5 class="card-text"><font style="vertical-align: initial; ">Категория №' . $row['id'] . '.   ' . $row['наименование'] . '</font></h5>
                            <div class="d-flex justify-content-between align-items-center">
                            </div>
                        </div>
                    </div>
                </div>
                </header>
 ';
}}
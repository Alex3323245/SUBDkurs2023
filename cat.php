<?php

echo "<h2>Товар</h2>";

$result = $conn->query("SELECT * FROM public.товар");

while ($row = $result->fetch()){
    echo'
        
        <div class="card border-dark mb-3" >
                <div class="row g-0">
                    <div class="col-md-7">
                    <a class="nav-link" href="/inßdex.php?page=t" >
                        <h5 class="card-title">' . $row['id'] . '</h5>
                        <p class="card-text">' . $row['наименование'] . '</p>
                    </a>
                    </div>
                    <div class="col-md-1">
                        <a href="deletecategory.php?id='.$row['id'].'" class="btn btn-danger">Удалить</a>
                    </div>
                </div>
            </div>
            
        </div>
 
    ';


}
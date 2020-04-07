<?php
    include_once 'db_con.php';

    $product_list ="";
    $sql =  "SELECT * FROM products";
    $result = mysqli_query($conn, $sql);
    $products = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($products);
    exit();


?>
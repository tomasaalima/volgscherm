<?php
    include_once("db_connection.php");

    $sql = "SELECT * FROM sistema WHERE id = 654678786";
    $result = $connection->query($sql) or die("Falha na execução do código SQL"). $connection->error;
    $data = $result->fetch_assoc();

    $product_key = $data["chave"];

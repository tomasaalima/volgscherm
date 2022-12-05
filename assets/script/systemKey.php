<?php
//Invoca arquivo que realiza a conexão com o banco de dados
require("db_connection.php");

//busca pelo id pré-definido da chave do produto
$sql = "SELECT * FROM sistema WHERE id = 654678786";
$result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
$data = $result->fetch_assoc();

//Atribui chave à variável para uso
$product_key = $data["chave"];

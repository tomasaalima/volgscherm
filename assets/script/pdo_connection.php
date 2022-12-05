<?php

//Onde está hospedado o banco de dados
$host = "localhost";

//Nome do proprietário do banco de dados
$user = "root";

//Senha do proprietário
$pass = "root";

//Nome do banco de dados
$dbname = "volgscherm";

try {
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $connection = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexão com o banco de dados utilizando PDO

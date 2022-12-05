<?php
//Onde está hospedado o banco de dados
$dbHost = 'localhost';

//Nome do proprietário do banco de dados
$dbUsername = 'root';

//Senha do proprietário
$dbPassword = 'root';

//Nome do banco de dados
$dbName = 'volgscherm';

//Conexão com o banco de dados(mysqli)
$connection = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

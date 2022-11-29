<?php
    $iso = shell_exec("wsl snmpget -Oqv -v2c -c public 172.26.129.173 iso.3.6.1.2.1.1.4.0");
    $grep = shell_exec("wsl snmpwalk -Oqv -v2c -c public 172.26.129.173 | wsl grep tomasaalima");

    echo $iso."<br>";
    echo $grep;

    include("db_connection.php");

    $sql = "UPDATE administrador SET usuario=$iso WHERE usuario='adm'";
    $connection->query($sql) or die("Falha na execução do código SQL"). $connection->error;

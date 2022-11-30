<?php
    $init = "172.26.100.173";
    $end = "172.26.255.255";

    $teste = explode(".", $init);
    

    $iso = shell_exec("wsl snmpget -Oqv -v2c -c public 172.26.129.173 iso.3.6.1.2.1.1.4.0");

    echo $iso."<br>";
/*
    function runRange($rangeA, $rangeB){
        while($rangeA){

        }
    }*/

    /*
    include("db_connection.php");

    
    $sql = "UPDATE administrador SET usuario=$iso WHERE usuario='adm'";
    $connection->query($sql) or die("Falha na execução do código SQL"). $connection->error;
    */
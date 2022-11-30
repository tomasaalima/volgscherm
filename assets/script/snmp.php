<?php
    require("db_connection.php");

    $init = "172.26.129.170";
    $end = "172.26.129.174";
    
    while(runRange($init, $end)){
        $init = runRange($init, $end);

        $iso = shell_exec("wsl snmpget -Oqv -v2c -c public $init iso.3.6.1.2.1.1.4.0");

        /*capturar serial*/

        if($iso === null){
            echo "null";
        }else{
            registerPrinter("1",$init);
            echo "Dado captado".$iso;
        }
        echo "<br>";
        
    }

    function runRange($rangeA, $rangeB){

        if($rangeA == $rangeB){
            return false;
        }else{
            $A = explode(".", $rangeA);
            $B = explode(".", $rangeB);

            if($A[3] == 255 and $A[2] == 255 and $A[1] == 255){

                $A[0] += 1;
                $A[1] = 0;
                $A[2] = 0;
                $A[3] = 0;

                return implode(".", $A);
            }else if ($A[3] == 255 and $A[2] == 255){
            
                $A[1] += 1;
                $A[2] = 0;
                $A[3] = 0;

                return implode(".", $A);
            }else if ($A[3] == 255){
                $A[2] += 1;
                $A[3] = 0;

                return implode(".", $A);
            }else{
                $A[3] += 1;

                return implode(".", $A);
            }  
        }
    }

    function registerPrinter($serial, $ip){

        $sql = "SELECT * FROM impressora WHERE serial = '$serial'";
        global $connection;
        $result = $connection->query($sql) or die("Falha na execução do código SQL"). $connection->error;

        $quantidade = $result->num_rows;

            if($quantidade == 1){
                $connection->query("UPDATE impressora SET endereco_ip = '$ip' WHERE serial = '$serial'") or die("Falha na execução do código SQL"). $connection->error;
            }else{
                
            }
    }

    /*
    include("db_connection.php");

    
    $sql = "UPDATE administrador SET usuario=$iso WHERE usuario='adm'";
    $connection->query($sql) or die("Falha na execução do código SQL"). $connection->error;
    */
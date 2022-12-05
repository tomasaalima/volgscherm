<?php
//Invoca arquivo que realiza a conexão com o banco de dados
require("db_connection.php");

//Range de varredura IP(Faixa)
$init = "10.26.1.200";
$end = "10.26.1.300";

//enquanto percorre o range entre os endereços IP
while (runRange($init, $end)) {
    $init = runRange($init, $end);

    //Invoca comando snmp via PowerShell, chamando vm linux
    $serial = shell_exec("wsl snmpget -Oqv -v1 -t1 -r1 -c public $init iso.3.6.1.2.1.43.5.1.1.17.1");     /*iso.3.6.1.2.1.1.4.0*/

    //Se o dispoditivo responder ao chamado significa que é uma impressora
    if ($serial === null) {
        echo "null";
    } else {

        //Se for, busca pelos demais valores (modleo, número de impressões e lugar)
        $model = shell_exec("wsl snmpget -Oqv -v1 -t1 -r1 -c public $init iso.3.6.1.2.1.25.3.2.1.3.1");
        $impressions = shell_exec("wsl snmpget -Oqv -t1 -r1 -v1 -c public $init iso.3.6.1.2.1.43.10.2.1.4.1.1");
        $place = shell_exec("wsl snmpget -Oqv -v1 -t1 -r1 -c public $init iso.3.6.1.2.1.1.6.0");
        echo "Serie: " . $serial . "<br>Modelo:" . $model . "<br>impressoes:" . $impressions . "<br>Lugar:" . $place;

        //registra impressora no banco
        registerPrinter("1", $init, $model, $impressions, $place);
        echo "<br>Dado captado";
    }
    echo "<br>";
}

//Percorre o range entre os dois IPs
function runRange($rangeA, $rangeB)
{

    //Se iguais, pare
    if ($rangeA == $rangeB) {
        return false;
    } else {

        //Separa os IPs para pegar os valores entre os pontos
        $A = explode(".", $rangeA);
        $B = explode(".", $rangeB);

        //Crescimento do IP base
        if ($A[3] == 255 and $A[2] == 255 and $A[1] == 255) {

            $A[0] += 1;
            $A[1] = 0;
            $A[2] = 0;
            $A[3] = 0;

            //Une novamente os valores e retorna-o
            return implode(".", $A);
        } else if ($A[3] == 255 and $A[2] == 255) {

            $A[1] += 1;
            $A[2] = 0;
            $A[3] = 0;

            return implode(".", $A);
        } else if ($A[3] == 255) {
            $A[2] += 1;
            $A[3] = 0;

            return implode(".", $A);
        } else {
            $A[3] += 1;

            return implode(".", $A);
        }
    }
}

//Registra impressora no banco de dados
function registerPrinter($serial, $ip, $model, $impressions, $place)
{

    $sql = "SELECT * FROM impressora WHERE serial = '$serial'";
    global $connection;
    $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    $quantidade = $result->num_rows;

    //Verifica se já a impressora já existe no banco de dados
    if ($quantidade == 1) {

        //Atualiza os dados da impressora existente
        $connection->query("UPDATE impressora SET endereco_ip = '$ip' WHERE serial = '$serial'") or die("Falha na execução do código SQL") . $connection->error;
    } else {
        //Insere o dispositivo no banco de dados, gravando a data
        $now = date('Y-m-d');
        $connection->query("INSERT INTO impressora(serial, endereco_ip, data_reconhecimento, modelo, status, setor) VALUES('$serial', '$ip', '$now','$model', '0', '$place')") . $connection->error;
    }
}

<?php
    //Invoca arquivo que realiza a conexão com o banco de dados
    require("db_connection.php");

    //Contém os IPs da impressoras presentes no sistema
    $printers_ip_array = [];

    getData();

    //Executa varredura captando dados das impressoras na rede via protocolo SNMP
    function getData(){

        $sql = "SELECT endereco_ip FROM impressora";
        global $connection;
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        //Percorrendo resultados
        while($db_data = mysqli_fetch_assoc($result)){
            global $printers_ip_array;
            array_push($printers_ip_array, $db_data['endereco_ip']);
        }

        //Realiza busca por dados passando o IP das impressoras via protocolo SNMP
        foreach($printers_ip_array as $ip){
            $serial = shell_exec("wsl snmpget -Oqv -v1 -t1 -r1 -c public $ip iso.3.6.1.2.1.43.5.1.1.17.1");
            $impressions = shell_exec("wsl snmpget -Oqv -t1 -r1 -v1 -c public $ip iso.3.6.1.2.1.43.10.2.1.4.1.1"); 

            $total_query = $connection->query("SELECT total_impressoes FROM dados_impressora WHERE serial_impressora = '$serial' ORDER BY total_impressoes DESC") or die("Falha na execução do código SQL") . $connection->error;
            $total_impression_value = mysqli_fetch_assoc($total_query);

            //Obtém as novas impressões realizadas desde o último registro
            $diference = $impressions - $total_impression_value['total_impressoes'];
            $today = date("Y-m-d");

            //Grava no banco de dados
            $connection->query("INSERT INTO dados_impressora(serial_impressora, data_execucao, total_impressoes, novas_impressoes) VALUES('$serial','$today', '$impressions','$diference')") or die("Falha na execução do código SQL") . $connection->error;
        }
    }
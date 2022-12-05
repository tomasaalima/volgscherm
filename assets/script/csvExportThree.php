<?php

// Limpar o buffer
ob_start();

//Invoca arquivo em que existem as variáveis correspondentee as datas
require('dashboardHome_control.php');

//Invoca arquivo que realiza a conexão com o banco de dados
include_once 'pdo_connection.php';

//Verifica se foi definido um periodo específico na busca
if ($period != "MAX") {
    generateCSV("SELECT i.setor, SUM(di.novas_impressoes) FROM impressora i, dados_impressora di WHERE i.serial = di.serial_impressora AND di.data_execucao BETWEEN '$date' and '$today'  GROUP BY i.setor");

    //Se não, retorna todos os valores no banco de dados
} else {
    generateCSV("SELECT i.setor, SUM(di.novas_impressoes) FROM impressora i, dados_impressora di WHERE i.serial = di.serial_impressora AND di.data_execucao GROUP BY i.setor");
}

function generateCSV($sql)
{

    // Preparar a QUERY
    global $connection;
    $result = $connection->prepare($sql);

    // Executar a QUERY
    $result->execute();

    // Acessa o IF quando encontrar registro no banco de dados
    if (($result) and ($result->rowCount() != 0)) {

        // Aceitar csv ou texto 
        header('Content-Type: text/csv; charset=utf-8');

        // Nome arquivo
        header('Content-Disposition: attachment; filename=arquivo.csv');

        // Gravar no buffer
        $file = fopen("php://output", 'w');

        // Criar o cabeçalho do Excel - Usar a função mb_convert_encoding para converter carateres especiais
        $header = ['Setor', 'Impressões', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8')];

        // Escrever o cabeçalho no arquivo
        fputcsv($file, $header, ',');

        // Ler os registros retornado do banco de dados
        while ($db_data = $result->fetch(PDO::FETCH_ASSOC)) {

            // Escrever o conteúdo no arquivo
            fputcsv($file, $db_data, ',');
        }

        // Fechar arquivo
        //fclose($file);

    } else { // Acessa O ELSE quando não encontrar nenhum registro no BD
        header("Location: dashboardHome.php");
    }
}

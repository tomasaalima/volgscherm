<?php

include_once 'db_connection.php';

// QUERY para recuperar os registros do banco de dados
$sql = "SELECT serial_impressora, data_execucao, total_impressoes, novas_impressoes FROM dados_impressora ORDER BY data_execucao DESC";

// Preparar a QUERY
$result = $connection->prepare($sql);

// Executar a QUERY
$result->execute();

// Acessa o IF quando encontrar registro no banco de dados
if(($result) and ($result->num_rows() != 0)){

    // Aceitar csv ou texto 
    header('Content-Type: text/csv; charset=utf-8');

    // Nome arquivo
    header('Content-Disposition: attachment; filename=arquivo.csv');

    // Gravar no buffer
    $resultado = fopen("php://output", 'w');

    // Criar o cabeçalho do Excel - Usar a função mb_convert_encoding para converter carateres especiais
    $header = ['serial_impressora', 'data_execuçao', 'total_impressoes', 'novas_impressoes', mb_convert_encoding('Endereço', 'ISO-8859-1', 'UTF-8')];

    // Escrever o cabeçalho no arquivo
    fputcsv($resultado, $header, ';');

    ($stmt_result = $result->get_result()) or trigger_error($stmt->error, E_USER_ERROR);

    // Ler os registros retornado do banco de dados
    while($db_data = $stmt_result->fetch_assoc()){

        // Escrever o conteúdo no arquivo
        fputcsv($resultado, $db_data, ';');

    }

    // Fechar arquivo
    //fclose($resultado);
}
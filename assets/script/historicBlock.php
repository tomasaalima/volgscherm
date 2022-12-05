<?php
    //Invoca arquivo que realiza a conexão com o banco de dados
    require('db_connection.php');

    $sql = "SELECT id, serial_impressora, data_execucao, novas_impressoes FROM dados_impressora ORDER BY data_execucao DESC LIMIT 50";
    $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    //Cria tabela
    echo "<table class='historic-table'>
            <thead>
                <tr>
                    <th title='Chave identificadora da captura'>ID</th>
                    <th title='Número de fábrica do dispositivo'>SERIAL</th>
                    <th title='Data de captura do dado'>DATA</th>
                    <th title='Quantidade de impressões realizadas'>Nº DE IMPRESSÕES</th>
                </tr>
            </thead>
            <tbody>
    ";

    //Escreve uma nova linha com os dados obtidos no banco de dados
    while($db_data = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td title='Chave identificadora da captura'>".$db_data['id']."</td>
                <td title='Número de fábrica do dispositivo'>".$db_data['serial_impressora']."</td>
                <td title='Data de captura do dado'>".$db_data['data_execucao']."</td>
                <td title='Quantidade de impressões realizadas'>".$db_data['novas_impressoes']."</td>
            </tr>
        ";
    }

    echo "  </tbody>
        </table>";
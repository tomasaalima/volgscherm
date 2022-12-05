<?php
    //Invoca arquivo que realiza a conexão com o banco de dados
    require('db_connection.php');

    $sql = "SELECT serial, nome, endereco_ip, data_reconhecimento, modelo, setor FROM impressora";
    $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    //Bloco de impressoras em forma de tabela
    while($db_data = mysqli_fetch_assoc($result)){
        echo "<table class='printer-object'>
        <thead>
            <tr>
                <th colspan='2'><img width='100%' src='../img/printer.png' alt='logo de uma impressora'></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Serial</td>
                <td>".$db_data['serial']."</td>
            </tr>
            <tr>
                <td>Nome</td>
                <td>".$db_data['nome']."</td>
            </tr>
            <tr>
                <td>IP</td>
                <td>".$db_data['endereco_ip']."</td>
            </tr>
            <tr>
                <td>Reconhecida em</td>
                <td>".$db_data['data_reconhecimento']."</td>
            </tr>
            <tr>
                <td>Modelo</td>
                <td>".$db_data['modelo']."</td>
            </tr>
            <tr>
                <td>Setor</td>
                <td>".$db_data['setor']."</td>
            </tr>
        </tbody>
    </table>";
    }
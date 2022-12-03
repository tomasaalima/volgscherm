<?php
    include('db_connection.php');

    $sql = "SELECT id, serial_impressora, data_execucao, novas_impressoes FROM dados_impressora ORDER BY data_execucao DESC LIMIT 50";
    $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    echo "<table class='historic-table'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>SERIAL</th>
                    <th>DATA</th>
                    <th>Nº DE IMPRESSÕES</th>
                </tr>
            </thead>
            <tbody>
    ";

    while($db_data = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>".$db_data['id']."</td>
                <td>".$db_data['serial_impressora']."</td>
                <td>".$db_data['data_execucao']."</td>
                <td>".$db_data['novas_impressoes']."</td>
            </tr>
        ";
    }

    echo "  </tbody>
        </table>";
<?php
//Solicita arquivo de conexão
require("assets/script/db_connection.php");

if (isset($_POST['user']) || isset($_POST['password'])) {

    //Validação do usuário
    if (strlen($_POST['user'] == "")) {
        echo "Preencha o nome de usuário";
    } else if (strlen($_POST['password'] == "")) {
        echo "Preencha sua senha";
    } else {

        //Tratamendo de campos de texto
        $user = $connection->real_escape_string($_POST['user']);
        $password = $connection->real_escape_string($_POST['password']);

        $sql = "SELECT * FROM administrador WHERE usuario = '$user' AND senha = '$password'";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        $quantidade = $result->num_rows;

        if ($quantidade == 1) {
            $user_data = $result->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['user'] = $user_data['usuario'];
            $_SESSION['password'] = $user_data['password'];

            //concede acesso
            header("location: assets/script/dashboardHome.php");
        } else {
            //Bloqueia acesso
            echo "Falha ao logar! Usuário ou Senha Incorretos";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Systema de acompanhamento de dados para impressoras compatíveis ao protocolo SNMP v1, v2c e v3">
    <meta name="keywords" content="dashboard, html, charts, impressoras, SNMP">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/form.css">

    <title>volgscherm</title>

</head>

<body>
    <div class="container-login">
        <img class="logo-image" src="assets/img/logo.png" alt="logo da empresa">
        <div class="container-line">
            <hr class="line">
        </div>
        <div class="container-formulary">

            <!--Formulário da inserção-->
            <form id="form" class="formulary" action="" method="post">
                <label class="label-formulary" for="user">Usuário</label>
                <input class="input-formulary" type="text" name="user">
                <label class="label-formulary" for="password">Senha</label>
                <input class="input-formulary" type="password" name="password" autocomplete="current-password">
                <div class="sub-elements">
                    <a href="assets/script/passwordChange.php">Esqueceu Sua Senha?</a>
                    <a href="assets/script/userCreation.php">Cadastrar Usuário</a>
                </div>
                <div class="form-btns">

                    <!--Submete ação-->
                    <button class="submit-btn" type="submit">Executar</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
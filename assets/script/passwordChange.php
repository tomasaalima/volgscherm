<?php
//Invoca arquivo que realiza a conexão com o banco de dados
require("db_connection.php");

//invoca arquivo contendo dados sobre a chave do produto
include_once("systemKey.php");

//Contenção do alerta
$SweetAlert = false;

//Parâmetros para SweetAlerts
$message = "";
$icon = "";
$title = "";

if (isset($_POST['user-name']) || isset($_POST['password']) || isset($_POST['repeat-password']) || isset($_POST['key'])) {

    //verifica o preenchimento dos campos
    if (strlen($_POST['user-name'] == "")) {
        $message = "Preencha o nome de usuário";
        $icon = "warning";
        $title = "Preencha todos os campos";

        //Autorização do alerta
        $SweetAlert = True;
    } else if (strlen($_POST['password'] == "")) {
        $message = "Preencha sua senha";
        $icon = "warning";
        $title = "Preencha todos os campos";

        //Autorização do alerta
        $SweetAlert = True;
    } else if (strlen($_POST['repeat-password'] == "")) {
        $message = "Repita sua senha";
        $icon = "warning";
        $title = "Preencha todos os campos";

        //Autorização do alerta
        $SweetAlert = True;
    } else if (strlen($_POST['key'] == "")) {
        $message = "Informe a chave do produto";
        $icon = "warning";
        $title = "Preencha todos os campos";

        //Autorização do alerta
        $SweetAlert = True;
    } else {

        //Trata os campos de entrada de texto
        $user = $connection->real_escape_string($_POST['user-name']);
        $password = $connection->real_escape_string($_POST['password']);
        $repeat_password = $connection->real_escape_string($_POST['repeat-password']);
        $key = $connection->real_escape_string($_POST['key']);

        $sql = "SELECT * FROM administrador WHERE usuario = '$user'";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        $quantidade = $result->num_rows;

        //Verifica a existência do usuário no banco de dados
        if ($quantidade == 0) {
            $message = "Esse usuário não existe";
            $icon = "error";
            $title = "Informe um usuário válido";

            //Autorização do alerta
            $SweetAlert = True;
        } else if ($password != $repeat_password) {
            $message = "As senhas não coincidem";
            $icon = "error";
            $title = "Revise os dados informados";

            //Autorização do alerta
            $SweetAlert = True;
        } else if ($key != $product_key) {
            $message = "Essa não é uma chave válida";
            $icon = "error";
            $title = "Insira um valor válido";

            //Autorização do alerta
            $SweetAlert = True;
        } else {
            $sql = "UPDATE administrador SET senha = '$password' WHERE usuario = '$user'";
            $connection->query($sql);
            $icon = "success";
            $title = "Senha alterada com sucesso";

            //Autorização do alerta
            $SweetAlert = True;
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

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/registration.css">

    <title>Mudança de Senha</title>

</head>

<body>

    <!--Ivocação da biblioteca respectiva aos sweetalerts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //Execução do sweetAlert
        <?php
        if ($SweetAlert === true) {
            echo "Swal.fire({
            icon: '$icon',
            title: '$title',
            text: '$message'
            })";
            $SweetAlert = false;
        }
        ?>
    </script>
    <div class="container-login">
        <img class="logo-image" src="../img/logo.png" alt="logo da empresa">
        <div class="container-line">
            <hr class="line">
        </div>
        <div class="container-formulary">

            <!--Formulário de inserção de dados-->
            <form id="form" class="formulary" action="" method="post">
                <label class="label-formulary" for="name">Usuário</label>
                <input class="input-formulary" type="text" name="user-name">
                <label class="label-formulary" for="password">Nova Senha</label>
                <input class="input-formulary" type="password" name="password">
                <label class="label-formulary" for="password">Repita a Senha</label>
                <input class="input-formulary" type="password" name="repeat-password">
                <label class="label-formulary" for="user">Chave do Produto</label>
                <input class="input-formulary" type="text" name="key">
                <div class="sub-elements">

                    <!--redirecionamento para página de informações sobre a chave do produto-->
                    <a href="keyGuide.php">Resgatar Chave de Acesso</a>
                </div>
                <div class="form-btns">
                    <a class="submit-btn" href="../../index.php">

                        <!--Botão de retorno-->
                        <input class="toback" type="button" value="Voltar">
                    </a>
                    <input class="submit-btn" type="submit" value="Redefinir">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
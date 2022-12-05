<?php
include_once("db_connection.php");
include_once("systemKey.php");

if (isset($_POST['user-name']) || isset($_POST['password']) || isset($_POST['repeat-password']) || isset($_POST['key'])) {

    if (strlen($_POST['user-name'] == "")) {
        echo "Preencha o nome de usuário";
    } else if (strlen($_POST['password'] == "")) {
        echo "Preencha sua senha";
    } else if (strlen($_POST['repeat-password'] == "")) {
        echo "Repita sua senha";
    } else if (strlen($_POST['key'] == "")) {
        echo "Informe a chave do produto";
    } else {
        $user = $connection->real_escape_string($_POST['user-name']);
        $password = $connection->real_escape_string($_POST['password']);
        $repeat_password = $connection->real_escape_string($_POST['repeat-password']);
        $key = $connection->real_escape_string($_POST['key']);

        $sql = "SELECT * FROM administrador WHERE usuario = '$user'";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        $quantidade = $result->num_rows;

        if ($quantidade == 0) {
            echo "Esse usuário não existe";
        } else if ($password != $repeat_password) {
            echo "As senhas não coincidem";
        } else if ($key != $product_key) {
            echo "Essa não é uma chave válida";
        } else {
            $sql = "UPDATE administrador SET senha = '$password' WHERE usuario = '$user'";
            $connection->query($sql);
            echo "Senha alterada com sucesso";
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

    <title>volgscherm</title>

</head>

<body>
    <div class="container-login">
        <img class="logo-image" src="../img/logo.png" alt="logo da empresa">
        <div class="container-line">
            <hr class="line">
        </div>
        <div class="container-formulary">
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
                    <a href="keyGuide.php">Resgatar Chave de Acesso</a>
                </div>
                <div class="form-btns">
                    <a class="submit-btn" href="../../index.php">
                        <input class="toback" type="button" value="Voltar">
                    </a>
                    <input class="submit-btn" type="submit" value="Redefinir">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
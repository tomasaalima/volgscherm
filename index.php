<?php
    include_once("assets/script/db_connection.php");

    if(isset($_POST['user']) || isset($_POST['password'])){
            
        if(strlen($_POST['user'] == 0)){
            echo "Preencha o nome de usuário";
        }else if(strlen($_POST['password'] == 0)){
            echo "Preencha sua senha";
        }else{
            $user = $connection->real_escape_string($_POST['user']);
            $password = $connection->real_escape_string($_POST['password']);

            $sql = "SELECT * FROM administrador WHERE usuario = '$user' AND senha = '$password'";
            $result = $connection->query($sql) or die("Falha na execução do código SQL"). $connection->error;
            
            $quantidade = $result->num_rows;

            if($quantidade == 1){
                $user_data = $result->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['user'] = $user_data['usuario'];
                $_SESSION['password'] = $user_data['password'];

                header("location: assets/script/home.php");

            }else{
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
            <form id="form" class="formulary" action="" method="post">
                <label class="label-formulary" for="user">Usuário</label>
                <input class="input-formulary" type="text" name="user">
                <label class="label-formulary" for="password">Senha</label>
                <input class="input-formulary" type="password" name="password" autocomplete="current-password">
                <div class="sub-elements">
                    <a href="assets/script/redefine.php">Esqueceu Sua Senha?</a>
                    <a href="assets/script/registration.php">Cadastrar Usuário</a>
                </div>
                <div class="form-btns">
                    <button class="submit-btn" type="submit">Executar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
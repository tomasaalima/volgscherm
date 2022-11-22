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
            <form id="form" class="formulary" action="#" method="post">
                    <label class="label-formulary" for="password">Nova Senha</label>
                    <input class="input-formulary" type="password" name="password">
                    <label class="label-formulary" for="password">Repita a Senha</label>
                    <input class="input-formulary" type="password" name="repeat-password">
                    <label class="label-formulary" for="user">Chave do Produto</label>
                    <input class="input-formulary" type="text" name="user">
                <div class="sub-elements">
                    <a href="#">Resgatar Chave de Acesso</a>
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
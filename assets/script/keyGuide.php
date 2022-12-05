<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/base.css">

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        article {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            margin: auto;
            width: 60%;
            border: 1px solid black;
            text-align: center;
            height: 30%;
            padding: 0px 10px 0px 10px;
        }

        article>div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn {
            width: 50%;
        }
    </style>

    <title>Chave de Acesso</title>

</head>

<body>
    <article>
        <div>
            <!--Informações sobre a chave do produto-->
            <h1>O que é a Chave de Produto?</h1>
            <div>
                <p>
                    A Chave do Produto é um código serial fornecido pelos proprietários do sistema que acompanha o produto. É um meio de gerenciamento e recurso que visa a segurança aos utilizadores do sistema.
                </p>
                <p>
                    Nesse sistema você precisará da chave para gerenciamento dos usuários, como cadastro, remoção e atualização de dados.
                </p>
                <p>
                    Econtrará a chave na docimentação do produto -> manual do Usuário -> 4. Chave do produto.
                </p>
            </div>
        </div>
        <div class="form-btns">
            <a href="../../index.php">
                <!--Botão para retorno-->
                <input class="submit-btn" class="toback" type="button" value="Voltar">
            </a>
        </div>
    </article>

</body>

</html>
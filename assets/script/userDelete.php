<?php
    require('sessionProtect.php');
    require('db_connection.php');
    require('systemThemeColors.php');
    require('systemKey.php');

    if(isset($_POST['productKey'])){
        $key = $_POST['productKey'];
        
        if($key != $product_key){
            echo "A chave inserida não é válida";
        }else{
            $user = $_SESSION['user'];
            $connection->query("DELETE FROM administrador WHERE usuario = '$user'");
            header('Location: userLogout.php');
        }

    }
    

    /*Consulta qual o tema no banco de dados e obtem um Array[4] contendo as cores respectivas ao mesmo */
    $systemColors = getColors();
?>

<!--Aplicação das cores de tema ao sistema-->
<script>
    document.documentElement.style.setProperty('--palette-A', '<?php echo $systemColors[0];?>');
    document.documentElement.style.setProperty('--palette-B', '<?php echo $systemColors[1];?>');
    document.documentElement.style.setProperty('--palette-C', '<?php echo $systemColors[2];?>');
    document.documentElement.style.setProperty('--palette-D', '<?php echo $systemColors[3];?>');
</script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/sysEdit.css">
    <link rel="stylesheet" href="../css/navMenu.css">

    <style>
        article{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        form{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            gap: 30px;
        }
    </style>

    <!--Recurso google para biblioteca de ícones-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Deletar Conta</title>

</head>

<body>

    <?php
        require('headerBlock.php');//invocação do header da página 
    ?>
    
    <main>
        <div class="config-container">
            <ul class="unordered-element">
                <div class="config-topics">
                    <a href="systemEdit.php">
                        <li class="li-topic">Personalização</li>
                    </a>
                </div>
                <div class="config-topics actual-atribute">
                    <a href="userDelete.php">
                        <li class="li-topic">Deletar Usuário</li>
                    </a>
                </div>
                <div class="config-topics">
                    <a href="helpScreen.php">
                        <li class="li-topic">Ajuda</li>
                    </a>
                </div>
            </ul>
            <article>
                <form action="" method="post">
                    <p>Se deletar essa conta será direcionado a tela de login e não poderá mais iniciar sessão com os dados da mesma.</p>
                    <div>
                        <label for="productKey">Chave do Produto</label>
                        <input type="text" name="productKey">
                    </div>
                    <div><input type="submit" value="Deletar Minha Conta"></div>
                </form>
            </article>
        </div>
    </main>
</body>
</html>
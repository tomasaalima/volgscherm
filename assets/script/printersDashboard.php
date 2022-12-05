<?php
    //invoca arquivo para trabalhar com os temas do sistema e suas respectivas cores
    require("systemThemeColors.php");

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
    <link rel="stylesheet" href="../css/printers.css">
    <link rel="stylesheet" href="../css/navMenu.css">

    <!--Recurso google para biblioteca de ícones-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .printer-object{
            width: 30%;
            border-collapse: collapse;
            padding-top: 30px;
        }

        .objects-container{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        #back-icon{
            display: none;
        }
        </style>
    <title>volgscherm</title>

</head>

<body>
    <?php
    include_once('headerBlock.php');//invocação do header da página 
    ?>
    <main>
        <div class="main-nav">
            <nav>

                <!--Menu de navegação painel principal / painel de impressoras-->
                <a href="dashboardHome.php">DashBoard</a>
                <a href="#" class="actual">Impressoras</a>
            </nav>
        </div>
        <div class="main-slots">

            <!--Barra de busca-->
            <div class="search-bar">
                <form action="" method="post">
                    <input type="text" placeholder="Search..">
                    <button class="glass" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
                
            </div>

            <!--Bloco das impressoras-->
            <div class="objects-container">
                <?php
                    include('printerObject.php');//Invocação do arquivo gerador das tabelas(impressoras)
                ?>
            </div>
        </div>
        </div>
    </main>

</body>

</html>
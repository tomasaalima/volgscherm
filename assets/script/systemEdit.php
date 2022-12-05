<?php
    require('sessionProtect.php');
    include('userUpload.php');
    require('db_connection.php');
    require("systemThemeColors.php");

    if(isset($_GET['dark'])){
        $connection->query("UPDATE sistema SET tema = 'dark' ");
    }else if(isset($_GET['light'])){
        $connection->query("UPDATE sistema SET tema = 'light' ");
    }else if(isset($_GET['tech'])){
        $connection->query("UPDATE sistema SET tema = 'tech' ");
    }

    /*Consulta qual o tema no banco de dados e obtem um Array[4] contendo as cores respectivas ao mesmo */
    $systemColors = getColors();

    uploadFileUser();
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

    <!--Recurso google para biblioteca de ícones-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>volgscherm</title>

</head>

<body>
    

    <?php
        require('headerBlock.php');//invocação do header da página 
    ?>
    
    <main>
        <div class="config-container">
            <ul class="unordered-element">
                <div class="config-topics actual-atribute">
                    <a href="systemEdit.php">
                        <li class="li-topic">Personalização</li>
                    </a>
                </div>
                <div class="config-topics">
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
                <div class="img-edit">
                    <div>
                        <img class="user-img-edit" src="uploads/user-img.jpg" alt="imagem do usuário">
                    </div>
                    <div class="choose-file">
                        Mudar Imagem de Usuário
                        <form action="#" method="post" enctype="multipart/form-data">
                            <input type="file" name="arquive">
                            <input style="cursor: pointer;" type="submit" value="Aplicar" name="action" class="apply-btn">
                        </form>
                    </div>
                </div>
                <div class="theme-edit">
                    <div>
                        <a href="systemEdit.php?dark=true">
                            <div id="01" class="themes link">
                                    <button class="theme-btn" onclick="setTheme('01')">
                                        <div class="dark-theme">
                                            <div style="background-color: #1D1E26;" class="theme-color"></div>
                                            <div style="background-color: #202126;" class="theme-color"></div>
                                            <div style="background-color: #737272;" class="theme-color"></div>
                                            <div style="background-color: #889ABF;" class="theme-color"></div>
                                        </div>
                                        <aside>Dark</aside>
                                    </button>
                            </div>
                        </a>
                        <a href="systemEdit.php?light=true">
                            <div id="02" class="themes link">
                                <button class="theme-btn" onclick="setTheme('02')">
                                    <div class="light-theme">
                                        <div style="background-color: #ffffff;" class="theme-color"></div>
                                        <div style="background-color: #EBE8E7;" class="theme-color"></div>
                                        <div style="background-color: #9DFFEC;" class="theme-color"></div>
                                        <div style="background-color: #2D73EB;" class="theme-color"></div>
                                    </div>
                                    <script src="themeConfig.js"></script>
                                    <aside>Light</aside>
                                </button>
                            </div>
                        </a>
                        <a href="systemEdit.php?tech=true">
                            <div id="03" class="themes link">
                                <button class="theme-btn" onclick="setTheme('03')">
                                    <div class="tech-theme">
                                        <div style="background-color: #224D59;" class="theme-color"></div>
                                        <div style="background-color: #3A8499;" class="theme-color"></div>
                                        <div style="background-color: #58C6E5;" class="theme-color"></div>
                                        <div style="background-color: #49A5BF;" class="theme-color"></div>
                                    </div>
                                    <aside>Tech</aside>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </main>
</body>
</html>
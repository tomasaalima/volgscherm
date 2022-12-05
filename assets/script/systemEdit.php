<?php
    //Invoca arquivo que protege a sessão, evitando acesso sem log-in
    require('sessionProtect.php');

    //Invoca arquivo responsável pelo recebimento de arquivos 
    include('userUpload.php');

    //Invoca arquivo que realiza a conexão com o banco de dados
    require('db_connection.php');

    //invoca arquivo para trabalhar com os temas do sistema e suas respectivas cores
    require("systemThemeColors.php");

    //Pega o tema definido gravando-o no banco de dados
    if(isset($_GET['dark'])){
        $connection->query("UPDATE sistema SET tema = 'dark' ");
    }else if(isset($_GET['light'])){
        $connection->query("UPDATE sistema SET tema = 'light' ");
    }else if(isset($_GET['tech'])){
        $connection->query("UPDATE sistema SET tema = 'tech' ");
    }

    /*Consulta qual o tema no banco de dados e obtem um Array[4] contendo as cores respectivas ao mesmo */
    $systemColors = getColors();

    //Invoca função responsável pelo recebimento dos arquivos
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

    <title>Personalização</title>

</head>

<body>
    

    <?php
        require('headerBlock.php');//invocação do header da página 
    ?>
    
    <main>
        
        <!--Bloco de opções-->
        <div class="config-container">
            <ul class="unordered-element">
                <div title="Opção de personalização do sistema" class="config-topics actual-atribute">
                    <a href="systemEdit.php">
                        <li class="li-topic">Personalização</li>
                    </a>
                </div>
                <div title="Opção de exclusão de conta" class="config-topics">
                    <a href="userDelete.php">
                        <li class="li-topic">Deletar Usuário</li>
                    </a>
                </div>
                <div title="Informações sobre o sistema" class="config-topics">
                    <a href="helpScreen.php">
                        <li class="li-topic">Ajuda</li>
                    </a>
                </div>
            </ul>

            <!--Bloco de informações respectivas a opção selecionada-->
            <article>
                <div class="img-edit">

                    <!--Imagem do usuário-->
                    <div title="Imagem do usuário">
                        <img class="user-img-edit" src="uploads/user-img.jpg" alt="imagem do usuário">
                    </div>

                    <!--Formulário de upload-->
                    <div title="Realizar Upload" class="choose-file">
                        Mudar Imagem de Usuário
                        <form action="#" method="post" enctype="multipart/form-data">
                            <input type="file" name="arquive">
                            <input style="cursor: pointer;" type="submit" value="Aplicar" name="action" class="apply-btn">
                        </form>
                    </div>
                </div>

                <!--Seleção de tema-->
                <div class="theme-edit">
                    <div>
                        <a href="systemEdit.php?dark=true">
                            <div title="Tema Dark" id="01" class="themes link">

                                    <!--Tema Dark-->
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
                            <div title="Tema Light" id="02" class="themes link">

                                <!--Tema Light-->
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
                            <div title="Tema Tech" id="03" class="themes link">

                                <!--Tema Tech-->
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
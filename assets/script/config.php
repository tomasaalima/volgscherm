<?php
        include_once('header.php');
        importHeader();

        include_once('upload.php');
        uploadFileUser();
        uploadFileLogo();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/config.css">
    
    <title>volgscherm</title>

</head>
<body>
    
    <main>
        <div class="config-container">
            <ul>
                <div class="config-topics actual-atribute">
                    <li class="li-topic">Personalização</li>
                </div>
                <div class="config-topics">
                    <a href="help.php">
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
                            <input type="file" name="arquive-i">
                            <input style="cursor: pointer;" type="submit" value="Aplicar" name="action-i" class="apply-btn">
                        </form>
                    </div>
                </div>
                <div class="logo-edit">
                    <div>
                        <img type="file" class="user-logo" src="uploads/logo-exemple.png" alt="logo do usuário">
                    </div>





                    <div class="choose-file">
                        Mudar Logo (Recomendado: 600x300)
                        <form action="#" method="post" enctype="multipart/form-data">
                            <input type="file" name="arquive-ii">
                            <input style="cursor: pointer;" type="submit" value="Aplicar" name="action-ii" class="apply-btn">
                        </form>
                    </div>




                </div>
                <div class="theme-edit">
                    <div>
                        <div id="01" class="themes link">
                            <button class="theme-btn" onclick="setTheme('01')">
                                <div class="dark-theme">
                                    <div style="background-color: #1D1E26;" class="theme-color"></div>
                                    <div style="background-color: #202126;"  class="theme-color"></div>
                                    <div style="background-color: #737272;"  class="theme-color"></div>
                                    <div style="background-color: #889ABF;"  class="theme-color"></div>
                                </div>
                                <aside>Dark</aside>
                            </button>
                        </div>
                        <div id="02" class="themes link">
                            <button class="theme-btn" onclick="setTheme('02')">
                                <div class="light-theme">
                                    <div style="background-color: #ffffff;" class="theme-color"></div>
                                    <div style="background-color: #EBE8E7;" class="theme-color"></div>
                                    <div style="background-color: #9DFFEC;" class="theme-color"></div>
                                    <div style="background-color: #2D73EB;" class="theme-color"></div>
                                </div>
                                <script src="config.js"></script>
                                <aside>Ligh</aside>
                            </button>
                        </div>
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
                    </div>
                </div>
            </article>
        </div>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        main{
            padding-top: 50px;
        }
    </style>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/config.css">
    
    <title>volgscherm</title>

</head>
<body>
    <?php
        include_once('header.php');
        importHeader();
    ?>
    <main>
        <div class="config-container">
            <ul>
                <div class="config-topics actual-atribute">
                    <li class="li-topic">Personalização</li>
                </div>
                <div class="config-topics">
                    <li class="li-topic">Ajuda</li>
                </div>
            </ul>
            <article>
                <div class="img-edit">
                    <div>
                        <img class="user-img-edit" src="../img/user-img.png" alt="imagem do usuário">
                    </div>
                    <div>
                        <span class="link">Mudar Imagem de Usuário</span>
                    </div>
                </div>
                <div class="logo-edit">
                    <div>
                        <img class="user-logo" src="../img/logo-exemple.png" alt="logo do usuário">
                    </div>
                    <div>
                        <span class="link">Mudar Logo</span>
                    </div>
                </div>
                <div class="theme-edit">
                    <div>
                        <div class="themes link actual-theme">
                            <div class="dark-theme">
                                <div style="background-color: #1D1E26;" class="theme-color"></div>
                                <div style="background-color: #202126;"  class="theme-color"></div>
                                <div style="background-color: #737272;"  class="theme-color"></div>
                                <div style="background-color: #889ABF;"  class="theme-color"></div>
                            </div>
                            <aside>Dark</aside>
                        </div>
                        <div class="themes link">
                            <div class="light-theme">
                                <div class="theme-color"></div>
                                <div class="theme-color"></div>
                                <div class="theme-color"></div>
                                <div class="theme-color"></div>
                            </div>
                            <aside>Ligh</aside>
                        </div>
                        <div class="themes link">
                            <div class="tech-theme">
                                <div class="theme-color"></div>
                                <div class="theme-color"></div>
                                <div class="theme-color"></div>
                                <div class="theme-color"></div>
                            </div>
                            <aside>Tech</aside>
                        </div>
                    </div>
                </div>
                <div class="btn-div">
                    <input class="submit-btn link" type="button" value="Submeter">
                </div>
            </article>
        </div>
    </main>
</body>
</html>
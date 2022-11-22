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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <link rel="stylesheet" href="base.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="config.css">
    
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
                        <input id="upload" type="file"/>
                        <a href="upload.php" class="link" id="upload_link">Mudar Imagem de Usuário</a>
                    </div>
                </div>
                <div class="logo-edit">
                    <div>
                        <img type="file" class="user-logo" src="../img/logo-exemple.png" alt="logo do usuário">
                    </div>
                    <div>
                        <input id="upload2" type="file"/>
                        <a href="upload.php" class="link" id="upload_link2">Mudar Logo</a>
                    </div>
                    <script>
                        $(function(){
                            $("#upload_link").on('click', function(e){
                                e.preventDefault();
                                $("#upload:hidden").trigger('click');
                            });
                        });
                        $(function(){
                            $("#upload_link2").on('click', function(e){
                                e.preventDefault();
                                $("#upload2:hidden").trigger('click');
                            });
                        });
                    </script>
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
                <div class="btn-div">
                    <input class="submit-btn link" type="button" value="Submeter">
                </div>
            </article>
        </div>
    </main>
</body>
</html>
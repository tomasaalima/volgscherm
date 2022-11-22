<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/printers.css">
    <link rel="stylesheet" href="../css/printer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>volgscherm</title>

</head>
<body>
    <?php
        include_once('header.php');
        importHeader();
    ?>
    <main>
        <div class="main-nav">
            <nav>
                <a href="#" class="printer-name actual">Novo Nome</a>
            </nav>
            <span class="rename">Renomear</span>
        </div>
        <div class="main-slots">
            <div class="printer">
                <div>
                    <div class="printer-logo">
                        <img src="../img/printer-logo-purple.png" alt="imagem impressora">
                    </div>
                    <div class="printer-infos">
                        <div class="info">
                            <span class="info-topic">Ultimo Uso</span>
                            <span class="info-value">14 horas</span>
                        </div>
                        <div class="info">
                            <span class="info-topic">Setor</span>
                            <span class="info-value">Informática</span>
                        </div>
                        <div class="info">
                            <span class="info-topic">IP</span>
                            <span class="info-value">192.125.215.44</span>
                        </div>
                        <div class="info">
                            <span class="info-topic">Modelo</span>
                            <span class="info-value">HP</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="printer-btns">
            <button class="printer-btn">Exportar Relatório</button>
        </div>
    </main>
    
</body>
</html>
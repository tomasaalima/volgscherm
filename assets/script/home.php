<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">

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
                <a href="#" class="actual">DashBoard</a>
                <a href="#">Impressoras</a>
            </nav>
        </div>
        <div class="main-info">
            <div class="info-group">
                Status:
                <span class="info-data">OK</span>
                Intervalo definido:
                <span class="info-data">5 minutos</span>
            </div>
            <div class="info-group">
                Last auto-recover:
                <span>25 Dias Atrás</span>
            </div>
        </div>
        <div class="main-dashboard">
            <h1>DASHBOARD</h1>
            <div class="dashboard-graphic">
                <div class="graphic-nav">
                    <input class="graphic-nav-item actual" type="button" value="1 D">
                    <input class="graphic-nav-item" type="button" value="5 D">
                    <input class="graphic-nav-item" type="button" value="1 M">
                    <input class="graphic-nav-item" type="button" value="6 M">
                    <input class="graphic-nav-item" type="button" value="YTD">
                    <input class="graphic-nav-item" type="button" value="1 A">
                    <input class="graphic-nav-item" type="button" value="Máx">
                </div>
                <div class="graphic">
                    GRAFICO
                </div>
            </div>
            <div class="printer-btns">
                <button class="printer-btn">Exportar Relatórios</button>
            </div>
        </div> 
        <div class="historic"><h1>HISTÓRICO</h1></div>
    </main>

    <footer></footer>
</body>
</html>
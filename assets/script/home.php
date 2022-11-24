<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">

    <title>volgscherm</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          backgroundColor: 'black'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

</head>
<body>
    <?php
        require('header.php'); 
    ?>
    <main>
        <div class="main-nav">
            <nav>
                <a href="#" class="actual">DashBoard</a>
                <a href="printers.php">Impressoras</a>
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
        
            <div class="dashboard-graphic">
            <div id="chart_div" style="width: 100%; height: 500px;"></div>
            </div>
            
        </div>
        <div class="printer-btns">
                <button class="printer-btn">Exportar Relatórios</button>
            </div> 
        <div class="historic"><h1>HISTÓRICO</h1></div>
    </main>

    <footer></footer>
</body>
</html>
<?php
    include("protect.php");
    require("db_connection.php");

    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $period = "1A";
    $today = $day."-".$month."-".$year;
    $date = "";

    if($period != "MAX"){
        switch($period){
            case "1D":{
                $date = ($day-1)."-".$month."-".$year;
                break;
            }
            case "1M":{
                $date = $day."-".($month-1)."-".$year;
                break;
            }
            case "5M":{
                $date = $day."-".($month-5)."-".$year;
                break;
            }
            case "1A":{
                $date = $day."-".$month."-".($year-1);
                break;
            }
        }

        $sql = "SELECT data_execucao, qtd_impressoes FROM dados_impressora WHERE data_execucao BETWEEN $date and $today ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    }else{
        $sql = "SELECT data_execucao, qtd_impressoes FROM dados_impressora ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
    }
    
    $data_array = [];

    while($db_data = mysqli_fetch_assoc($result)){
        $value = "'".$db_data['data_execucao']."',".$db_data['qtd_impressoes'];
        array_push($data_array, $value);
    }

    foreach($data_array as $value){
        echo $value;
    }
?>
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
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'X');
            data.addColumn('number', 'Dogs');

            data.addRows([
                
                <?php
                    foreach($data_array as $value){
                        echo "[".$value."],";
                    }
                ?>
                
            ]);

            var options = {
                hAxis: {
                    title: 'Time'
                },
                vAxis: {
                    title: 'Popularity'
                },
                backgroundColor: '#fff'
            };

            var chart = new google.visualization.LineChart(document.getElementById('line-chart'));

            chart.draw(data, options);
        }
    </script>
    <script>
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('timeofday', 'Time of Day');
            data.addColumn('number', 'Motivation Level');

            data.addRows([
                [{
                    v: [8, 0, 0],
                    f: '8 am'
                }, 1],
                [{
                    v: [9, 0, 0],
                    f: '9 am'
                }, 2],
                [{
                    v: [10, 0, 0],
                    f: '10 am'
                }, 3]
            ]);

            var options = {
                title: 'Motivation Level Throughout the Day',
                hAxis: {
                    title: 'Time of Day',
                    format: 'h:mm a',
                    viewWindow: {
                        min: [7, 30, 0],
                        max: [17, 30, 0]
                    }
                },
                vAxis: {
                    title: 'Rating (scale of 1-10)'
                },
                backgroundColor: 'transparent'
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById('bar-chart'));

            chart.draw(data, options);
        }
    </script>
    <script>
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 11],
                ['Eat', 2],
                ['Commute', 2],
                ['Watch TV', 2],
                ['Sleep', 7]
            ]);

            var options = {
                title: 'My Daily Activities',
                is3D: true,
                backgroundColor: 'transparent'
            };

            var chart = new google.visualization.PieChart(document.getElementById('pie-chart'));
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

            <div id="line-chart" style="width: 100%; height: 500px;"></div>
            <div id="bar-chart" style="width: 100%; height: 500px;"></div>
            <div>
                <div id="pie-chart" style="width: 100%; height: 500px;"></div>

            </div>

        </div>
        <div class="printer-btns">
            <button class="printer-btn">Exportar Relatórios</button>
        </div>
        <div class="historic">
            <h1>HISTÓRICO</h1>
        </div>
    </main>

    <footer></footer>
</body>

</html>
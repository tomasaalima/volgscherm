<?php
    include("sessionprotect.php");
    require("db_connection.php");
    require("systemThemeColors.php");

    $systemColors = getColors();

    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $period = "MAX";
    $today = $year."/".$month."/".$day;
    $date = "";

    if($period != "MAX"){
        switch($period){
            case "1A":{
                $date = ($year-1)."/".$month."/".$day;
                break;
            }
            case "5M":{
                $date = $year."/".($month-5)."/".$day;
                break;
            }
            case "1M":{
                $date = $year."/".($month-1)."/".$day;
                break;
            }
            case "1D":{
                $date = $year."/".$month."/".($day-1);
                break;
            }
        }

        $sql = "SELECT data_execucao, total_impressoes FROM dados_impressora WHERE data_execucao BETWEEN '$date' and '$today' ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    }else{
        $sql = "SELECT data_execucao, total_impressoes FROM dados_impressora ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
    }
    
    $generalDataArray = [];

    while($db_data = mysqli_fetch_assoc($result)){
        $value = "'".$db_data['data_execucao']."',".$db_data['total_impressoes'];
        array_push($generalDataArray, $value);
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
            data.addColumn('string', 'data');
            data.addColumn('number', 'Impressoes');

            data.addRows([
                
                <?php
                    foreach($generalDataArray as $value){
                        echo "[".$value."],";
                    }
                ?>
                
            ]);

            var options = {
                legend: {
                    textStyle:{
                        color:'<?php echo $systemColors[3];?>'
                    }
                },
                vAxis: {
                    title: 'Tabela Geral de Impressões',
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'
                    },
                    titleTextStyle: {
                    color: '<?php echo $systemColors[3];?>'
                    }
                },
                hAxis:{
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'
                    }
                },
                series: {
                    0: { color: '<?php echo $systemColors[3];?>' }
                },
                lineWidth: 5,
                backgroundColor: 'transparent'
                
                
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
            data.addColumn('string', 'Impressora');
            data.addColumn('number', 'Impressões');

            data.addRows([
                ['x',5000],
                ['y',400],
                ['z',4000],
                ['u',2500],
                ['v',6000],
                ['w',3200]
            ]);

            var options = {
                vAxis: {
                    title: 'Tabela de Impressões por Impressora',
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'
                    },
                    titleTextStyle: {
                    color: '<?php echo $systemColors[3];?>'
                    }
                },legend: 'none',
                hAxis:{
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'
                    }
                },
                series: {
                    0: { color: '<?php echo $systemColors[3];?>' }
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
    require('headerBlock.php');
    ?>
    <main>
        <div class="main-nav">
            <nav>
                <a href="#" class="actual">DashBoard</a>
                <a href="printersDashboard.php">Impressoras</a>
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
            <div id="pie-chart" style="width: 100%; height: 500px;"></div>


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
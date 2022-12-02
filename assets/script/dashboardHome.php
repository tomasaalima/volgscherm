<?php
    include("sessionprotect.php");
    require("db_connection.php");
    require("systemThemeColors.php");

    $systemColors = getColors();

    $day = date("d");
    $month = date("m");
    $year = date("Y");
    $period = "";
    $today = $year."/".$month."/".$day;
    $date = "";

    function setPeriod($x){
        global $period;
        $period = $x;
    }
    
    if (isset($_GET['1D'])) {
        setPeriod("1D");
    }else if(isset($_GET['1M'])){
        setPeriod("1M");
    }else if(isset($_GET['5M'])){
        setPeriod("5M");
    }else if(isset($_GET['1A'])){
        setPeriod("1A");
    }else if(isset($_GET['MAX'])){
        setPeriod("MAX");
    }

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

        $sql = "SELECT data_execucao, SUM(novas_impressoes), COUNT(DISTINCT serial_impressora) FROM dados_impressora WHERE data_execucao BETWEEN '$date' and '$today' GROUP BY data_execucao ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

    }else{
        $sql = "SELECT data_execucao, SUM(novas_impressoes), COUNT(DISTINCT serial_impressora) FROM dados_impressora GROUP BY data_execucao ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
    }
    
    $generalDataArray = [];

    while($db_data = mysqli_fetch_assoc($result)){
        $value = "'".$db_data['data_execucao']."',".$db_data['SUM(novas_impressoes)'].",".$db_data['COUNT(DISTINCT serial_impressora)'];
        array_push($generalDataArray, $value);
    }

    $printerImpressionsArray = getImpressionsByPrinter();

    function getImpressionsByPrinter(){
        $array = [];

        $sql = "SELECT i.nome, di.serial_impressora, SUM(di.novas_impressoes) FROM impressora i, dados_impressora di WHERE i.serial = di.serial_impressora GROUP BY di.serial_impressora ORDER BY di.novas_impressoes DESC";
        global $connection;
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        while($db_data = mysqli_fetch_assoc($result)){
            $value = "'".$db_data['nome']."',".$db_data['SUM(di.novas_impressoes)'];
            array_push($array, $value);
        }

        return $array;
    }
    
    $sectorImpressionsArray = getImpressionsBySector();

    function getImpressionsBySector(){
        $array = [];

        global $date, $today, $connection;

        $sql = "SELECT i.setor, di.data_execucao, SUM(di.novas_impressoes) FROM impressora i, dados_impressora di WHERE i.serial = di.serial_impressora AND di.data_execucao BETWEEN '$date' and '$today'  GROUP BY i.setor";

        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        while($db_data = mysqli_fetch_assoc($result)){
            $value = "'".$db_data['setor']."',".$db_data['SUM(di.novas_impressoes)'];
            array_push($array, $value);
        }

        return $array;
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

    <style>
        .period-nav {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 50px;
        }
    </style>

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
            data.addColumn('number', 'Nº de Impressoes Realizadas');
            data.addColumn('number', 'Nº de Impressoras Utilizadas no dia');

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
                    title: 'Tabela Geral de Impressoras',
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
            data.addColumn('number', 'Nº Impressões');

            data.addRows([
                <?php
                    foreach($printerImpressionsArray as $value){
                        echo "[".$value."],";
                    }
                ?>
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
                ['Task', 'Impressões por setor'],
                <?php
                if($sectorImpressionsArray == null){
                    echo "['Ausência de Valores nesse período', 1]";
                }else{
                    foreach($sectorImpressionsArray as $value){
                        echo "[".$value."],";
                    }
                }
                ?>
            ]);

            var options = {
                title: 'Agrupamento por Setor no Período (<?php echo ($date == null)? "Todo o Período": $date." à ".$today ?>)',
                titleTextStyle:{
                    color: '<?php echo $systemColors[3];?>'
                },
                is3D: true,
                backgroundColor: 'transparent',
                legend: {
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'
                    }
                }

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
            <nav class="period-nav">
                <a href="dashboardHome.php?1D=true">1D</a>
                <a href="dashboardHome.php?1M=true">1M</a>
                <a href="dashboardHome.php?5M=true">5M</a>
                <a href="dashboardHome.php?1A=true">1A</a>
                <a href="dashboardHome.php?MAX=true">MAX</a>
            </nav>
            <div id="line-chart" style="width: 100%; height: 500px;"></div>
            <div id="bar-chart" style="width: 100%; height: 500px;"></div>
            <div id="pie-chart" style="width: 50%; height: 500px; margin: auto;"></div>


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
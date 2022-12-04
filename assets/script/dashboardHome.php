<?php
    require('dashboardHome_control.php');
?>

<!--Aplicação das cores de tema ao sistema-->
<script>
    document.documentElement.style.setProperty('--palette-A', '<?php echo $systemColors[0];?>');
    document.documentElement.style.setProperty('--palette-B', '<?php echo $systemColors[1];?>');
    document.documentElement.style.setProperty('--palette-C', '<?php echo $systemColors[2];?>');
    document.documentElement.style.setProperty('--palette-D', '<?php echo $systemColors[3];?>');
</script>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/navMenu.css">
    
    <!--Recurso google para biblioteca de ícones-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!--Elementos que apresentaram mal funcionamento com caminhos relativos ao css-->
    <style>
        .period-nav {
            display: flex;
            flex-direction: row;
            justify-content: center;
            gap: 50px;
        }
        .actual-period {
            border-bottom: 1px solid var(--palette-D) ;
        }
    </style>

    <title>volgscherm</title>

    <!--Recurso google para biblioteca de charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--API do google, Gráfico de linhas-->
    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'line']
        });
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'data');
            data.addColumn('number', 'Nº de Impressoes Realizadas');
            data.addColumn('number', 'Nº de Impressoras Utilizadas');

            data.addRows([
                <?php
                    foreach($generalDataArray as $value){//Inserção de valores em forma de Array via PHP
                        echo "[".$value."],";
                    }
                ?> 
            ]);

            var options = {
                legend: {
                    textStyle:{
                        
                        color:'<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    }
                },
                vAxis: {
                    title: 'Tabela Geral de Impressoras',
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    },
                    titleTextStyle: {
                    color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    }
                },
                hAxis:{
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    }
                },
                series: {
                    0: { color: '<?php echo $systemColors[3];?>' }//Inserção das cores do sistema via PHP
                },
                lineWidth: 5,
                backgroundColor: 'transparent'  
            };

            var chart = new google.visualization.LineChart(document.getElementById('line-chart'));

            chart.draw(data, options);
        }
    </script>
    
    <!--API do google, Gráfico de colunas-->
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
                    foreach($printerImpressionsArray as $value){//Inserção de valores em forma de Array via PHP
                        echo "[".$value."],";
                    }
                ?>
            ]);

            var options = {
                vAxis: {
                    title: 'Tabela de Impressões por Impressora',
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    },
                    titleTextStyle: {
                    color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    }
                },legend: 'none',
                hAxis:{
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                    }
                },
                series: {
                    0: {
                        color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                     }
                },
                backgroundColor: 'transparent'
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById('bar-chart'));

            chart.draw(data, options);
        }
    </script>
    
    <!--API do google, Gráfico em formato de Pizza-->
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
                    foreach($sectorImpressionsArray as $value){//Inserção de valores em forma de Array via PHP
                        echo "[".$value."],";
                    }
                }
                ?>
            ]);

            var options = {
                title: 'Agrupamento por Setor (<?php echo ($date == null)? "Todo o Período": $date." à ".$today ?>)',
                titleTextStyle:{
                    color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
                },
                is3D: true,
                backgroundColor: 'transparent',
                legend: {
                    textStyle:{
                        color: '<?php echo $systemColors[3];?>'//Inserção das cores do sistema via PHP
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
        require('headerBlock.php');//invocação do header da página 
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
                <a id="1D" href="dashboardHome.php?1D=true">1D</a>
                <a id="1M" href="dashboardHome.php?1M=true">1M</a>
                <a id="5M" href="dashboardHome.php?5M=true">5M</a>
                <a id="1A" href="dashboardHome.php?1A=true">1A</a>
                <a id="MAX" href="dashboardHome.php?MAX=true">MAX</a>
            </nav>

            <!--Chamado aos gráficos charts-->
            <div id="line-chart" style="width: 100%; height: 500px;"></div>
            <div id="bar-chart" style="width: 100%; height: 500px;"></div>
            <div id="pie-chart" style="width: 50%; height: 500px; margin: auto;"></div>

            <script>
                /*Aplica bordar em baixo no periodo selecionado*/
                setBottonBorder('<?php echo $period;?>');
                function setBottonBorder(id){
                    document.getElementById(id).style.borderBottom = "2px solid var(--palette-D)";
                }
            </script>
            <div class="printer-btns">
                <p><a href="csvExport.php" class="report-btn">Exportar Relatório</a></p>
            </div>

        </div>
        
        <div class="historic">
            <h1>HISTÓRICO</h1>
            <?php 
                require('historicBlock.php');
            ?>
        </div>
    </main>

    <footer></footer>
</body>

</html>
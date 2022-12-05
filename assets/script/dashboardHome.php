<?php
    //Invoca arquivo com as principais funções do painel dos gráficos
    require('dashboardHome_control.php');

    //Invoca arquivo que protege a sessão, evitando acesso sem log-in
    require('sessionProtect.php');
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
        #back-icon{
            display: none;
        }
    </style>

    <title>volgscherm - Painel Princípal</title>

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

        <!--Navegação entre painéis-->
        <div class="main-nav">
            <nav>
                <a title="Painel principal" href="#" class="actual">DashBoard</a>
                <a title="Painel de impressoras" href="printersDashboard.php">Impressoras</a>
            </nav>
        </div>

        <!--Container de informações-->
        <div class="main-info">
            <div title="Feedback sobre a integridade do sistema" class="info-group">
                Status:
                <span class="info-data">Ok</span>
                Dependências:
                <span class="info-data"></span>
            </div>
            <div title="Contador a partir da última execução" class="info-group">
                Último auto-recover:
                <span class="info-data">25 Dias Atrás</span>
                Última captura de dados:
                <span class="info-data">3 minutos 43 segundos</span>
            </div>
            <div title="Definições de intervalos " class="info-group">
                Intervalo(auto-recover):
                <span class="info-data">30 dias</span>
                Intervalo(captura de dados):
                <span class="info-data">5 minutos</span>
            </div>
            <div title="Faixa IP para busca" class="info-group">
                Faixa incial de Busca:
                <span class="info-data">10.26.1.200</span>
                Faixa Final de Busca:
                <span class="info-data">10.26.1.300</span>
            </div>
        </div>

        <!--Container de gráficos-->
        <div class="main-dashboard">
            <nav class="period-nav">
                <a title="Indicador de período 1 Dia" id="1D" href="dashboardHome.php?1D=true">1D</a>
                <a title="Indicador de período 1 Mês" id="1M" href="dashboardHome.php?1M=true">1M</a>
                <a title="Indicador de período 5 Meses" id="5M" href="dashboardHome.php?5M=true">5M</a>
                <a title="Indicador de período 1 Ano" id="1A" href="dashboardHome.php?1A=true">1A</a>
                <a title="Indicador de período Total" id="MAX" href="dashboardHome.php?MAX=true">MAX</a>
            </nav>

            <!--Chamado aos gráficos charts-->
            <div title="Gráfico de linhas de impressões por data" id="line-chart" style="width: 100%; height: 500px;"></div>
            <div title="Gráfico de barras de impressões por impressora" id="bar-chart" style="width: 100%; height: 500px;"></div>
            <div title="Gráfico em pizza de impressões por setor" id="pie-chart" style="width: 50%; height: 500px; margin: auto;"></div>

            <script>
                /*Aplica bordar em baixo no periodo selecionado*/
                setBottonBorder('<?php echo $period;?>');
                function setBottonBorder(id){
                    document.getElementById(id).style.borderBottom = "2px solid var(--palette-D)";
                }
            </script>

            <!--Links de downloads-->
            <div class="printer-btns">
                <p title="Realizar download de arquivo em formato de planilha">Exportar Relatórios:</p>
                <p title="Planilha com o número de impressões diárias, junto ao número de impressoras ultilizadas"><a href="csvExportOne.php" class="report-btn">Tabela Geral(impressões/data)</a></p>
                <p title="Planilha com o total de impressões de cada impressora"><a href="csvExportTwo.php" class="report-btn">Tabela Impressoras(impressões/impressora)</a></p>
                <p title="Planilha com o total de impressões por setor"><a href="csvExportThree.php" class="report-btn">Tabela Setores(impressões/setor)</a></p>
            </div>

        </div>
        
        <!--Container de Histórico-->
        <div class="historic">
            <h1 title="Histórico de dados adquiridos na rede">HISTÓRICO</h1>
            <?php 
                //Importação de bloco do histórico
                require('historicBlock.php');
            ?>
        </div>
    </main>

    <footer></footer>
</body>

</html>
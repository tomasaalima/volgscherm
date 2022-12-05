<?php
    //Invoca arquivo que protege a sessão, evitando acesso sem log-in
    include("sessionprotect.php");

    //Invoca arquivo que realiza a conexão com o banco de dados
    require("db_connection.php");

    //invoca arquivo para trabalhar com os temas do sistema e suas respectivas cores
    require("systemThemeColors.php");

    /*Consulta qual o tema no banco de dados e obtem um Array[4] contendo as cores respectivas ao mesmo */
    $systemColors = getColors();

    /*Retornam valores correspondente ao momento atual (dia, mês e ano)*/
    $day = date("d");
    $month = date("m");
    $year = date("Y");

    /*Definirá o espaço de tempo que deverá ser usado como critério para algumas buscas no banco de dados*/
    $period = "5M";

    //Usadas como paramêtro para o "range" entre duas datas
    $today = $year."/".$month."/".$day;
    $date = "";

    //Atribui o periodo selecionado à $periodo 
    function setPeriod($x){
        global $period;
        $period = $x;
    }
    
    //verifica a escolha do usuário nos campos de periodo 
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
    
    //Verifica se o filtro de periodo devera ser aplicado 
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

    //Se não, retorna todos os valores no banco de dados
    }else{
        $sql = "SELECT data_execucao, SUM(novas_impressoes), COUNT(DISTINCT serial_impressora) FROM dados_impressora GROUP BY data_execucao ORDER BY data_execucao ASC";
        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
    }
    
    //Array que conterá os dados necessários para a um dos charts(gráfico de linha)
    $generalDataArray = [];

    //Preenche o array anterior com os dados correspondentes 
    while($db_data = mysqli_fetch_assoc($result)){
        $value = "'".$db_data['data_execucao']."',".$db_data['SUM(novas_impressoes)'].",".$db_data['COUNT(DISTINCT serial_impressora)'];
        array_push($generalDataArray, $value);
    }

    //Array que conterá os dados necessários para a um dos charts(gráfico de coluna) 
    $printerImpressionsArray = getImpressionsByPrinter();

    

    //Array que conterá os dados necessários para a um dos charts(gráfico de pizza)
    $sectorImpressionsArray = getImpressionsBySector();

    //Realiza consulta e retorna Array preenchido com os mesmos
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

    //Realiza consulta e retorna Array preenchido com os mesmos
    function getImpressionsBySector(){
        $array = [];

        global $date, $today, $connection;

        $sql = "SELECT i.setor, di.data_execucao, SUM(di.novas_impressoes) FROM impressora i, dados_impressora di WHERE i.serial = di.serial_impressora AND di.data_execucao BETWEEN '$date' and '$today'  GROUP BY i.setor";

        $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;

        //Percorre resultados
        while($db_data = mysqli_fetch_assoc($result)){
            $value = "'".$db_data['setor']."',".$db_data['SUM(di.novas_impressoes)'];
            array_push($array, $value);
        }

        return $array;
    }
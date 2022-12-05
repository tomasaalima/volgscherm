<?php
    //Invoca arquivo que realiza a conexão com o banco de dados
    require('db_connection.php');

    //Obtém cores respectivas ao tema gravado no banco de dados
    function getColors(){

        //Array que conterá as cores
        $systemColors = [];

        global $connection;

        //Busca tema passando o id como referência
        $systemTheme = $connection->query("SELECT tema FROM sistema WHERE id='654678786'") or die("Falha na execução do código SQL") . $connection->error;
    
        $systemData = mysqli_fetch_assoc($systemTheme);
    
        $themeName = $systemData['tema'];
    
        switch($themeName){

            //Obrtém cores para o tema Light
            case 'light':{
                $systemColors = ['#ffffff','#EBE8E7','#9CAEF5','#2D73EB'];
                break;
            }

            //Obtém cores para o tema Dark
            case 'dark':{
                $systemColors = ['#1D1E26','#202126','#737272','#889ABF'];
                break;
            }

            //Obtém cores para o tema Tech
            case 'tech':{
                $systemColors = ['#224D59','#3A8499','#58C6E5','#49A5BF'];
                break;
            }
        }

        //Retorna array preenchido com as cores 
        return $systemColors;
    }
    



   
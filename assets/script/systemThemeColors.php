<?php
    require('db_connection.php');

    function getColors(){
        $systemColors = [];

        global $connection;
        $systemTheme = $connection->query("SELECT tema FROM sistema WHERE id='654678786'") or die("Falha na execução do código SQL") . $connection->error;
    
        $systemData = mysqli_fetch_assoc($systemTheme);
    
        $themeName = $systemData['tema'];
    
        switch($themeName){
            case 'light':{
                $systemColors = ['#ffffff','#EBE8E7','#9DFFEC','#2D73EB'];
                break;
            }
            case 'dark':{
                $systemColors = ['#1D1E26','#202126','#737272','#889ABF'];
                break;
            }
            case 'tech':{
                $systemColors = ['#224D59','#3A8499','#58C6E5','#49A5BF'];
                break;
            }
        }
        return $systemColors;
    }
    



   
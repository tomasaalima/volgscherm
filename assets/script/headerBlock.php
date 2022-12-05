<?php
    //Invoca arquivo que realiza a conexão com o banco de dados
    require('db_connection.php');

    //Arrays contendo Números Seriais das impressoras com os respectivos status(0,1,2,3)
    $sts0 = [];
    $sts1 = [];
    $sts2 = [];
    $sts3 = [];


    $result = $connection->query("SELECT serial, status FROM impressora") or die("Falha na execução do código SQL") . $connection->error;

    //Levanta o status de cada impressora
    while($db_data = mysqli_fetch_assoc($result)){
        
        //Atribui o número serial ao respectivo array
        switch($db_data['status']){
            case '0':{
                array_push($sts0, $db_data['serial']);
                break;
            }
            case '1':{
                array_push($sts1, $db_data['serial']);
                break;
            }
            case '2':{
                array_push($sts2, $db_data['serial']);
                break;
            }
            case '3':{
                array_push($sts3, $db_data['serial']);
                break;
            }
        }   
    }

?>

<!--Bloco de cabeçalho ultilizado em multiplas páginas-->
<header>
    <div class='header-logo'>
        <a href="dashboardHome.php"><i id="back-icon" class="material-symbols-outlined">arrow_back</i></a>
    </div>

    <!--badges de alertas-->
    <div class='header-alert'>
        <div>
            <div title="Dispositivos com Problemas" style='background-color: rgba(255, 0, 0, 0.7);'>
                <strong class='alert'>!!</strong>
                <span class='badge'><?php echo count($sts3);?></span>
            </div>
        </div>
        <div>
            <div title="Dispositivos com Baixa Carga" style='background-color: rgba(0, 132, 255, 0.7);'>
                <strong class='alert'>BC</strong>
                <span class='badge'><?php echo count($sts1);?></span>
            </div>
        </div>
        <div>
            <div title="Novos Dispositivos" style='background-color: rgba(208, 255, 0, 0.7);'>
                <strong class='alert'>ND</strong>
                <span class='badge'><?php echo count($sts0);?></span>
            </div>
        </div>
        <div>
            <div title="Dispositivos Desativados" style='background-color: rgba(133, 125, 125, 0.7);'>
                <strong class='alert'>DD</strong>
                <span class='badge'><?php echo count($sts2);?></span>
            </div>
        </div>
    </div>

    <!--Imagem do usuário e menu hamburguer-->
    <div class='header-user'>
        <div class='user-image'>
            <img class='user-img' src='uploads/user-img.jpg' alt='imagem do usuário'>
        </div>
        <div class='line'>
            <hr>
        </div>
        <div class='triple-line-menu'>
        <i id="burguer" class="material-symbols-outlined" onclick="openMenu()">menu</i>
        <script>
            function openMenu(){
                if(menu.style.display == 'block'){
                    document.getElementById('burguer').innerHTML= 'menu';
                    menu.style.display = 'none';
                }else{
                    document.getElementById('burguer').innerHTML= 'close';
                    menu.style.display = 'block';
                }
            }
        </script>
        </div>
        
    </div>
</header>

<!--Navegação do menu Hamburguer-->
<nav id="menu-nav">
        <menu id="menu">
            <ul>
                <li>
                    <a href="systemEdit.php">
                    <i class="material-symbols-outlined">settings</i>
                    Configurações 
                    </a>
                </li>
                <li>
                    <a href="userLogout.php">
                    <i class="material-symbols-outlined">logout</i>
                    Logout 
                    </a>
                </li>
            </ul>
        </menu>
</nav>
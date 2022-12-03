<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/printers.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            .printer-object{
            width: 30%;
            border-collapse: collapse;
            padding-top: 30px;
        }

        .objects-container{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        </style>
    <title>volgscherm</title>

</head>

<body>
    <?php
    include_once('headerBlock.php');
    ?>
    <main>
        <div class="main-nav">
            <nav>
                <a href="dashboardHome.php">DashBoard</a>
                <a href="#" class="actual">Impressoras</a>
            </nav>
        </div>
        <div class="main-slots">
            <div class="search-bar">
                <form action="" method="post">
                    <input type="text" placeholder="Search..">
                    <button class="glass" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
                
            </div>
            <div class="objects-container">
                <?php
                    include('printerObject.php');
                ?>
            </div>
        </div>
        </div>
    </main>

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="teste.php?1D=true">Teste onclick</a>
    <a href="teste.php?1M=true">Teste onclick</a>
    <a href="teste.php?5M=true">Teste onclick</a>
    <a href="teste.php?1A=true">Teste onclick</a>
    <a href="teste.php?MAX=true">Teste onclick</a>
</body>
</html>

<?php
$teste = "NULL";
    function test($period){
        global $teste;
        $teste = $period;
    }
    if (isset($_POST['1D'])) {
        test("1D");
    }else if(isset($_POST['1M'])){
        test("1M");
    }else if(isset($_POST['5M'])){
        test("5M");
    }else if(isset($_POST['1A'])){
        test("1A");
    }else if(isset($_POST['MAX'])){
        test("MAX");
    }
    echo $teste;
?>


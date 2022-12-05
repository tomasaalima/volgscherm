<?php

    //verifica existência de uma sessão
    if(!isset($_SESSION)){
        session_start();
    }

    //Termina a sessão
    session_destroy();

    //Redireciona o usuário para tela de login
    header("Location: ../../index.php");

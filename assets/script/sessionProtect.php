<?php
//Verifica a existencia da sessão 
if (!isset($_SESSION)) {
    session_start();
}

//Não estando logado, o sistema bloqueia o acesso
if (!isset($_SESSION['user'])) {
    die("Você não pode acessar esta página porque não está logado. <p><a href=\"../../index.php\">Entrar</a></p>");
}

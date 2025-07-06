<?php
    session_start(); //Inicia sessão
    session_unset(); //Apaga sessão
    session_destroy(); //Destrói sessão

    header('location:out/Login.php?pagina=login'); //Redireciona para o formulário de login
    exit();
?>
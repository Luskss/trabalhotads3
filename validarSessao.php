<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header('Location: out/login.php?pagina=Login&erroLogin=naoLogado');
    exit;
}

// Verificador do tipo empresa
if (!isset($_SESSION['tipousuario']) || $_SESSION['tipousuario'] !== 'Empresa') {
    header('Location: out/login.php?pagina=Login&erroLogin=acessoProibido');
    exit;
}
?>

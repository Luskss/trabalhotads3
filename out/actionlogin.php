<?php
session_start(); // Sempre na primeira linha, antes de qualquer saída
include("../conexaoBD.php");

$quantidadeLogin = 0;

// Verifica se os campos foram enviados
if (!empty($_POST['emailusuario']) && !empty($_POST['senhausuario'])) {
    $emailUsuario = mysqli_real_escape_string($conn, $_POST['emailusuario']);
    $senhaUsuario = mysqli_real_escape_string($conn, $_POST['senhausuario']);

    $buscarLogin  = "SELECT * 
                    FROM usuario 
                    WHERE emailusuario = '{$emailUsuario}' 
                    AND senhausuario = md5('{$senhaUsuario}')";

    $efetuarLogin = mysqli_query($conn, $buscarLogin);

    if ($registro = mysqli_fetch_assoc($efetuarLogin)) {
        $quantidadeLogin = mysqli_num_rows($efetuarLogin);

        // Cria variáveis de sessão com base nos dados encontrados
        $_SESSION['idusuario']    = $registro['idusuario'];
        $_SESSION['tipousuario']  = $registro['tipousuario'];
        $_SESSION['emailusuario'] = $registro['emailusuario'];
        $_SESSION['razaosocial']  = $registro['razaosocial'];
        
        // Verifica se a coluna nomeusuario existe no BD
        if (isset($registro['idusuario'])) {
            $_SESSION['idusuario'] = $registro['idusuario'];
        }

        $_SESSION['logado'] = true;

        header('Location: ../index.php');
        exit;
    } else {
        // Login inválido
        header('Location: login.php?pagina=formLogin&erroLogin=dadosInvalidos');
        exit;
    }
} else {
    // Campos obrigatórios não preenchidos
    header('Location: login.php?pagina=formLogin&erroLogin=dadosInvalidos');
    exit;
}

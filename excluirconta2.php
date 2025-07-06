<?php
session_start();
include("conexaoBD.php");

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: formLogin.php?erroLogin=naoLogado");
    exit;
}

$idusuario = $_SESSION['idusuario'];

try {
    //Atualiza os alunos de estagiando 1 para 0
    $conn->query("UPDATE alunos
                  SET estagiando = 0
                  WHERE idusuario IN (
                  SELECT idaluno
                  FROM estagio
                  WHERE idempresa = $idusuario)");
    //Exclui tudo da empresa
    $conn->query("DELETE FROM estagio WHERE idempresa = $idusuario");
    $conn->query("DELETE FROM empresas WHERE idusuario = $idusuario");

    //Exclui o próprio usuário
    $conn->query("DELETE FROM usuario WHERE idusuario = $idusuario");

    //Confirma a transação
    $conn->commit();

    //Destroi a sessão
    session_destroy();

    //Redireciona
    header('Location: login.php?pagina=formLogin&erroLogin=contaexcluida');
    exit;

} catch (Exception $e) {
    //Cancela a transação se der erro
    $conn->rollback();

    echo "<div class='alert alert-danger'>Erro ao excluir a conta. Tente novamente mais tarde.</div>";
}
?>

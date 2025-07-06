<?php 
session_start();
include("conexaoBD.php");
include "header.php" ?>

<div class='container mt-5 mb-3'>

<?php

//Verifica o método de requisição do servidor
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $idempresa = $_SESSION['idusuario'];
        $fotocontrato = $cpfaluno = $funcao = $datainicio = $datafim = $estagiando = $salario = "";
        $erroPreenchimento = false;
        
//Validação do campo cpf
            if(empty($_POST["cpfaluno"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>CPF</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $cpfaluno = testar_entrada($_POST["cpfaluno"]);
            }
//Validação do campo funcao
            if(empty($_POST["funcao"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>FUNCAO</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $funcao = testar_entrada($_POST["funcao"]);
            }

//Validação do campo salario
            if(empty($_POST["salario"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>SALARIO</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $salario = testar_entrada($_POST["salario"]);
            }
//Validação do campo datainicio
            if(empty($_POST["datainicio"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>DATA DE INICIO CONTRATUAL</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $datainicio = testar_entrada($_POST["datainicio"]);
            }
//Validação do campo datafim
            if(empty($_POST["datafim"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>DATA DE FIM DE CONTRATO</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $datafim = testar_entrada($_POST["datafim"]);
            }

//Início da validação do campo FOTO
        $diretorio    = "contrato/"; //Define para qual diretório do sistema as imagens serão movidas
        $fotocontrato  = $diretorio . basename($_FILES["fotocontrato"]["name"]); //img/nomeDaFoto
        $erroUpload   = false; //Variável para verificar erros no upload
        $tipoDaImagem = strtolower(pathinfo($fotocontrato, PATHINFO_EXTENSION));//Converter para minúsculo e adquirir a extensão do arquivo

//Verificação e inserção da foto
    if (isset($_FILES['fotocontrato']) && $_FILES['fotocontrato']['size'] > 0) {
        if ($_FILES['fotocontrato']['size'] != 0){
    //Verificar se o tamanho do arquivo é maior do que 5MB (Em bytes)
            if($_FILES['fotocontrato']['size'] > 5000000){
                echo "<div class='alert alert-warning text-center'>
                        A <strong>FOTO</strong> não deve possuir mais do que 5MB!
                    </div>";
                $erroUpload = true;
            }

    //Verificar o tipo do arquivo (pela extensão)
            if($tipoDaImagem != "jpg" && $tipoDaImagem != "jpeg" && $tipoDaImagem != "png" && $tipoDaImagem != "webp"){
                echo "<div class='alert alert-warning text-center'>
                    A <strong>FOTO</strong> deve estar no formato JPG, JPEG, PNG ou WEBP!
                </div>";
                $erroUpload = true;
            }

    //Verifica se houve algum erro no upload
            if($erroUpload){
                echo "<div class='alert alert-warning text-center'>
                    Erro ao tentar fazer o upload da <strong>FOTO</strong>!
                </div>";
                $erroUpload = true;
            }
            else{
    //Usa a função move_uploaded_file para mover o arquivo para o diretório img
                if(!move_uploaded_file($_FILES['fotocontrato']['tmp_name'], $fotocontrato)){
                    echo "<div class='alert alert-warning text-center'>
                        Erro ao tentar mover a <strong>FOTO</strong> para o diretório $diretorio!
                    </div>";
                $erroUpload = true;
                }
            }

        }
    }

        //Se não houver erro de preenchimento ou erro de upload
        if(!$erroPreenchimento && !$erroUpload){

//Busca o id do aluno baseado no cpf fornecido
$cpfaluno = mysqli_real_escape_string($conn, $_POST['cpfaluno']);
$result = mysqli_query($conn, "SELECT idusuario FROM alunos WHERE cpf = '$cpfaluno'");

if ($row = mysqli_fetch_assoc($result)) {
    $idaluno = $row['idusuario'];
} else {
    echo "<div class='alert alert-danger text-center'>Aluno com CPF informado não encontrado.</div>";
    exit;
}

//Criar uma QUERY responsável por realizar a inserção dos dados no BD
        $inserirEstagio    ="INSERT INTO estagio (fotocontrato, funcao, salario, idempresa, idaluno, datainicio, datafinal)
                                VALUES ('$fotocontrato','$funcao','$salario','$idempresa','$idaluno','$datainicio', '$datafim') ";
        $marcarestagiado = "UPDATE alunos set estagiando = 1 WHERE idusuario = $idaluno";
        if(mysqli_query($conn, $marcarestagiado)){
            echo "<div class='alert alert-success text-center'>Aluno Marcado com Sucesso!</div>";
        }
        else{
            "<div class='alert alert-danger text-center'>
                    Erro ao tentar marcar o <strong>ALUNO</strong> na base de dados!<br>
                    <pre>" . mysqli_error($conn) . "</pre>
                </div>";;
        }
    //Pega nome do aluno
            $nomealuno = "";
            $resultaluno = $conn->query("SELECT nomealuno FROM alunos WHERE idusuario = $idaluno");
            if ($row = $resultaluno->fetch_assoc()) {
                $nomealuno = $row['nomealuno'];
            };
   // Pega nome da empresa
            $nomeempresa = "";
            $resultempresa = $conn->query("SELECT nomesocial FROM empresas WHERE idusuario = $idempresa");
            if ($row = $resultempresa->fetch_assoc()) {
                $nomeempresa = $row['nomesocial'];
            };
//Se a query for executada com sucesso, exibe mensagem e tabela
            if(mysqli_query($conn, $inserirEstagio)){
                echo "<div class='alert alert-success text-center'>Estágio Cadastrado com sucesso!</div>";
                
                echo "<div class='container mt-3'>
                        <div class='mt-3 text-center'>
                            <img src='$fotocontrato' style='width:150px' title='Foto do Contrato $fotocontrato'>
                        </div>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>Pela Empresa:</th>
                                    <td>$nomeempresa</td>
                                </tr>
                                <tr>
                                    <th>Com o Aluno:</th>
                                    <td>$nomealuno</td>
                                </tr>
                                <tr>
                                    <th>Na Função de:</th>
                                    <td>$funcao</td>
                                </tr>
                                <tr>
                                    <th>Com o Salario de:</th>
                                    <td>$salario</td>
                                </tr>
                                <tr>
                                    <th>Previsto Inicio em:</th>
                                    <td>$datainicio</td>
                                </tr>
                                <tr>
                                    <th>E com término em:</th>
                                    <td>$datafim</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                
                ";
                mysqli_close($conn); //Encerra a conexão com o banco de dados
            }
            
            //Se não conseguir inserir dados do contrato na base de dados, emite alerta danger
            else{
                echo "<div class='alert alert-danger text-center'>
                    Erro ao tentar inserir dados do <strong>CONTRATO</strong> na base de dados!<br>
                    <pre>" . mysqli_error($conn) . "</pre>
                </div>";
            }
        }
    }
    else{
        //Redireciona para a página formUsuario.php
        header("location:formcriarestagio.php");
    }

    function testar_entrada($dado){
        $dado = trim($dado); //TRIM - Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais

        return($dado);
    }

?>

</div>

<?php include "footer.php" ?>
                

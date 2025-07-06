<div class='container mt-3 mb-3'>

<?php

    //Verifica o método de requisição do servidor
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $emailusuario       = 
        $cpf                =
        $nome               =
        $senhausuario       = $confirmarsenhausuario = "";
        $erroPreenchimento  = false;

        //Validação do campo emailUsuario
            if(empty($_POST["emailusuario"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>EMAIL</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $emailusuario = testar_entrada($_POST["emailusuario"]);
            }

        //Validação do campo cpf
            if(empty($_POST["cpf"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>CPF</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $cpf = testar_entrada($_POST["cpf"]);
            }
        //Validação do campo razaosocial
            if(empty($_POST["nome"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>NOME</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $nome = testar_entrada($_POST["nome"]);
            }

        //Validação do campo senhausuario
            if(empty($_POST["senhausuario"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>SENHA</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $senhausuario = md5(testar_entrada($_POST["senhausuario"]));
            }

        //Validação do campo confirmarSenhaUsuario
            if(empty($_POST["confirmarsenhausuario"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>CONFIRMAR SENHA</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $confirmarsenhausuario = md5(testar_entrada($_POST["confirmarsenhausuario"]));
                if($senhausuario != $confirmarsenhausuario){
                    echo "<div class='alert alert-warning text-center'>
                            As <strong>SENHAS</strong> não conferem!
                        </div>";
                    $erroPreenchimento = true;
                }
            }

        //Se não houver erro de preenchimento ou erro de upload
        if(!$erroPreenchimento){
            //Inclui o arquivo de conexão com o BD
                include "../conexaoBD.php";
            //Query de criar Usuario Comum
                $inserirUsuario = "INSERT INTO usuario(emailusuario, senhausuario, tipousuario,dtcriausuario)
                                    VALUES ('$emailusuario', '$senhausuario','Aluno', NOW()) ";
                //ChatGPT ajudou a fazer a inserção
                    if (mysqli_query($conn, $inserirUsuario)) {
                        $idusuario = mysqli_insert_id($conn);
            //Query de criar Empresa
                $inserirAluno = "INSERT INTO alunos(nomealuno, CPF, estagiando, idusuario)
                                    VALUES ('$nome', '$cpf','0', $idusuario)";

            //Se a query for executada com sucesso, exibe mensagem e tabela
            if(mysqli_query($conn, $inserirAluno)){
                    
                echo "<div class='alert alert-success text-center'>Usuário(a) cadastrado(a) com sucesso!</div>";
                echo "<div class='container mt-3'>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>NOME</th>
                                    <td>$nome</td>
                                </tr>
                                <tr>
                                    <th>CPF</th>
                                    <td>$cpf</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>$emailusuario</td>
                                </tr>
                                <tr>
                                    <th>Funcionalidades do estudante finalizadas</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                ";
                mysqli_close($conn); //Encerra a conexão com o banco de dados
            }
            //Se não conseguir inserir dados do Usuário na base de dados, emite alerta danger
            else{
                echo "<div class='alert alert-danger text-center'>
                            Erro ao tentar inserir dados do <strong>Usuário</strong> na base de dados!
                        </div>";
            }
        }
    }
}
    else{
        //Redireciona para a página formUsuario.php
        header("location:formregistroaluno.php");
    }

    function testar_entrada($dado){
        $dado = trim($dado); //TRIM - Remove espaços desnecessários
        $dado = stripslashes($dado); //Remove barras invertidas
        $dado = htmlspecialchars($dado); //Converte caracteres especiais

        return($dado);
    }
    

?>

</div>

<?php include "../footer.php"?>
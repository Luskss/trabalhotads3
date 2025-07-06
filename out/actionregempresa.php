<div class='container mt-3 mb-3'>

<?php

    //Verifica o método de requisição do servidor
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Bloco para declaração de variáveis
        $emailusuario       = 
        $cnpj               =
        $razaosocial        = 
        $numerofuncionarios =
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

        //Validação do campo cnpj
            if(empty($_POST["cnpj"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>CNPJ</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $cnpj = testar_entrada($_POST["cnpj"]);
            }
        //Validação do campo razaosocial
            if(empty($_POST["razaosocial"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>RAZAO SOCIAL</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $razaosocial = testar_entrada($_POST["razaosocial"]);
            }

        //Validação do campo numerodefuncionários
            if(empty($_POST["numerofuncionarios"])){
                echo "<div class='alert alert-warning text-center'>
                        O campo <strong>NUMERO DE FUNCIONÁRIOS</strong> é obrigatório!
                    </div>
                ";
                $erroPreenchimento = true;
            }
            else{
                //Armazena o valor na variável
                $numerofuncionarios = testar_entrada($_POST["numerofuncionarios"]);
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
                                    VALUES ('$emailusuario', '$senhausuario','Empresa', NOW()) ";
                //ChatGPT ajudou a fazer a inserção
                    if (mysqli_query($conn, $inserirUsuario)) {
                        $idusuario = mysqli_insert_id($conn);
            //Query de criar Empresa
                $inserirEmpresa = "INSERT INTO empresas(nomesocial, cnpj, numerofunc, idusuario)
                                    VALUES ('$razaosocial', '$cnpj','$numerofuncionarios', $idusuario)";

            //Se a query for executada com sucesso, exibe mensagem e tabela
            if(mysqli_query($conn, $inserirEmpresa)){
                    
                echo "<div class='alert alert-success text-center'>Usuário(a) cadastrado(a) com sucesso!</div>";
                echo "<div class='container mt-3'>
                        <div class='table-responsive'>
                            <table class='table'>
                                <tr>
                                    <th>RAZAO SOCIAL</th>
                                    <td>$razaosocial</td>
                                </tr>
                                <tr>
                                    <th>CNPJ</th>
                                    <td>$cnpj</td>
                                </tr>
                                <tr>
                                    <th>NUMERO DE FUNCIONARIOS</th>
                                    <td>$numerofuncionarios</td>
                                </tr>
                                <tr>
                                    <th>EMAIL</th>
                                    <td>$emailusuario</td>
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
        header("location:formregistroempresa.php");
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
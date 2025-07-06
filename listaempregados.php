<?php 
include "validarSessao.php";
include "header.php";
include "sidenav.php"?>

<div class='container mt-3 mb-3'>

    <?php
        echo "<h3 class='text-center'>Alunos que estão contratados na sua empresa</h3>";
        
        //Query para listar TODOS os registros da tabela Produtos
        $idempresa = $_SESSION['idusuario'];

        $listaempregado = "SELECT estagio.*, alunos.nomealuno,alunos.CPF FROM estagio INNER JOIN alunos ON estagio.idaluno = alunos.idusuario WHERE idempresa = $idempresa; ";

        include("conexaoBD.php");
        //A função mysqli_query é responsável pela execução de comandos SQL no Banco de Dados
        $res = mysqli_query($conn, $listaempregado) or die ("Erro ao tentar listar Funcionarios");

        $totalempregados = mysqli_num_rows($res); //Busca o total de registros retornados pela QUERY

        echo "<div class='alert alert-info text-center'>Há <strong>$totalempregados</strong> Alunos contratados! </div>";

        //Montar o cabeçalho da tabela para exibir os registros
        echo "
            <table class='table'>
                <thead class='table-dark'>
                    <tr>
                        <th>NOME</th>
                        <th>CPF</th>
                        <th>FUNCAO</th>
                        <th>SALARIO</th>
                        <th>DATA DE INICIO</th>
                        <th>DATA DE FIM</th>
                    </tr>
                </thead>
                <tbody>
        ";

        //Enquanto houver registros, executa a função abaixo para armazenar nas variáveis
        while($registro = mysqli_fetch_assoc($res)){
            //Cria variáveis PHP e armazena os registros encontrados na tabela
            $nomealuno          = $registro['nomealuno'];
            $cpfaluno           = $registro['CPF'];
            $funcao             = $registro['funcao'];
            $salario            = $registro['salario'];
            $datainicio         = $registro['datainicio'];
            $datafim            = $registro['datafinal'];

            //Exibe os valores armazenados nas variáveis
            echo "
                <tr>
                    <td>$nomealuno</td>
                    <td>$cpfaluno</td>
                    <td>$funcao</td>
                    <td>$salario</td>
                    <td>$datainicio</td>
                    <td>$datafim</td>
                </tr>
            ";
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_close($conn); //Encerra a conexão com o banco de dados

    ?>

</div>

<?php include ("footer.php") ?>
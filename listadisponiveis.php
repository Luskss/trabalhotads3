<?php 
include "validarSessao.php";
include "header.php";
include "sidenav.php"?>

<div class='container mt-3 mb-3'>

    <?php
        echo "<h3 class='text-center'>Alunos disponiveis para contrato!</h3>";
        
        //Query para listar TODOS os registros da tabela Produtos
        $listadisponivel = "SELECT * FROM alunos WHERE estagiando = 0";

        include("conexaoBD.php");
        //A função mysqli_query é responsável pela execução de comandos SQL no Banco de Dados
        $res = mysqli_query($conn, $listadisponivel) or die ("Erro ao tentar ver alunos disponiveis");

        $totaldisponivel = mysqli_num_rows($res); //Busca o total de registros retornados pela QUERY
        if ($totaldisponivel == 0){
            echo "<div class='alert alert-info text-center'>Infelizmente não temos alunos disponíveis para estágio ;(</div>";

        }
        else{
        echo "<div class='alert alert-info text-center'>Há <strong>$totaldisponivel</strong> Alunos Disponíveis para Contrato! </div>";

        //Montar o cabeçalho da tabela para exibir os registros
        echo "
            <table class='table'>
                <thead class='table-dark'>
                    <tr>
                        <th>NOME</th>
                        <th>CPF</th>
                    </tr>
                </thead>
                <tbody>
        ";

        //Enquanto houver registros, executa a função abaixo para armazenar nas variáveis
        while($registro = mysqli_fetch_assoc($res)){
            //Cria variáveis PHP e armazena os registros encontrados na tabela
            $nomealuno        = $registro['nomealuno'];
            $cpfaluno      = $registro['CPF'];

            //Exibe os valores armazenados nas variáveis
            echo "
                <tr>
                    <td>$nomealuno</td>
                    <td>$cpfaluno</td>
                </tr>
            ";
        }
        echo "</tbody>";
        echo "</table>";
        mysqli_close($conn); //Encerra a conexão com o banco de dados
        }
    ?>

</div>

<?php include ("footer.php") ?>
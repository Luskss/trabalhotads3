<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Registro IF MAIS</title>
<!--ChatGPT ajudou muito a aprender sobre modularização-->
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Criar Conta</h3></div>
                        <div class="card-body">
                            <div class="mt-6 mb-0">
<!--Botões de Seleção da Classe do Usuário-->
                            <h3 class="text-center font-weight-light my-4">Como você se enquadra?</h3>
                                <div class="center"><a href="formregistroempresa.php" class="button buttonempresa">Empresa</a></div>
                                <div class="center"><a href="formregistroaluno.php" class="button buttonaluno">Aluno</a></div>
                                <div class="center"><button class="button disabled" disabled>Professor (WIP)</button></div>
                            </div>
<?php include "possuilogin.php"?>
<?php include "../footer.php"?>

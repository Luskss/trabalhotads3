<!DOCTYPE html>
<html lang="pt-br">
    <?php
        //Configura o fuso horário para América/São Paulo
        date_default_timezone_set('America/Sao_Paulo');
    ?>
        <!-- CDNs para Máscaras JQuery-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <head>
        <script>
            $(document).ready(function(){
                $("#cpf").mask("000.000.000-00");
            });
        </script>
    
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Registro IF MAIS</title>
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
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Bem Vindo!</h3>
                                     <h4 class="text-center font-weight-light my-4">Informações de Login</h4></div>
            <div class="card-body">
            <form action="actionregaluno.php?pagina=formregistroempresa" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="inputEmail" type="email" placeholder="nome@exemplo.com" required name="emailusuario"/>
                        <label for="inputEmail">Email</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                    </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                        <input type= "password" class="form-control" id="senhausuario" type="password" placeholder="Crie uma Senha" name="senhausuario" required/>
                        <label for="senhausuario">Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                        </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                        <input type="password" class="form-control" id="confirmarsenhausuario" type="password" name="confirmarsenhausuario" placeholder="Confirmar Senha" required/>
                        <label for="inputPasswordConfirm">Confirme sua Senha</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback"></div>
                        </div>
                    </div>
                        <div><h4 class=" text-center font-weight-light my-4">Informações Pessoais</h4></div>
                            <div class="form-floating mb-3">
                                <input type="text" maxlength="18"class="form-control" id="cpf" placeholder="000.000.000-00" name="cpf" required>
                                <label for="cpf"> CPF</label>
                                <div class="valid-feedback"></div>
                                <div class="invalid-feedback">Use o formato 000.000.000-00</div>
                            </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required>
                            <label for="nome">Nome do Aluno</label>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback"></div>
                        </div>
                            <button type="submit" class="btn btn-success">Cadastrar</button>
                        </form>
            </div>
<?php include "possuilogin.php"?>
<?php include "../footer.php"?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login - IF MAIS+</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <?php
        //Verifica se há algum parâmetro chamado 'erroLogin' sendo recebido por GET
        if(isset($_GET['erroLogin'])){
            $erroLogin = $_GET['erroLogin']; //Variável PHP recebe o parâmetro GET

            if($erroLogin == 'dadosInvalidos'){
                echo "<div class='alert alert-warning text-center'><strong>USUÁRIO ou SENHA</strong> inválidos!</div>";
            }
            if($erroLogin == 'naoLogado'){
                echo "<div class='alert alert-warning text-center'><strong>USUÁRIO</strong> não logado!</div>";
            }
            if($erroLogin == 'acessoProibido'){
                echo "<div class='alert alert-warning text-center'><strong>ACESSO NEGADO</strong></div>";

            }
            if($erroLogin == 'contaexcluida')
                echo "<div class='alert alert-warning text-center'>conta <strong>EXLUIDA</strong>com sucesso!</div>";

        }
    ?>
    
    <body class="bg-primary">
    <div id="layoutAuthentication">
    <main>
        <div class="container">
        <div class="row justify-content-center">
        <div class="col-lg-5">
        <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
        <div class="card-body">
            <form action="actionlogin.php" method="POST" class="was-validated" >
                <div class="form-floating mb-3">
                    <input class="form-control" id="emailusuario" name="emailusuario" type="email" placeholder="nome@example.com" required />
                    <label for="emailusuario">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="senhausuario" name="senhausuario" type="password" placeholder="Senha" required/>
                    <label for="senhausuario">Senha</label>
                </div>
                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <a class="small" href="password.html">Esqueceu a Senha?</a>
                    <button type="submit" class="btn btn-outline-success"><i class="bi bi-person"></i> Login</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center py-3">
        <div class="small"><a href="selectregistro.php">Criar Conta</a></div>
        </div>
        </div>
        </div>
        </div>
        </div>
    </main>
</div>
            <div id="layoutAuthentication_footer">
<?php include "../footer.php"?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>

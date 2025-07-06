<?php 
include "validarSessao.php";
include "header.php";
include "sidenav.php"?>
    <title>Criar Estagio IF MAIS</title>    
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <head>
        <script>
            $(document).ready(function(){
                $("#cpfaluno").mask("000.000.000-00");
            });
        </script>
    </head>
<body> 
<div class="container text-center mb-3 mt-3">
    
    <h2>Cadastrar Estagio</h2>
    <div class="d-flex justify-content-center mb-3">
        <div class="row">
            <div class="col-12">
                <form action="actioncriarestagio.php" method="POST" class="was-validated" enctype="multipart/form-data">
                    <div class="form-floating mb-3 mt-3">
                        <input type="file" class="form-control" id="fotocontrato" name="fotocontrato">
                        <label for="fotocontrato">Foto do Contrato</label>
                        <div class="valid-feedback">            </div>
                        <div class="invalid-feedback">          </div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="cpfaluno" placeholder="CPF do Aluno?" name="cpfaluno" required>
                        <label for="cpfaluno">CPF do Aluno</label>
                        <div class="valid-feedback">            </div>
                        <div class="invalid-feedback">USE O FORMATO 000.000.000-00</div>
                    </div>
                    <div class="form-floating mb-3 mt-3">
                        <textarea class="form-control" id="funcao" placeholder="Qual a Função do Aluno?" name="funcao" required></textarea>
                        <label for="funcao">Função</label>
                        <div class="valid-feedback">            </div>
                        <div class="invalid-feedback">          </div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="salario" placeholder="Salario do Aluno" name="salario" required>
                        <label for="salario">Salário (R$): </label>
                        <div class="valid-feedback">            </div>
                        <div class="invalid-feedback">          </div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="date" class="form-control" id="datainicio" placeholder="Data de Inicio do Contrato" name="datainicio" required>
                        <label for="datainicio">Data de Inicio do Contrato:     </label>
                        <div class="valid-feedback">            </div>
                        <div class="invalid-feedback">          </div>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="date" class="form-control" id="datafim" placeholder="Data de Fim do Contrato" name="datafim" required>
                        <label for="datafim">Data de Fim do Contrato:          </label>
                        <div class="valid-feedback">            </div>
                        <div class="invalid-feedback">          </div>
                    </div>
                    
                    <button type="submit" class="btn btn-success">Cadastrar Aluno</button>

                </form>
            </div>
        </div>
    </div>
    <br>

</div>    

</body>

<?php include "footer.php"?>          

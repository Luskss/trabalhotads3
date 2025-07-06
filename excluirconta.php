<?php 
include "validarSessao.php";
include "header.php";
include "sidenav.php"?>
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Certeza?</h1>
                        <ol class="breadcrumb mb-4">
                        <div class='alert alert-danger text-center'>
                            Esse processo é <strong>IRREVERSPIVEL!</strong>
                        </div>";
                            <form action="excluirconta2.php" method="POST">
                            <button type="submit" class="btn btn-danger">Excluir minha conta</button>
                        </form>
                    </div>
                </main>
<?php include "footer.php"?>          

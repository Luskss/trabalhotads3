<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Funcionais</div>
                            <a class="nav-link" href="formcriarestagio.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Solicitar Ajuda
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Listas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="listaempregados.php">Listar Alunos Empregados</a>
                                    <a class="nav-link" href="listadisponiveis.php">Listar Alunos Disponíveis</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="excluirconta.php">
                                Excluir Conta
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logado como:</div>
                            <?php
                            if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
                                echo "<strong>" . $_SESSION['emailusuario'] . "</strong>";
                            }
                            ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">


<!-- head -->
<?php include('../partes/head.php') ?>
<!-- fin head -->

<!-- conexion -->
<?php include('../conexion/conexion.php') ?>
<!-- fin conexion -->

<body>
    <div class="d-flex" id="content-wrapper">
        <!-- sideBar -->
        <?php include('../partes/sidebar.php') ?>
        <!-- fin sideBar -->

        <div class="w-100">

            <!-- Navbar -->
            <?php include('../partes/nav.php') ?>
            <!-- Fin Navbar -->

            <!-- Page Content -->
            <div id="content" class="bg-grey w-100">

                <section class="bg-light py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-md-8">
                                <h1 class="font-weight-bold mb-0">Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
                                <p class="lead text-muted">Revisa las últimas publicaciones</p>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-mix py-3">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <?php
                                    ///query para ver si hay publicaciones dependientes de disponibilidad:
                                    //$consulta="SELECT*FROM publicacion WHERE disponibilidad ='true'";

                                    $consulta = "SELECT*FROM publicacion"; //query de prueba

                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($mostrar = mysqli_fetch_array($resultado)) { ?>

                                        <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                            
                                            <div class="card" style="width: 18rem;">
                                                <img src="<?php print $mostrar['id_imagen']; ?>"  class="card-img-top" alt="...">
                                                <div class="card-body">
                                                <h5 class="text-muted"><?php echo $mostrar['info_post'] ?></h5>
                                                <h5 class="text-muted">Id: <?php echo $mostrar['id_post'] ?></h5>
                                                <h5 class="text-primary"><i class="fas fa-dollar-sign"></i><?php echo $mostrar['precio_post'] ?></h5>
                                                <h6 class="text-warning"><i class="fas fa-phone-square-alt"></i></span><?php echo $mostrar['contacto'] ?></h6>
                                                    <a href="../partes/publicacion.php" class="btn btn-warning">Ver mas</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!--Inicio sector scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/modal-style.css">
    <!--<script src="../assets/javascript/test.js">
    </script>-->
    <!--Fin sector scripts -->
</body>

</html>
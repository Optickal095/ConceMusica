<!-- head -->
<?php include('../partes/head.php'); ?>
<?php include('../conexion/conexion.php'); ?>
<!-- fin head -->

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
        <?php $email = $_SESSION['email']; ?>
        <section class="bg-light py-3">
          <div class="container">
            <div class="row">
              <div class="col-lg-9 col-md-8">
              </div>

            </div>
          </div>
        </section>

        <section class="bg-mix py-3">
          <div class="container-fluid">

            <?php $perfil = "SELECT * FROM usuario WHERE email_us = '$email'"; ?>
            <?php $resultadoPerfil = mysqli_query($conexion, $perfil) ?>
            <?php if ($mostrarPerfil = mysqli_fetch_array($resultadoPerfil)) { ?>
              <h1 class="text-info" style="margin-left: 2rem;"> <?php echo $mostrarPerfil['name_us'] ?> </h1>
              <br>
              <div class="row">
                <div class="col-lg-3" style="margin-left: 2rem;">
                  <img src="<?php echo $mostrarPerfil['imagen_us']; ?>" style="width:60%; height:80%">
                </div>
                <div class="col-lg-8">
                  <label for="correoPerfil" style="font-size: 1.5rem">Correo: <?php echo $mostrarPerfil['email_us']; ?></label>
                  <br>
                  <label for="descripcionPerfil" style="font-size: 1.5rem">Descripción: <?php echo $mostrarPerfil['desc_us']; ?></label>
                  <br>
                  <label for="contactoPerfil" style="font-size: 1.5rem">Contacto: <?php echo $mostrarPerfil['tel_us']; ?></label>
                  <br>
                <?php } ?>
                </div>
              </div>
          </div>
        </section>

        <br><br>
        <br><br>
        <section>
          <div class="container">
            <label for="muestra_1" style="font-size: 1.5rem">Cancion test 1:</label><br>
            <audio controls autoplay src="../assets/cancion/Muestra_1.mp3"></audio><br>
            <label for="muestra_1" style="font-size: 1.5rem">Cancion test 2:</label><br>
            <audio controls autoplay src="../assets/cancion/Muestra_2.mp3"></audio><br>
          </div>
        </section>

      </div>

    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
</body>

</html>
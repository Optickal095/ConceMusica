<?php
    include("../conexion/conexion.php");
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    session_start();
    $_SESSION['email']=$email;

    $consultaMusico="SELECT*FROM musicos WHERE email_mus='$email' AND pass_mus='$pass'";
    $resultadoMusico=mysqli_query($conexion,$consultaMusico);

    $consultaUser="SELECT*FROM usuario WHERE email_us='$email' AND pass_us='$pass'";
    $resultadoUser=mysqli_query($conexion,$consultaUser);

    if ($resultadoMusico->num_rows>0) {
        $data = mysqli_fetch_array($resultadoMusico);
        $_SESSION['nombre'] = $data['name_mus'];
        header("location:../inicio/index.php");
    }else{
        ?>
        <?php
        include('login.html')?>
        <h1 class="bad">DATOS ERRONEOS</h1>
        <?php
    }
    if ($resultadoUser->num_rows>0) {
        $data = mysqli_fetch_array($resultadoUser);
        $_SESSION['nombre'] = $data['name_us'];
        header("location:../inicio/index.php");
    }else{
        ?>
        <?php
        include('login.html')?>
        <h1 class="bad">DATOS ERRONEOS</h1>
        <?php
    }

    mysqli_free_result($resultado);
    mysqli_close($conexion);
    ?>
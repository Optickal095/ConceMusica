<?php
include('../conexion/conexion.php');

# definimos la carpeta destino
$carpetaDestino = "../assets/imagenes_publicacion/";

# si hay algun archivo que subir
if (isset($_FILES["archivo"]) && $_FILES["archivo"]["name"]) {
    # si es un formato de imagen
    if ($_FILES["archivo"]["type"] == "image/jpeg" || $_FILES["archivo"]["type"] == "image/pjpeg" || $_FILES["archivo"]["type"] == "image/png") {
        # si exsite la carpeta o se ha creado
        if (file_exists($carpetaDestino)) {
            $origen = $_FILES["archivo"]["tmp_name"];
            $destino = $carpetaDestino . $_FILES["archivo"]["name"];
            # movemos el archivo
            if (move_uploaded_file($origen, $destino)) {
                echo "<br>" . $_FILES["archivo"]["name"] . " movido correctamente";
            } else {
                echo "<br>No se ha podido mover el archivo: " . $_FILES["archivo"]["name"];
            }
        } else {
            echo "<br>No se ha encontrado la carpeta de destino:  " . $carpetaDestino;
        }
    } else {
        echo "<br>" . $_FILES["archivo"]["name"] . " - NO es imagen jpg, png";
    }
} else {
    echo "<br>No se ha subido ninguna imagen";
}

if(!empty($_POST))
{
    $output = '';
    $id_pub = mysqli_real_escape_string($conexion, $_POST["id_pub"]); 
    $titulo_pub = mysqli_real_escape_string($conexion, $_POST["titulo_pub"]);  
    $desc_pub = mysqli_real_escape_string($conexion, $_POST["desc_pub"]);  
    $tel_pub = mysqli_real_escape_string($conexion, $_POST["tel_pub"]);
    $email_pub = mysqli_real_escape_string($conexion, $_POST["email_pub"]);
    $query = " UPDATE publicacion SET titulo_pub = '$_POST[titulo_pub]', desc_pub = '$_POST[desc_pub]', tel_pub = '$_POST[tel_pub]', email_pub = '$_POST[email_pub]', imagen_pub = '$destino' WHERE id_pub = '$_POST[id_pub]'";
    if(mysqli_query($conexion, $query))
    {
     $output.= '<label class="text-success">Registro Insertado Correctamente</label>';
     header('Location: ../inicio/index.php');
    }
    echo $output;
}
?>
<?php 

if (!empty($_GET["id"])) {
    $id=$_GET["id"];
    $sql=$conexion->query(" DELETE FROM persona WHERE id_persona=$id ");
    if ($sql==1) {
        echo '<div class="alert alert-success">PERSONA ELIMINADA CORRECTAMENTE</div>';
    } else {
        echo '<div class="alert alert-danger">ERROR AL ELIMINAR</div>';
    
}

}

?>
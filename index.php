<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud en php y mysql</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <script>
        function eliminar(){
            var respuesta=confirm("¿Estas seguro que deseas eliminar?");
            return respuesta;
        }
    </script>
    <?php 
    include "modelo/conexion.php";
    include "controlador/eliminar_persona.php";
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center text-secondary">Registro de personas</h3>
            <?php
               
                include "controlador/registro_persona.php";
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
                <input type="text" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="fecha">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Correo</label>
                <input type="text" class="form-control" name="correo">
            </div>
            <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO</th>
                        <th scope="col">DNI</th>
                        <th scope="col">FECHA DE NAC</th>
                        <th scope="col">CORREO</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "modelo/conexion.php";
                        $sql=$conexion->query(" SELECT * FROM persona ");
                        while($datos=$sql->fetch_object()){ ?>
                             <tr>
                                <td><?php echo $datos->id_persona ?></td>
                                <td><?php echo $datos->nombre ?></td>
                                <td><?php echo $datos->apellido ?></td>
                                <td><?php echo $datos->dni ?></td>
                                <td><?php echo $datos->fecha_nac ?></td>
                                <td><?php echo $datos->correo ?></td>            
                                <td>
                                    <a href="modificar_persona.php?id=<?= $datos->id_persona ?>"><i class="bi bi-pencil-fill"></i></a>
                                    <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona ?>"><i class="bi bi-trash-fill" style="color: red;"></i></a>
                                </td>
                              </tr>
                    <?php } 
                    ?>
                  
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
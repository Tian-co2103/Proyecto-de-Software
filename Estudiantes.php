<!DOCTYPE html>
<?php
    include("Conexion.php");
?>
<meta charset="UTF-8">
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IBERO</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="col-md-8 col-md-offset-2" align="center">
            <h2>Gestion de Estudiantes</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form action="Estudiantes.php" method="post">
                            <div class="form-group">
                                <label>Codigo del estudiante:</label>
                                <input type="text" name="cod_estudiante" class="form-control" placeholder="Ingrese codigo"><br>
                            </div>
                            <div class="form-group">
                                <label>Nombres del estudiante:</label>
                                <input type="text" name="nombre_estudiante" class="form-control" placeholder="Ingrese nombres"><br>
                            </div>
                            <div class="form-group">
                                <label>Apellidos del estudiante:</label>
                                <input type="text" name="apellido_estudiante" class="form-control" placeholder="Ingrese apellidos"><br>
                            </div>
                            <div class="form-group">
                                <label>Correo del estudiante:</label>
                                <input type="text" name="correo_estudiante" class="form-control" placeholder="Ingrese correo"><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="crear_estudiante" class="btn btn-success" value="Crear estudiante"><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br></br>
        <div class="col-md-8 col-md-offset-2" align="center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form action="Inicio.php" method="post">
                            <div class="form-group">
                                <input type="submit" name="Inicio" class="btn btn-success" value="Volver"><br>
                            </div>
                            <br></br>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <?php
        if(isset($_POST["crear_estudiante"])){
            $codigo_e = $_POST["cod_estudiante"];
            $nombre_e = $_POST["nombre_estudiante"];
            $apellido_e = $_POST["apellido_estudiante"];
            $correo_e = $_POST["correo_estudiante"];

            $crear_e = "INSERT INTO Estudiantes(Codigo_Estudiante, Nombres, Apellidos, Correo) VALUES ('$codigo_e', '$nombre_e', '$apellido_e', '$correo_e')";

            $ejecutar = sqlsrv_query($conexion, $crear_e);

            if($ejecutar){
                echo "<script>alert('Estudiante creado con exito')</script>";
                echo "<script>window.open('Estudiantes.php', '_self')</script>";
            }
        }
        ?>
        <br>
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered table-responsive">
                <tr align="center">
                    <td>Codigo Estudiante</td>
                    <td>Nombres</td>
                    <td>Apellidos</td>
                    <td>Correo</td>
                    <td>Materia</td>
                    <td>Actualizar</td>
                    <td>Remover</td>
                </tr>   
                
                <?php
                    $consulta = "SELECT * FROM Estudiantes";

                    $ejecutar = sqlsrv_query($conexion, $consulta);
                    $i= 0;

                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $codigo_e = $fila['Codigo_Estudiante'];
                        $nombre_e = $fila['Nombres'];
                        $apellido_e = $fila['Apellidos'];
                        $correo_e = $fila['Correo'];
                        $materia_e = $fila['Materia_estudiante'];
                        $i++;
                ?>

                <tr align="center">
                    <td><?php echo $codigo_e; ?></td>
                    <td><?php echo $nombre_e; ?></td>
                    <td><?php echo $apellido_e; ?></td>
                    <td><?php echo $correo_e; ?></td>
                    <td><?php echo $materia_e; ?></td>
                    <td><a href="Estudiantes.php?editar=<?php echo $codigo_e; ?>">Editar</a></td>
                    <td><a href="Estudiantes.php?borrar=<?php echo $codigo_e; ?>">Borrar</a></td>
                </tr>  
                <?php } ?> 
            </table>    
        </div>
        <?php
            if(isset($_GET['editar'])){
                include("Editar.php");
            }
        ?>   
        <?php
            if(isset($_GET['borrar'])){
                $borrar_id = $_GET['borrar'];

                $borrar = "DELETE FROM Estudiantes WHERE Codigo_Estudiante='$borrar_id'";
                $ejecutar = sqlsrv_query($conexion, $borrar);

                if($ejecutar){
                    echo "<script>alert('El estudiante fue eliminado')</script>";
                    echo "<script>window.open('Estudiantes.php', '_self')</script>";
                }
            }
        ?>  
    </body>       
</html>
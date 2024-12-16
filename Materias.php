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
            <h2>Gestion de Materias</h2>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form action="Materias.php" method="post">
                            <div class="form-group">
                                <label>Codigo de la materia:</label>
                                <input type="text" name="cod_materia" class="form-control" placeholder="Ingrese codigo"><br>
                            </div>
                            <div class="form-group">
                                <label>Nombre de la materia:</label>
                                <input type="text" name="nombre_materia" class="form-control" placeholder="Ingrese nombre"><br>
                            </div>
                            <div class="form-group">
                                <label>Carrera:</label>
                                <input type="text" name="carrera_materia" class="form-control" placeholder="Ingrese carrera"><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="crear_materia" class="btn btn-success" value="Crear materia"><br>
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
        if(isset($_POST["crear_materia"])){
            $codigo_m = $_POST["cod_materia"];
            $nombre_m = $_POST["nombre_materia"];
            $carrera_m = $_POST["carrera_materia"];

            $crear_materia = "INSERT INTO Materias(Codigo_Materia, Nombre_Materia, Carrera) VALUES ('$codigo_m', '$nombre_m', '$carrera_m')";

            $ejecutar = sqlsrv_query($conexion, $crear_materia);

            if($ejecutar){
                echo "<script>alert('Materia creada con exito')</script>";
                echo "<script>window.open('Materias.php', '_self')</script>";
            }
        }
        ?>
        <br>
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-bordered table-responsive">
                <tr align="center">
                    <td>Codigo - Materia</td>
                    <td>Nombre - Materia</td>
                    <td>Carrera - Materia</td>
                    <td>Actualizar</td>
                    <td>Remover</td>
                </tr>   
                
                <?php
                    $consulta_m = "SELECT * FROM Materias";

                    $ejecutar = sqlsrv_query($conexion, $consulta_m);
                    $i= 0;

                    while($fila = sqlsrv_fetch_array($ejecutar)){
                        $codigo_m = $fila['Codigo_Materia'];
                        $nombre_m = $fila['Nombre_Materia'];
                        $carrera_m = $fila['Carrera'];
                        $i++;
                ?>

                <tr align="center">
                    <td><?php echo $codigo_m; ?></td>
                    <td><?php echo $nombre_m; ?></td>
                    <td><?php echo $carrera_m; ?></td>
                    <td><a href="Materias.php?editar_materias=<?php echo $codigo_m; ?>">Editar</a></td>
                    <td><a href="Materias.php?borrar_materias=<?php echo $codigo_m; ?>">Borrar</a></td>
                </tr>  
                <?php } ?> 
            </table>    
        </div>
        <?php
            if(isset($_GET['editar_materias'])){
                include("EditarMaterias.php");
            }
        ?>   
        <?php
            if(isset($_GET['borrar_materias'])){
                $borrar_materias = $_GET['borrar_materias'];

                $borrar_materias = "DELETE FROM Materias WHERE Codigo_Materia='$borrar_materias'";
                $ejecutar = sqlsrv_query($conexion, $borrar_materias);

                if($ejecutar){
                    echo "<script>alert('La Materia fue eliminado')</script>";
                    echo "<script>window.open('Materias.php', '_self')</script>";
                }
            }
        ?>  
    </body>       
</html>
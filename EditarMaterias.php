<?php
    if(isset($_GET['editar_materias'])){
        $editar_materias = $_GET['editar_materias'];

        $consulta_m = "SELECT * FROM Materias WHERE Codigo_Materia='$editar_materias'";
        $ejecutar = sqlsrv_query($conexion, $consulta_m);

        $fila = sqlsrv_fetch_array($ejecutar);

        $codigo_m = $fila['Codigo_Materia'];
        $nombre_m = $fila['Nombre_Materia'];
        $carrera_m = $fila['Carrera'];
    }
?> 
<br></br>

<div class="col-md-8 col-md-offset-2" align="center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Codigo de la materia:</label>
                                <input type="text" name="cod_materia" class="form-control" value="<?php echo $codigo_m; ?>"><br>
                            </div>
                            <div class="form-group">
                                <label>Nombre de la materia:</label>
                                <input type="text" name="nombre_materia" class="form-control" value="<?php echo $nombre_m; ?>"><br>
                            </div>
                            <div class="form-group">
                                <label>Carrera de la materia:</label>
                                <input type="text" name="carrera_materia" class="form-control" value="<?php echo $carrera_m; ?>"><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="actualizar_materia" class="btn btn-success" value="Actualizar datos"><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>

<?php
    if(isset($_POST['actualizar_materia'])){
        $actualizar_codigo = $_POST['cod_materia'];
        $actualizar_nombre = $_POST['nombre_materia'];
        $actualizar_carrera = $_POST['carrera_materia'];

        $consulta_m = "UPDATE Materias SET Codigo_Materia='$actualizar_codigo', Nombre_Materia='$actualizar_nombre', Carrera='$actualizar_carrera' WHERE Codigo_materia='$editar_materias'";
        $ejecutar = sqlsrv_query($conexion, $consulta_m);

        if($ejecutar){
            echo "<script>alert('Datos actualizados')</script>";
            echo "<script>window.open('Materias.php', '_self')</script>";
        }
    }
?> 
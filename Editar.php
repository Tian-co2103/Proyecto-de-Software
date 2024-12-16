<?php
    if(isset($_GET['editar'])){
        $editar_id = $_GET['editar'];

        $consulta = "SELECT * FROM Estudiantes WHERE Codigo_Estudiante='$editar_id'";
        $ejecutar = sqlsrv_query($conexion, $consulta);

        $fila = sqlsrv_fetch_array($ejecutar);

        $codigo_e = $fila['Codigo_Estudiante'];
        $nombre_e = $fila['Nombres'];
        $apellido_e = $fila['Apellidos'];
        $correo_e = $fila['Correo'];
        $materia_e = $fila['Materia_estudiante'];
    }
?> 
<br></br>

<div class="col-md-8 col-md-offset-2" align="center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <form action="" method="post">
                            <div class="form-group">
                                <label>Codigo del estudiante:</label>
                                <input type="text" name="cod_estudiante" class="form-control" value="<?php echo $codigo_e; ?>"><br>
                            </div>
                            <div class="form-group">
                                <label>Nombres del estudiante:</label>
                                <input type="text" name="nombre_estudiante" class="form-control" value="<?php echo $nombre_e; ?>"><br>
                            </div>
                            <div class="form-group">
                                <label>Apellidos del estudiante:</label>
                                <input type="text" name="apellido_estudiante" class="form-control" value="<?php echo $apellido_e; ?>"><br>
                            </div>
                            <div class="form-group">
                                <label>Correo del estudiante:</label>
                                <input type="text" name="correo_estudiante" class="form-control" value="<?php echo $correo_e; ?>"><br>
                            </div>
                            <div class="form-group">
                                <label>Materia del estudiante:</label>
                                <input type="text" name="materia_estudiante" class="form-control" value="<?php echo $materia_e; ?>"><br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="actualizar_estudiante" class="btn btn-success" value="Actualizar datos"><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</div>

<?php
    if(isset($_POST['actualizar_estudiante'])){
        $actualizar_codigo = $_POST['cod_estudiante'];
        $actualizar_nombre = $_POST['nombre_estudiante'];
        $actualizar_apellido = $_POST['apellido_estudiante'];
        $actualizar_correo = $_POST['correo_estudiante'];
        $actualizar_materia = $_POST['materia_estudiante'];

        $consulta = "UPDATE Estudiantes SET Codigo_Estudiante='$actualizar_codigo', Nombres='$actualizar_nombre', Apellidos='$actualizar_apellido', Correo='$actualizar_correo', Materia_estudiante='$actualizar_materia' WHERE Codigo_Estudiante='$editar_id'";
        $ejecutar = sqlsrv_query($conexion, $consulta);
      
        if($ejecutar){
            echo "<script>alert('Datos actualizados')</script>";
            echo "<script>window.open('Estudiantes.php', '_self')</script>";
        }
    }
?> 


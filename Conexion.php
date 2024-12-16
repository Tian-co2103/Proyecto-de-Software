<?php
    $servidor = "SEBAS-LAPTOP";
    $datos_servidor = array("Database"=>"Ibero","UID"=>"iberoadmin","PWD"=>"Ibero0987*","CharacterSet"=>"UTF-8");
    $conexion = sqlsrv_connect( $servidor, $datos_servidor );

    if($conexion){
        echo "Conexion exitosa";
    }else{
        echo "Fallo en la conexion";
    }
?>
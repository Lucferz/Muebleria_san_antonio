<?php
    include_once("conn.php");
    include_once("/Modelo/articulos.php");
    $conn = new conexion();
    $conn-> get_conexion();

    $articulo = new articulos(1,"descripcion", 1000, 3000, 10, true, date("d/m/y h:m:s"), null, 1);

    $articulo-> getPrecioVenta();
?>
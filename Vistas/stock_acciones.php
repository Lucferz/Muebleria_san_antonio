<?php
    include("../Controlador/ArticulosControl.php");
    include("../Controlador/categoriasControl.php") ;
    $articulos_control = new ArticulosControl();
    $categoriasControl = new CategoriasControl();

    $data = isset($_POST)? $_POST:'';

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    if(isset($_POST)){
        $data = $_POST;
        echo "<br>Entro en el primer if";
                echo "<br>Entro en eliminar";
        if ($data['id_articulo']!= null && $data['id_articulo'] != '' && !isset($data['del'])){
            echo "<br>Entro en editar";
            $articulos_control->update($data);
            echo "<br>Edito";
        } else{
            echo "<br>Entro en el else principal";
            if($data['id_articulo']!= null && $data['id_articulo'] != '' && isset($data['del']) && $data['del']=='si'){
                echo "<br>Entro en eliminar";
                $articulos_control->delete($data);
                echo "<br>Elimino";
            } else{
                echo "<br>Entro en el else secundario";
                if($data['id_articulo']== null || $data['id_articulo'] == ''){
                    echo "<br>Entro en insertar";
                    $articulos_control->create($data);
                    echo "<br>inserto";
                }
            }
        } 
        
    }

    echo "<br/><br/><br/><a href='stock.php'>Ir a Stock</a>"
?>
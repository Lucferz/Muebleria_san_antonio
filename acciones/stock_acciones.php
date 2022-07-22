<?php
    include("../Controlador/ArticulosControl.php");
    include("../Controlador/categoriasControl.php") ;
    $articulos_control = new ArticulosControl();
    $categoriasControl = new CategoriasControl();
    try{
        if(isset($_POST) && array_key_exists('id_articulo', $_POST)){
            $data = $_POST;
            if ($data['id_articulo']!= null && $data['id_articulo'] != '' && !isset($data['del'])){
                $articulos_control->update($data);
            } else{
                if($data['id_articulo']!= null && $data['id_articulo'] != '' && isset($data['del']) && $data['del']=='si'){
                    if($data['estado'] == 1){
                        $articulos_control->delete($data);
                    }else{
                        $articulos_control->reactivar($data);
                    }
                } else{
                    if($data['id_articulo']!= null && $data['id_articulo'] != '' && isset($data['entrada'])){
                        echo "Se activo el metodo entrada";
                        $articulos_control->entrada($data);
                    }else{
                        if($data['id_articulo']== null || $data['id_articulo'] == ''){
                            $articulos_control->create($data);
                        }else{
                            header("Location: ../Vistas/stock.php?error=true&errormsg=unknown_error");
                            die();
                        }
                    }
                }
            } 
            
        } 
        //echo "<br/><br/><br/><a href='../Vistas/stock.php'>Ir a Nueva Venta</a>";
        header("Location: ../Vistas/stock.php");
        die();
    }catch(Exception $e){
        header("Location: ../Vistas/stock.php?error=true&errormsg=".$e->getMessage());
        die();
    }
?>
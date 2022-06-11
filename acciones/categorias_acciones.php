<?php
    include("../Controlador/categoriasControl.php");
    $catControl = new CategoriasControl();


    if(isset($_POST) && array_key_exists('id_categoria', $_POST)){
        $data = $_POST;
        if ($data['id_categoria']!= null && $data['id_categoria'] != '' && !isset($data['del'])){
            $catControl->update($data);
        } else{
            if($data['id_categoria']!= null && $data['id_categoria'] != '' && isset($data['del']) && $data['del']=='si'){
                $catControl->delete($data);
            } else{
                if($data['id_categoria']== null || $data['id_categoria'] == ''){
                    $catControl->create($data);
                }else{
                    header("Location: categorias.php?error=true");
                    die();
                }
            }
        } 
        
    }

    //echo "<br><br><br><a href='categorias.php'>Clientes</a>"

    header("Location: ../Vistas/categorias.php");
    die();
?>
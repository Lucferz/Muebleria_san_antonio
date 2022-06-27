<?php
    include("../Controlador/categoriasControl.php");
    $catControl = new CategoriasControl();

    var_dump($_POST);   
        try{
        if(isset($_POST) && array_key_exists('id_categoria', $_POST)){
            $data = $_POST;
            if ($data['id_categoria']!= null && $data['id_categoria'] != '' && !isset($data['del'])){
                $catControl->update($data);
            } else{
                if($data['id_categoria']!= null && $data['id_categoria'] != '' && isset($data['del']) && $data['del']=='si'){
                    if($data['estado'] == 1){
                        $catControl->delete($data);
                    }else{
                        $catControl->reactivar($data);
                    }
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
    }catch(Exception $e){
        header("Location: ../Vistas/categorias.php?error=$e->getMessage()");
        die();
    }
?>
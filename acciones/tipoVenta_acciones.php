<?php
    include("../Controlador/TipoVentaControl.php");
    $tvControl = new TipoVentaControl();
    var_dump($_POST);
        try{
        if(isset($_POST) && array_key_exists('id', $_POST)){
            $data = $_POST;
            if ($data['id']!= null && $data['id'] != '' && !isset($data['del'])){
                $tvControl->update($data);
            } else{
                if($data['id']!= null && $data['id'] != '' && isset($data['del']) && $data['del']=='si'){
                    if($data['estado'] == 1){
                        $tvControl->delete($data);
                    }else{
                        $tvControl->reactivar($data);
                    }
                } else{
                    if($data['id']== null || $data['id'] == ''){
                        $tvControl->create($data);
                    }else{
                        header("Location: ../Vistas/tipo_venta.php?error=true");
                        die();
                    }
                }
            } 
            
        }

        //echo "<br><br><br><a href='../Vistas/tipo_venta.php'>Volver</a>";

        header("Location: ../Vistas/tipo_venta.php");
        die();
    }catch(Exception $e){
        header("Location: ../Vistas/tipo_venta.php?error=".$e->getMessage());
        die();
    }
?>
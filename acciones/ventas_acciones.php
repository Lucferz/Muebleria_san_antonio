<?php 
//importaciones y declaraciones de tablas utilizadas
    require_once("../Controlador/ventasControl.php");
    $venCon = new ventasControl();
    $data = isset($_POST)? $_POST:'';
    $anulado = false;
    try{
        if(isset($_POST)&& array_key_exists('id_venta', $_POST)){
            $data = $_POST;
            if ($data['id_venta']!= null && $data['id_venta'] != '' && !isset($data['del'])){
                $venCon->update($data);
            } else{
                echo "<br>Entro en el else principal";
                if($data['id_venta']!= null && $data['id_venta'] != '' && isset($data['del']) && $data['del']=='si'){
                    $anulado = true;
                    $venCon->delete($data);
                    header("Location: ../Vistas/ventas.php");
                    die();
                } else{
                    if($data['id_venta']== null || $data['id_venta'] == ''){
                        if ( array_key_exists("fk_tipo_comprobante", $data)){
                            $data['fk_tipo_comprobante']= 1;
                        }else{
                            $data['fk_tipo_comprobante']= 2;
                        }
                        $venCon->create($data);
                    }
                }
            } 
            
        }
        // echo "<br/><br/><br/><a href='../Vistas/NuevaVenta.php'>Ir a Nueva Venta</a>";
        header("Location: ../Vistas/NuevaVenta.php");
        die();
    }catch(Exception $e){
        if ($anulado){
            header("Location: ../Vistas/ventas.php?error=true&errormsg=".$e->getMessage());
        }else{
            header("Location: ../Vistas/NuevaVenta.php?error=true&errormsg=".$e->getMessage());
        }
        
        die();
    }
?>
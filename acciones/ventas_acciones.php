<?php 
//importaciones y declaraciones de tablas utilizadas
    require_once("../Controlador/ventasControl.php");
    $venCon = new ventasControl();
    $data = isset($_POST)? $_POST:'';

    try{
        if(isset($_POST)&& array_key_exists('id_venta', $_POST)){
            $data = $_POST;
            echo "<br>Entro en el primer if";
            if ($data['id_venta']!= null && $data['id_venta'] != '' && !isset($data['del'])){
                // echo "<br>Entro en editar";
                // $venCon->update($data);
                // echo "<br>Edito";
                echo "Aqui ver para actualizar";
            } else{
                echo "<br>Entro en el else principal";
                if($data['id_venta']!= null && $data['id_venta'] != '' && isset($data['del']) && $data['del']=='si'){
                    echo "<br>Entro en eliminar";
                    $venCon->delete($data);
                    echo "<br>Elimino";
                    header("Location: ../Vistas/ventas.php");
                    die();
                } else{
                    echo "<br>Entro en el else secundario";
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
        header("Location: ../Vistas/NuevaVenta.php?error=".$e->getMessage());
        die();
    }
?>
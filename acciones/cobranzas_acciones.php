<?php
    include("../Controlador/CobranzasControl.php");
    $cobControl = new CobranzasControl();

    var_dump($_POST);   
    try{
        if(isset($_POST) && array_key_exists('id_cobranza', $_POST)){
            $data = $_POST;
            if ($data['id_cobranza']!= null && $data['id_cobranza'] != '' && !isset($data['aplazo'])){
                $cobControl->update($data);
            } else{
                if($data['id_cobranza']!= null && $data['id_cobranza'] != '' && isset($data['aplazo']) && $data['aplazo']="si"){
                    $cobControl->aplazar_cobro($data['id_cobranza']);
                }else{
                    header("Location: ../Vistas/cobranzas.php?error=true");
                    die();
                }
            }
            
        }

        ///echo "<br><br><br><a href='../Vistas/cobranzas.php'>Cobranzas</a>";

        header("Location: ../Vistas/cobranzas.php");
        die();
    }catch(Exception $e){
        header("Location: ../Vistas/cobranzas.php?error=".$e->getMessage());
        die();
    }
?>
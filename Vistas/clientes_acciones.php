<?php
    include("../Controlador/ClientesControl.php");
    $clientes_control = new ClientesControl();
    

    if(isset($_POST) && array_key_exists('id_cliente', $_POST)){
        $data = $_POST;
        if ($data['id_cliente']!= null && $data['id_cliente'] != '' && !isset($data['del'])){
            $clientes_control->update($data);
        } else{
            if($data['id_cliente']!= null && $data['id_cliente'] != '' && isset($data['del']) && $data['del']=='si'){
                if($data['estado'] == 1){
                    $clientes_control->delete($data);
                }else{
                    $clientes_control->reactivar($data);
                }
            } else{
                if($data['id_cliente']== null || $data['id_cliente'] == ''){
                    $clientes_control->create($data);
                }else{
                    header("Location: Cliente.php?error=true");
                    die();
                }
            }
        } 
        
    }

    //echo "<br><br><br><a href='Cliente.php'>Clientes</a>"

    header("Location: Cliente.php");
    die();
?>
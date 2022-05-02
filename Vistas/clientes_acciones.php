<?php
    include("../Controlador/ClientesControl.php");
    $clientes_control = new ClientesControl();

    $data = isset($_POST)? $_POST:'';

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    if(isset($_POST)){
        $data = $_POST;
        echo "<br>Entro en el primer if";
                echo "<br>Entro en eliminar";
        if ($data['id_cliente']!= null && $data['id_cliente'] != '' && !isset($data['del'])){
            echo "<br>Entro en editar";
            $clientes_control->update($data);
            echo "<br>Edito";
        } else{
            echo "<br>Entro en el else principal";
            if($data['id_cliente']!= null && $data['id_cliente'] != '' && isset($data['del']) && $data['del']=='si'){
                echo "<br>Entro en eliminar";
                $clientes_control->delete($data);
                echo "<br>Elimino";
            } else{
                echo "<br>Entro en el else secundario";
                if($data['id_cliente']== null || $data['id_cliente'] == ''){
                    echo "<br>Entro en insertar";
                    $clientes_control->create($data);
                    echo "<br>inserto";
                }
            }
        } 
        
    }

    echo "<br/><br/><br/><a href='vistaCliente.php'>Ir a Cliente</a>"
?>
<?php 
include("../Controlador/usuariosControl.php");
include("../Controlador/TipoUsuarioControl.php") ;
$usuarios_control = new UsuariosControl();
$tipousuarioControl = new tipousuarioControl();

    $data = isset($_POST)? $_POST:'';

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    if(isset($_POST)){
        $data = $_POST;
        echo "<br>Entro en el primer if";
                echo "<br>Entro en eliminar";
        if ($data['id_usuario']!= null && $data['id_usuario'] != '' && !isset($data['del'])){
            echo "<br>Entro en editar";
            $usuarios_control->update($data);
            echo "<br>Edito";
        } else{
            echo "<br>Entro en el else principal";
            if($data['id_usuario']!= null && $data['id_usuario'] != '' && isset($data['del']) && $data['del']=='si'){
                echo "<br>Entro en eliminar";
                $usuarios_control->delete($data);
                echo "<br>Elimino";
            } else{
                echo "<br>Entro en el else secundario";
                if($data['id_usuario']== null || $data['id_usuario'] == ''){
                    echo "<br>Entro en insertar";
                    $usuarios_control->create($data);
                    echo "<br>inserto";
                }
            }
        } 
        
    }

    echo "<br/><br/><br/><a href='usuario.php'>Ir a Usuario</a>"
?>
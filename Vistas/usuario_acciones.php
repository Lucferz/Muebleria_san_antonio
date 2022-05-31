<?php 
include("../Controlador/usuariosControl.php");
include("../Controlador/TipoUsuarioControl.php") ;
$usuarios_control = new UsuariosControl();
$tipousuarioControl = new tipousuarioControl();

    if(isset($_POST)){
        $data = $_POST;
        if ($data['id_usuario']!= null && $data['id_usuario'] != '' && !isset($data['del'])){
            $usuarios_control->update($data);
        } else{
            if($data['id_usuario']!= null && $data['id_usuario'] != '' && isset($data['del']) && $data['del']=='si'){
                $usuarios_control->delete($data);
            } else{
                if($data['id_usuario']== null || $data['id_usuario'] == ''){
                    $usuarios_control->create($data);
                }
            }
        } 
        
    }

    header("Location: usuario.php");
    die();
?>
<?php 
include("../Controlador/usuariosControl.php");
include("../Controlador/TipoUsuarioControl.php") ;
$usuarios_control = new UsuariosControl();
$tipousuarioControl = new tipousuarioControl();
var_dump($_POST);
    try{
        if(isset($_POST) && array_key_exists('id_usuario', $_POST)){
            $data = $_POST;
            if ($data['id_usuario']!= null && $data['id_usuario'] != '' && !isset($data['del'])){
                $usuarios_control->update($data);
            } else{
                if($data['id_usuario']!= null && $data['id_usuario'] != '' && isset($data['del']) && $data['del']=='si'){
                    if($data['estado'] == 1){
                        $usuarios_control->delete($data);
                    }else{
                        $usuarios_control->reactivar($data);
                    }
                } else{
                    if($data['id_usuario']== null || $data['id_usuario'] == ''){
                        $usuarios_control->create($data);
                    }else{
                        header("Location: ../Vistas/usuario.php?error=true");
                        die();
                    }
                }
            } 
            
        }

        header("Location: ../Vistas/usuario.php");
        die();
    }catch(Exception $e){
        header("Location: ../Vistas/usuario.php?error=".$e->getMessage());
        die();
    }
?>
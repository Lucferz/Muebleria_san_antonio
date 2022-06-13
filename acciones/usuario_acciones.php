<?php 
include("../Controlador/usuariosControl.php");
include("../Controlador/TipoUsuarioControl.php") ;
$usuarios_control = new UsuariosControl();
$tipousuarioControl = new tipousuarioControl();
var_dump($_POST);

    if(isset($_POST) && array_key_exists('id_usuario', $_POST)){
        echo "llego 1";
        $data = $_POST;
        if ($data['id_usuario']!= null && $data['id_usuario'] != '' && !isset($data['del'])){
            echo "llego2";
            $usuarios_control->update($data);
            echo "llego3";
        } else{
            if($data['id_usuario']!= null && $data['id_usuario'] != '' && isset($data['del']) && $data['del']=='si'){
                echo "llego4";
                if($data['estado'] == 1){
                    echo "llego5";
                    $usuarios_control->delete($data);
                    echo "llego6";
                }else{
                    echo "llego7";
                    $usuarios_control->reactivar($data);
                    echo "llego8";
                }
            } else{
                echo "llego9";
                if($data['id_usuario']== null || $data['id_usuario'] == ''){
                    echo "llego10";
                    $usuarios_control->create($data);
                    echo "llego11";
                }else{
                    echo "llego12";
                    header("Location: usuario.php?error=true");
                    echo "llego13";
                    die();
                }
            }
        } 
        
    }

    // header("Location: ../Vistas/usuario.php");
    // die();
?>
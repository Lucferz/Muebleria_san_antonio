<?php 
//importaciones y declaraciones de tablas utilizadas

    $data = isset($_POST)? $_POST:'';

    echo "<pre>";
    var_dump($data);
    echo "</pre>";

    // if(isset($_POST)&& array_key_exists('colocar id de venta', $_POST)){
    //     $data = $_POST;
    //     echo "<br>Entro en el primer if";
    //     if ($data['id_usuario']!= null && $data['id_usuario'] != '' && !isset($data['del'])){
    //         // echo "<br>Entro en editar";
    //         // $usuarios_control->update($data);
    //         // echo "<br>Edito";
    //         echo "Aqui ver para actualizar";
    //     } else{
    //         echo "<br>Entro en el else principal";
    //         if($data['id_usuario']!= null && $data['id_usuario'] != '' && isset($data['del']) && $data['del']=='si'){
    //             echo "<br>Entro en eliminar";
    //             $usuarios_control->delete($data);
    //             echo "<br>Elimino";
    //             echo "Aqui ver para eliminar";
    //         } else{
    //             echo "<br>Entro en el else secundario";
    //             if($data['id_usuario']== null || $data['id_usuario'] == ''){
    //                 echo "<br>Entro en insertar";
    //                 $usuarios_control->create($data);
    //                 echo "<br>inserto";
    //             }
    //         }
    //     } 
        
    // }

    echo "<br/><br/><br/><a href='../Vistas/NuevaVenta.php'>Ir a Nueva Venta</a>"
?>
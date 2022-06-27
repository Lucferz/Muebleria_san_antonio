<?php


    if (!isset($_GET['table'])){
        echo '{"error": "la peticion no se hizo de manera correcta",
                "cod" : "NO_TABLE"}';
        die();
    }

    switch ($_GET['table']) {
        case 'stock':
            include_once("../Controlador/ArticulosControl.php");
            $controlador = new ArticulosControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            if (array_key_exists('id',$_GET)) {
                $datos_busqueda = $controlador->read($_GET['id']);
                echo json_encode($datos_busqueda);
            }
            break;
        case 'categorias':
            include_once("../Controlador/categoriasControl.php");
            $controlador = new CategoriasControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            break;
        case 'clientes':
            include_once("../Controlador/ClientesControl.php");
            $controlador = new ClientesControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            break;
        case 'usuarios':
            include_once("../Controlador/usuariosControl.php");
            $controlador = new UsuariosControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            break;
        case'tipoUsuario':
            include_once("../Controlador/TipoUsuarioControl.php");
            $controlador = new TipoUsuarioControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            break;
        case'cobranzas':
            include_once("../Controlador/CobranzasControl.php");
            $controlador = new CobranzasControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            break;
        case'ventas':
            include_once("../Controlador/ventasControl.php");
            $controlador = new VentasControl();
            if(array_key_exists('search_key',$_GET)){
                $datos_busqueda = $controlador->buscar($_GET['search_key']);
                echo $datos_busqueda;
            }
            break;
        default:
            echo '{"error": "la peticion no se hizo de manera correcta",
                "cod" : "TABLE_NOT_FOUND"}';
            break;
    }

    

?>
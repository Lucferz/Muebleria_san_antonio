<?php
    require_once("../Controlador/sessionControl.php");
    $bien = 'lucas';
    $mal = "lucas ";
    
    echo '<br>BIEN<br>'.$bien.'<br>MAL<br>'.$mal.'<br>';

    $validar = new sessionControl();
    $prueba1 =$validar->login('Luc', 'lucas');
    echo "<pre>";
    var_dump($prueba1);
    echo "<br><br>";
    $validar2 = new sessionControl();
    $prueba2 = $validar2->login('Luc', ' lucas');
    var_dump($prueba2);
    echo "</pre>";

?>
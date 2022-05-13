<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Ventas</title>

   <link rel="stylesheet" type="text/css" href="../public/assets/css/estiloventas.css">
   <link rel="stylesheet" type="text/css" href="../public/assets/css/styles.css">

</head>
<body>
         <form method="POST" class="ventas-form" action="" id="">
           
            <select id="usuarios-select" name="usuarios" class="usuarios-select"><!--Aca hacer el read de Categorias-->
               <option value="no_select">Usuario Fulano</option> 
            </select>   
            <br/> 
            <br/>        
            <img src="../public/assets/img/santo.jpg" class="img_logo" >
            <h1 class="titulo-modal">Muebleria San Antonio</h1>
            
            <p>Cliente</p>
                     <div class="flexsearch--input-wrapper"> <!--esta parte no se si esta correcto-->
                        <input class="flexsearch--input" type="search" placeholder="search">
                     </div>
                     
            
            <p>Articulo</p>
                     <div class="flexsearch--input-wrapper"> <!--esta parte no se si esta correcto-->
                        <input class="flexsearch--input" type="search" placeholder="search">
                     </div>
                     <input class="flexsearch--submit" type="submit" value="&#10140;"/>
            <p>Entrega</p>
            <input type="text" name="entrega" class="box" required> <br/>
            <br/>
            <span>Cuotas</span>
            <select id="cuotas-select" name="cuotas" class="cuotas-select" ><!--Aca hacer el read de Categorias-->
               <option value="no_select">Seleccione una cuota</option>
               <option value="value1">3</option>
               <option value="value1">6</option>
               <option value="value3">12</option>
            </select>

            <p>Descuento</p>
            <input type="text" name="descuento" class="box" >
            <br> 
            <input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">Generar Boleta</label>

            <p class="center-content">
            <input type="submit" class="btn-azul" value="Confirmar Venta"/>
            </p>

         </form>
</body>
</html>
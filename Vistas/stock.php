<?php include("includes/header.html"); ?>
   <div id="cuerpo">
      <div id="cabecera-botones">
         <div class="flexsearch">
               <div class="flexsearch--wrapper">
                  <form class="flexsearch--form" action="" method="post">
                     <div class="flexsearch--input-wrapper">
                        <input class="flexsearch--input" type="search" placeholder="search">
                     </div>
                     <input class="flexsearch--submit" type="submit" value="&#10140;"/>
                  </form>
               </div>
         </div>
         <div id="articulos-buttons-container">
            <button class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo Articulo</button>
            <button class="btn-informe"><ion-icon name="document-text-outline"></ion-icon> Informe de Inventario</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   
<?php include("includes/footer.html"); ?>
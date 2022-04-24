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
            <button id="addNew" class="btn-pretty"><ion-icon name="add-outline"></ion-icon> Nuevo Articulo</button>
            <button class="btn-informe"><ion-icon name="document-text-outline"></ion-icon> Informe de Inventario</button>
         </div>
      </div>
      <div id="tabla">
      </div>
   </div>
   <!-- The Modal -->
	<div id="myModal" class="modal">
      <!-- Modal content -->
      <div class="modal-content">
         
         <form action="" method="POST" class="modal-form">
            <span class="close"><ion-icon name="close-outline"></ion-icon></span>
            <h1 class="titulo-modal">Nuevo Cliente</h1>
            
            <p>Cliente:</p>
            <input type="text" class="field"> <br/>

            <p>CI:</p>
            <input type="text" class="field"> <br/>

            <p>RUC:</p>
            <input type="text" class="field"> <br/>

            <p>Telefono:</p>
            <input type="text" class="field"> <br/>

            <p>Direccion:</p>
            <input type="text" class="field"> <br/>

            <p class="center-content">
            <input type="submit" class="btn-pretty" value="GUARDAR"/>
            </p>

         </form>
      </div>
   </div>
   
<?php include("includes/footer.html"); ?>
<?php
/*
Template Name: Trámites listado
*/


//Cargo campos pie de pagina
$fields = get_fields(36);

get_header(); ?> 



<div class="listado-contenidos">
 <!--breadcrum-->
   <div class="breadcrum-bar">
      <ol class="list">
         <li class="item"><a href="#" class="link">INICIO</a></li>
         <li class="item">Atención al público</li>
      </ol>
   </div>
   <!--breadcrum-->


   <div class="grid-ctn">
      <div class="col-left">
         <h1 class="title">ATENCIÓN AL PÚBLICO</h1>
         <span class="subtitle">Ahora los empleadores de la construcción pueden realizar sus pagos a través de nuestro sitio web. Sólo tienen que ingresar en el Sistema de Pagos, seleccionar el ítem e importe a pagar y luego elegir cualquiera de los medios de pago disponibles.</span>
        

         <div class="grid-information-ctn">
            <div class="icon-ctn">
            	<div class="filetype-size">
                    <span class="filetype file">pdf</span>
                    <span class="size">148,4KB</span>
                </div>
            </div>
            <div class="info-ctn">
               <span class="title-data"><a href="#">Escríbanos</a></span>
               <span class="txt-data">Le responderemos a la brevedad</span>
            </div>
         </div>

      </div>
      <div class="col-right">
         
         
      	<section class="other-contents">
		    <h2 class="title">Otros contenidos que podrian interesarte</h2>
		    <div class="row-contents">
		       <a href="<?=$fields['modulo_abajo_1_link']?>" class="item" style="background-image: url('<?=$fields['modulo_abajo_1_imagen']['sizes']['medium']?>');">
		          <div class="info">
		             <span class="txt"><?=$fields['modulo_abajo_1_titulo']?></span>
		             <span class="link">Ver mas</span>
		          </div>
		       </a>
		       <a href="<?=$fields['modulo_abajo_2_link']?>" class="item" style="background-image: url('<?=$fields['modulo_abajo_2_imagen']['sizes']['medium']?>');">
		          <div class="info">
		             <span class="txt"><?=$fields['modulo_abajo_2_titulo']?></span>
		             <span class="link">Ver mas</span>
		          </div>
		       </a>
		    </div>
		 </section>


      </div>
   </div>
</div>

 
 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/*
Template Name: Atención al público
*/



//Campos adicionales
$fields = get_fields(get_the_ID());


//Contenido de la pagina
$args=array(
    'page_id' => get_the_ID()
);

$the_query = new WP_Query($args);
$data = $the_query->posts[0];


get_header(); ?> 

<div class="atencion-al-cliente">
             <!--breadcrum-->
               <div class="breadcrum-bar">
                  <ol class="list">
                     <li class="item"><a href="#" class="link">INICIO</a></li>
                     <li class="item"><?=$data->post_title?></li>
                  </ol>
               </div>
               <!--breadcrum-->


               <div class="grid-ctn">
                  <div class="col-left">
                     <h1 class="title"><?=$data->post_title?></h1>
                     <span class="subtitle"><?=$data->post_content?></span>
                     <span class="title-2"><?=$fields['titulo']?></span>
                     <p class="intro"><?=$fields['sub-titulo']?></p>

                     <div class="grid-information-ctn">
                        <div class="icon-ctn"><i class="icon fas <?=$fields['email_icono']?>"></i></div>
                        <div class="info-ctn">
                           <?=str_replace("<br />", "", $fields['email_box']);?>
                        </div>
                     </div>

                     <div class="grid-information-ctn">
                        <div class="icon-ctn"><i class="icon fas <?=$fields['telefono_icono']?>"></i></div>
                        <div class="info-ctn">
                           <?=$fields['telefono_box']?>
                        </div>
                     </div>

                     <div class="grid-information-ctn offices">
                        <div class="icon-ctn"><i class="icon fas <?=$fields['ubicacion_icono']?>"></i></div>
                        <div class="info-ctn">
                           <?=str_replace("<br />", "", $fields['ubicacion_box']);?>
                        </div>
                     </div>
                  </div>
                  <div class="col-right">
                     <span class="title"><?=$fields['mapa_titulo']?></span>
                     <div class="map">
                        <iframe src="<?=$fields['mapa_iframe']?>" width="100%" height="280px" frameborder="0" style="border:0" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
         </div>



 
 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php
/**
 * 
 * 
 * 
 * Template Name: Home
 * 
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ieric
 */




//Modulos inicio x 4 + texto destacado
//Página de inicio
$fields = get_fields($post->ID);



//Listado de noticias destacadas
$args=array(
    'orderby'   => 'date',
    'order' => 'DESC', 
    'post_type' => 'destacados'
);
$destacados = new WP_Query($args);



get_header();

?>
 <div class="banner-jumbo" style="background-image:url('<?=$fields['imagen']['url']?>');">
 </div>
	<!--tramites-->
     <section class="tramites-row">
        <div  class="title-ctn">
           <h2 class="title"><?=$fields['titulo']?></h2>
        </div>
        <div class="items-row">

          <?php foreach($fields['listado_modulos_tramites'] as $modules): ?>
         
            <div class="item">
               <div class="icon-circle"><i class="icon fa <?=$modules['icono']?>"></i></div>
               <p><span><?=str_replace("</p>", "", str_replace("<p>", "", $modules['titulo']))?></p>
               <a class="cover-link" href="<?=$modules['link']?>" title="Sistema web acceso directo"></a>
            </div>
          
          <?php endforeach ?>

        </div>
        <p class="acceso"><i class="icon fas fa-caret-right"></i><a href="<?= get_permalink(36) ?>">Acceder a la sección Trámites</a></p>
     </section>


     <div class="starred-and-access-row">
         <section class="starred-col">
            <h2 class="title">Destacados</h2>
            <p class="subtitle">Resoluciones y noticias relevantes del sector de la construcción</p>
            <div class="starred-news vertical-slider swiper-container">
               <div class="swiper-wrapper">


                  <?php foreach($destacados->posts as $post):
                     $img = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb', true );
                     //$terms = get_the_terms( $post->ID , 'destacados' );
                     $titulo_secundario = '';
                     $titulo_secundario = get_field("titulo_secundario", $post->ID);  
                     ?>

                     <article class="item-news swiper-slide">
                        <div class="img" style="background-image: url('<?= $img[0]?>');"></div>
                        <a href="<?=get_post_permalink()?>" class="info-news">
                           <?php if($titulo_secundario): ?>
                              <span class="category"><?=$titulo_secundario?></span>
                           <?php endif?>
                           
                           <h3 class="main-title"><?=$post->post_title?></h3>
                           <p class="description"><?=$post->post_excerpt?></p>
                        </a>
                     </article>

                 <?php endforeach?>

               </div>
            </div>
            <div class="footer-starred">
               <span class="next-btn swiper-button-next"><i class="icon fa fa-caret-down"></i></span>
               <a href="#" class="btn"><i class="icon fa fa-caret-right"></i> Ver todos los destacados</a>
            </div>
         </section>
         <section class="access-col">
            <h2 class="title">Accesos Directos</h2>
            <ul class="lista">
               
               <?php foreach($fields['acceso_directo'] as $row): ?>
                  <li class="item"><a href="<?= $row['acceso_enlace'] ?>"><i class="icon fa fa-caret-right"></i> <?= $row['acceso_nombre_enlace'] ?></a></li>   
               <?php endforeach?>
          
            </ul>
         </section>
      </div>


     <section class="links-row">
     
         <?php foreach($fields['listado_modulos_abajo'] as $modules): ?>
            <a href="#" class="item-link"
               style="background-color: <?=$modules['color']?>; background-image: url('<?=$modules['imagen']['sizes']['medium']?>')">
               <div class="info">
                  <span class="title"><?=$modules['titulo']?></span>
                  <span class="more"><i class="icon fa fa-caret-right"></i> Ver más</span>
               </div>
            </a>
         <?php endforeach ?>

     </section>
     <div class="tel">Podés realizar tu denuncia al: <span><?=$fields['telefono_emergencias']?></span></div>
<?php
//get_sidebar();
get_footer();
?>

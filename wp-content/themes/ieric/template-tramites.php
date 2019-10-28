<?php
/*
Template Name: Tramites Principal
*/

global $post;


//Contenido de la pagina TRAMITES
$args=array(
    'page_id' => $post->ID
);

//Cargo campos pie de pagina
$fields = get_fields($post->ID);



$the_query = new WP_Query($args);


$data = $the_query->posts[0];


//Sub categorias de SISTEMA DE PAGOS
$terms_sistema_pagos = get_terms( array(
    'taxonomy' => 'tramite',
    'hide_empty' => false,
    'parent'   => 3,
    'orderby' => 'ID',
    'order' => 'ASC',
));


//Sub categorias de TRÁMITES PRINCIPALES
$terms_tramites_principales = get_terms( array(
    'taxonomy' => 'tramite',
    'hide_empty' => false,
    'parent'   => 9,
    'orderby' => 'ID',
    'order' => 'ASC',
));

//Listado de OTROS TRÁMITES
$args = array(
    'post_type' => 'tramites',
    'cat' => '13',
);

$the_query = new WP_Query($args);



get_header(); ?> 

<!--breadcrum-->
 <div class="breadcrum-bar">
    <ol class="list">
       <li class="item"><a href="#" class="link">INICIO</a></li>
       <li class="item"><?=$data->post_title?></li>
    </ol>
 </div>
 <!--breadcrum-->

 <section class="tramites">
    <h1 class="title"><?=$data->post_title?></h1>
    <span class="subtitle"><?=$data->post_content?></span>
    <div class="row-items">
       <!--item-->
       <article class="item">
          <div class="img-ctn">
             <div class="icon-ctn">
                <i class="icon fas fa-wallet"></i>
             </div>
          </div>
          <div class="info-ctn">
             <h2 class="title">SISTEMA DE PAGOS</h2>
             <ul class="list">
                <?php foreach($terms_sistema_pagos as $term): 
                    $tipo = get_field('tipo', "term_".$term->term_id);
                    $link = get_field('link_externo', "term_".$term->term_id);?>

                    <?php if($tipo == "Contenido"): ?>
                        <li class="item"><a href="<?=get_term_link($term->term_id)?>" class="link"><?=$term->name?></a></li>
                    <?php else: ?>
                        <li class="item"><a href="<?=$link?>" target="_blank" class="link"><?=$term->name?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
             </ul>
          </div>
       </article>

       <article class="item">
          <div class="img-ctn">
             <div class="icon-ctn">
                <i class="icon fas fa-link"></i>
             </div>
          </div>
          <div class="info-ctn">
             <h2 class="title">TRÁMITES PRINCIPALES</h2>
             <ul class="list">
                <?php foreach($terms_tramites_principales as $term): ?>
                    <?php if($tipo == "Contenido"): ?>
                        <li class="item"><a href="<?=get_term_link($term->term_id)?>" class="link"><?=$term->name?></a></li>
                    <?php else: ?>
                        <li class="item"><a href="<?=$link?>" target="_blank" class="link"><?=$term->name?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
             </ul>
          </div>
       </article>

       <article class="item">
          <div class="img-ctn">
             <div class="icon-ctn">
                <i class="icon fas fa-pen-alt"></i>
             </div>
          </div>
          <div class="info-ctn">
             <h2 class="title">OTROS TRÁMITES</h2>
             <ul class="list">
                <?php foreach($terms_otros as $term): ?>
                    <?php if($tipo == "Contenido"): ?>
                        <li class="item"><a href="<?=get_term_link($term->term_id)?>" class="link"><?=$term->name?></a></li>
                    <?php else: ?>
                        <li class="item"><a href="<?=$link?>" target="_blank" class="link"><?=$term->name?></a></li>
                    <?php endif; ?>
                <?php endforeach; ?>
             </ul>
          </div>
       </article>
    </div>
 </section>

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



 
 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
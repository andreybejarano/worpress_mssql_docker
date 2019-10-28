<?php
/*
Template Name: Plantilla de contenido
*/

global $post;

$imagenes = get_field('imagenes');

get_header(); ?> 


    <div class="main-columns-holder">
        <div class="left-column">
            <!--breadcrum-->
            <?php get_breadcrumb(); ?>
            <!--breadcrum-->
            <div class="row-info">
                <h1 class="title"><?php the_title(); ?></h1>
            </div>

            <div class="left-column-info">

            <div class="top-content">
                <p><?= get_field('subtitulo');  ?></p>
            </div>

            <?php if($imagenes): ?>
                <div class="gallery-holder">
                    <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach($imagenes as $image):?>

                        <div class="swiper-slide">
                            <figure>
                                <img src="<?= $image['sizes']['medium']?>" alt="<?= $image['name'] ?>">
                            </figure>
                        </div>

                        <?php endforeach ?>

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                    <div id="fancy-box-opener">
                        <a data-fancybox="gallery" href="<?= $imagenes[0]['sizes']['large']?>">
                            <span class="fas fa-plus-circle"></span>
                            Ampliar imagen
                        </a>
                    </div>
                </div>

            <?php endif ?>
                
                <div class="content">
                    <?= apply_filters('the_content', get_field('descripcion'));  ?>
                </div>
                
            </div>
        </div>

        <?php  get_sidebar('right'); ?>
    </div>



<?php get_footer(); ?>
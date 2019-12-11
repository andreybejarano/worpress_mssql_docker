<?php
/*
Template Name: Plantilla de contenido
*/

global $post;




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
            
                <?php include(locate_template('template-parts/content-main.php')); ?>

            </div>
        </div>

        <?php  get_sidebar('right'); ?>
    </div>



<?php get_footer(); ?>
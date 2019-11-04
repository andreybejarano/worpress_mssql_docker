<?php
get_header(); ?> 



<div class="listado-contenidos">

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

</div>

 
 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php



if($_GET){
    $exits_get = true;
    $array_tipo = array_keys($_GET);
    $tipo =  $array_tipo[0];
    $for_tax_query = array(
        'taxonomy' => 'destacados',
        'field' => 'slug',
        'terms' =>  $tipo
    );

}else{
   $exits_get = false;
   $for_tax_query = "";
}


    $terms = get_terms( array(
        'taxonomy' => 'destacados',
        'hide_empty' => false,
    ) );


    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    query_posts(array(
        'post_type'      => 'destacados', // You can add a custom post type if you like
        'paged'          => $paged,
        'posts_per_page' => 8,
        'tax_query' => array(
            $for_tax_query
        )
    ));





get_header(); ?> 



<div class="left-column">

    <?php get_breadcrumb(); ?>


    <div class="row-info destacados-holder flex-container justify-between">
        <div class="extra-holder">
            <h1 class="title">DESTACADOS IERIC</h1>
            <p>Resoluciones y noticias destacadas</p>
        </div>
        <div class="select-holder">
            <p>Mostrar:</p>
           
            <?php if($exits_get):  $own_term = get_term_by('slug', $tipo,'destacados');?>

                <button id="select-destacados" type="button"><?= $own_term->name?><span class="select-arrow"></span></button>

                <ul id="list-destacados" class="">
                    <li>
                        <a href="<?= DOMAIN ?>/destacados">Todas las noticias</a>
                    </li>
                    <?php foreach($terms as $q):
                            if($q->slug == $tipo){
                                continue;
                            }
                        ?>
                        <li>
                            <a href="<?= DOMAIN ?>/destacados/?<?= $q->slug?>"><?= $q->name ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php else: ?>
                <button id="select-destacados" type="button">Todas las noticias<span class="select-arrow"></span></button>
                <ul id="list-destacados" class="">
                    <?php foreach($terms as $q):?>
                        <li>
                            <a href="<?= DOMAIN ?>/destacados/?<?= $q->slug?>"><?= $q->name ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>

            
        </div>   
    </div>

    <div class="row-links">


        
    <?php   if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post(); ?>

            <a href="<?php the_permalink()?>" target="_blank" title="<?php the_title();?>">
                <div class="extra-holder flex-container align-center">
                <figure>
                    <?php the_post_thumbnail();?>
                </figure>
                <div class="file-info">
                    <h2><?php the_title(); ?></h2>
                    <p><?= get_field("descripcion_breve", $q->ID)?></p>
                </div>
                </div>   
            </a>

    <?php endwhile; ?>

        <?php kriesi_pagination(); ?>

    <?php else : ?>

        <?php // no posts found message goes here ?>

    <?php endif; ?>


       
    </div>

</div>



 
<?php //get_sidebar(); ?>
<?php get_footer(); ?>
<?php 
    // SIDEBAR FOR TAXONOMY
    if($post->post_type == 'tramites'){
        $taxonomy = 'tramite';
    }
    if($post->post_type == 'estadisticas'){
        $taxonomy = 'estadistica';
    }

    $term = get_the_terms( $post->ID, $taxonomy );

    $term_parent = get_term_by('term_id',$term[0]->parent, $taxonomy);

    $term_children = get_terms(
        $taxonomy,
        array(
            'hide_empty' => 0,
            'parent' => $term_parent->term_id,
        )
    );


?>

<div class="sidebar right-sidebar">


    <?php if($term_children): ?>

    <h3 class="title"><?= $post->post_type?></h3>
    <ul class="list">

        <?php foreach($term_children as $row):
            $tipo = get_field('tipo', $taxonomy.'_'.$row->term_id);

            if($tipo == 'Contenido'){
                $url = get_field('elegir_post', $taxonomy.'_'.$row->term_id);
            }

            if($tipo == 'Link externo'){
                $url = get_field('link_externo', $taxonomy.'_'.$row->term_id);
            }
            
        ?>       

                <li class="item <?php if(strpos($url, $_SERVER['REQUEST_URI'])){echo 'current';}?>"><a href="<?= $url ?>" class="link"><?= $row->name?></a></li>

        <?php endforeach ?>

    </ul>

    <?php endif ?>

    <section class="banners-sidebar">
        <div class="row-contents">
            <a href="#" class="item" style="background-image: url('<?= THEME_DIST ?>/img/sidebar-location.png'); background-position: bottom; ">
            <div class="info">
                <span class="txt">REPRESENTACIONES</span>
                <span class="link">Ver mas</span>
            </div>
            </a>
            <a href="#" class="item" style="background-image: url('<?= THEME_DIST ?>/img/sidebar-destacados-bg.png');">
            <div class="info">
                <span class="txt">DESTACADOS</span>
                <span class="txt">IERIC</span>
                <span class="link">Ver mas</span>
            </div>
            </a>
        </div>
    </section>
</div>
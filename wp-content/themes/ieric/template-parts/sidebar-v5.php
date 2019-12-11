<?php 
    // SIDEBAR FOR solo con post type
    $post__custom = get_posts(
        array(
            'post_type' => $post->post_type,
            'order' => 'ASC'
        )
    );


    switch( $post->post_type )
    {
        case 'certificacioncompete':
             $title = 'Certificación de competencias';
    
        break;
    }

    // var_dump($post);

?>

<div class="sidebar right-sidebar">



    <h3 class="title"><?= $title?></h3>
    <ul class="list">

        <?php foreach($post__custom as $row):?>  

                <li class="item <?php if($post->ID == $row->ID){echo 'current';}?>"><a href="<?= get_permalink($row->ID); ?>" class="link"><?= $row->post_title?></a></li>

        <?php endforeach ?>

    </ul>

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
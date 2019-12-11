<?php 

    // SIDEBAR FOR PAGE
?>

<div class="sidebar right-sidebar">


    <?php if($parent_current): ?>

    <h3 class="title"><?= get_post($parent_current)->post_title; ?></h3>
    <ul class="list">

        <?php foreach($items_menu as $row):?>       

            <?php if($row->post_parent == $parent_current):?>

                <li class="item <?php if($post->ID == $row->object_id){echo 'current';}?>"><a href="<?= get_permalink($row->object_id);?>" class="link"><?= $row->title?></a></li>

            <?php endif ?>
            
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
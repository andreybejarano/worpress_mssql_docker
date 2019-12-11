<?php 

    //SIDEBAR FOR DESTACADOS

$post_destacados = get_posts(
    array(
        'post_type' => 'destacados',
        'numberposts' => 6,
        'exclude'     => $post->ID
    )
);

?>

<div class="sidebar right-sidebar">
    <h3 class="title">OTROS DESTACADOS</h3>
    <ul class="list otros_destacados">

        <?php foreach($post_destacados as $row):?>       

                <a href="<?= get_permalink($row->ID) ?>"><?= $row->post_title?></a>

        <?php endforeach ?>

    </ul>
</div>
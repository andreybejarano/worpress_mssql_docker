<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ieric
 */

?>


 <div class="footer">
    <div class="menu-cols">
       <div class="col">
          <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-3',
                'menu_class'        => 'lista-footer',
                'add_li_class'  => 'item-footer',
                'menu_id'        => 'Footer1',
              ) );
            ?>
       </div>
       <div class="col">
          <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-4',
                'menu_class'        => 'lista-footer',
                'add_li_class'  => 'item-footer',
                'menu_id'        => 'Footer2',
              ) );
            ?>
       </div>
       <div class="col">
          <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-5',
                'menu_class'        => 'lista-footer',
                'add_li_class'  => 'item-footer',
                'menu_id'        => 'Footer3',
              ) );
            ?>
       </div>
       <div class="col">
          <?php
              wp_nav_menu( array(
                'theme_location' => 'menu-6',
                'menu_class'        => 'lista-footer',
                'add_li_class'  => 'item-footer',
                'menu_id'        => 'Footer4',
              ) );
            ?>
       </div>
    </div>
    <div class="info-general">
       <h3><?=the_field('titulo', 'option');?></h3>
       <p><i class="fas fa-map-marker-alt"></i> <?=the_field('ubicacion', 'option');?></p>
       <p><i class="fas fa-mobile-alt"></i> Tel: <?=the_field('telefono', 'option');?></p>
       <p><i class="fas fa-clock"></i> <?=the_field('horario_de_atencion', 'option');?></p>
    </div>
 </div>
</div>

<?php wp_footer(); ?>

</body>
</html>

<?php 

$parent_current = $post->post_parent;
$items_menu = wp_get_nav_menu_items(2);

?>

<?php 

    if(is_singular('destacados')){

        include(locate_template('template-parts/sidebar-v2.php'));

    }
    elseif(is_singular('certificacioncompete')){
        
        include(locate_template('template-parts/sidebar-v5.php'));

    }
    elseif(is_page()){

        if($post->post_parent == 334){
            include(locate_template('template-parts/sidebar-v1.php'));
        }else{
            include(locate_template('template-parts/sidebar-v4.php'));
        }
       
    }
    elseif(is_singular()){

        include(locate_template('template-parts/sidebar-v3.php'));

    }else{

        include(locate_template('template-parts/sidebar-v4.php'));

    }

   

?>
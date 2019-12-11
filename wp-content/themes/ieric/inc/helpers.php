<?php 

/**
 * Include a file from the assets folder.
 *
 * @param string $path Path of the file to include. Relative to the theme root.
 */
function curl_get_file_contents($URL)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) return $contents;
        else return FALSE;
    }



add_filter ( 'nav_menu_css_class', 'so_37823371_menu_item_class', 10, 4 );

function so_37823371_menu_item_class ( $classes, $item, $args, $depth ){

    global $post;

    if(is_singular('tramites')){
        //tramites
        if($item->ID == 74){
            $classes[] = 'current-menu-item';
        }
    }

    if(is_singular('estadisticas')){
        //tramites
        if($item->ID == 497){
            $classes[] = 'current-menu-item';
        }
    }

    if(is_singular('certificacioncompete')){
        //tramites
        if($item->ID == 526){
            $classes[] = 'current-menu-item';
        }
    }

    if(is_page()){
        if($post->post_parent == 334){
            if($item->ID == 393){
                $classes[] = 'current-menu-item';
            }
        }
    }

    return $classes;
}



/**
 * Generate breadcrumbs
 */
function get_breadcrumb() {
    global $post;

    echo '<div class="breadcrum-bar"><ol class="list">';
    echo "<li class='item'><a href='".DOMAIN."' rel='nofollow' class='link'>INICIO</a></li>";

    if(is_post_type_archive( 'destacados' ) ){
       
        echo "<li class='item active'><a href='".DOMAIN."/destacados' rel='nofollow' class='link'>Destacados IERIC</a></li>";
    }
    
    elseif(is_singular('destacados')){
        
        echo "<li class='item'><a href='".DOMAIN."/destacados' rel='nofollow' class='link'>Destacados IERIC</a></li>";
        echo "<li class='item active'>".$post->post_title."</li>";

    } elseif(is_singular('tramites')){

            $category_detail=get_the_terms($post->ID, 'tramite');//$post->ID
            echo "<li class='item'><a href='".DOMAIN."/tramites' rel='nofollow' class='link'>TRAMITES</a></li>";
            echo "<li class='item active'>".$post->post_title."</li>";
    
    }elseif(is_singular('estadisticas')){

        $category_detail=get_the_terms($post->ID, 'estadistica');//$post->ID
        echo "<li class='item'><a href='".DOMAIN."/estadistica' rel='nofollow' class='link'>ESTADÍSTICAS</a></li>";
        echo "<li class='item active'>".$post->post_title."</li>";

    }elseif(is_singular('certificacioncompete')){

        echo "<li class='item'><a href='".DOMAIN."/certificacioncompete' rel='nofollow' class='link'>Certificaciones de competencias</a></li>";
        echo "<li class='item active'>".$post->post_title."</li>";

    }elseif (is_page()) {

        if($post->post_parent){
            $parent_post = get_post($post->post_parent);
            echo "<li class='item'><a href='".get_permalink($parent_post->ID)."' rel='nofollow' class='link'>".$parent_post->post_name."</a></li>";
        }
        echo "<li class='item active'>".$post->post_title."</li>";
    
    } elseif (is_search()) {
        // echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Search Results for... ";
        // echo '"<em>';
        // echo the_search_query();
        // echo '</em>"';
    }

    echo '</ol></div>';
}




//shortcode custom

add_shortcode( 'informe-de-conyuntura', 'getConyuntura' );
function getConyuntura() {
    global $post;

    if($_GET){
        $array_anio = array_keys($_GET);
        $anio =  $array_anio[0];
    }else{
       $anio = date('Y');
    }
    
    $terms = get_terms( 'an', array(
        'hide_empty' => false,
        'order' => 'DESC'
    ) );
    $terms_meses = get_terms( 'meses', array(
        'hide_empty' => false,
        'orderby' => 'id',
    ) );

    echo '<div class="coyuntura-col">';
    echo '<div class="year-ctn"><span class="title">Año</span><div class="year-selector-ctn"><select class="year-selector" name="year" id="year">';
    foreach($terms as $q){

        if($q->name == $anio ){
            echo '<option value="'.$q->name.'" selected>'.$q->name.'</option>';
        }else{
            echo '<option value="'.$q->name.'">'.$q->name.'</option>';
        }
        
    }
    echo '</select></div></div>';

    echo '<section class="year-grid">';


    foreach($terms_meses as $mes){

        $args = array(
            'post_type' => 'conyuntura',
            'tax_query' => array(
                array(
                    'taxonomy' => 'an',
                    'field' => 'slug',
                    'terms' =>  $anio,
                ),
                array(
                    'taxonomy' => 'meses',
                    'field' => 'slug',
                    'terms' => $mes->slug,
                ),
            ),
        );
        $posts_mes = get_posts($args);

        $exists_post = ($posts_mes) ? '' : 'future';
        
        $informe = get_field('archivo_informe',$posts_mes[0]->ID);
        $resumen = get_field('archivo_resumen',$posts_mes[0]->ID);
        $gacetilla = get_field('archivo_gacetilla',$posts_mes[0]->ID);

        echo '<article class="item-month '. $exists_post .'"><span class="title">'.$mes->name.'</span><ul class="lista">';
            if($informe){
                echo '<li class="item"><a href="'.$informe['url'].'" target="_blank" class="link">Informe completo</a></li>';
            }

            if($resumen){
                echo '<li class="item"><a href="'.$resumen['url'].'" target="_blank" class="link">Resumen ejecutivo</a></li>';
            }

            if($gacetilla){
                echo '<li class="item"><a href="'.$gacetilla['url'].'" target="_blank" class="link">Gacetilla de prensa</a></li>';
            }   
        echo '</ul></article>';
    }
    echo '<div class="border"></div></section></div>';
        
                
 }



 function joints_page_navi($pages = '', $range = 2) {
    $showitems = ($range * 3)+1;
    global $paged;
         if(empty($paged)) $paged = 1;
    if($pages == '')
             {
                     global $wp_query;
                     $pages = $wp_query->max_num_pages;
                     if(!$pages)
                     {
                             $pages = 1;
                     }
             }

         if(1 != $pages)
         {
                 echo "<section class='paginador'>";
                 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a class='arrow' href='".get_pagenum_link(1)."'><i class='fa fa-angle-double-left' aria-hidden='true'></i></a>";
                 if($paged > 1 && $showitems < $pages) echo "<a class='arrow' href='".get_pagenum_link($paged - 1)."'><i class='fa fa-angle-left' aria-hidden='true'></i></a>";

                 for ($i=1; $i < $pages; $i++)
                 {
                         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                         {
                                 echo ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
                         }
                 }

                 if ($paged < $pages && $showitems < $pages) echo "<a class='arrow' href='".get_pagenum_link($paged + 1)."'><i class='fa fa-angle-right' aria-hidden='true'></i></a>";
                 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='arrow' href='".get_pagenum_link($pages)."'><i class='fa fa-angle-double-right' aria-hidden='true'></i></a>";
                 echo "</section>\n";
         }
}
?>
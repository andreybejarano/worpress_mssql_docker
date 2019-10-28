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



/**
 * Generate breadcrumbs
 */
function get_breadcrumb() {
    global $post;


    echo '<div class="breadcrum-bar"><ol class="list">';
    echo '<li class="item"><a href="'.home_url().'" rel="nofollow" class="link">INICIO</a></li>';
  
     
    if (is_category() || is_single()) {
        // echo "&nbsp;&nbsp;>&nbsp;&nbsp;";
        // the_category(' &bull; ');
            if (is_single()) {

            }
    } elseif (is_page()) {

        

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
?>
<?php 



/* Add Attachments to WordPress Search Results */

// function attachment_search( $query ) {
//     if ( $query->is_search ) {
//        $query->set( 'post_type', array( 'attachment', 'noticias' , 'post', 'tramites', 'destacados' ) );

//        $query->set( 'post_status', array( 'publish', 'inherit' ) );
//     }

//    return $query;
// }
// add_filter( 'pre_get_posts', 'attachment_search' );

  
        add_filter( 'posts_where', 'where_other_table', 10, 2 );

        /**
         * Filtering only the posts with a share count above 10
         *
         * @param string $where String containing where clauses.
         * @param WP_Query $wp_query Object.
         * @return string
         */
        
        function where_other_table( $where, $wp_query ) {

            $string = wp_specialchars($_GET['s'], 1);
               

                $where .= "AND ( (wp_posts.post_title LIKE '%{$string}%' ) OR ( wp_posts.post_name LIKE '%{$string}%' ) )"; 
  

            return $where;   
            
        }


?>
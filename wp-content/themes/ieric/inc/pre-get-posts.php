<?php 
/**
 * Alter the main query.
 */
// function socialsnack_alter_main_query($query) {
//     if ($query->is_admin || $query->is_single || !$query->is_main_query()) {
//         return $query;
//     }   

//     if ($query->is_search) {
//         $query->set('post_type', array('post'));
//     }

//     if (is_home()) {
//         // solo en el blog: ignorar comportamiento de sticky posts para que no queden anclados
//         $query->set('ignore_sticky_posts', 1);

//         // // excluir los últimos X sticky posts (los muestro en otro lugar)
//         $sticky = get_option('sticky_posts');
//         $sticky_limited = array_slice($sticky, 0, 1);

//         $query->set('post__not_in', $sticky_limited);
//     }
// }

// add_action('pre_get_posts', 'socialsnack_alter_main_query');



?>
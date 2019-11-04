<?php 

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configuración del sitio',
		'menu_title'	=> 'Configuración',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Información de contacto del pie de página',
		'menu_title'	=> 'Pie de página',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}


//maps

if(is_admin()){
    wp_register_script('aa_js_googlemaps_script',  'https://maps.googleapis.com/maps/api/js?key=AIzaSyCdvzJPCZSCtu-YpS9djkruUwmii1m9jIA&libraries=places'); // with Google Maps API fix
    wp_enqueue_script('aa_js_googlemaps_script');


    add_action('admin_head', 'my_custom_css');

    function my_custom_css() {
    echo '<style>
        #acf-field-group-fields,
        #acf-field-group-fields .hide-if-js,
        .closed .inside {
            display: block !important;
        } 
    </style>';
    }
}



function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = $bytes / $arItem["VALUE"];
            $result = str_replace(".", "," , strval(round($result, 1)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
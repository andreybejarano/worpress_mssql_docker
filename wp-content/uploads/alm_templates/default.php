<?php 
$seleccion = get_sub_field('seleccionar_nuevo_registro');
?>

<?php if($seleccion == 'elemento'):
$elemento = get_sub_field('elemento');
?>
			<div class="row-links">
					<a href="<?= $elemento['archivo']['url'] ?>"  title="<?= $elemento['titulo'] ?>" target="_blank">
                     <div class="extra-holder flex-container align-center">
                        <div class="file-size">
                           <div class="file-icon pdf"><?php
	$extension = $elemento['archivo']['subtype'];
	if($extension == 'vnd.ms-excel'){
    	$extension = 'xls';
	}
	echo $extension;
                           
?></div>
                       <span class="block"><?=FileSizeConvert($elemento['archivo']['filesize']);?></span>
                        </div>
                        <div class="file-info">
                           <h2><?= $elemento['titulo']?></h2>
                        	<?= $elemento['descripcion'] ?>
                        </div>
                     </div>
                  </a>
			</div>
<?php endif ?>


<?php if($seleccion == 'enlace'): 
 
 $link = get_sub_field('enlace');



 
if($link['enlace_interno']){
	//$url_link = get_permalink($link['enlace_interno']->ID);
    $id_link = $link['enlace_interno']->ID;
	$url_link = get_permalink($id_link);

}

if($link['enlace_externo']){

$url_link = $link['enlace_externo'];
}
?>
<div class="row-links">

				<a href="<?= $url_link ?>" target="_blank">
                     <div class="extra-holder flex-container align-center">
                        <div class="file-size">
                           <div class="file-icon link"></div>
                        </div>
                        <div class="file-info">
                           <h2><?= $link['titulo']?></h2>
                           <?= $link['descripcion']?>
                        </div>
                     </div>   
                  </a>

</div>
<?php endif ?>
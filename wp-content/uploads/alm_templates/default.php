<?php 
 $seleccion = get_sub_field('seleccionar_nuevo_registro');
$link = get_sub_field('enlace');
$elemento = get_sub_field('elemento');
?>

<?php if($seleccion == 'elemento'):

?>
			<div class="row-links">
					<a href="<?= $elemento['archivo']['url'] ?>"  title="<?= $elemento['titulo'] ?>" target="_blank">
                     <div class="extra-holder flex-container align-center">
                        <div class="file-size">
                           <div class="file-icon pdf"><?= $elemento['archivo']['subtype']?></div>
                           <span class="block"><?=  FileSizeConvert($elemento['archivo']['filesize']);
 ?></span>
                        </div>
                        <div class="file-info">
                           <h2><?= $elemento['titulo']?></h2>
                        	<?= $elemento['descripcion'] ?>
                        </div>
                     </div>
                  </a>
			</div>
<?php endif ?>



<?php if($seleccion == 'link'): 
if($link['enlace_interno']){
	$url_link = $link['enlace_interno'];
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
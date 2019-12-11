<?php
/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */

wp_reset_query();

global $wpdb;

// $resultados= $wpdb->get_results( "SELECT  wp_posts.* , wp_posts.post_date 
// FROM wp_posts  
// WHERE 1=1  
// AND wp_posts.post_type IN ('attachment', 'noticias', 'post', 'tramites', 'destacados') 
// AND ((wp_posts.post_status = 'publish' OR wp_posts.post_status = 'inherit'))  
// AND wp_posts.post_title LIKE '%ieric%'
// ORDER BY wp_posts.post_date DESC OFFSET  0 ROWS FETCH NEXT 10 ROWS ONLY" );


// var_dump($resultados);


get_header(); ?>


	<div class="container wrap pt-0">
		<div class="col-md-12 contenido resset">
		    <section class="resultados-busqueda">

  
		

				<div class="resultados">



					<h1 class="title">BÚSQUEDA</h1>

					<form action="/" id="searchform">
							<input type="text" placeholder="Buscar" name="s">
							<input type="button" value="Buscar" >
					</form>


					<?php
						$ourCurrentPage = get_query_var( 'paged' );


						$myResults = new WP_Query(array(
							'posts_per_page' => 8,
							'post_type' =>  array( 
								'attachment', 
								'page' , 
								'post', 
								'tramites', 
								'destacados',
								'certificacioncompete',
								'fiscalizaciones',
								'estadisticas',
								'conyuntura'
							),
							'post_status' => array('publish', 'acf-disabled', 'inherit'),
							'orderby' => 'date',
							'order'      => 'DESC',
							'paged' => $ourCurrentPage
						));


						if( $myResults->have_posts() ):
							while( $myResults->have_posts() ): $myResults->the_post(); 
							
							$subtitulo = get_field("subtitulo", $q->ID);

							$attachment_id = $post->ID;
							$attahment_file = get_attached_file( $attachment_id );
							$extension = wp_check_filetype($attahment_file);

							?>

								<?php if($extension['ext']):

									
										$ancestors = get_post_ancestors( $attachment_id );
										$post_ancestors = get_post($ancestors[0]);
									
										$bytes = filesize($attahment_file);
										
										

								?>


						      <div class="item">
										<div class="extra-holder flex-container align-center">
											<div class="filetype">
												<div class="icon"><?= $extension['ext'] ?></div>
												<span class="size"><?= FileSizeConvert($bytes);?></span>
											</div>
											<div class="file-info">
													<h2><a href="<?= $post->guid ?>" target="_blank" title="<?php the_title();?>"><?php the_title(); ?></a></h2>

													<?php if($post_ancestors):?>
														<p>En: <a href="<?= get_permalink($post_ancestors->ID)?>"><?= $post_ancestors->post_title?></a></p>
													<?php endif ?>
														
													<?php if($subtitulo):?>
														<p><?= $subtitulo?></p>
													<?php endif ?>
													
											</div>
										</div>   
									</div>

								<?php else:?>

								<div class="item">
										<div class="extra-holder flex-container align-center">
											<div class="filetype">
												<div class="icon post_link"></div>
											</div>
											<div class="file-info">
													<h2><a href="<?= $post->guid ?>" target="_blank" title="<?php the_title();?>"><?php the_title(); ?></a></h2>

													<?php if($post_ancestors):?>
														<p>En: <a href="<?= get_permalink($post_ancestors->ID)?>"><?= $post_ancestors->post_title?></a></p>
													<?php endif ?>
														
													<?php if($subtitulo):?>
														<p><?= $subtitulo?></p>
													<?php endif ?>
													
											</div>
										</div>   
									</div>
								<?php endif?>

							<?php endwhile;?>


							<?php joints_page_navi($pages = '', $range = 1); echo $pages; ?>

							<?php
						  else:
							echo "<p class='post_none'>No existen resultados con esa busqueda</p>";
						endif;
					?>
				</div>
			</section>
		</div>
	</div>

<?php get_footer(); ?>

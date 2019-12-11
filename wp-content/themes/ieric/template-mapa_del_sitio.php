<?php
/*
Template Name: Plantilla de mapa del sitio
*/

// box_title


get_header(); 


?> 



    <div class="">
            <div class="left-column">
               <!--breadcrum-->
               <div class="breadcrum-bar">
                  <ol class="list">
                     <li class="item"><a href="#" class="link">INICIO</a></li>
                     <li class="item current">Representaciones</li>
                  </ol>
               </div>
               <!--breadcrum-->
               <div class="row-info">
                  <h1 class="title">MAPA DEL SITIO</h1>
                  <div class="info">
                    <p>Una vista de todas las secciones y páginas del sitio.</p>
                  </div>
               </div>
               <div class="sitemap-holder flex-container justify-center flex-wrap">


                    <?php while ( have_rows('box_title') ) : the_row();?>

                        <div class="sitemap-box">
                            <div class="extra-holder">
                                <h2><a class="sitemap-link" href="<?= the_sub_field('link'); ?>" ><?= the_sub_field('nombre'); ?></a></h2>


                                <?php if( have_rows('level_1') ): ?>
                                
                                    <ul>

                                        <?php  while ( have_rows('level_1') ) : the_row(); ?>

                                            <li>
                                                <?php if( have_rows('level_2') ): ?>

                                                    <a href="<?= the_sub_field('link_1'); ?>" ><?= the_sub_field('nombre_1'); ?></a>
                                                    <ul>
                                                        <?php  while ( have_rows('level_2') ) : the_row(); ?>
                                                            <li><a href="<?= the_sub_field('link_2'); ?>" ><?= the_sub_field('nombre_2'); ?></a></li>
                                                        <?php endwhile; ?>
                                                    </ul>

                                                <?php else:?>

                                                    <a href="<?= the_sub_field('link_1'); ?>"><?= the_sub_field('nombre_1'); ?></a>
                                                
                                                <?php endif ?>
 
                                            </li>
                                
                                        <?php endwhile; ?>

                                    </ul>

                                <?php endif ?>
                               
                            </div>   
                        </div>

                        

                    <?php endwhile;?>

                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="<?= DOMAIN ?>" title="INICIO">INICIO</a></h2>
                     </div>   
                  </div>
                   <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="IERIC">IERIC</a></h2>
                        <ul>
                           <li><a href="#" title="Institucional">Institucional</a></li>
                           <li><a href="#" title="Objetos y funciones">Objetos y funciones</a></li>
                           <li><a href="#" title="Historia">Historia</a></li>
                           <li><a href="#" title="Autoridades">Autoridades</a></li>
                           <li><a href="#" title="Legislación">Legislación</a></li>
                           <li><a href="#" title="Representaciones" target="_self">Representaciones</a></li></ul>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Representaciones">Representaciones</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Representaciones">Trámites</a></h2>
                        <ul>
                           <li>
                              <a href="http://200.80.211.181:2080/ieric-ui/desktop/" title="Sistema de pagos" target="_blank">Sistema de pagos</a>
                              <ul>
                                 <li><a href="http://200.80.211.181:2080/ieric-ui/desktop/" title="Acceso al Sistema de Pagos - Boletas Web" target="_blank">Acceso al Sistema de Pagos - Boletas Web</a></li>
                                 <li><a href="/p2/que-es-el-sistema-de-pagos-50" title="¿Qué es el sistema de pagos?">¿Qué es el sistema de pagos?</a></li>
                                 <li><a href="/p3/medios-de-pago-51" title="Medios de pago">Medios de pago</a></li>
                                 <li><a href="/p2/como-funciona-el-sistema-de-pagos-52" title="¿Cómo funciona?">¿Cómo funciona?</a></li>
                                 <li><a href="/p2/preguntas-frecuentes-sistema-de-pagos-53" title="Preguntas frecuentes">Preguntas frecuentes</a></li>
                              </ul>
                           </li>
                           <li>
                              <a href="#" title="Trámites principales">Trámites principales</a>
                              <ul>
                                 <li><a href="/p2/inscripcion-empresaria-81" title="Inscripción empresaria">Inscripción empresaria</a></li>
                                 <li><a href="http://200.80.211.181:2080/ieric-ui/desktop/" title="Sistema Web - Acceso Directo" target="_blank">Sistema Web - Acceso Directo</a></li>
                                 <li><a href="/p2/preguntas-frecuentes-sobre-los-procesos-de-registracion-de-ieric-63" title="Preguntas frecuentes sobre los procesos de registración">Preguntas frecuentes sobre los procesos de registración</a></li>
                              </ul>
                           </li>
                           <li><a href="#" title="Otros trámites">Otros trámites</a>
                              <ul>
                                 <li><a href="/p2/tramites-para-empleadores-47" title="Soy empleador">Soy empleador</a></li>
                                 <li><a href="/p2/tramites-para-trabajadores-48" title="Soy trabajador">Soy trabajador</a></li>
                                 <li><a href="/p2/consultas-online-66" title="Consultas Online">Consultas Online</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>   
                  </div>
                   <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Registración">Registración</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Fiscalización">Fiscalización</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Estadística">Estadística</a></h2>
                        <ul>
                           <li><a href="/landing/nuestras-estadisticas-41" title="NUESTRAS ESTADÍSTICAS">NUESTRAS ESTADÍSTICAS</a>
                              <ul>
                                 <li><a href="/p2/estadisticas-propias-42" title="Estadísticas propias">Estadísticas propias</a></li>
                                 <li><a href="/informes-de-coyuntura-43" title="Informes de coyuntura" target="_self">Informes de coyuntura</a></li>
                                 <li><a href="/p2/informes-anuales-65" title="Informes anuales">Informes anuales</a></li>
                                 <li><a href="/series-estadisticas-64" title="Series estadísticas" target="_self">Series estadísticas</a></li>
                                 <li><a href="/p2/publicaciones-especiales-82" title="Publicaciones especiales">Publicaciones especiales</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Certificación de competencias">Certificación de competencias</a></h2>
                        <ul>
                           <li>
                              <a href="/landing/certificacion-proceso-74" title="Certificación proceso">Certificación proceso</a>
                              <ul>
                                 <li><a href="/p3/que-es-la-certificacion-de-competencias-laborales-75" title="¿Qué es la Certificación de Competencias Laborales?">¿Qué es la Certificación de Competencias Laborales?</a></li>
                                 <li><a href="/p3/proceso-de-certificacion-de-competencias-laborales-76" title="Proceso de Certificación de competencias laborales">Proceso de Certificación de competencias laborales</a></li>
                                 <li><a href="/p2/oficios-habilitados-78" title="Oficios habilitados">Oficios habilitados</a></li>
                                 <li><a href="/p3/preguntas-frecuentes-77" title="Preguntas frecuentes">Preguntas frecuentes</a></li>
                                 <li><a href="/p2/observatorio-de-las-calificaciones-79" title="Observatorio de las Calificaciones">Observatorio de las Calificaciones</a></li>
                              </ul>
                           </li>
                        </ul>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Relaciones Institucionales">Relaciones Institucionales</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Mapa del sitio">Mapa del sitio</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Intranet">Intranet</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Atención al público">Atención al público</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Agenda">Agenda</a></h2>
                     </div>   
                  </div>
                  <div class="sitemap-box">
                     <div class="extra-holder">
                        <h2><a class="sitemap-link" href="#" title="Destacados">Destacados</a></h2>
                     </div>   
                  </div>
               </div>
  



            </div>
    </div>


<?php get_footer(); ?>
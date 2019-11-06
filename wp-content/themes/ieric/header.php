<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#ffffff">

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

        <div class="main-ctn">
        
                  <!--header-->
            <div class="header">
               <div class="first-line">
                  <div class="logo-col">
                     <a class="link" href="<?= DOMAIN ?>">
                        <img class="logo" src="<?= THEME_DIST ?>/img/logo.jpeg" alt="Ieric">
                        <p><span>Instituto de Estadística y Registro</span> <span>de la Industria de la Construcción</span></p>
                     </a>
                  </div>
                  <div class="search-col">
                     <form action="/" id="searchform">
                     <input type="text" placeholder="Buscar" name="s"><i class="fa fa-search icon"></i></form>
                     <i id="btn-search" class=" icon icon-search fa fa-search"></i>
                     <i id="bars" class="icon icon-bars fa fa-bars"></i>
                  </div>
               </div>
               <div class="nav">
                  <?php
                     wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                     ) );
                  ?>
               </div>
            </div>
            <!--end header-->
            <!-- Nav -->
            <nav id="mobileNav">
               <div class="top-part flex-container align-center justify-between">
                  <p>Menú</p>
                  <button id="close-nav">
                     <span></span>
                     <span></span>
                  </button>
               </div>
               <ul class="nav-links">
                  <li class="has-sub-menu">
                     <div class="extra-holder flex-container align-center justify-between">
                        <span>IERIC</span>
                        <div class="nav-triangle"></div>
                     </div>   
                     <ul class="sub-menu">
                        <li class="">
                           <a href="#" title="Institucional">Institucional</a>
                        </li>
                        <li class="">
                           <a href="#" title="Objetos y funciones">Objetos y funciones</a>
                        </li>
                        <li class="">
                           <a href="#" title="Historia">Historia</a>
                        </li>
                        <li class="">
                           <a href="#" title="Autoridades">Autoridades</a>
                        </li>
                        <li class="">
                           <a href="#" title="Legislación">Legislación</a>
                        </li>
                        <li class="">
                           <a href="#" title="Representaciones">Representaciones</a>
                        </li>
                     </ul>
                  </li>
                  <li>
                     <a href="#" title="Trámites">Trámites</a>
                  </li>
                  <li>
                     <a href="#" title="Registración">Registración</a>
                  </li>
                  <li>
                     <a href="#" title="Fiscalización">Fiscalización</a>
                  </li>
                  <li class="has-sub-menu">
                     <div class="extra-holder flex-container align-center justify-between">
                        <span>Estadística</span>
                        <div class="nav-triangle"></div>
                     </div>   
                     <ul class="sub-menu">
                        <li class="">
                           <a href="#" title="Estadísticas propias">Estadísticas propias</a>
                        </li>
                        <li class="">
                           <a href="#" title="Informes de cuyuntura">Informes de cuyuntura</a>
                        </li>
                        <li class="">
                           <a href="#" title="Informes anuales">Informes anuales</a>
                        </li>
                        <li class="">
                           <a href="#" title="Series estadísticas">Series estadísticas</a>
                        </li>
                        <li class="">
                           <a href="#" title="Publicaciones especiales">Publicaciones especiales</a>
                        </li>
                     </ul>
                  </li>
                  <li class="has-sub-menu">
                     <div class="extra-holder flex-container align-center justify-between">
                        <span>Certificación de competencias</span>
                        <div class="nav-triangle"></div>
                     </div>
                     <ul class="sub-menu">
                        <li class="">
                           <a href="#" title="¿Qué es la Certificación de Competencias Laborales?">¿Qué es la Certificación de Competencias Laborales?</a>
                        </li>
                        <li class="">
                           <a href="#" title="Proceso de Certificación de competencias laborales">Proceso de Certificación de competencias laborales</a>
                        </li>
                        <li class="">
                           <a href="#" title="Oficios habilitados">Oficios habilitados</a>
                        </li>
                        <li class="">
                           <a href="#" title="Preguntas frecuentes">Preguntas frecuentes</a>
                        </li>
                        <li class="">
                           <a href="#" title="Observatorio de las Calificaciones">Observatorio de las Calificaciones</a>
                        </li>
                     </ul>   
                  </li>
                  <li>
                     <a href="#" title="Relaciones institucionales">Relaciones institucionales</a>
                  </li>
               </ul> 
            </nav>
            <!-- env nav -->

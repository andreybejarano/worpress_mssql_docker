<?php
$video_youtube = get_field('video_youtube');
$subtitulo = get_field('subtitulo');
$imagenes = get_field('imagenes');

?>


            <div class="top-content">
                <p><?= $subtitulo ?></p>
            </div>
            

            <?php if($imagenes): ?>
                <div class="gallery-holder">
                    <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php foreach($imagenes as $image):?>

                        <div class="swiper-slide">
                            <figure>
                                <img src="<?= $image['sizes']['medium']?>" alt="<?= $image['name'] ?>">
                            </figure>
                        </div>

                        <?php endforeach ?>

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>
                    <div id="fancy-box-opener">
                        <a data-fancybox="gallery" href="<?= $imagenes[0]['sizes']['large']?>">
                            <span class="fas fa-plus-circle"></span>
                            Ampliar imagen
                        </a>
                    </div>
                </div>
            <?php endif ?>

            <?php if($video_youtube):?>
                <div class="wrapper-video">
                    <iframe  src="https://www.youtube.com/embed/<?= $video_youtube ?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                </div>
            <?php endif?>
                            
            <div class="content">
                <?= apply_filters('the_content', get_field('descripcion'));  ?>
            </div>
                
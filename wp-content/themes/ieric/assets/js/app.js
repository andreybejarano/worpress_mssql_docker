// Abrir y cerrar nav
$('#bars').click(function () {

    $('#mobileNav').addClass('opened');
    $('html').addClass('no-scroll');

});

$('#open-nav').click(function () {

    $('#mobileNav').addClass('opened');
    $('html').addClass('no-scroll');

});

$('#close-nav').click(function () {

    $('#mobileNav').removeClass('opened');
    $('html').removeClass('no-scroll');

});

// Sub menu
$('.nav-links .has-sub-menu .extra-holder').click(function () {

    $(this).parent().toggleClass('show-sub-menu');

});


//change select in conyuntura
$('.coyuntura-col #year').change(function (e) {
    var value = $(this).val();

    window.location.href = location.protocol + '//' + location.host + location.pathname + '?' + value;
});

// Select en destacados

$('#select-destacados').click(function () {

    $('#list-destacados').toggleClass('opened');

});


$(document).ready(function () {

    //init fancybox
    $('[data-fancybox="gallery"]').fancybox({
        // Options will go here
    });

    // $("#fancy-box-opener").fancybox({
    //     'hideOnContentClick': true
    // });

    // $("#fancy-box-opener").attr('href', $('.gallery-holder .swiper-slide-active:not(.swiper-slide-duplicate) figure img').attr('src'));





    if ($('body').hasClass('home')) {

        //Slider vertical Home
        var mySwiper = new Swiper('.home .vertical-slider.swiper-container', {
            // Optional parameters

            direction: 'vertical',
            loop: true,
            slidesPerView: 3,
            spaceBetween: 20,
            freeMode: true,
            grabCursor: true,
            autoHeight: true,
            // autoplay: {
            //     delay: 3000,
            // },


            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
            },

            breakpoints: {
                // when window width is >= 320px

            }
        })

    } else {

        //Slider vertical
        var mySwiper = new Swiper('.vertical-slider.swiper-container', {
            // Optional parameters

            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            // autoplay: {
            //     delay: 3000,
            // },

            // Navigation arrows
            navigation: {
                nextEl: '.next-btn',
            },

            breakpoints: {
                // when window width is >= 320px
                480: {
                    direction: 'vertical',
                    spaceBetween: 20
                },
            }
        })

    }



    //slider horizontal
    var mySwiper = new Swiper('.gallery-holder .swiper-container', {
        // Optional parameters
        //direction: 'vertical',
        //loop: true,
        autoHeight: true,
        //slidesPerView: 1,
        autoplay: {
            delay: 3000,
        },

        pagination: {
            el: '.gallery-holder .swiper-pagination',
            //dynamicBullets: true,
        },

        // Navigation arrows
        navigation: {
            nextEl: '.gallery-holder .swiper-button-next',
        },

    })
});
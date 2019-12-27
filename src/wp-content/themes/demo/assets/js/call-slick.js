var $ = jQuery;
function call_slick(){
    //home
    $('.home-page .slider-container').slick({
        dots: false,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        speed: 500,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });

    //about
    $('.about .team-container').slick({
        dots: false,
        arrows: false,
        speed: 500,
        infinite: false,
        slidesToShow: 3.1,
        slidesToScroll: 1,
        responsive: [
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 2.1,
              }
            },
            {
                breakpoint: 575,
                settings: {
                slidesToShow: 1.1,
                }
            }
        ]
    });

    //ressponsive
    //home checkout
    $(window).resize(function () {
        if($(window).width() < 768 ){
            if(!$('.home-page .sec-latest-post .col-body').hasClass('slick-slider') )
                $('.home-page .sec-latest-post .col-body').slick({
                    infinite: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    autoplay: true,
                    arrows: false,
                    autoplaySpeed: 7000,
                    responsive: [
                        {
                            breakpoint: 576,
                            settings: {
                                slidesToShow: 1
                            }
                        }
                    ]
                });
        }else{
            if($('.home-page .sec-latest-post .col-body').hasClass('slick-slider') )
                $('.home-page .sec-latest-post .col-body').slick('unslick');
        }
    });

    if($(window).width() < 768 && !$('.home-page .sec-latest-post .col-body').hasClass('slick-slider') ){
        $('.home-page .sec-latest-post .col-body').slick({
            infinite: true,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: true,
            arrows: false,
            autoplaySpeed: 7000,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
    }
    
}
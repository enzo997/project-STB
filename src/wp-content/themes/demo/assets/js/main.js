// section sec-tabs
var $ = jQuery;
$(document).ready(function(){
    $(".nav-tabs a").click(function(){
        $(".nav-tabs li").removeClass('active-color');
        $(this).parent().addClass('active-color');
    });
    // slider
    $('.section-testimonials .col-body .row-group').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        speed:1000,
        autoplaySpeed: 3000,
        dots:true, //hien thi dau cham duoi chan.
        arrows:false,// xoa nut preves va nut next
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
                }
            },
            {  
                breakpoint: 600,
                settings: {
                slidesToShow: 2,
                slidesToScroll: 2
                }
            },
            {
                breakpoint: 500,
                settings: {
                slidesToShow: 1,
                slidesToScroll: 1
                }
            }
        ]

    });  
});
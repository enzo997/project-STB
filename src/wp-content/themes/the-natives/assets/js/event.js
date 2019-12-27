var $ = jQuery;
function call_event(){

    //popup home
    $('.home-page .btn-play').click(video_image_click);
    $('.home-page .video-popup').click(video_popup_click);

    //about page
    $('.about .question').click(question_click);

}

function video_stream(){
    // console.log('abc');
}

function question_click(){
    if($(this).parent().toggleClass('active'));
}

function video_popup_click(){
    $('.home-page .video-popup').fadeOut(300);
    let src =  $('#stream-video')[0].src;
    src = src.replace('?autoplay=1','');
    $('#stream-video')[0].src = src;
}

function video_image_click(){
    $('.home-page .video-popup').fadeIn(300);
    $('#stream-video')[0].src += "?autoplay=1";
}
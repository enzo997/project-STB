jQuery(document).ready(function ($) {
  // ==========select=============
  jQuery('select').each(function () {
    var $this = jQuery(this),
      numberOfOptions = jQuery(this).children('option').length;
    var val = $(this).val();
    $this.addClass('select-hidden')
    $this.wrap('<div class="select"></div>')
    $this.after('<div class="select-styled"></div>')
    var $styledSelect = $this.next('div.select-styled');
    // $styledSelect.text($this.children('option').eq(0).text()).append('<i class="fa fa-sort-desc" aria-hidden="true"></i>');
    var $list = jQuery('<ul />', {
      'class': 'select-options'
    }).insertAfter($styledSelect)
    for (var i = 0; i < numberOfOptions; i++) {
      var html = $this.children('option').eq(i).text();
      if (val == $this.children('option').eq(i).val()) {
        $styledSelect.text($this.children('option').eq(i).text());
      }
      jQuery('<li />', {
        html: html,
        rel: $this.children('option').eq(i).val(),
        class: (val == $this.children('option').eq(i).val()) ? 'active' : '',
      }).appendTo($list)
    }
    var $listItems = $list.children('li')
    $styledSelect.click(function (e) {
      e.stopPropagation()
      jQuery('div.select-styled.active').not(this).each(function () {
        jQuery(this).removeClass('active').next('ul.select-options').hide()
      })
      jQuery(this).toggleClass('active').next('ul.select-options').toggle()
    })
    $listItems.click(function (e) {
      e.stopPropagation();
      $styledSelect.text($(this).text()).removeClass('active');
      if ((val != $(this).attr('rel') || $(this).attr('rel') == '') && !$(this).hasClass('active')) {
        $list.children('li').removeClass('active');
        $(this).addClass('active');
        $this.val($(this).attr('rel'));
        $this.trigger('change');
      }
      $list.hide()
    })
    jQuery(document).click(function () {
      $styledSelect.removeClass('active')
      $list.hide()
    })
  })



  var $ = jQuery;

  //======== Scroll down and scroll up ========//
  // Detect IE version
  var iev = 0;
  var ieold = (/MSIE (\d+\.\d+);/.test(navigator.userAgent));
  var trident = !!navigator.userAgent.match(/Trident\/7.0/);
  var rv = navigator.userAgent.indexOf("rv:11.0");

  if (ieold) iev = new Number(RegExp.$1);
  if (navigator.appVersion.indexOf("MSIE 10") != -1) iev = 10;
  if (trident && rv != -1) iev = 11;

  // Firefox or IE 11
  if (typeof InstallTrigger !== 'undefined' || iev == 11) {
    var lastScrollTop = 0;
    $(window).on('scroll', function () {
      st = $(this).scrollTop();
      if (st < lastScrollTop) {
        console.log('Up');
      }
      else if (st > lastScrollTop) {
        console.log('Down');
      }
      lastScrollTop = st;
    });
  }
  // Other browsers
  else {
    $('body').on('mousewheel', function (e) {
      if (e.originalEvent.wheelDelta > 0) {
        scrollUpMenu()
      }
      else if (e.originalEvent.wheelDelta < 0) {
        scrollDownMenu();
      }
    });
  }
  //======== END Scroll down and scroll up ========//

  // $('.header_desktop .menu-item-has-children > a').on('click', function(){
  //   $(this).parent().addClass('active');
  //   $('body').addClass('sub_menu_show');
  // })

  // $('.nav_mobile_show .nav_menu .menu-item-has-children > a').on('click', function(){
  //   $(this).parent().addClass('active');
  // })

  function scrollUpMenu() {
    let header = $('#header');
    if (header.length) {
      header.addClass('scrollUp')
      header.removeClass('scrollDown');
    }
  }

  function scrollDownMenu() {
    let header = $('#header');
    if (header.length) {
      header.removeClass('scrollUp')
      header.addClass('scrollDown');
    }
  }

  // $(".header_desktop .menu-item-has-children").hover(function () {
  //   $(this).addClass('active');
  //   $('body').addClass('sub_menu_show');
  // }, function () {
  //   $(this).removeClass('active');
  //   $('body').removeClass('sub_menu_show');
  // })

  $(".header_desktop .menu-item-has-children, .nav_mobile_show .menu-item-has-children").click(function () {
    $(this).toggleClass('active');
    $('body').toggleClass('sub_menu_show');
  })

  $(document).on('click', '.header_mobile .btn_bar', function () {
    $(this).toggleClass('close');
    $('.nav_mobile_show').toggleClass('active');
  })

  //call slick
  call_slick();

  //call-event
  call_event();




  // Header fixed
  if ($('#wpadminbar').hasClass('d-none'))
    $('#header').css('top', '0');
  else
    $('#header').css('top', $('#wpadminbar').height() + 'px');

  $(window).scroll(function () {
    var pos_body = $('html,body').scrollTop();
    // if (pos_body > $('#header').height())
    //   $('#header').addClass('bor_bot');
    // else
    //   $('#header').removeClass('bor_bot');

    if ($('#wpadminbar').hasClass('d-none'))
      $('#header').css('top', '0');
    else
      $('#header').css('top', $('#wpadminbar').height() + 'px');
  })

  $(window).resize(function () {
    if ($('#wpadminbar').hasClass('d-none'))
      $('#header').css('top', '0');
    else
      $('#header').css('top', $('#wpadminbar').height() + 'px');
  })

  // $(".big-col").paroller({
  //   factor: 0.3,            // multiplier for scrolling speed and offset
  //   type: 'foreground',     // background, foreground
  //   direction: 'vertical', // vertical, horizontal
  // });

  // $(".small-col").paroller({
  //   factor: 0.5,            // multiplier for scrolling speed and offset
  //   type: 'foreground',     // background, foreground
  //   direction: 'vertical', // vertical, horizontal
  // })

  var wow = new WOW({
    boxClass:     'wow',
    animateClass: 'fadeInUpManual',
    offset: 0,
  }
  )
  wow.init();

})
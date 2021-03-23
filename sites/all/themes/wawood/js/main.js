(function ($) {
  var controller = new ScrollMagic.Controller();

  window.smoothOffset = -100;

  $(function () {

    new ScrollMagic.Scene({ triggerElement: "NAV#main-nav" })
      .setClassToggle("#main-nav .menu-bar", "fixed-menu")
      .triggerHook('onLeave')
      .offset(65)
      .addTo(controller);

    $('.entrance').each(function () {
      var self = this;
      new ScrollMagic.Scene({ triggerElement: self })
        .addTo(controller)
        .triggerHook('.65')
        .on('enter', function (e) {
          $(self).addClass(self.dataset.animation);
        })
        ;
    });

    $('a[href*=#]:not([href=#]):not(.skip-smooth), .smooth-link').click(function () {
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
          $('html,body').animate({
            scrollTop: target.offset().top + (window.smoothOffset || 0)
          }, 500);

          $('#mobile-menu-wrapper').collapse('hide');

          return false;
        }
      }
    });

    //Active menu
    $('section').each(function () {
      var a = this.id;
      new ScrollMagic.Scene({ triggerElement: "#" + a })
        .triggerHook('onLeave')
        .offset(-100)
        .on('enter', function (e) {
          this.duration($(this.triggerElement()).height());
          $('a.current').removeClass('current');
          $('a[href="' + Drupal.settings.basePath + '#' + a + '"]').addClass('current');
          //        $(".menu--" + this.triggerElement().id).addClass('active');
        })
        .setClassToggle(".menu--" + a, "active")
        .addTo(controller);
    });


    //Slider Banner 

    $('.banner-home__container').slick({
      infinite: true,
      slidesToShow: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      speed: 300,
      prevArrow: false,
      nextArrow: false,
      dots: false
    });

    //Slider Blog

    $('.blog-page__slider').slick({
      infinite: true,
      slidesToShow: 1,
      speed: 300,
      prevArrow: $('.slick-prev'),
      nextArrow: $('.slick-next'),
      dots: false
    });


    //Slider More content 
    $('.blog-more__container').slick({
      infinite: true,
      //centerMode: true,
      centerPadding: '0',
      slidesToShow: 4,
      speed: 400,
      prevArrow: false,
      nextArrow: false,
      dots: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 580,
          settings: {
            centerMode: false,
            centerPadding: '0px',
            slidesToShow: 1,
            slidesToScroll: 1,
          }
        },
      ]
    });

    //Slider Instagram 

    /* $('.instagram-posts__slider').slick({
      infinite: true,
      centerMode: true,
      centerPadding: '60px',
      slidesToShow: 3,
      speed: 400,
      prevArrow: false,
      nextArrow: false,
      dots: false,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          }
        },
        {
          breakpoint: 580,
          settings: {
            centerMode: false,
            centerPadding: '0px',
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          }
        },
      ]
    });
 */
    //Custom slider

    var st, slide = function (pos) {

      slider_idx = pos;
      $('#block-website-index .in').removeClass('in');
      $('#block-website-index IMG').eq(slider_idx).addClass('in');

      $slider.find('.indicators .active').removeClass('active');
      $slider.find('.indicators LI').eq(slider_idx).addClass('active');

      slider_idx++;

      if (slider_idx >= slider_len) slider_idx = 0;
      clearTimeout(st);
      st = setTimeout(function () { slide(slider_idx) }, 3000);
    };

    var slider_len = $('#block-website-index IMG').length, slider_idx = 0;
    $slider = $('#block-website-index');
    $slider.find('IMG')
      .addClass('fade')
      .eq(0).addClass('in');

    /*
        var indicators = '<ul class="indicators">';
        for(var i=0; i<slider_len; i++){
          indicators += '<li data-idx="'+i+'">';
        }
        indicators += '</ul>';
        
        $slider.append(indicators);
        $slider.find('.indicators LI').eq(0).addClass('active');
        $slider.find('.indicators').on('click', 'LI', function(){
          slide(this.dataset.idx);
        });
    */

    slide(0);
    //End Slider

    /*
        //Nid
        $('[data-nid]').on('click', function(){
          $.get('ajax/node/' + this.dataset.nid, function(x){
            showModal('',x);
          });
        });
    */


    //Services
    /*
        $('.services-list').on('click', '.service', function(){
          $.get('ajax/services/' + this.dataset.id, function(x){
            showModal('',x);
          });
        });
    */

    //Portfolio
    var portfolioMask = function () {
      $('.portfolio .work-item').each(function () {
        var $work = $(this), $img;
        $img = $work.find('IMG');
        $work.find('.mask').height($img.height());
      });
    };

    $('#portfolio').on('click', '.work', showPortfolio);

    setTimeout(portfolioMask, 300);

    $(window).on('resize', portfolioMask);

    //Contact form
    $(document.forms.contact).on('submit', function (e) {
      e.preventDefault();

      $form = $(this);
      $form.addClass('submitted');

      var messages = {
        required_fields: Drupal.t('Please fill required fields.'),
        error_email: Drupal.t('E-mail is invalid'),
        error_unexpected: Drupal.t('Unexpected error, try again later.'),
        sending: Drupal.t('Sending...')
      }

      if (this.checkValidity && !this.checkValidity()) {
        $form.find('.contact-messages').html('<span style="color:red">' + messages.required_fields + '</span>');
        return false;
      }

      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (!re.test(this.elements['Email'].value)) {
        $form.find('.contact-messages').html('<span style="color:red">' + messages.error_email + '</span>');
        return;
      }

      $form.find('.contact-messages').html('<span style="color:green">' + messages.sending + '</span>');
      var data = new FormData(this);

      $.post('ajax/sendmail', $(this).serialize(), function (data) {
        if (data == '[OK]') {
          $form.find('.contact-messages').html('<span style="color:green">Gracias | Merci | Thank you</span>');
          $form.get(0).reset();
          $form.removeClass('submitted');
        }
        else
          $form.find('.contact-messages').html('<span style="color:red">' + messages.error_unexpected + '</span>');
      }).fail(
        function () {
          $form.find('.contact-messages').html('<span style="color:red">' + messages.error_unexpected + '</span>');
        }
      ).always(
        function () {
          setTimeout(function () {
            $form.find('.contact-messages').html('');
          }, 10000);
        }
      );

      return false;
    });


    //briefcase
    if ($('.briefcase')[0]) {

      $tabsBriefcase = $('.tab');

      $tabsBriefcase.each(function () {
        $(this).click(function () {
          let id = $(this).attr("id");
          console.log(id);
          $(this).addClass('active').siblings().removeClass('active');
          $(`[data-id=${id}]`).addClass('active').siblings().removeClass('active');
        })
      })
    }

    //pop up comment
    $('.open-form').on('click', function () {
      $('#popup').fadeIn('slow');
      $('.popup-overlay').fadeIn('slow');
      $('.popup-overlay').height('100%');
      return false;
    });

    $('#close').on('click', function () {
      $('#popup').fadeOut('slow');
      $('.popup-overlay').fadeOut('slow');
      return false;
    });
  });

}(jQuery));

function showModal(title, body) {

  $modal = jQuery('#modal');

  if (title) {
    $modal.find('.modal-title').html(title);
  }

  $modal.find('.modal-body').html(body);
  $modal.modal('show');

}

function showPortfolio() {
  var $win = jQuery('#work-window');
  jQuery('html,body').animate({
    scrollTop: jQuery('#portfolio').offset().top + (window.smoothOffset || 0)
  }, 500);

  $win.html('<div class="text-center"><img src="' + Drupal.settings.basePath + 'sites/all/themes/' + Drupal.settings.ajaxPageState.theme + '/img/loading.gif"></div>');

  jQuery.get('ajax/node/' + this.dataset.nid, function (x) {
    $win.html(x);
  });
}

function showPortfolioa(x) {
  var $win = jQuery('#work-window');
  $win.html(x);
}

function closePortfolio() {
  var $win = jQuery('#work-window');
  $win.html('');
  jQuery('html,body').animate({
    scrollTop: jQuery('#portfolio').offset().top + (window.smoothOffset || 0)
  }, 500);
}
/* Theme Name: Jobya - Responsive Landing Page Template
   Author: Themesdesign
   Version: 1.0.0
*/


(function ($) {

    var conf = {
        "scrollHeader": true
    }

    'use strict';

    // Menu
    $('.navbar-toggle').on('click', function (event) {
        $(this).toggleClass('open');
        $('#navigation').slideToggle(400);
    });

    $('.navigation-menu>li').slice(-1).addClass('last-elements');

    $('.menu-arrow,.submenu-arrow').on('click', function (e) {
        if ($(window).width() < 992) {
            e.preventDefault();
            $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
        }
    });

    $(".navigation-menu a").each(function () {
        if (this.href == window.location.href) {
            $(this).parent().addClass("active");
            $(this).parent().parent().parent().addClass("active");
            $(this).parent().parent().parent().parent().parent().addClass("active");
        }
    });

    // Clickable Menu
    $(".has-submenu a").click(function() {
        if(window.innerWidth < 992){
            if($(this).parent().hasClass('open')){
                $(this).siblings('.submenu').removeClass('open');
                $(this).parent().removeClass('open');
            } else {
                $(this).siblings('.submenu').addClass('open');
                $(this).parent().addClass('open');
            }
        }
    });

    $('.mouse-down').on('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 0
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });

    //Sticky
    if(conf.scrollHeader){
        $(window).on("scroll", function(){
            var scroll = $(window).scrollTop();
            if (scroll >= $(".defaultscroll").offset().top) {
                $(".defaultscroll").addClass("scroll");
                $(".defaultscroll").css('position','fixed');
            } if(scroll < 176) {
                $(".defaultscroll").removeClass("scroll");
                $(".defaultscroll").css('position','relative');
            }
        });
    }



})(jQuery)

/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function ($) {
    $(document).ready(function () {





    $('#mainmenu li').hover(function(){
        $(this).children('ul').stop(true,true).fadeIn();
    })
    $('#mainmenu li').mouseleave(function(){
        $(this).children('ul').stop(true,true).fadeOut();
    })

    $('#mainmenu > ul > li.mega > ul > li').hover(function(){
        $(this).addClass('active').siblings().removeClass('active');
    })


    function moheight(){

        $('.mega-container').each(function(){
            var a =$(this);

           var maxHeight = -1;

           a.find('.mega-submenu').each(function() {
             maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
           });

             a.css('min-height', maxHeight+20);
        })
    }
    moheight();

    function hheight(){

        $('#feature').each(function(){
            var a =$(this);

           var maxHeight = -1;

           a.find('.single-feature').each(function() {
             maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
           });

             a.find('.single-feature').css('min-height', maxHeight);
        })
    }

    $(window).load(function(){
            moheight();
          hheight();

    })

    $('.tab-nav li').click(function(){
    var a= $(this).index();
    var b= $(this).parent().parent().siblings('.tab-container');
        $(this).addClass('active').siblings().removeClass('active');
        b.children('ul').children('li').eq(a).addClass('active').siblings().removeClass('active');
    })


     if($('ul.city-slist').length){
        $('ul.city-list').each(function(){

        $(this).owlCarousel({
            // loop:true,
            margin:5,
            rtl: true,autoWidth:true,
            nav: true,
            navText:["<span class='prev'> <svg width='11' height='20.001' viewBox='0 0 11 20.001'><g><path d='M259.633,6538.708a1.062,1.062,0,0,1-1.464,0l-8.563-8.264a1.95,1.95,0,0,1,0-2.827l8.625-8.325a1.063,1.063,0,0,1,1.454-.01.976.976,0,0,1,.011,1.425l-7.894,7.617a.975.975,0,0,0,0,1.414l7.831,7.557a.974.974,0,0,1,0,1.413' transform='translate(-248.999 -6518.999)' fill-rule='evenodd' fill='#fff'/></g></svg></span>",
            "<span class='next'><svg xmlns='http://www.w3.org/2000/svg' width='11' height='20.001' viewBox='0 0 11 20.001'><g id='Page-1' transform='translate(0 0.001)'><g transform='translate(-305 -6679)'><g transform='translate(56 160)'><path d='M249.366,6538.708a1.062,1.062,0,0,0,1.464,0l8.563-8.264a1.95,1.95,0,0,0,0-2.827l-8.625-8.325a1.063,1.063,0,0,0-1.454-.01.977.977,0,0,0-.011,1.425l7.894,7.617a.975.975,0,0,1,0,1.414l-7.831,7.557a.974.974,0,0,0,0,1.413' fill-rule='evenodd' fill='#fff'/></g></g></g></svg></span>"],
            dots: false,
                    items:3,
                autoplay:false,
                autoplaySpeed: 2000,
            autoplayTimeout:7000,
            responsiveClass:true,
            responsive : {
                0 : {
                    items:1

                },
                480 : {
                    items:1,

                },
                1000 : {
                    items:2

                },
                1300 : {
                    items:3

                },
                1600 : {
                    items:3

                },
                1700 : {
                    items:3,

                }
            }
        })
        })
    }



     if($('ul.customers').length){
        $('ul.customers').owlCarousel({
            loop:true,
            margin:30,
            rtl: true,
            nav: false,
            navText:["<span class='prev'> <svg width='11' height='20.001' viewBox='0 0 11 20.001'><g><path d='M259.633,6538.708a1.062,1.062,0,0,1-1.464,0l-8.563-8.264a1.95,1.95,0,0,1,0-2.827l8.625-8.325a1.063,1.063,0,0,1,1.454-.01.976.976,0,0,1,.011,1.425l-7.894,7.617a.975.975,0,0,0,0,1.414l7.831,7.557a.974.974,0,0,1,0,1.413' transform='translate(-248.999 -6518.999)' fill-rule='evenodd' fill='#fff'/></g></svg></span>",
            "<span class='next'><svg xmlns='http://www.w3.org/2000/svg' width='11' height='20.001' viewBox='0 0 11 20.001'><g id='Page-1' transform='translate(0 0.001)'><g transform='translate(-305 -6679)'><g transform='translate(56 160)'><path d='M249.366,6538.708a1.062,1.062,0,0,0,1.464,0l8.563-8.264a1.95,1.95,0,0,0,0-2.827l-8.625-8.325a1.063,1.063,0,0,0-1.454-.01.977.977,0,0,0-.011,1.425l7.894,7.617a.975.975,0,0,1,0,1.414l-7.831,7.557a.974.974,0,0,0,0,1.413' fill-rule='evenodd' fill='#fff'/></g></g></g></svg></span>"],
            dots: false,
                    items:8,
                autoplay:true,
                autoplaySpeed: 2000,
            autoplayTimeout:7000,
            responsiveClass:true,
            responsive : {
                0 : {
                    items:2

                },
                480 : {
                    items:3,

                },
                1000 : {
                    items:5

                },
                1300 : {
                    items:6

                },
                1600 : {
                    items:7

                },
                1700 : {
                    items:8,

                }
            }
        })
    }





    $("#sidemenu").metisMenu();


    $('#mobile-menu span').click(function(){
        $('#sidebarmenu').addClass('active');
        $('body').addClass('opend');
    })
    $('#sidebarmenu > div .top .close').click(function(){
        $('#sidebarmenu').removeClass('active');
        $('body').removeClass('opend');
    })



// Search pop
$('#header .search-but').click(function(){
    $('#searchpop').slideDown();
    $('.search-pop-form input').focus();
})
$('#searchpop span.close').click(function(){
    $('#searchpop').fadeOut();
})



$('#agencymap .province path').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
    var a= $(this).data('state');
    $('#'+a).addClass('active').siblings().removeClass('active');
})


// Start Masonry
if($('.product-gallery').length){

window.onload = function() {
  var msnry = new Masonry('.product-gallery', {
    columnWidth: '.grid-item',
    itemSelector: '.grid-item'
  });
};

var updateMasonry = function(){
  $('.product-gallery').masonry({
    columnWidth: '.grid-item',
    itemSelector: '.grid-item'
  })
}
$('.tab-nav li').on('click', updateMasonry);
$(window).on('resize load', updateMasonry);

$('.product-gallery').imagesLoaded(function () {
    $('.product-gallery').masonry();
});
}
// End Masonry



   if($('.slider').length){


        $('.slider').owlCarousel({
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            loop:true,
            rtl: true,
            margin:0,
            nav:false,
            dots: false,
            singleItem:true,
            smartSpeed: 500,
            autoplay: true,
            autoplayTimeout:6000,
            navText: [ '<span class="fas fa-angle-left"></span>', '<span class="fas fa-angle-right"></span>' ],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1024:{
                    items:1
                }
            }

        })
        }



            $('#agencymap svg g path').hover(function() {
        var className = $(this).attr('class');
        var parrentClassName = $(this).parent('g').attr('class');
        var itemName = $(this).data('name');
        if (itemName) {
            $('#agencymap .show-title').html(itemName).css({'display': 'block'});
        }
    }, function() {
        $('#agencymap .list a').removeClass('hover');
        $('#agencymap .show-title').html('').css({'display': 'none'});
    });



    $('#agencymap').mousemove(function(e) {
        var posx = 0;
        var posy = 0;
        if (!e)
            var e = window.event;
        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        } else if (e.clientX || e.clientY) {
            posx = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }
        if ($('#agencymap .show-title').html()) {
            var offset = $(this).offset();
            var x = (posx - offset.left + 25) + 'px';
            var y = (posy - offset.top - 5) + 'px';
            $('#agencymap .show-title').css({'left': x, 'top': y});
        }
    });





    })
})(jQuery);

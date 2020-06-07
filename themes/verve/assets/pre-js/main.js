// ===================================
//   On Scroll logo and btn in view 
// ===================================

 function debounce(func, wait = 10, immediate = true) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

var showOnScroll = function(){
	let windowScrollTop = $(window).scrollTop();
	let headerLogo = $('.header__logo');
	let mainBtn = $('.btn-book--main');
	let aboutSecTop = $('.about-sec').offset().top - 40;
	let registerSec = $('.last-sec').offset().top;
	console.log(aboutSecTop);
	if( windowScrollTop >  aboutSecTop)  {
		headerLogo.fadeIn();
		mainBtn.fadeIn();
	}
	else {
		headerLogo.fadeOut();
		mainBtn.fadeOut();
	}
	if( windowScrollTop >  registerSec - 300) {
		mainBtn.addClass('hide-btn');
	}
	else {
		mainBtn.removeClass('hide-btn');
	}
};

if($(window).width() < 1024) {
	$(window).scroll(debounce(showOnScroll));
}


 // Gallery
$('[data-fancybox="images"], [data-fancybox2="images"]').fancybox({
    // Options will go here
    buttons: [
        "close"
    ],
    thumbs : {
        autoStart : false
    },
    mobile : {
        clickContent : "close",
        clickSlide : "close"
    }
});

$(".btn-play").on('click', function(){
    $(this).closest('.slide__media').find('[data-fancybox2="images"]').trigger('click');
});

//-- HOW SEC slider
$('.how-sec .slider-wrapper').slick({
    dots: true,
    lazyLoad: 'progessive',
    prevArrow: $('.how-sec .btn-prev'),
    nextArrow: $('.how-sec .btn-next'),
    responsive: [
        {
            breakpoint: 990,
            settings: {
                adaptiveHeight: true
            }
        }
    ]
});

$('.testimonials-sec .slider-wrapper').slick({
    dots: true,
    lazyLoad: 'progessive',
    prevArrow: $('.testimonials-sec .btn-prev'),
    nextArrow: $('.testimonials-sec .btn-next'),
     responsive: [
        {
            breakpoint: 990,
            settings: {
                adaptiveHeight: true
            }
        }
    ]
});




AOS.init({
    disable: function() {
        var maxWidth = 1024;
        return window.innerWidth > maxWidth;
    },
    once: true,
    duration: 1000, // values from 0 to 3000, with step 50ms
    easing: 'ease'
});

//-- SVG animation

var verveAnimation;
var giftHolder = document.getElementById('gift-effect');
var animation = {
    container: giftHolder,
    renderer: 'svg',
    autoplay: true,
    rendererSettings: {
        progressiveLoad:true
    },
    //animationData: $('.preloader').data('json') //'/themes/verve/assets/json/fade.json'
}

if($('.preloader').data('json')){
    animation['animationData'] = $('.preloader').data('json');
}
else{
    animation['path'] = '/themes/verve/assets/json/fade.json';
}
//console.log(animation);
//-- preloader
$(document).ready(function() {
    $(window).on("load", function() {
        preloaderFadeOutTime = 400;
        function hidePreloader() {
            var preloader = $('.preloader');
            var preloaderSpin = $('.preloader img');
            preloaderSpin.hide();
            preloader.fadeOut(preloaderFadeOutTime);
        }
        hidePreloader();
         //-- gift animation start
        setTimeout(function(){
            giftAnimation = bodymovin.loadAnimation(animation);
            $('.hero-sec, body').addClass('hero-loaded');
        }, 1000);
        setTimeout(function(){
            $('#gift-effect, .header__logo').addClass('load-gift-effect');
        }, 3800); 
        $('.hero-sec').addClass('hero-loaded-mob');
    });
   
});

//-- Scroll to top

$(window).scroll(function(){
    let windowScrollTop = $(window).scrollTop();
    if(windowScrollTop > 200) {
        $('.back-to-top').fadeIn();
    }
    else {
        $('.back-to-top').fadeOut();
    }
});



$('.back-to-top').click(function() {
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
});

if($(window).width() < 990) {
    $('.hero-sec .btn-book').click(function(e){
        e.preventDefault();
        $('html, body').animate({ scrollTop: $(".about-sec").offset().top }, 'slow');
        return false;
    });
}









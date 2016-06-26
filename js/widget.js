(function($){
	"use strict";
	$(document).ready(function(){

	});

	// Window load event with minimum delay
	// @link https://css-tricks.com/snippets/jquery/window-load-event-with-minimum-delay/
	(function fn() {
		fn.now = +new Date;
		$(window).load(function() {
			if (+new Date - fn.now < 500) {
				setTimeout(fn, 500);
			}
			// Do stuffs right here
            if( $('.rwpw-image-carousel').length > 0 ) {
                $('.rwpw-image-carousel').each(function(index){
                    var instance = $(this).data('instance');
                    slideshowInstance(instance);
                });

                function slideshowInstance(instance) {
                    var obj = window['imagecarousel' + instance];

                    var sid = obj.id,
                        item = obj.items,
                        navigation = (obj.navigation == "true"),
                        pagination = (obj.pagination == "true"),
                        autoplay = (obj.autoplay == "true"),
                        smartspeed = obj.smartspeed,
                        fluidspeed = obj.fluidspeed,
                        autoheight = (obj.autoheight == "true"),
                        autowidth = (obj.autowidth == "true"),
                        lazyload = (obj.lazyload == "true"),
                        mergefit = (obj.mergefit == "true"),
                        center = (obj.center == "true"),
                        slidesmobile = obj.slidesmobile,
                        slidestablet = obj.slidestablet,
                        loop = obj.loop,
                        margin = obj.margin;

                    var owl = $('#' + sid);

                    owl.on('initialized.owl.carousel', function(e) {
                        var curr = $('#' + e.target.id),
                            maxHeight = 0;

                        curr.find('.owl-item img').each(function() {
                            if ($(this).height() > maxHeight) {
                                maxHeight = $(this).height();
                            }
                        });

                        curr.find('.owl-item').height(maxHeight);
                    });

                    owl.owlCarousel({
                        items: item,
                        margin: parseInt(margin),
                        nav: navigation,
                        dots: pagination,
                        autoplay: autoplay,
                        smartSpeed: smartspeed,
                        fluidSpeed: fluidspeed,
                        loop: loop,
                        autoHeight: autoheight,
                        center: center,
                        mergeFit: mergefit,
                        autoWidth: autowidth,
                        navText: ['&#xf104;', '&#xf105;'],
                        responsive: {
                            0: {
                                items: slidesmobile,
                                nav: navigation
                            },
                            768: {
                                items: slidestablet,
                                nav: navigation
                            },
                            1024: {
                                items: item,
                                nav: navigation
                            }
                        }
                    });
                }
            }	
		});
	})();
})(jQuery);
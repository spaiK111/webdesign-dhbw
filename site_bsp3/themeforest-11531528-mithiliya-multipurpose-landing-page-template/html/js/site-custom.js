	$(window).load(function() {

	    'use strict';
	    $("#pageloader").delay(1200).fadeOut("slow");
	    $(".loader-item").delay(700).fadeOut();

	});


	/* ==============================================
	Custom Javascript
	=============================================== */
	$(document).ready(function() {

	    'use strict';
		
		// Main Navigation
		jQuery("#main-menu").menuzord({
			align: "right",
			animation:"drop-up",
			effect:"fade",
			indicatorFirstLevel: "<i class='fa fa-angle-down'></i>",
			indicatorSecondLevel: "<i class='fa fa-angle-right'></i>"
		});
		
		$(function() {
			var header = $("#nav-wrap"),
				yOffset = 0,
				triggerPoint = 150;
			$(window).scroll(function() {
				yOffset = $(window).scrollTop();
	
				if (yOffset >= triggerPoint) {
					header.addClass("navbar-fixed-top animated fadeInDown");
				} else {
					header.removeClass("navbar-fixed-top animated fadeInDown");
				}
	
			});
		});
		
		/* Tooltip */
		$('.team-social ul li a, .demo-button a, .portfolio-buttons a, .social-icons ul li a').tooltip({
			placement: 'top',
			animation:true,
			delay: { show: 200, hide: 100 }
		});
		
		// Parallax Background
	    $.stellar({
	        responsive: true,
	        horizontalScrolling: false,
	        verticalOffset: 40
	    });
		
		/* Conter */
		$('.counter').counterUp({
            delay: 10,
            time: 1000
        });
		
		$('.skillbar').appear();
			$('.skillbar').on('appear', function () {			
			$(this).find('.skillbar-bar').animate({
				width: $(this).attr('data-percent')
			}, 3000);			
		});
			
		// Twitter Feed
	    $(".tweet-stream").tweet({
	        username: "envato",
	        modpath: "twitter/",
	        count: 1,
	        template: "{text}{time}",
	        loading_text: "loading twitter feed..."
	    });
		
		// Flickr Photostream
		$('#basicuse').jflickrfeed({
	        limit: 9,
	        qstrings: {
	            id: '52617155@N08'
	        },
	        itemTemplate: '<li><a href="{{image_b}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
	    });
		
		/* Responsive Videos */
		$(".media.video").fitVids();
		
		/* hide #back-top first */
	    $("#back-top").hide();
	    // fade in #back-top
	    $(function() {
	        $(window).scroll(function() {
	            if ($(this).scrollTop() > 100) {
	                $('#back-top').fadeIn();
	            } else {
	                $('#back-top').fadeOut();
	            }
	        });
	        // scroll body to 0px on click
	        $('#back-top a').click(function() {
	            $('body,html').animate({
	                scrollTop: 0
	            }, 800);
	            return false;
	        });
	    });
		
		/* Fancybox Lightbox */
		$(".fancybox").fancybox({
			helpers: {
				overlay: {
					locked: false, // try changing to true and scrolling around the page
					title: {
						type: 'outside'
					},
					thumbs: {
						width: 50,
						height: 50
					}
				}
			}
		});
		
		
		// Portfolio Single Slider
		$("#portfolio-single").owlCarousel({
	        items: 1,
	        margin: 0,
	        loop: true,
	        nav: true,
	        slideBy: 1,
	        dots: false,
	        center: false,
	        autoplay: false,
	        autoheight: true,
	        navText: ['&#xf104;', '&#xf105'],
	        responsive: {
	            320: {
	                items: 1,
	            },
	            480: {
	                items: 1,
	            },
	            600: {
	                items: 1,
	            },
	            1000: {
	                items: 1,
	                loop: true,
	            },
				1200: {
	                items: 1,
	                loop: true
	            }
	        }
	    });
		
		// Our Portfolio Slider
		$("#home-portfolio").owlCarousel({
	        items: 5,
	        margin: 0,
	        loop: true,
	        nav: false,
	        slideBy: 1,
	        dots: false,
	        center: false,
	        autoplay: false,
	        autoheight: true,
	        navText: ['&#xf104;', '&#xf105'],
	        responsive: {
	            320: {
	                items: 1,
	            },
	            480: {
	                items: 2,
	            },
	            600: {
	                items: 2,
	            },
	            1000: {
	                items: 4,
	                loop: true,
	            },
				1200: {
	                items: 5,
	                loop: true
	            }
	        }
	    });
		
		$("#home-portfolio-2").owlCarousel({
	        items: 3,
	        margin: 30,
	        loop: true,
	        nav: true,
	        slideBy: 1,
	        dots: false,
	        center: false,
	        autoplay: true,
	        autoheight: true,
	        navText: ['&#xf104;', '&#xf105'],
	        responsive: {
	            320: {
	                items: 1,
	            },
	            480: {
	                items: 2,
	            },
	            600: {
	                items: 2,
	            },
	            1000: {
	                items: 3,
	                loop: true,
	            },
				1200: {
	                items: 3,
	                loop: true
	            }
	        }
	    });
		
		// Testimonial Slider
		$("#home-testimonial, #shop-detail").owlCarousel({
	        items: 1,
	        margin: 0,
	        loop: true,
	        nav: false,
	        slideBy: 1,
	        dots: true,
	        center: false,
	        autoplay: false,
	        autoheight: true,
	        navText: ['&#xf104;', '&#xf105'],
	        responsive: {
	            320: {
	                items: 1,
					nav: false,
	            },
	            480: {
	                items: 1,
					nav: false,
	            },
	            600: {
	                items: 1,
					nav: false,
	            },
	            1000: {
	                items: 1,
	                loop: true,
					nav: false,
	            },
				1200: {
	                items: 1,
	                loop: true,
					nav: false
	            }
	        }
	    });
		
		// Testimonial Slider
		$("#home-blog").owlCarousel({
	        items: 1,
	        margin: 30,
	        loop: true,
	        nav: true,
	        slideBy: 1,
	        dots: false,
	        center: false,
	        autoplay: false,
	        autoheight: true,
	        navText: ['&#xf104;', '&#xf105'],
	        responsive: {
	            320: {
	                items: 1,
	            },
	            480: {
	                items: 2,
	            },
	            600: {
	                items: 2,
	            },
	            1000: {
	                items: 3,
	                loop: true,
	            },
				1200: {
	                items: 3,
	                loop: true
	            }
	        }
	    });
		
		// Home Clients Slider
		$("#home-clients").owlCarousel({
	        items: 6,
	        margin: 30,
	        loop: true,
	        nav: false,
	        slideBy: 1,
	        dots: false,
	        center: false,
	        autoplay: true,
	        autoheight: true,
	        navText: ['&#xf104;', '&#xf105'],
	        responsive: {
	            320: {
	                items: 2,
	            },
	            480: {
	                items: 2,
	            },
	            600: {
	                items: 4,
	            },
	            1000: {
	                items: 5,
	                loop: true,
	            },
				1200: {
	                items: 6,
	                loop: true
	            }
	        }
	    });	
		
		
		
		// Open Video
	    jQuery('.play-video').on('click', function(e) {
	        var videoContainer = jQuery('.video-box');
	        videoContainer.prepend('<iframe src="http://player.vimeo.com/video/7449107" width="500" height="281" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>');
	        videoContainer.fadeIn(300);
	        e.preventDefault();
	    });
	    // Close Video
	    jQuery('.close-video').on('click', function(e) {
	        jQuery('.video-box').fadeOut(400, function() {
	            jQuery("iframe", this).remove().fadeOut(300);
	        });
	    });
		
		// Google Map
		$("#map_extended").gMap({
	        markers: [{
	            address: "",
	            html: '<h4>Office</h4>' +
	                '<address>' +
	                '<div>' +
	                '<div><b>Address:</b></div>' +
	                '<div>Envato Pty Ltd, 13/2<br> Elizabeth St Melbourne VIC 3000,<br> Australia</div>' +
	                '</div>' +
	                '<div>' +
	                '<div><b>Phone:</b></div>' +
	                '<div>+1 (408) 786 - 5117</div>' +
	                '</div>' +
	                '<div>' +
	                '<div><b>Fax:</b></div>' +
	                '<div>+1 (408) 786 - 5227</div>' +
	                '</div>' +
	                '<div>' +
	                '<div><b>Email:</b></div>' +
	                '<div><a href="mailto:info@mithiliya.com">info@info@mithiliya.com</a></div>' +
	                '</div>' +
	                '</address>',
	            latitude: -33.87695388579145,
	            longitude: 151.22183918952942,
	            icon: {
	                image: "images/pin.png",
	                iconsize: [35, 48],
	                iconanchor: [17, 48]
	            }
	        }, ],
	        icon: {
	            image: "images/pin.png",
	            iconsize: [35, 48],
	            iconanchor: [17, 48]
	        },
	        latitude: -33.87695388579145,
	        longitude: 151.22183918952942,
	        zoom: 16
	    });

		
		// Contact Form
		jQuery("#contact_form").validate({
	        meta: "validate",
	        submitHandler: function(form) {

	            var s_name = $("#name").val();
	            var s_lastname = $("#lastname").val();
	            var s_email = $("#email").val();
	            var s_phone = $("#phone").val();
	            var s_suject = $("#subject").val();
	            var s_comment = $("#comment").val();
	            $.post("contact.php", {
	                    name: s_name,
	                    lastname: s_lastname,
	                    email: s_email,
	                    phone: s_phone,
	                    subject: s_suject,
	                    comment: s_comment
	                },
	                function(result) {
	                    $('#sucessmessage').append(result);
	                });
	            $('#contact_form').hide();
	            return false;
	        },
	        /* */
	        rules: {
	            name: "required",

	            lastname: "required",
	            // simple rule, converted to {required:true}
	            email: { // compound rule
	                required: true,
	                email: true
	            },
	            phone: {
	                required: true,
	            },
	            comment: {
	                required: true
	            },
	            subject: {
	                required: true
	            }
	        },
	        messages: {
	            name: "Please enter your name.",
	            lastname: "Please enter your last name.",
	            email: {
	                required: "Please enter email.",
	                email: "Please enter valid email"
	            },
	            phone: "Please enter a phone.",
	            subject: "Please enter a subject.",
	            comment: "Please enter a comment."
	        },
	    }); /*========================================*/
		
	});
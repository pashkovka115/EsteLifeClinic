$(function() {
	$('select').niceSelect();

	$(".popup-form").animated("bounceInDown", "fadeInDown");

	$('.tel-input').inputmask('+7(999)999-99-99');


	$(".navigation").sticky({ topSpacing: 0 });




	 $(".before-after-box .image").twentytwenty();

	$(".accordeon dd").hide().prev().click(function() {
		$(this).parents(".accordeon").find("dd").not(this).slideUp().prev().removeClass("active");
		$(this).next().not(":visible").slideDown().prev().addClass("active");
	});

	$(".tab_item").not(":first").hide();
	$(".wrapper .tab").click(function() {
		$(".wrapper .tab").removeClass("active").eq($(this).index()).addClass("active");
		$(".tab_item").hide().eq($(this).index()).fadeIn()
	}).eq(0).addClass("active");


	$(".map-block .tab_item").not(":first").hide();
	$(".map-block .tab").click(function() {
		$(".map-block .tab").removeClass("active").eq($(this).index()).addClass("active");
		$(".map-block .tab_item").hide().eq($(this).index()).fadeIn()
	}).eq(0).addClass("active");


	$("#contacts-form .tab_item").not(":first").hide();
	$("#contacts-form .tab").click(function() {
		$("#contacts-form .tab").removeClass("active").eq($(this).index()).addClass("active");
		$("#contacts-form .tab_item").hide().eq($(this).index()).fadeIn()
	}).eq(0).addClass("active");

	$("header .add a").click(function() {
		$("#contacts-form").find(".tab_item:first-child").css("display", "block");
		$("#contacts-form").find(".tab_item:last-child").css("display","none");
	});



	$(".open-menu-level-2").click(function() {
		$(this).toggleClass("active");
		$(this).parents(".level-1").find(".level-2-list").slideToggle();
	});

	$(".open-menu-level-3").click(function() {
		$(this).toggleClass("active");
		$(this).parents(".level-2").find(".level-3-list").slideToggle();
	});


	$(".btn-menu").click(function() {
		$(".mobile-menu-block").toggleClass("active");
	});

	$(".close-menu").click(function() {
		$(".mobile-menu-block").toggleClass("active");
	});


	$(".mobile-tab").click(function() {
		$(this).parents(".tab_item").find(".wrap").slideToggle();
	});


	$(document).mouseup(function (e){ // ?????????????? ?????????? ???? ??????-??????????????????
		var div = $(".mobile-menu-block"); // ?????? ?????????????????? ID ????????????????
		if (!div.is(e.target) // ???????? ???????? ?????? ???? ???? ???????????? ??????????
		    && div.has(e.target).length === 0) { // ?? ???? ???? ?????? ???????????????? ??????????????????
			div.removeClass("active"); // ???????????????? ??????
		}
	});






	$(".column-menu h4").click(function() {
		$(this).toggleClass("active");
		$(this).parents(".column-menu").find(".menu-wrap").slideToggle();
	});

	$('#step-2-back').on('click', function (){
        let form_order = $("form#order");
        form_order.find(".step-digit-2").removeClass("active");
        form_order.find(".step-digit-1").addClass("active");
        form_order.find(".step-1").addClass("active");
        form_order.find(".step-2").removeClass("active");
    });

	$('#step-3-back').on('click', function (){
        let form_order = $("form#order");
        form_order.find(".step-digit-2").addClass("active");
        form_order.find(".step-digit-3").removeClass("active");
        form_order.find(".step-3").removeClass("active");
        form_order.find(".step-2").addClass("active");
    });


	$("#step-2").click(function() {
        // console.log($(this).siblings('input[name="name"]').val())
        if ($(this).siblings('input[name="name"]').val() === ''){
            $(this).siblings('input[name="name"]').css('borderColor', 'red');
            return false;
        }else {
            $(this).siblings('input[name="name"]').css('borderColor', 'green');
        }
        if ($(this).siblings('input[name="phone"]').val() === ''){
            $(this).siblings('input[name="phone"]').css('borderColor', 'red');
            return false;
        }else {
            $(this).siblings('input[name="phone"]').css('borderColor', 'green');
        }

		$(this).parents(".popup-form").find(".step-item").removeClass("active");
		$(".step-2").addClass("active");
		$(".popup-form").find(".step-digit").removeClass("active");
		$(".step-digit-2").addClass("active");
	});

	$("#step-3").click(function() {
		$(this).parents(".popup-form").find(".step-item").removeClass("active");
		$(".step-3").addClass("active");
		$(".popup-form").find(".step-digit").removeClass("active");
		$(".step-digit-3").addClass("active");
	});

	// My
    $("#step-22").on('click', function() {
        var step_item = $(this).parents(".popup-form").find(".step-item");
        if (step_item.find('input[name="name"]').val() !== '' && step_item.find('input[name="phone"]').val() !== ''){

            $(this).parents(".popup-form").find(".step-item").removeClass("active");
            $(".step-22").addClass("active");
            $(".popup-form").find(".step-digit").removeClass("active");
            $(".step-digit-22").addClass("active");
            //
            var doctor_id = $('#doctor_online').data('doctor');

            var lis = $('#online').find('select[name="doctor_id"]').next('div.nice-select').find('ul.list li');
            lis.removeClass('selected focus');
            $(lis).each(function (i, el){
                var elm = $(el);
                // console.log(elm.data('value'), doctor_id)
                if (elm.data('value') === doctor_id){
                    $(elm).addClass('selected focus');
                    var text = $(elm).text();
                    // $(elm).parent('ul').prev().text(text);
                    // elm.parentElement.nod.textContent = text;
                    $(elm).parents('div.nice-select').find('span.current').text(text);
                    return false;
                }
            });
            var select = $('#online').find('select[name="doctor_id"]').find('option[value="'+doctor_id+'"]').prop('selected', true);
        }else {
            step_item.find('input[name="name"]').css('borderColor', 'red');
            step_item.find('input[name="phone"]').css('borderColor', 'red');
        }
    });

    $("#step-33").click(function() {
        if (cat_servise_id.value !== '0' && service_id.value !== '0' && doctor_id.value !== '0'){
            $(this).parents(".popup-form").find(".step-item").removeClass("active");
            $(".step-33").addClass("active");
            $(".popup-form").find(".step-digit").removeClass("active");
            $(".step-digit-33").addClass("active");
        }else {
            $(cat_servise_id).css('color', 'red');
            $(service_id).css('color', 'red');
            $(doctor_id).css('color', 'red');
        }


    });
	// End My




	$('.slider').slick({
	  dots: true,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  customPaging: function(slider, i) {
      // this example would render "tabs" with titles
     	 return '<span class="dot"></span>';
   		 },
	  appendDots: '.slick-dots-custom',
	  prevArrow: '',
	  nextArrow: '',
	  //asNavFor: '.slider-nav'
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
	//$('.slider-nav').slick({
	//  slidesToShow: 4,
	//  slidesToScroll: 1,
	//  asNavFor: '.slider-for',
	//  focusOnSelect: true
	//});


	$('.action-slider').slick({
	  dots: false,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  prevArrow: $('#action-slider-prev-btn'),
	  nextArrow: $('#action-slider-next-btn'),
	  //asNavFor: '.slider-nav'
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});


	var slider = $('.action-slider');
	$('.sl-count__total').text( slider.slick("getSlick").slideCount);
	$(".action-slider").on('afterChange', function(event, slick, currentSlide){
	     $(".sl-count__current").text(currentSlide + 1);
	});




	$('.slider-company').slick({
	  dots: true,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  customPaging: function(slider, i) {
      // this example would render "tabs" with titles
     	 return '<span class="dot"></span>';
   		 },
	  appendDots: '.slick-dots-custom2',
	  prevArrow: $('#slider-company-prev-btn'),
	  nextArrow: $('#slider-company-next-btn'),
	  asNavFor: '.slider-company-thumb',
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        infinite: true,
	        dots: true
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});
	$('.slider-company-thumb').slick({
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  prevArrow: "",
	  nextArrow: "",
	  asNavFor: '.slider-company',
	  focusOnSelect: true
	});



	$('.gallery-company-slider').slick({
	  dots: false,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 1,
	  slidesToScroll: 1,
	  variableWidth: true,
	  prevArrow: $('#gallery-company-prev-btn'),
	  nextArrow: $('#gallery-company-next-btn'),
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        variableWidth: false
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1,
	        variableWidth: false
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});


	$('.cert-slider').slick({
	  dots: false,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  prevArrow: '<button type="button" class="btn-slider prev"><i class="demo-icon icon-arrow-left"></i></button>',
	  nextArrow: '<button type="button" class="btn-slider next"><i class="demo-icon icon-arrow-right"></i></button>',
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 4,
	        slidesToScroll: 4
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});



	$('.reviews-slider').slick({
	  dots: false,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 2,
	  slidesToScroll: 2,
	  prevArrow: '<button type="button" class="btn-slider prev"><i class="demo-icon icon-arrow-left"></i></button>',
	  nextArrow: '<button type="button" class="btn-slider next"><i class="demo-icon icon-arrow-right"></i></button>',
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});



	$('.products-slider').slick({
	  dots: false,
	  infinite: false,
	  speed: 1000,
	  infinite: true,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  prevArrow: '<button type="button" class="btn-slider prev"><i class="demo-icon icon-arrow-left"></i></button>',
	  nextArrow: '<button type="button" class="btn-slider next"><i class="demo-icon icon-arrow-right"></i></button>',
	  responsive: [
	    {
	      breakpoint: 1200,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3
	      }
	    },
	    {
	      breakpoint: 992,
	      settings: {
	        slidesToShow: 3,
	        slidesToScroll: 3
	      }
	    },
	    {
	      breakpoint: 768,
	      settings: {
	        slidesToShow: 2,
	        slidesToScroll: 2
	      }
	    },
	    {
	      breakpoint: 576,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    },
	    {
	      breakpoint: 0,
	      settings: {
	        slidesToShow: 1,
	        slidesToScroll: 1
	      }
	    }

	    // You can unslick at a given breakpoint now by adding:
	    // settings: "unslick"
	    // instead of a settings object
	  ]
	});



	$('.popup-gallery').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: '???????????????? ?????????????????????? #%curr%...',
		mainClass: 'mfp-fade mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">?????????????????????? #%curr%</a> ???? ??????????????????.',
			titleSrc: function(item) {
				return '';
			}
		}
	});

	$(".main_mnu_button").click(function() {
		$(this).toggleClass("active");
		$("nav > ul").slideToggle();
	});


	$(".btn-open-search").click(function() {
		$(this).toggleClass("active");
		$(".search-box").slideToggle();
	});


	$(".table-expand").click(function() {
		$(".table-wrap").toggleClass("active");
		$(this).text(function(i, text){
          return text === "???????????????? ??????????????" ? "???????????????? ??????????????" : "???????????????? ??????????????";
      })
	});


	$(".open-price-list").click(function() {
		$(this).parents(".price-list-item").find(".hidden-part").slideToggle();
		$(this).text(function(i, text){
          return text === "???????????????? ??????????????" ? "???????????????????? ??????????????" : "???????????????? ??????????????";
      })
	});


	$(".education .more").click(function() {
		$(this).parents(".education").find(".hidden-part").slideToggle();
		$(this).text(function(i, text){
          return text === "????????????????" ? "????????????????" : "????????????????";
      })
	});

	$(".icon-block .more").click(function() {
		$(this).parents(".icon-block").find(".hidden-part").slideToggle();
		$(this).text(function(i, text){
          return text === "????????????????" ? "???????????? ????????????..." : "????????????????";
      })
	});


	$('.popup-with-form').magnificPopup({
		type: 'inline',
		preloader: false,
		focus: '#name',
		mainClass: 'mfp-fade',
		// When elemened is focused, some mobile browsers in some cases zoom in
		// It looks not nice, so we disable it:
		callbacks: {
			beforeOpen: function() {
				if($(window).width() < 700) {
					this.st.focus = false;
				} else {
					this.st.focus = '#name';
				}
			}
		}
	});

	$('.popup').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-fade mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});

	//???????????? "????????????"
	//????????????????????????:
	//http://api.jquery.com/scrolltop/
	//http://api.jquery.com/animate/
	$("#top").click(function () {
		$("body, html").animate({
			scrollTop: 0
		}, 800);
		return false;
	});



	//Chrome Smooth Scroll
	try {
		$.browserSelector();
		if($("html").hasClass("chrome")) {
			$.smoothScroll();
		}
	} catch(err) {

	}

	$("img, a").on("dragstart", function(event) { event.preventDefault(); });




});

ymaps.ready(init);
function init () {
    // ???????????????? ???????????????????? ?????????? ?? ?????? ???????????????? ?? ???????????????????? ??
    // ???????????????? id ("map")
    var myMap = new ymaps.Map('map', {
        // ?????? ?????????????????????????? ??????????, ?????????????????????? ?????????? ??????????????
        // ???? ?????????? ?? ?????????????????????? ??????????????????????????????
        center: [45.049004, 38.982302],
        zoom: 16
    });

	// ???????????????? ??????????
	var myPlacemark = new ymaps.Placemark(
	// ???????????????????? ??????????
	[45.049004, 38.982302] , {
        // ????????????????
        // ?????????? ??????????
        hintContent: ''
    }, {
        iconImageHref: '/img/marker.svg', // ???????????????? ????????????
        iconImageSize: [40, 48], // ?????????????? ????????????????
        iconImageOffset: [-65, -130] // ???????????????? ????????????????
        });
	// ???????????????????? ?????????? ???? ??????????
	myMap.geoObjects.add(myPlacemark);
}



// ANCHOR Load

$(window).on('load', function () {
		$('.loader').fadeOut('slow', function () {
			$(this).remove(); 
		});
		$('.text_carousel_accueil').addClass('effet');
});
	
// ANCHOR Burger media-queries
	
//$(window).resize(function() {

	// if ($(window).width() < 700) {
	// 	if($('.navburger').hasClass('show')){
	// 		$('.burger').toggleClass('clicked');
	// 		$('.overlay_burger').toggleClass('show');
	// 		$('.navburger').toggleClass('show');
    //     }

	// 	burger.css('position', 'fixed');
	// 	scrollLock = false;
	// }
//});
    

var viewportHeight = $('.div_carousel_accueil').outerHeight();
function viewheight(){
        $('.div_carousel_accueil').css({ height: viewportHeight });
}
	viewheight();

// ANCHOR Variables

var navbar = $('.body_accueil .navbar');
var burger = $('.body_accueil .burger');
var footer = $('.mention_legales');
var btn = $('.button');	
var y = window.matchMedia("(max-width: 700px)");

if (y.matches) { 
	var animate_link_nav =  80;
	
} 
else {
	var animate_link_nav = ($('.navbar').outerHeight()-1 ) ;
}	



// ANCHOR Back to top



$(window).scroll(function() {
    if ($(window).scrollTop() > 400) {
        btn.addClass('show');
    } 
    else {
        btn.removeClass('show');
    }
});

btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop:0
    }, 1000);
});



$(document).ready(function() {
	

viewheight();

	// ANCHOR navbar

	scrollWindow();
	function scrollWindow () {
	
		
		$(window).scroll(function(){
			// var apropos = ($('#scroll_div_apropos').offset().top) - (animate_link_nav * 1.5);
			var st = $(this).scrollTop();
	
			if (st < 200) {
	
				if (x.matches) { 
				burger.css('position', 'absolute');
				
				burger.removeClass('burger_retour');
				burger.removeClass('burger_aller');
				}
				if ( navbar.hasClass('scroll') ) {
	
					navbar.removeClass('debut_anim_nav');
					navbar.removeClass('scroll');
	
					
				}
			} 
	
			if (st > 200){
	
				if ( !navbar.hasClass('scroll') ) {
	
					navbar.addClass('scroll');	
	
					if (x.matches) { 
						burger.css('position', 'fixed');
						burger.addClass('burger_aller');
					}
				}
			}
	
			if ( st > 500 ) {
	
				if (!navbar.hasClass('anim_nav') ) {
	
					navbar.addClass('anim_nav');
					
					if (x.matches) {
						burger.addClass('burger_arrive');
						burger.removeClass('burger_aller');
						burger.removeClass('burger_retour');
					}
				}
			}
	
			if ( st < 500 ) {
				
				if ( navbar.hasClass('anim_nav') ) {
	
					navbar.removeClass('anim_nav');
					navbar.addClass('debut_anim_nav'); 
	
					if (x.matches) { 
						// burger.fadeOut(200);
						burger.removeClass('burger_arrive');
						burger.addClass('burger_retour');
					}
				}
			}
			if( btn.offset().top >= footer.offset().top ){
				btn.addClass('btn_scroll_footer');
			}
			else{
				btn.removeClass('btn_scroll_footer');
			}
		});
	};
	
	
	var x = window.matchMedia("(max-width: 700px)");
	myFunction(x); 
	x.addListener(myFunction);
	
    function myFunction(x) {
        if (x.matches) { 
            // $('.nav_ul').css('display', 'none');
            $('.burger').css('display', 'block');
            $('.nav_ul').wrap('<div class="navburger">');
            $('<div class="overlay_burger"></div>').prependTo('.nav');
            $('.nav_ul').addClass('link_burger');
          
        } 
        else {
            // $('.nav_ul').css('display', 'block');
            $('.burger').css('display', 'none');
            $('.li_logo').css('display', 'none');
            $('.overlay_burger').remove();
            if ($('.nav_ul').parents('.navburger').length == 1) {
                $('.nav_ul').unwrap();
             }
             $('.nav_ul').removeClass('link_burger');
        }
    }
    
	
	// ANCHOR  Contact form 
	
	
	form_contact();
	function form_contact(){

		$('.js-input').keyup(function() {
			if(($(this).val().length > 0)){
				$(this).addClass('input_rempli');
			} 
			else {
				$(this).removeClass('input_rempli');
			}
		});

		$('.div_email .js-input').keyup(function() {
			if( (!$(this).val()) || ($(this).val().length > 4)){
				$('.div_email .js-input').removeClass('error_border');
				$('.div_email label').removeClass('error_color');
				if($('#contact_form').hasClass('error_contact_form_border')){
					$('#contact_form').removeClass('error_contact_form_border');
				}
				// $('.error_contact_form').text('');
			}
		});

		$('.div_nom .js-input').keyup(function() {
			if( (!$(this).val()) || ($(this).val().length > 4)){
				$('.div_nom .js-input').removeClass('error_border');
				$('.div_nom label').removeClass('error_color');
				if($('#contact_form').hasClass('error_contact_form_border')){
					$('#contact_form').removeClass('error_contact_form_border');
				}
				// $('.error_contact_form').text('');
			}
		});

		$('.div_objet .js-input').keyup(function() {
			if( (!$(this).val()) || ($(this).val().length > 4)){
				$('.div_objet .js-input').removeClass('error_border');
				$('.div_objet label').removeClass('error_color');
				if($('#contact_form').hasClass('error_contact_form_border')){
					$('#contact_form').removeClass('error_contact_form_border');
				}
				
				// $('.error_contact_form').text('');
			}
		});

		$('.div_message .js-input').keyup(function() {
			if( (!$(this).val()) || ($(this).val().length > 4)){
				$('.div_message .js-input').removeClass('error_border');
				$('.div_message label').removeClass('error_color');
				$('#contact_form').removeClass('error_contact_form_border');
				// $('.error_contact_form').text('');
			}
		});
	}
	
	
	
	// ANCHOR  Contact soumis
	
	
	// -------------------------------------------------------------------------
	
	$('#contact_form').submit(function(e){
		e.preventDefault();

		if($('.success_message_contact_form').length > 0){
			$('.success_message_contact_form').remove() ;
			$('#contact_form').removeClass('success_contact_form');
			}
		$.ajax({
			url: 'gestion-formulaire-contact.php',
			type: 'POST',
			data: {
				nom: $('.nom_contact_form').val(),
				email: $('.email_contact_form').val(),
				objet: $('.objet_contact_form').val(),
				message: $('.message_contact_form').val(),
				envoi: $('.envoi').val()
			},
			success: function(response){
				// response = JSON.parse(response);
				reponse_contact_form(response);
				console.log('succes');
			}
		})
	})
	
	
	// -------------------------------------------------------------------------

	// ANCHOR  Fonction Contact form

	// -------------------------------------------------------------------------

	
	
	
	
	function reponse_contact_form (response){

		if(response == 'recu'){
			$('.nom_contact_form').val('');
			$('.message_contact_form').val('');
			$('.objet_contact_form').val('');
			$('.email_contact_form').val('');
			$('.form_contact_div .js-input').removeClass('error_border');
			$('.form_contact_div label').removeClass('error_color');
			$('#contact_form').addClass('success_contact_form');
			$('.js-input').removeClass('input_rempli');

			
			$('.error_contact_form').text('');
			if($('.success_message_contact_form').length > 0){
				$('.success_message_contact_form').text("Votre message est arrivé dans la boite de Mikaël !");
				
			}
			else{
				$('<p class="success_message_contact_form">Votre message est arrivé dans la boite de Mikaël !</p>').appendTo('#contact_form');
			}
			
		}
		else if(response == 'formulaire_vide'){
			$('.form_contact_div .js-input').addClass('error_border');
			$('.form_contact_div label').addClass('error_color');
			$('#contact_form').addClass('error_contact_form_border');
			if($('.error_contact_form').length > 0){
				$('.error_contact_form').text("Rempli le formulaire");
			}
			else{
				$('<p class="error_contact_form">Rempli le formulaire</p>').appendTo('#contact_form');
			}
		}
		else if(response == 'depart'){
			$('#contact_form').addClass('error_contact_form_border');
			if($('.error_contact_form').length > 0){
				$('.error_contact_form').text("Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.");
			}
			else{
				$('<p class="error_contact_form">Vérifiez que tous les champs soient bien remplis et que l\'email soit sans erreur.</p>').appendTo('#contact_form');
			}
		}
		else if(response == 'pasrecu'){
			$('#contact_form').addClass('error_contact_form_border');
			if($('.error_contact_form').length > 0){
				$('.error_contact_form').text("pasrecu");
			}
			else{
				$('<p class="error_contact_form">pasrecu</p>').appendTo('#contact_form');
			}
		}

		else if(response == 'erreur_champs'){
			
			var email = $('.div_email .js-input').val();
			var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/igm;

			$('#contact_form').addClass('error_contact_form_border');
			if( (  ($('.div_objet .js-input').val().length < 4) || ($('.div_nom .js-input').val().length < 4)  ||  ($('.div_message .js-input').val().length < 4) ) && (!re.test(email)) ){
				if(($('.div_objet .js-input').val().length < 4)){
					$('.div_objet .js-input').addClass('error_border');
					$('.div_objet label').addClass('error_color');
				}
				if((!re.test(email))){
					$('.div_email .js-input').addClass('error_border');
					$('.div_email label').addClass('error_color');
				}
				if(($('.div_message .js-input').val().length < 4)){
					$('.div_message .js-input').addClass('error_border');
					$('.div_message label').addClass('error_color');
				}
				if(($('.div_nom .js-input').val().length < 4)){
					$('.div_nom .js-input').addClass('error_border');
					$('.div_nom label').addClass('error_color');
				}
				if($('.error_contact_form').length > 0){
					$('.error_contact_form').text("Format mail erroné et champs pas assez remplis");
				}
				else{
					$('<p class="error_contact_form">Format mail erroné et champs pas assez remplis</p>').appendTo('#contact_form');
				}
			}
			else if( (($('.div_objet .js-input').val().length < 4) || ($('.div_nom .js-input').val().length < 4) || ($('.div_message .js-input').val().length < 4) )){
				if(($('.div_objet .js-input').val().length < 4)){
					$('.div_objet .js-input').addClass('error_border');
					$('.div_objet label').addClass('error_color');
				}
				if(($('.div_email .js-input').val().length < 4)){
					$('.div_email .js-input').addClass('error_border');
					$('.div_email label').addClass('error_color');
				}
				if(($('.div_message .js-input').val().length < 4)){
					$('.div_message .js-input').addClass('error_border');
					$('.div_message label').addClass('error_color');
				}
				if(($('.div_nom .js-input').val().length < 4)){
					$('.div_nom .js-input').addClass('error_border');
					$('.div_nom label').addClass('error_color');
				}
				if($('.error_contact_form').length > 0){
					$('.error_contact_form').text("Les champs ne sont pas assez remplis");
				}
				else{
					$('<p class="error_contact_form">Les champs ne sont pas assez remplis</p>').appendTo('#contact_form');
				}
			}
			else if (!re.test(email)) {
				$('.div_email .js-input').addClass('error_border');
				$('.div_email label').addClass('error_color');
				if($('.error_contact_form').length > 0){
					$('.error_contact_form').text("Format mail erroné");
					}
					else{
					$('<p class="error_contact_form">Format mail erroné</p>').appendTo('#contact_form');
					}
			} 
		}
	}
	
	
	// -------------------------------------------------------------------------

	// -------------------------------------------------------------------------

	// -------------------------------------------------------------------------


	// ANCHOR  Filter carousel


	$(".jo-owl-filter").each(function () { // Filter

		var joFilterClass = $(this).find(".carousel_portfolio").attr("class");
		var joOwlFilter = "";

		$(this).find(".jo-cats .jo-cat").each(function () {
			var catId = $(this).attr("id");
	
			if (catId != "cat-0") {
				var joFilter = "<div class='" + joFilterClass + "' id='" + catId + "'>";

				$(this).parents(".jo-owl-filter").find(".carousel_portfolio .div_item_carou").each(function () {
					if (catId == $(this).data("cat")) {
						joFilter += $(this).prop("outerHTML");
					}
				});
	
				joFilter += "</div>"
	
				joOwlFilter += joFilter;
			}
		})
	
		$(this).find(".jo-carousel-box").append(joOwlFilter);
		$(this).find(".carousel_portfolio").eq(0).addClass("show");
	
		var parent = $(this);
	
		$(this).find(".jo-cats .jo-cat").click(function (e) {
			e.preventDefault();
			var idCat = $(this).attr("id");
			parent.find(".jo-cats .jo-cat").removeClass("selected");
			$(this).addClass("selected");
			parent.find(".carousel_portfolio").removeClass("show");
	
			parent.find(".carousel_portfolio#" + idCat).addClass("show");
	
		});
	})


	// -------------------------------------------------------------------------
var left = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-left" class="svg-inline--fa fa-angle-left fa-w-8" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z"></path></svg>';
var right = '<svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right" class="svg-inline--fa fa-angle-right fa-w-8" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>';

	// ANCHOR  Carousel
	
	
	carousel_accueil();
	function carousel_accueil(){
		$('.carousel_accueil').owlCarousel({ 
			items:1,
			loop:true,
			mouseDrag: false,
			autoplay: true,
			autoplayHoverPause: false,
			autoplayTimeout: 7000,
			smartSpeed: 2000,
			nav: true,
			navText: [ left , right],
			pagination: true,
			singleItem: true,
			addClassActive: true,
			dots: false,
			transitionStyle: "fadeUp",
            animateOut: 'fadeOut',
            touchDrag: false,
			responsive:{
				0:{
                    mouseDrag: false,
				},
				400:{
                    mouseDrag: false, 
				},
				600:{
					mouseDrag: false,
				},
				800:{
                    mouseDrag: false,
				},
				1000:{
					mouseDrag: false,
				},
				1200:{
                    mouseDrag: false,
				}
			}
		});
	}
	
	var owl_accueil = $('.carousel_accueil');
	owl_accueil.on('changed.owl.carousel', function(e) {
		owl_accueil.trigger('stop.owl.autoplay');
		owl_accueil.trigger('play.owl.autoplay');
	});

	carousel_portfolio();
	function carousel_portfolio(){
		var owl = $('.carousel_portfolio');
		owl.owlCarousel({
			autoplay: true,
			loop:true,
			autoplayHoverPause: true,
			autoplayTimeout: 1500,
			smartSpeed: 300,
			margin  :0,
			mouseDrag: true,
			nav:true,
			dots: false,
			navText: [ left , right],
			responsiveClass:true,
			// animateIn: 'fadeIn', 
			// animateOut: 'fadeOut',
			responsive:{
				0:{
					items:1,
				},
				400:{
                    items:2,      
				},
				600:{
					items:2,
				},
				800:{
					items:3,
				},
				1000:{
					items:3,
				},
				1200:{
					items:4,
				}
			}
		});
	}


	// -------------------------------------------------------------------------


	// -------------------------------------------------------------------------

	// ANCHOR Lors du clic d'une image du Carousel

	hover_item_carou();
	function hover_item_carou(){
		$('.div_item_carou ').hover(function(){
			$(this).find(".item_carou").addClass('hover_carou');
			$(this).find(".color_carou").addClass('hover_color_carou');

		},function(){
			$(this).find(".item_carou").removeClass('hover_carou');
			$(this).find(".color_carou").removeClass('hover_color_carou');
		
		})
	}

	// ANCHOR Lors du clic d'une image du Carousel
	

	submit_carou();
	function submit_carou(){ 
		$('.form_carousel_modal').each( function(){
			$(this).submit(function(e){
				e.preventDefault();
				$.ajax({
					url: 'gestion_carousel.php',
					type: 'POST',
					data: {
						id_carousel_modal: $(this).get(0)[0].value,
						login_js: $(this).get(0)[1].value
					},
					success: function(response){
						$('.div_modal_carou_portfolio').html(response);
						$('.div_item_carou').find(".item_carou").removeClass('hover_carou');
						$('.carousel_portfolio').trigger('stop.owl.autoplay');           
						$('.overlay_carousel').fadeIn(750);
						$('.overlay_carousel').addClass('modal_show');
						$('.overlay_carousel').css('padding-top', ( $(window).outerHeight() - $('#modal_carousel_portfolio').outerHeight() ) / 2 ) ;
						// $('.info_modal_carousel').css('height', (  $('.pad_modal_portfolio').height() ) - 100 ) ;
						$('.btn_fermer_modal').fadeIn(200);
                        $('.btn_fermer_modal').addClass('btn_modal');
                       
						fermer_btn_couleur()
                        scrollLock = true;	
                        underscorecarousel();
                    
					}
				})
			})
		});
    }
    

    underscorecarousel();
    function underscorecarousel(){
            $('.yyy,.hola').each(function() {
            var $this = $(this);
            $this.text($this.text().replace(/_/g, ' '));
        });
    }


    // -------------------------------------------------------------------------
        
    
    // ANCHOR Typrewriter

    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="type_border">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }

    };





	// ----------------------------------------------------

	// ----------------------------------------------------



	// ANCHOR Bloquer scroll


	var $window = $(window);
	var previousScrollTop = 0; 
	var scrollLock = false;

	$window.scroll(function() {
		if(scrollLock) {
			$window.scrollTop(previousScrollTop); 
		}

		previousScrollTop = $window.scrollTop();

	});

    // ----------------------------------------------------
    

	function fermer_btn_couleur(){
			if($('.modal_carousel').hasClass('video')){
			   $('.btn_fermer_modal').addClass('video_couleur');
			}
			else  if($('.modal_carousel').hasClass('web-design')){
				$('.btn_fermer_modal').addClass('web_design_couleur');
			}
			else  if($('.modal_carousel').hasClass('web-development')){
				$('.btn_fermer_modal').addClass('web_development_couleur');
			}
	}
	function retirer_btn_couleur(){
		if($('.modal_carousel').hasClass('video')){
			$('.btn_fermer_modal').removeClass('video_couleur');
			}
			else  if($('.modal_carousel').hasClass('web_design')){
			$('.btn_fermer_modal').removeClass('web_design_couleur');
			}
			else  if($('.modal_carousel').hasClass('web-development')){
			$('.btn_fermer_modal').removeClass('web_development_couleur');
			}
	}
	
	// ----------------------------------------------------


	$('#modal_carousel_portfolio').wrap('<div class="overlay_carousel">');
	$('.overlay_carousel').css('display', 'none');


	// -------------------------------------------------------

	// ANCHOR bouton fermer carou 


	$('.btn_fermer_modal').click(function(e){
	
		e.preventDefault();
		scrollLock = false;

		// $('.modal').html('');
		retirer_btn_couleur();
		$('.overlay_carousel').fadeOut(750);
		$('.overlay_carousel').removeClass('modal_show');

		$('.carousel_portfolio').trigger('play.owl.autoplay');
		
	});
		

	// -------------------------------------------------------

	// ANCHOR Overlay carou click


	$('.overlay_carousel').click(function(e) {

		var clicked = $(e.target); 

		if (clicked.is('#modal_carousel_portfolio') || clicked.parents().is('#modal_carousel_portfolio')) {
			return; 
		} 
		else { 

			scrollLock = false;

			$('.overlay_carousel').fadeOut(750);
			$('.overlay_carousel').removeClass('modal_show');
			retirer_btn_couleur();
			$('.carousel_portfolio').trigger('play.owl.autoplay');
		}
	});
    
    
    // -------------------------------------------------------
    
	// ANCHOR Burger

	$('.burger, .overlay_burger').click(function(){
		$('.burger').toggleClass('clicked');
		$('.overlay_burger').toggleClass('show');
		$('.navburger').toggleClass('show');
		
		if($('.overlay_burger ').hasClass('show')){
			$('.carousel_accueil').trigger('stop.owl.autoplay');
			scrollLock = true;
            $('.logo').addClass('show');
            
		}
		else{
			$('.carousel_accueil').trigger('play.owl.autoplay');
			scrollLock = false;	
			$('.logo').removeClass('show');
			
		}
	});


	$('.link_burger a').click(function(){
		scrollLock = false;
		$('.burger').toggleClass('clicked');
		$('.overlay_burger').toggleClass('show');
        $('.navburger').toggleClass('show');
        $('.logo').removeClass('show');
	})

	// -------------------------------------------------------


	$(document).on("scroll", onScroll);


	// ---------------------------------------------------------

	// ANCHOR Anim nav lien
	var media499 = window.matchMedia("(max-width: 499px)");
    if (media499.matches) { 
        $('.effet_type span:first-child').html(".");
    }
    


    navigoa = $('.nav_ul li:not(:last-child) a');


    function onScroll(){
        var scrollPosition = $(document).scrollTop();
        $('.body_accueil .nav_ul li:not(:last-child) a').each(function () {
            var currentLink = $(this);
            var refElement = $(currentLink.attr("href"));

            if (refElement.offset().top <= scrollPosition + $('.navbar').outerHeight()  && refElement.offset().top + refElement.height() > scrollPosition) {
                navigoa.removeClass("active");
                currentLink.addClass("active");
            }
            else{
                currentLink.removeClass("active");
            }
        });
    }

       $('.body_mention .nav_ul a').on('click', function(e){
        e.preventDefault();
        var href = $.attr(this, 'href');
        window.location = href;
    })

    

    var tt = window.matchMedia("(max-width: 700px)");
    if (tt.matches) { 
        navigob = $('.link_burger li a');
    }
    else{
         navigob = $('.nav_ul li a');
    }

	navigob.on('click', function (e) {
        e.preventDefault();
       
		$(document).off("scroll");

		navigob.each(function () {
			$(this).removeClass('active');
		})
		$(this).addClass('active');

		var href = $.attr(this, 'href');
		//var target = this.hash;
		//$target = $(href);
		$('html, body').animate({
			scrollTop: $(href).offset().top - animate_link_nav 
		}, 800, function () {
			 //window.location.hash = target;
			$(document).on("scroll", onScroll);
		});
	});
    


    // ---------------------------------------------------------

	$('.scroll_btn_contact').on('click', function (e) {
		e.preventDefault();

		// var href = $.attr(this, 'href');
		$('html, body').animate({
			scrollTop: $('#scroll_div_contact').offset().top - animate_link_nav
		}, 800, function () {
			$(document).on("scroll", onScroll);
		});
    });
    
	// ---------------------------------------------------------

	$('.mouse_body').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: $('#scroll_div_apropos').offset().top - animate_link_nav  + 43
		}, 800, function () {
			// window.location.hash = target;
			$(document).on("scroll", onScroll);
		});
	});

    // ---------------------------------------------------------

	scroll_vers_hash();

		function scroll_vers_hash(){
		if(location.hash.substr(1)!=''){
			$('html,body').animate({ 
				scrollTop: ($( '#' + location.hash.substr(1)).offset().top - $('.navbar').outerHeight()+1 ) 
			}, 1100, "swing");
		} 
		const url = new URL(window.location);
		url.hash = '';
		history.replaceState(null, document.title, url);
		
	}

	// ---------------------------------------------------------

	// ANCHOR animate on scroll

	function contentWayPoint() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} 
							else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} 
							else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							}
							else if ( effect === 'fadeInUp') {
								el.addClass('fadeInUp ftco-animated');
							}  
							else if ( effect === 'fadeInBottom') {
								el.addClass('fadeInBottom ftco-animated');
							}  
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 200);
				
			}

		} , { offset: '85%' } );
	};
	contentWayPoint();

	// ---------------------------------------------------------

	// ANCHOR anim skill bar

	var skills = function() {
	
		$('.div_skillbar').waypoint( function( direction ) {
			if( direction === 'down' && !$(this.element).hasClass('ftco-animated')  ) {
				
				setTimeout(function(){
					$('.skillbar').each(function(){
						$(this).find('.skillbar-bar').animate({
							width:jQuery(this).attr('data-percent')
							},2500);
					});
				}, 600);
			}
		} , { offset: '95%' } );
	};
	skills();
	
	function anim_services() {
		var i = 0;
		$('.anim_service').waypoint( function( direction ) {
	
			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){
	
					$('body .anim_service.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							el.addClass('bottom0');
							el.removeClass('item-animate');
						},  k * 500, 'easeInOutExpo' );
					});
					
				}, 50);
			}
	
		},{ offset:'50%'});
	};
	anim_services();


	//  Vous êtes arrivé au bout du code, j'espere que ça à attisé votre curiosité

});

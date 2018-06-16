/* settings block start */
document.write('<link rel="stylesheet" href="settings/style.css" type="text/css">');
document.write('<script type="text/javascript" src="settings/js/jquery.cookies.min.js"></script>');
document.write('<script type="text/javascript" src="settings/js/main.js"></script>');
/* settings block end */



/* browser selection */
var ie8 = ($.browser.msie && $.browser.version == '8.0') ? true : false;

/* mobile */
var isMobile = false;
var isiPad = false;
function isMobile_f() {
    var array_mobileIds = new Array('iphone', 'android', 'ipad', 'ipod');
    var uAgent = navigator.userAgent.toLowerCase();
    for (var i=0; i<array_mobileIds.length; i++) {
		if(uAgent.search(array_mobileIds[i]) > -1) {
			isMobile = true;
			if(array_mobileIds[i] == 'ipad') isiPad = true;
		}
    }
}
isMobile_f();

function init_menu() {
	$('nav.main_menu a').click(function(e) {
		if(isMobile) {
			var parent = $(this).parent();
			if(((!parent.hasClass('expanded')) || $(this).attr('href') == '#') && (parent.find('ul').length > 0)) {
				$(this).parent().toggleClass('expanded');
				e.preventDefault();
			}
		}
	});
	
	build_responsive_menu();
}

function build_responsive_menu() {
	$('header nav.main_menu').append('<select />');
	$('header nav.main_menu select').append('<option value="" selected="selected">Navigation</option>');
	
	$('nav.main_menu li').each(function() {
		var child = $(this);
		
		var lnk = child.find('> a').clone();
		lnk.find('span').remove();
		
		var level = child.parents('ul').length - 1;
		var dash = '';
		for(i = 0; i < level; i++) {
			dash += '-';
		}
		
		var path = lnk.attr('href');
		var text = ' ' + dash +  ' ' + lnk.text();
		var opt = '<option value="' + path + '">' + text + '</option>';
		$('header nav.main_menu select').append(opt);
	});
	
	
	$('header nav.main_menu select').change(function() {
		window.location = $(this).find('option:selected').val();
	});
}

function init_sticky_footer() {
	var page_height = $('.wrapper').height();
	var window_height = $(window).height();
	if(page_height <= window_height) {
		if($('.wrapper').hasClass('sticky_footer')) {
			$('.wrapper').addClass('need');
			$('#content > .inner').css('padding-bottom', $('footer').outerHeight() + 'px');
		}
	}
}

function init_fields() {
	$('.w_def_text').each(function() {
		var text = $(this).attr('title');
		
		if($(this).val() == '') {
			$(this).val(text);
		}
	});
	
	$('.w_def_text').live('click', function() {
		var text = $(this).attr('title');
		
		if($(this).val() == text) {
			$(this).val('');
		}
		
		$(this).focus();
	});
	
	$('.w_def_text').live('blur', function() {
		var text = $(this).attr('title');
		
		if($(this).val() == '') {
			$(this).val(text);
		}
	});
	
	$('.custom_select').each(function() {
		$(this).css('opacity', '0');
		$(this).parent().append('<span />');
		var text = $(this).find('option:selected').html();
		$(this).parent().find('span').html(text);
	});
	
	$('.custom_select').live('change', function() {
		var text = $(this).find('option:selected').html();
		$(this).parent().find('span').html(text);
	});
}

function init_validation(target) {
	function validate(target) {
		var valid = true;
		$(target).find('.req').each(function() {
			if($(this).val() == '') {
				valid = false;
				$(this).parent().addClass('errored');
			}
			else {
				$(this).parent().removeClass('errored');
			}
		});
		return valid;
	}
	
	$('form.w_validation').live('submit', function(e) {
		var valid = validate(this);
		if(!valid) e.preventDefault();
	});
	
	if(target) {return validate(target);}
}

function init_pretty_photo() {
	if(!isMobile || isiPad) {
		$("area[rel^='prettyPhoto']").prettyPhoto({
			theme : 'light_rounded', 
			social_tools : false,
			keyboard_shortcuts : true,
			slideshow: 5000,
	        autoplay_slideshow: false,
            overlay_gallery : false
		});
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({ animation_speed: 'normal', theme: 'light_square', slideshow: 5000, autoplay_slideshow: false, social_tools: false, keyboard_shortcuts: true, overlay_gallery: false });
	}
}

function init_pic_hover() {
	$('.general_pic_hover_1').each(function() {
		if(!$(this).hasClass('initialized')) {
			$(this).addClass('initialized');
		}
		
		var no_fx = $(this).hasClass('no_fx');
		
		$(this).bind('mouseenter',function(e){
			var icon = $(this).find('.icons');
			var overlay = $(this).find('.info');
			
			if(no_fx) {
				if(!ie8) {
					overlay.show().css('opacity', '0');
					overlay.stop(true).delay(10).animate(
						{
							opacity : 1
						}, 200
					);
				}
				else {
					overlay.css('display', 'block');
				}
			}
			else {
				overlay.show().css('opacity', '0');
				overlay.stop(true).animate(
					{
						opacity : 1
					}, 200
				);
				
				var w = $(this).width();
				var h = $(this).height();
				var x = (e.pageX - $(this).offset().left - (w/2)) * ( w > h ? (h/w) : 1 );
				var y = (e.pageY - $(this).offset().top  - (h/2)) * ( h > w ? (w/h) : 1 );
				var direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180 ) / 90 ) + 3 )  % 4;
				
				
				/** do your animations here **/ 
				switch(direction) {
					case 0:
						/** animations from the TOP **/
						icon.css({
							'left' : '0px',
							'top' : '-100%',
							'right' : 'auto',
							'bottom' : 'auto'
						});
						icon.stop(true).delay(20).animate({
							top : 0
						}, 300);
					break;
					case 1:
						/** animations from the RIGHT **/
						icon.css({
							'left' : '100%',
							'top' : '0',
							'right' : 'auto',
							'bottom' : 'auto'
						});
						icon.stop(true).delay(20).animate({
							left : 0
						}, 300);
					break;
					case 2:
						/** animations from the BOTTOM **/
						icon.css({
							'left' : '0px',
							'top' : 'auto',
							'right' : 'auto',
							'bottom' : '-100%'
						});
						icon.stop(true).delay(20).animate({
							bottom : 0
						}, 300);
					break;
					case 3:
						/** animations from the LEFT **/
						icon.css({
							'left' : 'auto',
							'top' : '0',
							'right' : '100%',
							'bottom' : 'auto'
						});
						icon.stop(true).delay(20).animate({
							right : 0
						}, 300);
					break;
				}
			}
		});
		
		$(this).bind('mouseleave',function(e){
			var icon = $(this).find('.icons');
			var overlay = $(this).find('.info');
			
			if(no_fx) {
				if(!ie8) {
					overlay.stop(true).animate(
						{
							opacity : 0
						}, 200
					);
				}
				else {
					overlay.css('display', 'none');
				}
			}
			else {
				var w = $(this).width();
				var h = $(this).height();
				var x = (e.pageX - $(this).offset().left - (w/2)) * ( w > h ? (h/w) : 1 );
				var y = (e.pageY - $(this).offset().top  - (h/2)) * ( h > w ? (w/h) : 1 );
				var direction = Math.round((((Math.atan2(y, x) * (180 / Math.PI)) + 180 ) / 90 ) + 3 )  % 4;
				
				
				/** do your animations here **/ 
				switch(direction) {
					case 0:
						/** animations from the TOP **/
						icon.css({
							'left' : '0px',
							'top' : '0px',
							'right' : 'auto',
							'bottom' : 'auto'
						});
						icon.stop(true).animate({
							top : -h
						}, 300);
					break;
					case 1:
						/** animations from the RIGHT **/
						icon.css({
							'left' : 'auto',
							'top' : '0px',
							'right' : '0px',
							'bottom' : 'auto'
						});
						icon.stop(true).animate({
							right : -w
						}, 300);
					break;
					case 2:
						/** animations from the BOTTOM **/
						icon.css({
							'left' : '0px',
							'top' : 'auto',
							'right' : 'auto',
							'bottom' : '0px'
						});
						icon.stop(true).animate({
							bottom : -h
						}, 300);
					break;
					case 3:
						/** animations from the LEFT **/
						icon.css({
							'left' : '0px',
							'top' : '0px',
							'right' : 'auto',
							'bottom' : 'auto'
						});
						icon.stop(true).animate({
							left : -w
						}, 300);
					break;
				}
				
				overlay.stop(true).animate(
					{
						opacity : 0
					}, 200
				);
			}
		});

	});
}

function init_message_boxes() {
	$('.general_info_box .close').live('click', function() {
		$(this).parent().fadeOut(300);
	});
}

function init_blog_style_7() {
	$('.block_blog_type_7').isotope();
	$(window).resize(function() {
		$('.block_blog_type_7').isotope('reLayout');
	});
}

function init_blog_style_8() {
	$('.block_blog_type_8').isotope();
	$(window).resize(function() {
		$('.block_blog_type_8').isotope('reLayout');
	});
}

function init_faq_filter() {
	var $container = $('#faq_container');
	
	$container.isotope({layoutMode : 'straightDown'});
	
	$('.block_faq #faq_filter a').live('click', function(e) {
		var selector = $(this).attr('href');
		if(selector == 'all') selector = '*'
		else selector = '.' + selector;
		
		$container.isotope({
			filter : selector
		});
		
		$('.block_faq #faq_filter li').removeClass('active');
		$(this).parent().addClass('active');
		
		e.preventDefault();
	});
	
	$('.block_faq .question').live('click', function() {
		$(this).parent().toggleClass('expanded');
		$(this).next('.answer').toggle();
		$container.isotope('reLayout');
	});
}

function init_filter() {
	var $container = $('#filtered_container');
	
	$container.isotope();
	
	$('#filter a').live('click', function(e) {
		var selector = $(this).attr('href');
		if(selector == 'all') selector = '*'
		else selector = '.' + selector;
		
		$container.isotope({
			filter : selector
		});
		
		$('#filter li').removeClass('active');
		$(this).parent().addClass('active');
		
		e.preventDefault();
	});
	
	$(window).resize(function() {
		$container.isotope('reLayout');
	});
}

function init_skills() {
	$('.block_levels .progress div').each(function() {
		var w = $(this).attr('data-level');
		$(this).animate({width : w + '%'}, 500);
	});
}

function init_slider_3(target) {
	var old_width = $(target).width();
	
	function init_slider() {
		$(target).roundabout({
			minScale : 0.45,
			minOpacity : 1,
			childSelector : 'li',
			responsive : true,
			btnNext : '.button_next',
			btnPrev : '.button_prev'
		});
	}
	
	$(window).resize(function() {
		var new_width = $(target).width();
		if(old_width != new_width) {
			old_width = new_width;
			$(target).roundabout('destroy');
			init_slider();
		}
	});
	
	init_slider();
}

$(document).ready(function() {
	init_sticky_footer();
	init_fields();
	init_pic_hover();
	init_validation();
	init_message_boxes();
	init_faq_filter();
	
	$('.block_to_top a').click(function(e) {
		$.scrollTo(0, 500);
		
		e.preventDefault();
	});
	
	$('.tabel_tooltip').tooltip({
		position : 'top right',
		offset : [-5, -25],
		effect: 'fade'
	});
});

$(window).resize(function() {
	init_sticky_footer();
});

$(window).load(function() {
	init_blog_style_7();
	init_blog_style_8();
	init_filter();
	init_skills();
	init_sticky_footer();
});

$(function() {
	init_menu();
	init_pretty_photo();
	init_sticky_footer();
	
	$(function () {
		$('.block_portfolio_2 .item .image, .block_portfolio_3 .item .image, .block_portfolio_w_sidebar .item .image').bind('mouseenter', function() {
			$(this).find('.info').fadeIn(200);
		});
		
		$('.block_portfolio_2 .item .image, .block_portfolio_3 .item .image, .block_portfolio_w_sidebar .item .image').bind('mouseleave', function() {
			$(this).find('.info').fadeOut(100);
		});
	});
	
	$(function () {
		$('.block_portfolio_item_3 .image .frame').bind('mouseenter', function() {
			$(this).find('.hover').fadeIn(200);
		});
		
		$('.block_portfolio_item_3 .image .frame').bind('mouseleave', function() {
			$(this).find('.hover').fadeOut(100);
		});
	});
});

jQuery.fn.ForceNumericOnly =
function () {
    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 ||
                key == 9 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

/*F12 keydown Block*/
document.onkeydown = function (event) {
    event = (event || window.event);
    if (event.keyCode == 123) {
        //alert('No F-keys');
        return false;
    }
}

//==================GOOGLE ANALYTICS=========================
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-15843910-2']);
_gaq.push(['_setDomainName', '.dyntat.com']);
_gaq.push(['_trackPageview']);

(function () {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
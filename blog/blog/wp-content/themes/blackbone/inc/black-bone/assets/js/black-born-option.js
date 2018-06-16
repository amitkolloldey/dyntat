// Create closure.
(function( $ ) { 
	jQuery.fn.BlackBorn = function( options ) {
	 
		// Bob's default settings:
		var defaults = {
			textColor: "#000",
			backgroundColor: "#fff"
		};
		var wrapper 		= jQuery(this), 
			wrapperheight	= wrapper,
			bbmenuwarp		= wrapper.children(".bb-option-menu"),
			bbmenu			= bbmenuwarp.children(".bb-menu");
			bbmenuli		= bbmenu.children("li"),
			bbmenulia		= bbmenuli.find("a"),
			bbsectionwarp	= wrapper.children(".bb-option-container"), 
			
			bbsections		= bbsectionwarp.children(".bb-section"),
			bbsection		= bbsections.children(".bb-single-section"); 
			
		
		function BBPlugin(element, options){
			this.settings = jQuery.extend( {}, defaults, options );
			this.init(); 
		}
		BBPlugin.prototype = {
			init: function (){ 
				var $obj = this;
				bbmenulia.addClass( "bb-link" );
				//main-menu-active
				bbmenuli.first().addClass( "bb-active" ); 
				bbmenulia.first().addClass( "bb-active" );
				
				bbmenu.find("ul").addClass( "bb-submenu" );
				bbmenuli.first().find(".bb-submenu").addClass( "bb-active" );
				bbmenuli.first().find(".bb-submenu").children(".bb-menu-li").first().addClass( "bb-active" );
				bbmenuli.first().find(".bb-submenu").children(".bb-menu-li").first().children(".bb-link").addClass( "bb-active" );
				
				bbmenu.find( ".bb-submenu" ).slideUp(); 
				bbmenuli.first().find(".bb-submenu.bb-active").slideDown();
				
				//section active
				bbsection.first().addClass( "bb-active" );
				bbsections.find(".bb-active").siblings().hide();
				
				bbmenuli.on("click", "a.bb-link", function(event){
					event.preventDefault();
					var aclick = jQuery(this);

					if(jQuery(this).next(".bb-submenu").length ){
						event.preventDefault(); 
						if( !(jQuery(this).next(".bb-submenu").hasClass("bb-active")) ){
							bbmenuli.find( ".bb-submenu" ).slideUp(); 
							jQuery(this).next(".bb-submenu").slideDown();
						} 
					}else if( !jQuery(this).parents(".bb-submenu").length && !jQuery(this).next(".bb-submenu").length ){
						bbmenuli.find( ".bb-submenu" ).slideUp();
					}
					$obj.menu_active(aclick);
					$obj.show_section(aclick);  
				});
			},
			menu_active:function(element){ 
				//console.log(element);
				// Remove all active class
				bbmenuli.removeClass( "bb-active" );
				bbmenuli.children("a.bb-link").removeClass( "bb-active" );
				bbmenuli.children(".bb-submenu").removeClass( "bb-active" );
				bbmenuli.children(".bb-submenu").children(".bb-menu-li").removeClass( "bb-active" );
				bbmenuli.children(".bb-submenu").children(".bb-menu-li").children("a.bb-link").removeClass( "bb-active" );
				
				element.addClass( "bb-active" );
				
				if(element.parents(".bb-submenu").length){
					element.parent(".bb-menu-li").addClass( "bb-active" );
					element.parents(".bb-submenu").addClass( "bb-active" );
					element.parents(".bb-submenu").prev("a.bb-link").addClass( "bb-active" ); 
					element.parents(".bb-submenu").parent(".bb-menu-li").addClass( "bb-active" ); 
				}else{
					element.parent(".bb-menu-li").addClass( "bb-active" );
					element.next(".bb-submenu").addClass( "bb-active" );
					element.next(".bb-submenu").children(".bb-menu-li").first().addClass( "bb-active" );
					element.next(".bb-submenu").children(".bb-menu-li").first().children("a.bb-link").addClass( "bb-active" );
				}
			},
			show_section(element){ 
				var sectionName   = element.attr('data-rel'),
					subsectionName; 
				if( element.next(".bb-submenu").length ){

					subsectionName = element.next(".bb-submenu").children(".bb-menu-li").first().children("a.bb-link").attr('data-rel');
					bbsectionssel = bbsections.children(".bb-single-section."+subsectionName);
					
					bbsectionssel.addClass( "bb-active" ).siblings().removeClass("bb-active");
					bbsectionssel.fadeIn().siblings().hide(); 

				}else{
					bbsectionssel = bbsections.children(".bb-single-section."+sectionName);
					
					bbsectionssel.addClass( "bb-active" ).siblings().removeClass("bb-active");
					bbsectionssel.fadeIn().siblings().hide();
				}  
			}
		}
	
		return this.each(function() {
			var plugin = new BBPlugin(this, options);
			return plugin;
		});
	 
	};
	
// End of closure.
})( jQuery );
jQuery( ".black-born-option" ).BlackBorn();


/*-----------------------------------------------------------------------------------
* Black Bone Options Ajax save 
*-----------------------------------------------------------------------------------*/
jQuery('.bb-ajax-save-btn').click( function () { 
    var b = jQuery("#bbOptionsForm").serialize();
    jQuery(".bb-ajax-disble").fadeIn();
    jQuery.post( 'options.php', b).error(function () {
        console.log('BB-Error');
    }).success(function () {
        console.log('success');
        jQuery(".bb-ajax-disble").fadeOut();
        jQuery(".bb-header-footer").append('<div class="alert alert-dismissible alert-success bb-alert-success" style="display: block;"><button data-dismiss="alert" class="close" type="button">×</button><strong>Well done!</strong> You successfully Saving</div>');
        jQuery(".bb-alert-success").fadeIn();
    });
    return false;               
});
jQuery(document).ready(function() {
	jQuery('.close').live( 'click', function () { 
		jQuery('.bb-alert-success').remove();
	});
});


/*-----------------------------------------------------------------------------------
* Black Bone Options bootstrap Material 
*-----------------------------------------------------------------------------------*/
//jQuery.material.init();

/*-----------------------------------------------------------------------------------
* Black Bone Options Nice select
*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	if ( jQuery('.bb-select').length ) {
		jQuery('.bb-select').niceSelect();
	} 
});

/*-----------------------------------------------------------------------------------
* Black Bone Options Media ifreame
*-----------------------------------------------------------------------------------*/
//This is for wordpress mediabox
jQuery(document).ready(function() {
    jQuery(".bb-upmedia").on('click',  function(e) {
	    e.preventDefault();
	    var up_btn = jQuery(this);
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;

            // Let's assign the url value to the input field
            //console.log(image_url); 
            var currentele = up_btn.prev(".media-input"), 
                image_box  = up_btn.next(".bb-input-image").find("img");
            currentele.val(image_url);
            if (image_box.length) {
            	image_box.attr('src', image_url);
            }
        });
	});
});


/*-----------------------------------------------------------------------------------
* Black Bone Options Color select
*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
	if ( jQuery('.bb-color-input').length ) {
		var myOptions = {
		    // you can declare a default color here,
		    // or in the data-default-color attribute on the input
		    defaultColor: false,
		    // a callback to fire whenever the color changes to a valid color
		    change: function(event, ui){},
		    // a callback to fire when the input is emptied or an invalid color
		    clear: function() {},
		    // hide the color picker controls on load
		    hide: true,
		    // show a group of common colors beneath the square
		    // or, supply an array of colors to customize further 
		    palettes: true
		};
		jQuery('.bb-color-input').wpColorPicker(myOptions); 
	} 
});

/*-----------------------------------------------------------------------------------
* Black Bone Options Alpha Color select
*-----------------------------------------------------------------------------------*/
jQuery( document ).ready( function( $ ) {
	if ( jQuery('.bb-color-alpha-input').length ) {
	    jQuery( '.bb-color-alpha-input' ).wpColorPicker({});
	} 
});

/*-----------------------------------------------------------------------------------
* Black Bone Options Range Slider select
*-----------------------------------------------------------------------------------*/
jQuery( document ).ready( function( $ ) {
	jQuery( ".bb-sliders" ).slider({
		range: "min",
		value: 25,
		min: 1,
		max: 150,
		slide: function( event, ui ) {
			jQuery(this).prev('.bb-sliders-input').val(ui.value );
			//console.log(jQuery(ui));
			//jQuery( "#amount" ).val( "$" + ui.value );
		}
	}); 
});
/*-----------------------------------------------------------------------------------
* Black Bone Options Button select
*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
    jQuery(".bb-buttonset").each(function() { 
    	var rb_warp = jQuery(this),
    		rb_level= rb_warp.children('.buttonsetBoxed');
    	rb_level.on('click',  function(e) {
    		jQuery(this).children('input[type="radio"]').prop('checked', true); 
    		rb_warp.find('.buttonsetBoxed').removeClass('buttonset-active');
    		jQuery(this).addClass('buttonset-active');
    	});
	});
});

/*-----------------------------------------------------------------------------------
* Black Bone Options Switch select
*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
    jQuery(".bb-switch").each(function() { 
    	var sw_warp = jQuery(this),
    		enable  = sw_warp.children('.switchBoxed.enable'), 
    		disable = sw_warp.children('.switchBoxed.disable');
    	enable.on('click',  function(e) {
    		sw_warp.find('.switch-input').attr('value', '1'); 
    		sw_warp.find('.switchBoxed').removeClass('switch-active');
    		jQuery(this).addClass('switch-active');
    	});
    	disable.on('click',  function(e) {
    		sw_warp.find('.switch-input').attr('value', '0'); 
    		sw_warp.find('.switchBoxed').removeClass('switch-active');
    		jQuery(this).addClass('switch-active');
    	});
	});
});

/*-----------------------------------------------------------------------------------
* Black Bone Options Image select
*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function() {
    jQuery(".bb-image-select").each(function() { 
    	var rb_warp = jQuery(this),
    		rb_level= rb_warp.children('.imagesetBoxed');
    	rb_level.on('click',  function(e) {
    		jQuery(this).children('input[type="radio"]').prop('checked', true); 
    		rb_warp.find('.imagesetBoxed').removeClass('image-active');
    		jQuery(this).addClass('image-active');
    	});
	});
});

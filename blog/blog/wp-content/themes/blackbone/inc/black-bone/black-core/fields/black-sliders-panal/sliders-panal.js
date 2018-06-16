// Create closure.
(function( $ ) {
    "use strict";
	
	var element = jQuery(".single-slide-panal").find("div.slide-panal-title");
    element.next(".slide-panal-fields").slideUp();
    //element.each(function() { 
        element.live( "click", function(){
            console.log("dfhgkfdkljd");
            jQuery(this).next(".slide-panal-fields").slideToggle(); 
        }); 
    //});

    var create_tab   = jQuery(".add_slide_panal"),  
        delete_tab   = jQuery(".delt-single-panal"),  
        cloneParents = jQuery(".clone-parents"); 
        create_tab.live("click", function(event){
            event.preventDefault(); 
            var slideHtml       = cloneParents.html(),
                nextHtml        = slideHtml.replace('style="display: none !important;"', ''),
                field_count     = jQuery(this).prev(".slide-panal-wrappre").children('.fiels-count'),
                field_count_val = jQuery(this).prev(".slide-panal-wrappre").children('.fiels-count').attr('value'), 
                field_count_val = ( parseInt(field_count_val) + 1 ),   
                bbfilterhtml    = nextHtml.replace(/[0]/g, field_count_val);
                //ddddffffs   = slideHtml.replace(/[0-9]+(?!.*[0-9])/, field_count_val);

            //console.log(bbfilterhtml);
            jQuery(this).prev(".slide-panal-wrappre").append(bbfilterhtml); 
            field_count.val(field_count_val);
        });
        delete_tab.live("click", function(event){
            event.preventDefault(); 
            jQuery(this).parent().siblings().find( 'input[type="text"]' ).val( '' );
            jQuery(this).parent().siblings().find( 'select' ).prop("selected", false);
            jQuery(this).parent().siblings().find( 'textarea' ).val( '' );
            jQuery(this).parents('.single-slide-panal')
            .slideUp('medium', function() {
                jQuery( this ).remove();
            });
            var field_count     = jQuery(this).parents('.slide-panal-wrappre').children('.fiels-count'), 
                field_count_val = field_count.attr('value'),
                field_count_val = parseInt(field_count_val);
                if (field_count_val > 0 ) {
                    field_count_val = ( field_count_val - 1 );
                    field_count.val(field_count_val);
                }
        });
        jQuery('.slide-title').each(function(){
            jQuery( this ).keyup(function( event ) {
                var newTitle = event.target.value;
                jQuery( this ).parents('.single-slide-panal').find( '.single-field-Unique > h4' ).text( newTitle );
            });
        })
// End of closure.

})( jQuery );
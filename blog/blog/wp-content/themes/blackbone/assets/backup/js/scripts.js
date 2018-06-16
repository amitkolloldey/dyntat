
jQuery( document ).ready( function( $ ) {
	jQuery(".mobile-menu-active").on('click', function(){
		jQuery(this).next('.menu-wrapper').slideToggle();
	});
});

jQuery( document ).ready( function( $ ) {
	if ( jQuery('.bb-grid').length ) { 
		jQuery('.bb-grid').isotope({
		  itemSelector: '.bb-grid-item',
		  percentPosition: true,
		  masonry: {
		    // use outer width of grid-sizer for columnWidth
		    columnWidth: '.bb-grid-item' 
		  }
		});
	}
});

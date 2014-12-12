jQuery.noConflict();
		(function ($){
			$(document).ready(function(){
			$('#sliderPdto').nivoSlider({
				slices: 6, // For slice animations
				boxCols: 8, // For box animations
				boxRows: 4, // For box animations
				animSpeed: 500, // Slide transition speed
				pauseTime: 6000, // How long each slide will show
				startSlide: 0, // Set starting Slide (0 index)
				directionNav: false, // Next & Prev navigation
				directionNavHide: true, // Only show on hover
				controlNav: true, // 1,2,3... navigation
				controlNavThumbs: false, // Use thumbnails for Control Nav
				controlNavThumbsFromRel: false, // Use image rel for thumbs
				controlNavThumbsSearch: '.jpg', // Replace this with...
				controlNavThumbsReplace: '_thumb.jpg', // ...this in thumb Image src
				keyboardNav: false, // Use left & right arrows
				pauseOnHover: false, // Stop animation while hovering
				manualAdvance: false, // Force manual transitions
				captionOpacity: 0.8, // Universal caption opacity
				prevText: 'Anterior', // Prev directionNav text
				nextText: 'Siguiente', // Next directionNav text
				randomStart: false, // Start on a random slide
				beforeChange: function(){}, // Triggers before a slide transition
				afterChange: function(){}, // Triggers after a slide transition
				slideshowEnd: function(){}, // Triggers after all slides have been shown
				lastSlide: function(){}, // Triggers when last slide is shown
				afterLoad: function(){} // Triggers when slider has loaded
				});
		});
})(jQuery);
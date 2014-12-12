$(document).ready(function() {
	$("button").button();
	$("#agenda").datepicker();
	$("#tag-select").chosen();
   
	/* ITEMS ARRASTRABLES 
	$(".item").draggable();
	$( "#content" ).droppable({
		drop: function() {
			//
		}
	});*/
	
	/* NUBE DE TAGS
	 if( ! $('#tags').tagcanvas({
     textColour : '#ffffff',
     outlineThickness : 1,
     maxSpeed : 0.03,
     depth : 0.75
   })) {
     // TagCanvas failed to load
     $('#tags').hide();
   }*/
});
	
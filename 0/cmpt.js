$("document").ready(function(){
	$("h3").click(function(e){
		$(e.target).parent().children().not("h3").slideToggle();
	});
});
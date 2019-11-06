$(document).ready(function(){
	var href= window.location.href;
	var menu = href.split("/");
	$('.menu_label[href="'+menu[4]+'"]').parent().addClass('active');
})
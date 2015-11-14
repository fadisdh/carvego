$(function(){
	var $sidebar = $('#sidebar');
	var $main = $('#main');

	$sidebar.mouseenter(function(){
		$main.addClass('shift');
	});

	$sidebar.mouseleave(function(){
		$main.removeClass('shift');
	});
});
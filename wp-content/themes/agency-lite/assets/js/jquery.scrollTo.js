/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/jqueryscrollto.html
 */
$(document).ready(function (){
    $(window).scroll(function(e){
		if ($(window).scrollTop() > ($('#documenter_content').height() - $('#documenter_sidebar').height())){
			var scroll = $('#documenter_content').height() - $('#documenter_sidebar').height();
			$(window).scrollTop(scroll);
			return false;
		}
	});
    
	$('#documenter_sidebar div').click(function() { 
		var target = $(this).attr('id');
		$('html, body').animate({scrollTop: $('#'+target+'-content').offset().top}, 1000);
    });     
});
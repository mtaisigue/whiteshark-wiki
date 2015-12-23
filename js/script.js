$(function() {
	$('#content table .t_header th:last').css({'border' : 'none'});
	$('#content table tr:even').addClass('even');
	$('#content table .t_header').removeClass('even');
	$('.information div table tr td:first-child').css({'text-align' : 'left'});
	$(".posts_widget .widget_wrappper ul").each(function() {
		$(this).children('li:last').css({'border' : 'none'});
	});
	$('.a_table ul li:last').css({'background' : 'none'});
	$(".posts_widget .widget_wrappper ul").eq(1).hide();
	
	$(".posts_widget .tabs li a").click(function() {
		
		if($(this).hasClass('current')) {
			
		} else {
			
			var list = $(this).parent('li').attr('class');
			
			$(".posts_widget .tabs li a").removeClass('current');
			$(this).addClass('current');
			
			$(".posts_widget .widget_wrappper ul").slideUp();
			$(".posts_widget .widget_wrappper ul."+list).slideDown();
		}
		
		return false;
	});

 
	$("input[type='text']").each(function() {  
		//attach function to input and make text grayed out on page load  
		textReplacement($(this));  
	});  
	
});  

 
function textReplacement(input){ //input focus text function  
	var originalvalue = input.val();  
	input.focus( function(){  
		if( $.trim(input.val()) == originalvalue ){ input.val(''); }  
	});  
	input.blur( function(){  
		if( $.trim(input.val()) == '' ){ input.val(originalvalue); }  
	});  
}  
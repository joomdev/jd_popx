/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
jQuery(function($){
	$('.option_type li').on('click',function(){
		$('.option_type li').removeClass('active');
		$(this).addClass('active');
		var selected_type = $(this).attr('data-type');
		$('.option_template').hide();		
		$('.'+selected_type).fadeIn('slow');
		$('#option_type_input').val(selected_type);
	});
	
	$('.option_type_sub li').on('click',function(){
		$('.option_type_sub li').removeClass('active');
		$(this).addClass('active');
		var selected_tmpl = $(this).attr('data-id');
		var tmpl = $(this).attr('data-tmpl');
		$('.subtmpl').css('display','none');	
		$("input[name*='subtmpl_']").val(tmpl);
		$('#'+selected_tmpl).show();
		
	});
	
	$('input[name="after_subscribe"]').on('click',function(){
		var isChecked = $('#redirect').prop('checked');
		if(isChecked == true){
			$('#url').show('fast');
		}else{
			var selected_tmpl = $(this).attr('data-id');
			$('#url').hide('fast');
		}
	}); 
})
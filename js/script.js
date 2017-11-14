"use strict";
$(document).ready(function(){
	$('a.menu').bind({
		'mouseenter':function(){
			var body = $(this).attr('data-body');
			var color = $(this).attr('data-color');
			//console.log(body);
			$('#title').text(body).css('color',color);
		},
		'mouseleave':function(){
			//var body = $(this).attr('data-body');
			//var color = $(this).attr('data-color');
			//console.log(body);
			$('#title').text('');
		},
		'click':function(){
			let e = event;
			e.preventDefault();
			var data = $(this).attr('href');
			
			if($('.modal-window').length == 0){
				//var div = $('<div>').addClass('modal-window');
				//$(document.body).append(div);
				
				var underdiv = $('<div>').attr('id','jquery-underlay');
				$(document.body).append(underdiv);
				underdiv.fadeIn('slow');				
				
				var modal = $('<div>').addClass('modal-window');
				$(document.body).append(modal);
				modal.fadeIn('slow');	
				console.log(123);
				
				let a = $('<a>').attr('href','#');
				a.addClass('modal-close-btn');
				a.html('&times');
				a.click(function(){
					let e = event;
					e.preventDefault();
					$('.modal-window').remove();
					$('#jquery-underlay').remove();
				});
				modal.append(a);
			}
			else{
				//var modal = $('.modal-window');
				console.log(456);
			}
			
			
			
		}	
		
	});
});
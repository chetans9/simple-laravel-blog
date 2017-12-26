$(function(){
	'use strict'

	//Delete Button on dataTables
	$(".table").on('click','.delete-data',function(e){
		e.preventDefault();
		var actionUrl = $(this).data('delete-url');
		var action = $("#data-delete-form").attr('action',actionUrl);
		
		
	});
});
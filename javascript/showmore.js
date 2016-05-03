$(document).ready(function(){
	$(document).on('click','.show_more',function(){
		var ID = $(this).attr('id');
		$('.show_more').hide();
		$('.loding').show();
		$.ajax({
			type:'POST',
			url:'ajax_more.php',
			data:'id='+ID,
			success:function(html){
				$('#show_more_main'+ID).remove();
				$('.tutorial_list').append(html);
			}
		});
		
	});
});
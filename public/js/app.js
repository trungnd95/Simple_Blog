$(document).ready(function(){
	//Cat
	$('.del-cat').on('click',function(){
		
		var id = $(this).attr('val');
		$('.confirm-del').click(function(){
			$("#modal-id").modal('hide').delay('500');
			var url = "http://localhost/php/framework/laravel5.1/simple-blog-1/admin/cate/delete/"+ id;
			var token = $('#form-index').find("input[name='_token']").val();
			$.ajax({
				url:url,
				type:"GET",
				data: {'id':id,'_token':token},
				cache: false,
				success: function(result){
					$('.del-cat-'+result).parent().parent().hide();
				}
			});
		});
		
	});

	$('.edit-cat').on('click',function(){
		var id = $(this).attr('val');
		$(this).parent().parent().hide();
		$('.form-edit-'+ id).removeClass('hidden');
		$('.save-edit-cat').click(function(){
			
 			var url = "http://localhost/php/framework/laravel5.1/simple-blog-1/admin/cate/edit/"+ id;
 			var token = $('#form-index').find("input[name='_token']").val();
 			var name_cat =  $(this).parent().parent().find("input[name='name_cat']").val();
 			var des_cat =  $(this).parent().parent().find("input[name='des_cat']").val();
 			$.ajax({
 				url:url,
 				type:'GET',
 				dataType:"JSON",
 				data:{'_token':token, 'id':id, 'name_cat':name_cat,'des_cat':des_cat},
 				cache:false,
 				success: function(result)
 				{	
 					console.log(result);
 					$('.save-edit-cat').parent().parent().addClass('hidden');
 					$('.td-data-'+result.id).show();
 					$('.td-data-'+result.id).find('.name-cate').html(result.name_cat);
 					$('.td-data-'+result.id).find('.des-cate').html(result.des_cat);
 				}
 			});

		});
	});
	
	//User
	$('.del-author').on('click',function(){
		
		var id = $(this).attr('val');

		$('.confirm-del').click(function(){
			$("#modal-id").modal('hide').delay('500');
			var url = "http://localhost/php/framework/laravel5.1/simple-blog-1/admin/user/delete/"+ id;
			var token = $('#form-index').find("input[name='_token']").val();
			$.ajax({
				url:url,
				type:"GET",
				data: {'id':id,'_token':token},
				cache: false,
				success: function(result){
					$('.del-author-'+result).parent().parent().hide();
				}
			});
		});
		
	});

	//Article
	$('.del-article').on('click',function(){
		
		var id = $(this).attr('val');

		$('.confirm-del').click(function(){
			$("#modal-id").modal('hide').delay('500');
			var url = "http://localhost/php/framework/laravel5.1/simple-blog-1/admin/articles/delete/"+ id;
			var token = $('#form-index').find("input[name='_token']").val();
			$.ajax({
				url:url,
				type:"GET",
				data: {'id':id,'_token':token},
				cache: false,
				success: function(result){
					$('.del-article-'+result).parent().parent().hide();
				}
			});
		});
		
	});
});


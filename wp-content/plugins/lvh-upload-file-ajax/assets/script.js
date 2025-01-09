(function( $ ) {
	'use strict';

	//$('#form-upload').submit(function(e){
		$(function($) {    
			$('body').on('change', '#file', function() {
		
		//e.preventDefault();

		const fd = new FormData();
        const files = $('#file')[0].files;
		var rand_id_user = $("#rand_id_user").val();
		console.log("<<<<<<<<<<<<<<- UPLOADING ->>>>>>>>>>");
		console.log(rand_id_user);

		if (files.length <= 0 ) {
			alert('You have to select some file!!');
			return;
		}

		const size = (files[0].size / 1024 / 1024 ).toFixed(2);
		if ( size > 500){ //Size in MB -> 500 MB (max)
			alert(`Your file weighs ${size}MB. You cannot upload files larger than 500MB`);
			return;
		}

		//fd.append('file',files[0]);
		for (const file_item of files) {
			fd.append("file[]", file_item);
		}
		fd.append('action', 'dcms_ajax_add_file');
		fd.append('nonce', dcmsUpload.nonce);
		fd.append('rand_id_user', rand_id_user);

		$.ajax({
			url: dcmsUpload.ajaxurl,
			type: 'post',
			dataType: 'json',
			data: fd,
			contentType: false,
			processData: false,
			beforeSend: function(){
				$('#message').text('Sending...');
				$('#message').show();
			},
			success: function(res){
				$('#message').text(res.message);
				$('#rand_id_user_mm').val(res.rand_id_user_mm);
			}
		});

    	});
	});

})( jQuery );


function showData(data){
	//console.log(data);
  }
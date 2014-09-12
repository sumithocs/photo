jQuery(document).ready(function(){
	$('.ele-view-comment-box').on('click', function(){
		var status = $(this).attr("status");
		var photo_id = $(this).attr("photo_id");
		
		jQuery.ajax({
            type: "post",
            dataType: 'json',
            url: "http://localhost/photo/index.php/photo/get_photo_comments_ajax",
            data: "photo_id="+photo_id,
            success: function(data){           	
    		    jQuery('#ele-comment-div'+photo_id).append(data.html);
    		   
            } 
        });
		
		if(status=='closed'){			
			$("#ele-comment-div"+photo_id).show();
			$(this).attr("status","open");
		}else{			
			$("#ele-comment-div"+photo_id).hide();
			$(this).attr("status","closed");
		}
	
	});
	
	$('.ele-submit-comment').on('click', function(){
		
		var photo_id = $(this).attr("photo_id");
		var comment_text = $("#txt-comment-id"+photo_id).val();
		jQuery.ajax({
            type: "post",
            dataType: 'json',
            url: "http://localhost/photo/index.php/photo/add_photo_comment",
            data: "comment_text="+comment_text+"&photo_id="+photo_id,
            success: function(data){           	
    		    jQuery('#ele-comment-msg'+photo_id).html(data.msg);
    		   
            } 
        });
	
	});
	
	
    $("#fPhoto").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreviewDiv").show();
                $("#imagePreview").attr("src", this.result);
            }
        }      
        
    });
    
    $('.ele-view-photo-detail').on("click",function(){
    	
    	var photo_id = $(this).attr("photo_id");
		
		jQuery.ajax({
            type: "post",
            dataType: 'json',
            url: "http://localhost/photo/index.php/photo/get_photo_detail_ajax",
            data: "photo_id="+photo_id,
            success: function(data){           	
    		    jQuery('#view_photo_detail').html(data.html);    		   
            } 
        });
    	
		$('#view_photo_detail').dialog({
			 autoResize:true
		});
    	
    	
    });
   
    
    $('.ele-delete-photo').on("click",function(){
    	var photo_id = $(this).attr("photo_id");
    	var conf = confirm ("Are you sure?? You want to delete this?");
    	if(conf){
    		 window.location = "http://localhost/photo/index.php/photo/delete_photo/"+photo_id;
    	}
    });	
	
	
});
               
                           
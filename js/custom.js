
	$(document).ready(function(){
	$("#speed").change(function(){
	//var ajaxloader = "<img src="" />";
		var optId = $("#speed").val();
		$.ajax({
			type: "GET",
			url:"data.php?id="+optId,
			beforSend: function(){$("#ajaxloader").show();},
			complete: function(){$("#ajaxloader").hide();},
			success: function(response){
			$("#files").html(response);
			}
		});
	});
});

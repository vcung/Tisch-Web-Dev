(function($){
	console.log('it works!');

	$(document).ready(function() {
		var bike = "<?= $bike ?>";
		var laptop= "<?= $laptop ?>";
		var ipad= "<?= $ipad ?>";
		var camcorder="<?= $camcorder ?>";
		var harddrive="<?= $harddrive ?>";
		$("#additionalTech").append("<p>"+bike+" Bikes</p><p>"+camcorder+" Video Cameras</p><p>"+harddrive+" External Hard Drives</p><p>"+ipad+" Ipads</p><p>"+laptop+" Laptops</p>");
	});
	
	


})(jQuery);  
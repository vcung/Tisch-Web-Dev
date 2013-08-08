(function ($) {
console.log('it works!');
		var bike = "<?= $bike ?>";

		var laptop= "<?= $laptop ?>";

		var ipad= "<?= $ipad ?>";

		var camcorder="<?= $camcorder ?>";

	$('#block-block-12').append('<p>'+bike+' Bikes</p>');
	
})(jQuery);
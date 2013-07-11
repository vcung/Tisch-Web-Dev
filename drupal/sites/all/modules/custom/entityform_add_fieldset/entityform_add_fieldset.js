(function ($) {
console.log("please work...");
var uniqueId = 1;
var counter =0;
Drupal.behaviors.MoreButtonClick = {
  attach: function (context, settings) {
  $('#additional-fields', context).once('Newfieldset', function () {
     $('#test').attr('display', 'none');
  
  });
  
	  $('.entityform-add-book', context).click( function() {
	     var formId = 'Newfields' + uniqueId;
		 console.log("BUTTON WORKS :O!");
	     var copy =  $('#entityform_also_course_reserves_form_group_new').find(".fieldset-wrapper:first").clone();
         copy.attr('id', formId );
		 copy.attr('class', 'fieldset-wrapper');
	  
	     $(copy).find('label,select').each(function(){
		    $(this).attr('for', $(this).attr('for') + uniqueId); 
		 });
	     $(copy).find('input,select').each(function(){
	//	    if ($(this).attr('id')==="InputFormat-other") { $(this).hide(); }//input for other option is initially hidden
            $(this).attr('id', $(this).attr('id') + uniqueId);
		
			$(this).attr('name', $(this).attr('name') + uniqueId);
			//added format-other class in html to Format radio buttons to distinguish "otherDescript" in each book
	//		if ($(this).hasClass('Format-other')) {
			  //  $(this).attr('class', $(this).attr('class') + uniqueId);
	//		}
         });
		 
		$(copy).find('input:text').val('');
		$(copy).find('input[type=checkbox]').attr('checked', false);
		$(copy).find('input[type=radio]').attr('checked', false);
	 
	 //   $(copy) += '<? php $field = $_POST["'+$(this).attr('name') + uniqueId+'"];< ?>';
        $('#entityform_also_course_reserves_form_group_new', context).append(copy);
  		$(this).append('<? php $field = $_POST["'+ $(this).attr('name') + uniqueId+'"]; print_r($field); ?>');

  //    children = $('#entityform_also_course_reserves_form_group_new').children();
         uniqueId++;
		 counter++; 
		
     });
	 

	   
	   }
	   
}

   })(jQuery);
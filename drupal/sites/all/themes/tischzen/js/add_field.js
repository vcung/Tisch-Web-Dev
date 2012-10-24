function ($){
$(document).ready(function ()
{
	//add is the name of the id the "add" button is in on the form
	$('#add').click(function()
	{
		var fields = '<legend><span class="fieldset-legend">Order</span></legend><div class="fieldset-wrapper">';
		fields += '<div class="form-item webform-component webform-component-number" id="webform-component-order--quantity">';
		fields += '<label for="edit-submitted-order-quantity">Quantity </label>';
		fields += '<input type="number" id="edit-submitted-order-quantity" name="submitted[order][quantity]" step="0" class="form-text form-number" /></div>';
		fields += '<div class="form-item webform-component webform-component-number" id="webform-component-order--unit-price">';
		fields += '<label for="edit-submitted-order-unit-price">Unit Price </label>';
		fields += '<span class="field-prefix">$</span> <input type="number" id="edit-submitted-order-unit-price" name="submitted[order][unit_price]" step="0" class="form-text form-number" /></div>';
		fields += '<div class="form-item webform-component webform-component-textarea" id="webform-component-order--comments"><label for="edit-submitted-order-comments">Comments </label>';
		fields += '<div class="form-textarea-wrapper resizable"><textarea id="edit-submitted-order-comments" name="submitted[order][comments]" cols="60" rows="5" class="form-textarea"></textarea></div>';
		fields += '</div></div></fieldset>';
		//append to fieldset
		$('#webform_component-order').append(str);
	});
	$('.remove').live('click', function()
	{
		$(this).parent('div').remove();
	});
});
}) (jQuery);

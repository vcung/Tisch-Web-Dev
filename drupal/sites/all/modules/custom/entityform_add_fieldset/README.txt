
Tried two ways to create "add more" functionality:
	Implemented Field Group's hook_field_group_formatter_info and hook_field_group_pre_render_alter
		-created custom fieldgroup that uses jQuery to duplicate fields within the fieldset
		-does not add new fields to $form array
		-duplicates fields without needing required fields to be filled first
		
	Created function that implements Entityform's hook_form_alter.
		-created fieldset and "add more" button that uses AJAX to duplicate fields in the fieldset
		

	Upon submit, both methods do not save the updated form and only saves data for fields created
	by the entityform. This most likely because of Entityform's own submit handler.
   
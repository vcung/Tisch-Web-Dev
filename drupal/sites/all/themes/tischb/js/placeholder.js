jQuery(function($) {
$(document).ready(function(){
var phForms = $('#webform-client-form-908'), //change 'form' to specific webform's name: '#webform-client-form-NODENUMBER'
//replace value of phFields with name of field, ex: '#edit-submitted-course-name'
//may need to set several variables for multiple fields
//to edit fields by type: phFields = 'input[type=text], input[type=email], textarea'; 
    phFields = '#edit-submitted-course-name';
function lbl2ph(){ // function containing our code
 //  may need to declare more variables for each field in the specified form(s)
    var el = phForms.find(phFields);
    ptext = "this is a place holder"; //placeholder text
    // add label text to field's placeholder attribute
    el.attr("placeholder",ptext);

}

jQuery(function($){
    if (Modernizr.input.placeholder) { // check for placeholder support
        lbl2ph(); // initiate function
    }
});
});
});
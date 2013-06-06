(function ($) {
console.log("please work...");

  $('body').on('click', '.entityform-add-book', function() {
     console.log("BUTTON WORKS :O!");
  });
  /*
Drupal.theme.prototype.newfieldtest = function (settings) {
$("body").find("#NewFieldsetTest").append('<input type="button" id="add-book" class="form-submit entityform-add-book" value="Add Another" />');
$("body").append('<input type="button" id="add-book" class="form-submit entityform-add-book" value="Add Another" />');

  var controls = {};
  //controls += '<span class="more-button"></span>';item = $('<span class="addmore-button"></span>');
  //is form-submit needed
//  controls += '<input type="button" id="add-book" class="form-submit more-button" value="Add Another" />';//item.append(controls.addMore = $('<input type="button" class="form-submit entityform-add-book" value="" />').val(controls.nextTitle = Drupal.t('Add Another')));
   controls.item = $('<span class="more-button"></span>');
   controls.item.append(controls.addMore = $('<input type="button" class="form-submit entityform-add-book" value="" />').val(controls.nextTitle = Drupal.t('Add Another')));
  return controls;
}


Drupal.FieldGroup.Effects.processNewfieldset = {
  execute: function (context, settings, type) {
    if (type == 'form') {
       var self = this;
       $.extend(this, settings, Drupal.theme('newfieldtest', settings));
control.log("here");
  //this.nextLink.click(function () {
 //   self.nextPage();
 //   return false;
 // });
    }
   }
}
  */

  
   })(jQuery);
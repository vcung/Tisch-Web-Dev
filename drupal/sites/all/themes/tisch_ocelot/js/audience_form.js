(function ($) {
$(document).ready(function() {
$("#audience-div").css('display', 'none');
$("#topic-div").css('display', 'none');
$('#aud-title').click(function() {
$("#audience-div").toggle();
})
$('#topic-title').click(function() {
$("#topic-div").toggle();
})
})
}(jQuery));
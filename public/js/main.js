function addField(event) {
  event.preventDefault();
  $.post('get_form', {
    count: $('.new-field').length
  }).then(function(res) {
    $('#fields').append(res.message);
    toggleRemoveBtn();
  }, function(err) {
    console.error(err);
    alert('There was an error getting the form. Please try again.');
  });
  return false;
}
function toggleRemoveBtn() {
  if ($('.new-field').length > 1) {
    $('#removeField').show();
  } else {
    $('#removeField').hide();
  }
}
function removeField(event) {
  event.preventDefault();
  $('.new-field').last().remove();
  toggleRemoveBtn();
  return false;
}
jQuery(document).ready(function($) {
  $('#addField').on('click', addField);
  $('#removeField').on('click', removeField);
  $('#form').on('submit', function(event) {
    if (confirm('Do you want to submit and finish editing?')) {
      return true;
    } else {
      event.preventDefault();
      return false;
    }
  });
});
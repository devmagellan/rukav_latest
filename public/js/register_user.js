$(document).ready(function () {
  $('#registerButton').on('click', function (e) {
    e.preventDefault();
    var formData = $('#registerForm').serialize();
    $.ajax({
      method: 'post',
      url: '/register',
      data: formData,
      success: function () {

      },
      error: function (errors) {
        var response = JSON.parse(errors.responseText);
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {
          errorString += '<li>' + value + '</li>';
        });
        errorString += '</ul>';
       $('#errorsBlock').html(errorString);
      }
    });
  })
});

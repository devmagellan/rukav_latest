$(document).ready(function () {
  $('#loginButton').on('click', function (e) {
    e.preventDefault();
    var formData = $('#registerForm').serialize();
    $.ajax({
      method: 'post',
      url: '/loginUser',
      data: formData,
      success: function () {
        alert('user залогинен')
      },
      error: function (errors) {
        var response = JSON.parse(errors.responseText);
        var errorString = '<ul>';
        $.each( response.errors, function( key, value) {
          errorString += '<li>' + value + '</li>';
        });
        errorString += '</ul>';
       $('#loginErrorsBlock').html(errorString);
      }
    });
  })
});

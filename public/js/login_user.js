$(document).ready(function () {
  $('#loginButton').on('click', function (e) {
    e.preventDefault();
    var formData = $('#loginForm').serialize();
    $.ajax({
      method: 'post',
      url: '/loginUser',
      data: formData,
      success: function (data) {
        location.reload();
      },
      error: function (errors) {
        var response = JSON.parse(errors.responseText);
        $('#loginErrorsBlock').html('');
        $('.errorBlock').html('');
        if (errors.status === 409) {
          $('#loginErrorsBlock').html(response);
        } else {
          $.each(response.errors, function (key, value) {
            $('#' + key + 'Login').html(value)
          });
        }
      }
    });
  })
});

$(document).ready(function () {
  $('#registerButton').on('click', function (e) {
    e.preventDefault();
    var formData = $('#registerForm').serialize();
    $.ajax({
      method: 'post',
      url: '/register',
      data: formData,
      success: function (data) {
        location.reload();
      },
      error: function (errors) {
        var response = JSON.parse(errors.responseText);
        $('.errorBlock').html('');
        $.each(response.errors, function (key, value) {
          $('#' + key).html(value)
        });
      }
    });
  })
});

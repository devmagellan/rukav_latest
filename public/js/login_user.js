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
        if(errors.status===409){
          $('#loginErrorsBlock').html(response);
        }else{
          var errorString = '<ul>';
          $.each( response.errors, function( key, value) {
            errorString += '<li>' + value + '</li>';
          });
          errorString += '</ul>';
          $('#loginErrorsBlock').html(errorString);
        }
      }
    });
  })
});

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
        console.log('response=>',response)
        if(response.message=='Не подтвержденный email'){
          $('#ModalIn').modal('hide');
          $('#confirmEmailIfRegistered').modal('show');
        }
        else if(response.message=='Не подтвержденный email и телефон'){
          $('#ModalIn').modal('hide');
          $('#confirmEmailPhonelIfRegistered').modal('show');
        }



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

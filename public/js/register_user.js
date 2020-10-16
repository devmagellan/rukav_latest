
$(document).ready(function () {

  $('#registerForm').submit( function (e) {
      var radioValue = $("input[name='vid_user']:checked"). val();
    e.preventDefault();
    var formData = $('#registerForm').serialize();
    console.log('HERE')

    $.ajax({
      type: 'post',
      url: '/register',
      dataType: "json",
      data: formData,
      success: function (data) {
        //location.reload();
          console.log(data)
          if(data.message=='account created'){
              console.log(radioValue)
              if(radioValue=='Частная'){
                  $('#closeReg').trigger('click')
                  $('#confirmEmail').modal({show:true})

              }
              else{
                  $('#closeReg').trigger('click')
                  $('#confirmEmailPhone').modal({show:true})
              }
          }
      },
      error: function (errors) {
        var response = JSON.parse(errors.responseText);
        $('.errorBlock').html('');
        $.each(response.errors, function (key, value) {
          $('#' + key).html(value)
        });
      }
    });
  });

    $(".emailConfirmationForm").bind('submit', function (e) {
        e.preventDefault();
        console.log('this_ajax')
        $.ajax({
            type: "POST",
            url: "/confirm_email",
            dataType: "json",
            data: { emailConfirmation: $('.emailConfirmation').val()},
            success: function (result) {
                console.log(result);
                if(result.response=='success' || result==1 ){
                    $('.confirmEmailClose').trigger('click')
                    window.location.reload()
                    return true;
                }
            },
            error:function(result){
                $('#emailConfirmation').text('Не правильный код!')
            }
        });

        return false;

    });

  $(".emailConfirmationFormIfRegistered").bind('submit', function (e) {
    e.preventDefault();
    console.log('this_ajax')
    $.ajax({
      type: "POST",
      url: "/confirm_email_if_registered",
      dataType: "json",
      data: { emailConfirmation: $('.emailConfirmationIfRegistered').val()},
      success: function (result) {
        console.log(result);
        if(result.response=='success' || result==1 ){
          $('.confirmEmailClose').trigger('click')
          window.location.reload()
          return true;
        }
      },
      error:function(result){
        $('#emailConfirmation').text('Не правильный код!')
      }
    });

    return false;

  });


    $(".RecoveryPassword").bind('submit', function (e) {
        e.preventDefault();
        console.log('this_ajax')
        var email=$('#recoveryEmail').val();
        $.ajax({
            type: "POST",
            url: "/send_recovery_password_link",
            dataType: "json",
            data: { email: email},
            success: function (result) {
                console.log(result);
                if(result.response=='success' ){
                    $('.RecoveryPasswordClose').trigger('click');
                    $('#confirmEmail').modal({show:true});
                    return true;
                }
                else if(result.response=='no_email'){
                    $('#emailConfirmationForm').text('Пользователя с таким Email не существует!')
                }
            },
            error:function(result){
                $('#emailConfirmationForm').text('Пользователя с таким Email не существует!')
            }
        });

        return false;

    });

    $(".emailPhoneConfirmationForm").bind('submit', function (e) {
        e.preventDefault();
        console.log('this_ajax',$('.emailConfirmationWithPhone').val())
        console.log('this_ajax_second',$('#phoneConfirmationSecond').val())
        $.ajax({
            type: "POST",
            url: "/confirm_email_phone",
            dataType: "json",
            data: { /*emailConfirmation: $('.emailConfirmationWithPhone').val(),*/phoneConfirmationSecond: $('#phoneConfirmationSecond').val()},
            complete:function(result){

            },
            success: function (result) {
                console.log(result);
                if(result.response=='success' || result==1 ){
                    $('.confirmEmailClose').trigger('click')
                    window.location.reload()
                    return true;
                }
                else if(result.response=='temporary'){
                    $('.confirmPhoneClose').trigger('click')
                    $('#confirmEmail').modal({show:true})
                }

            },
            error: function (errors) {
                console.log(errors)
                var response = JSON.parse(errors.responseText);
                console.log(response)
                $('.errorBlock').html('');
                $.each(response.response, function (key, value) {
                    if(value=='error emailCode'){
                        $('#emailConfirmationWithPhone').text('Не правильный email код подтверждения !')
                    }
                    if(value=='error SmsCode'){
                        $('#phoneConfirmationWithEmail').text('Не правильный SMS код подтверждения !')
                    }
                });

            }



        });

        return false;

    });


    $(".changeUserTypeForm").bind('submit', function (e) {
      console.log($(this).find("button[type=submit]:focus" )[0].formAction);
        e.preventDefault();
        console.log($(e.target))
      console.log($(e.target)[0].baseURI);

        var save_url=$(this).find("button[type=submit]:focus" )[0].formAction;
        var current_type = $(e.target).find('input[name="current_type"]').val()
        console.log('changeUserTypeForm', current_type);
        var formData = $('#changeRegisterForm').serializeArray();
      formData.push({ name: "save_url", value: save_url });
        if (window.location.href.indexOf("to_individual") >= 0 || window.location.href.indexOf("to_company") >= 0 || window.location.href.indexOf("to_organisation")>= 0 ) {
console.log(window.location.href.indexOf("to_individual")>= 0)
            console.log(window.location.href.indexOf("to_company")>= 0)
            console.log(window.location.href.indexOf("to_organisation")>= 0)

          formData.push({ name: "vid_userl", value: current_type });

            $.ajax({
                method: 'post',
                url: save_url,
                data: formData,
                success: function (data) {
                    //location.reload();
                    console.log('Updated To session saved', data)
                    $('#confirmPhone').modal({show: true})
                },
                error: function (errors) {
                  console.log('Got errors')
                    var response = JSON.parse(errors.responseText);
                    $('.errorBlock').html('');
                    $.each(response.errors, function (key, value) {
                        $('#' + key).html(value)
                    });
                }
            });

        }
        else{
            $.ajax({
                method: 'post',
                url: '/changeUserData',
                data: formData,
                success: function (data) {
                    //location.reload();
                    console.log('Updated To session saved', data)
$('#updated_data').show();
                    goToByScroll('updated_data');
                },
                error: function (errors) {

                }
            });
        }
    });
    function goToByScroll(id) {
        // Remove "link" from the ID
        id = id.replace("link", "");
        // Scroll
        $('html,body').animate({
            scrollTop: $("#" + id).offset().top
        }, 'slow');
    }

        $(".phoneConfirmationForm").bind('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/confirm_phone",
                dataType: "json",
                data: { phoneConfirmation: $('.phoneConfirmation').val()},
                complete:function(result){

                },
                success: function (result) {
                    console.log(result);
                    if(result.response=='success' || result==1 ){
                        $('.confirmPhoneClose').trigger('click')
                        window.location.href='/private_cabinet'
                        //window.location.reload()
                        //return true;
                    }

                },
                error: function (errors) {
                    console.log(errors)
                    var response = JSON.parse(errors.responseText);
                    console.log(response)
                    $('.errorBlock').html('');
                    $.each(response.response, function (key, value) {
                        if(value=='error phoneCode'){
                            $('#phoneConfirmation').text('Не правильный email код подтверждения !')
                        }

                    });

                }



            });

            return false;

        });


});

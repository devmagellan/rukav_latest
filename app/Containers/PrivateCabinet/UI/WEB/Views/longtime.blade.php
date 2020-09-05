@extends('homepage::layouts.layout')
@section('content')
  <div class="breadcums_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs d-flex align-items-center">
            <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a></li>
            <li>Личный кабинет</li>
            <img class="breadcrumbs_pointer" src="/img/back_Icon.svg" alt="">
            <li >Мой профиль</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <main>
    <h3>Ваше объявление продлено на месяц</h3>
  </main>


@endsection
@section('scripts')
  <script>



      $(document).ready(function(){
          $('.triggerSwitch').each(function(indx,element){
              console.log('triggerSwitch',$(element).val())
              if($(element).val()==1){
                  $(element).parent().find('.slider').trigger('click')
              }
          })
      })


          $('.active_or_no').find('input').change(function(){


          var message=$(this).parent().parent().find('.customSwitch2_id').val()

          console.log(message);
          var state = $(this).is(":checked")
          console.log('Active or no',state)
          $.ajax({
              method: 'POST',
              dataType: 'json',
              async:true,
              url: '/ad/message_activity_set',
              data: {message: message,state:state
              },
              beforeSend: function() {
              },
              complete: function() {

              },
              success: function (data) {

                  console.log('success')
              }
          });
      })

      function deleteFromFavorites(message_id){

          $.ajax({
              method: 'POST',
              dataType: 'html',
              async:false,
              url: '/add/wishList',
              data: {id: message_id,active:0
              },
              beforeSend: function() {
              },
              complete: function() {
                  $('#favorite_'+message_id).remove()
              },
              success: function (data) {

              }
          });



      }
</script>

  <script>

      $("#idForm").submit(function(e) {

          e.preventDefault(); // avoid to execute the actual submit of the form.

          var form = $(this);
          var url = form.attr('action');

          $.ajax({
              type: "POST",
              url: url,
              data: form.serialize(), // serializes the form's elements.
              success: function(data)
              {
                 console.log(data); // show response from the php script.
                  if (data.status=='error'){
                  $('#oldPassword').text(data.message)}
                  else{
                      $('#passwordUpdate').modal('hide')
                  }
              }
          });


      });



      $(document).ready(function() {

          reloadMessages()

          $('#imgInputakk').on('change', function() {
console.log('imgInputakk')
              var fileName = '';
              fileName = $(this).val();
              $('#file-selected').html(fileName);


              var imageData = new FormData();
              imageData.append('image', $('#imgInputakk')[0].files[0]);

              //Make ajax call here:
              $.ajax({
                  url: '/upload-profile-image-ajax',
                  type: 'POST',
                  processData: false, // important
                  contentType: false, // important
                  data: imageData,
                  beforeSend: function() {
                      $("#err").fadeOut();
                  },
                  success: function(result) {
                      if (result == 'invalid file') {
                          // invalid file format.
                          $("#err").html("Invalid File. Image must be JPEG, PNG or GIF.").fadeIn();
                      } else {

                          // view uploaded file.
                         // $("#image").attr('src', '/' + result);
                        /* $("#preview").html(data).fadeIn();*/
                        /* $("#form")[0].reset(); */
                          //show the remove image button
                        /*  $('#file-selected').empty();
                          $("#remove-image").show();
                          $("#custom-file-upload").hide();
                          $("#uploadImage").hide();
                          $("#button").hide();*/
                      }
                  },
                  error: function(result) {
                      $("#err").html("errorcity").fadeIn();
                  }
              });

          });

      });

      if('{{$data['properties']->user->country }}'!=''){
          var cnt='{{$data['properties']->user->country }}'
      }
      else{var cnt='gb'}

//$('#telphone5,#telphone6').intlTelInput(
//    {
//    onlyCountries:[cnt],
//        preferredCountries:""
//    }
//)


      function reloadMessages(){

          var module='staff.roles'
          console.log();
          var url='/cabinet/messagesData';
          $.ajax({
              method: 'POST',
              dataType: 'html',
              async:false,
              url: url,
              data: {module: module},
              beforeSend: function() {
                  $('#loader2').show();
              },
              complete: function() {
                  $('#loader2').hide();
              },
              success: function (data) {

                  $('.result_of_messages_table').html(data);

              }
          });
      }

      $('.edit_ad').click(function(){
        var id = $(this).parent().find('.customSwitch2_id').val()
        console.log(id)
        window.location.href='/ads/'+id+'/edit/'
      })


  </script>

@endsection

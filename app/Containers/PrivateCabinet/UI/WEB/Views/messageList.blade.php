<?
if(\Auth::user()->id==$conversation->first()->message->sender){
    $recepient=$conversation->first()->sender_id;
}
else{
    $recepient=$conversation->first()->receiver_id;
}

$opponent=\App\Containers\User\Models\User::where('id',$recepient)->first();
?>

<div class="wrapper_header_message">
    <div class="wrapper_header_message_left">
        <div class="massage_user_avatar massage_user_avatar_online">
            <img src="/img/messeg_img.svg" alt="">
        </div>
    </div>
    <div class="wrapper_header_message_right">
      <a  href="/all_author_ads?id={{$opponent->id}}"><p class="wrapper_header_name">{{$opponent->name}}</p></a>
      <a href="/ads/{{$conversation->first()->message->id}}"><p class="wrapper_header_add_name">{{$conversation->first()->message->title}}</p></a>
        <p class="wrapper_header_add_price">£ {{$conversation->first()->message->price}}</p>
        <p class="wrapper_header_date">Опубликовано: <span>{{$conversation->first()->message->created_at}}</span></p>
        <div class="wrapper_header_setting user_chat_block">
            <img src="/img/settings-icon.svg" alt="">
        </div>


      <div class="user_chat_block_dropdown">
        <a href="" data-opponent="{{$opponent->id}}" class="user_cabinet_item blockUser" style="margin-top:-50px;">
          <div class="user_cabinet_icon">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="svg_path" d="M16.4482 14.6094C16.2325 14.6094 16.0576 14.7843 16.0576 15V18.8281C16.0576 19.0435 15.8824 19.2188 15.667 19.2188H2.23047C2.01508 19.2188 1.83985 19.0435 1.83985 18.8281V11.7578C1.83985 11.5421 1.66496 11.3672 1.44922 11.3672C1.23348 11.3672 1.05859 11.5421 1.05859 11.7578V18.8281C1.05859 19.4743 1.5843 20 2.23047 20H15.667C16.3132 20 16.8389 19.4743 16.8389 18.8281V15C16.8389 14.7843 16.664 14.6094 16.4482 14.6094Z" fill="#A269F7"/>
              <path class="svg_path" d="M17.9817 7.31048C17.6461 6.97494 17.2555 6.72771 16.8389 6.56704V4.21833C16.8386 4.21829 16.8383 4.21825 16.838 4.21825C16.8379 4.11665 16.7992 4.0168 16.7245 3.94212L12.8968 0.114453C12.8221 0.0397657 12.7222 0.00105469 12.6206 0.00101563C12.6206 0.000664064 12.6206 0.000351563 12.6206 0H2.23047C1.5843 0 1.05859 0.525704 1.05859 1.17188V8.45052C1.05859 8.66627 1.23348 8.84115 1.44922 8.84115C1.66496 8.84115 1.83985 8.66627 1.83985 8.45052V1.17184C1.83985 0.956447 2.01508 0.781213 2.23047 0.781213H12.23V3.43708C12.23 4.08325 12.7557 4.60895 13.4019 4.60895H16.0576V6.37122C15.0809 6.24978 14.0601 6.56224 13.3119 7.31048L7.74462 12.8777C7.59208 13.0302 7.59208 13.2776 7.74462 13.4301C7.89716 13.5827 8.14451 13.5827 8.29709 13.4301L13.8643 7.86291C14.8471 6.88009 16.4464 6.88005 17.4293 7.86291C18.4121 8.84576 18.4121 10.445 17.4293 11.4278L12.2079 16.6491C11.595 17.262 10.5978 17.262 9.98494 16.6491C9.68806 16.3523 9.52455 15.9575 9.52455 15.5376C9.52455 15.1178 9.68806 14.723 9.98494 14.4262L15.2317 9.17943C15.3473 9.06381 15.501 9.0001 15.6646 9.0001C15.8281 9.0001 15.9818 9.06377 16.0975 9.17943C16.2131 9.29506 16.2767 9.44881 16.2767 9.61232C16.2767 9.77584 16.2131 9.92959 16.0974 10.0452L11.3688 14.7738C11.2162 14.9264 11.2162 15.1737 11.3688 15.3263C11.5213 15.4788 11.7687 15.4788 11.9212 15.3263L16.6498 10.5976C16.913 10.3345 17.058 9.98451 17.058 9.61232C17.058 9.24014 16.913 8.89017 16.6499 8.62701C16.3867 8.36381 16.0367 8.21884 15.6646 8.21884C15.2924 8.21884 14.9425 8.36381 14.6792 8.62697L9.43252 13.8737C8.51505 14.7912 8.51505 16.2841 9.43252 17.2016C9.89131 17.6603 10.4938 17.8897 11.0964 17.8896C11.6989 17.8896 12.3017 17.6602 12.7603 17.2016L17.9817 11.9802C19.2691 10.6928 19.2691 8.59791 17.9817 7.31048ZM13.4019 3.8277C13.1865 3.8277 13.0112 3.65247 13.0112 3.43708V1.33371L15.5052 3.8277H13.4019Z" fill="#A269F7"/>
              <path class="svg_path" d="M1.72149 9.84919C1.64883 9.77654 1.54805 9.73474 1.44531 9.73474C1.34219 9.73474 1.2418 9.77654 1.16875 9.84919C1.09609 9.92185 1.05469 10.0226 1.05469 10.1254C1.05469 10.2281 1.09609 10.3289 1.16875 10.4015C1.2418 10.4746 1.34219 10.516 1.44531 10.516C1.54805 10.516 1.64883 10.4746 1.72149 10.4015C1.79414 10.3289 1.83594 10.2281 1.83594 10.1254C1.83594 10.0226 1.79414 9.92185 1.72149 9.84919Z" fill="#A269F7"/>
              <path class="svg_path" d="M7.14529 14.2327L7.13756 14.2089C7.07096 14.0037 6.8506 13.8913 6.64541 13.9579C6.44021 14.0245 6.32783 14.2449 6.39443 14.4501L6.40216 14.4739C6.45576 14.6391 6.60892 14.7441 6.77365 14.7441C6.81361 14.7441 6.85427 14.7379 6.89431 14.7249C7.09951 14.6583 7.21189 14.4379 7.14529 14.2327Z" fill="#A269F7"/>
            </svg>

          </div>
          <p class="user_cabinet_item_text">
            Заблокировать пользователя
          </p>
        </a>

      </div>






    </div>
</div>
<div class="wrapper_body_messege">
    <div class="wrapper_body_messege_scroll">


    @foreach($conversation as $segment)
            @if(\Auth::user()->id!=$segment->receiver_id)



                <div class="body_messege_item body_my_messege_item">
                  @if($segment->photo)
                    <img style="" src="/storage/message_images/{{$segment->photo}}">
                    @else
                    <p>{{$segment->text}}</p>
                  @endif
                    <?
                    $secondsInDay = 40400; // 3600 * 24
                    $expired = $segment->created_at->diffInSeconds(\Carbon\Carbon::now()) > $secondsInDay;
                    if($expired){
                    ?>
                    <span>{{\Carbon\Carbon::createFromTimeStamp(strtotime($segment->created_at))->locale('ru')->isoFormat('Do MMMM YY, h:mm a')}}</span>
                    <?
                    }else{
                    ?>
                    <span>{{\Carbon\Carbon::createFromTimeStamp(strtotime($segment->created_at))->locale('ru')->diffForHumans(['parts' => 1,
    'join' => true,])}}</span>
                    <?
                    }
                    ?>
                </div>
            @endif
        <!--  end .chat-segment -->
            <!-- start .chat-segment -->
            @if(\Auth::user()->id==$segment->receiver_id)
                    <div class="body_messege_item body_to_messege_item">
                      @if($segment->photo)
                        <img style="" src="/storage/message_images/{{$segment->photo}}">
                    <br>
                       <span class="downloadPhoto" data-photo="/storage/message_images/{{$segment->photo}}"><i style="cursor:pointer" class="fa fa-download "  aria-hidden="true" data-toggle="tooltip" title="Скачать полный размер"></i></span>
                      @else
                        <p>{{$segment->text}}</p>
                      @endif
                      <?
                        $secondsInDay = 40400; // 3600 * 24
                        $expired = $segment->created_at->diffInSeconds(\Carbon\Carbon::now()) > $secondsInDay;
                        if($expired){
                          ?>

                          <span>{{\Carbon\Carbon::createFromTimeStamp(strtotime($segment->created_at))->locale('ru')->isoFormat('Do MMMM YY, h:mm a')}}</span>
                        <?
                        }else{
                          ?>

                        <span>{{\Carbon\Carbon::createFromTimeStamp(strtotime($segment->created_at))->locale('ru')->diffForHumans(['parts' => 1,
    'join' => true,])}}</span>
                        <?
                        }
                        ?>

                    </div>
            @endif
        <!--  end .chat-segment -->

        @endforeach

    </div>
</div>
<div class="wrapper_footer_messege">
    <div class="send_message_form">
        <label for="file">
          <img src="/img/photo-camera-icon-black.svg" alt="">
        </label>
        <form method="post" action="" enctype="multipart/form-data" id="myform" style="display: none;">
        <input type="file" id="file" name="file" style="display: none;">
        <input type="button" class="button" value="Upload" id="but_upload" style="display: none;">
      </form>
        <input id="msgr_input" type="text" name="" placeholder="Текст сообщения..." required="">

        <button onclick="sendMessage()"><img src="/img/paper-plane-icon.svg" alt=""></button>
    </div>
    <p>RUKAV оставляет за собой право проверять сообщения посланные через наш сервер для того чтобы защитить вас от мошенничества и подозрительных действий.</p>
</div>
<script>
  $('.blockUser').click(function(e){
    e.preventDefault()
    var opponent=$(this).attr('data-opponent')
    console.log('opponent',$(this).attr('data-opponent'))

    $.ajax({
      method: 'POST',
      async:false,
      dataType: 'json',
      url: '/block_user',
      data: {opponent:opponent},
      beforeSend: function() {
        $('#loader').show();
      },
      complete: function() {
        $('#loader').hide();
        console.log('complete')
      },
      success: function (data) {
        alert('Пользователь заблокирован')
        window.location.reload()

      }
    });

  })


  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();



  });

  $('.downloadPhoto').click(function(e){
    var photo_file=$(this).attr('data-photo')
    console.log(photo_file)
    e.preventDefault();  //stop the browser from following
    var ext=photo_file.split('/')[3].split('.')
    window.location.href = '/downloadChatFile/'+ext[ext.length-2]+'/'+ext[ext.length-1];
  })
</script>

<script>
  $('.user_chat_block').on('click', function () {
    $('.user_chat_block_dropdown').toggleClass('user_chat_block_dropdown-active');
  });
  $("#file").change(function () {
    $("#but_upload").trigger('click')
  })
$("#but_upload").click(function(){
    console.log('got it')
    //e.preventDefault();
    var fsize = $('#file')[0].files[0].size,
      ftype = $('#file')[0].files[0].type,
      fname = $('#file')[0].files[0].name,
      fextension = fname.substring(fname.lastIndexOf('.')+1);
    var validExtensions = ["jpg","pdf","jpeg","gif","png","doc","docx","xls","xlsx","ppt","pptx","txt","zip","rar","gzip"];

    if ($.inArray(fextension, validExtensions) == -1){
      alert("This type of files are not allowed!");
      this.value = "";
      return false;
    }
  else{

      var fd = new FormData();
      var files = $('#file')[0].files[0];
      fd.append('file',files);
      if(fsize > 3145728){/*1048576-1MB(You can change the size as you want)*/
        alert("File size too large! Please upload less than 3MB");
        this.value = "";
        return false;
      }

      var url = '/send_photomessage_to_client';
      var client_id='{{$recepient}}';
      var message_id='{{$conversation->first()->message_id}}';

      fd.append("client_id",client_id);
      fd.append("message_id",message_id);
      $.ajax({
        method: 'POST',
        async:false,
        cache : false,
        contentType: false,
        processData : false,
        dataType: 'json',
        url: url,
        data: fd,
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function() {
          $('#loader').hide();
          console.log('complete')


        },
        success: function (data) {
          console.log('got Data',data)
          $('.wrapper_body_messege_scroll').append(
            '<div class="body_messege_item body_my_messege_item">'+
            '<img style="" src="/storage/message_images/'+data.data.photo+'">'+
            '<span>только что</span>'+
            '</div>'
          );
          console.log('success')

          console.log({{$conversation->first()->message_id}})
          //reloadMessageList({{$conversation->first()->message_id}})


        }
      });
    }
  });


    function sendMessage(){
        console.log('in_function')
        if($('#msgr_input').val().length>0){

            var text = $('#msgr_input').val()
            var url = '/send_message_to_client';console.log(text)
            var client_id='{{$recepient}}';
            var message_id='{{$conversation->first()->message_id}}';
            $.ajax({
                method: 'GET',
                dataType: 'json',
                async:true,
                url: url,
                data: {client_id:client_id,text: text,message_id:message_id},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
					console.log('complete3')
					 $('.wrapper_body_messege_scroll').append(
                    '<div class="body_messege_item body_my_messege_item">'+
                        '<p>'+text+'</p>'+
                        '<span>только что</span>'+
                        '</div>'
                    );
                  $('#msgr_input').val('');
                },
                success: function (data) {
				console.log('success')
                    console.log(data)
                    console.log({{$conversation->first()->message_id}})
                    //reloadMessageList({{$conversation->first()->message_id}})


                },
              error: function (errors) {


                var response = JSON.parse(errors.responseText);
                console.log('Error',response);
                if(response.error=='Email Not confirmed'){
                  $('#emailUpdate').modal({show:true})
                }


              }
            });
        }
    }





   var pusher = new Pusher('500e0547867ccfe184af', {
      cluster: 'eu'
    });
var channel = pusher.subscribe('my-channel');

Pusher.logToConsole = true;
var user='{{\Auth::user()->id}}'
console.log('receiver - mid=>',window.message_id)
var receiver='receiver-'+user+'-'//+window.message_id
console.log(receiver)
console.log(receiver.length)

channel.bind(receiver, function(data) {
console.log(data);
$('.conv_class_'+data.message_id+'').addClass('message_sidebar_theme_item-new')

if('{{$conversation->first()->sender_id}}'=={{\Auth::user()->id}}){
	var sender='{{$conversation->first()->receiver_id}}';
}
else{
	var sender='{{$conversation->first()->sender_id}}'
}
console.log(sender)
console.log('{{$conversation->first()->message->id}}')
  console.log('popali')
 if(data.photo==null && data.sender_id==sender && '{{$conversation->first()->message->id}}'==data.message_id ){
   console.log('popali')
	 $('.wrapper_body_messege_scroll').append(
                    '<div class="body_messege_item body_to_messege_item">'+
                        '<p>'+data.text+'</p>'+
                        '<span>'+data.created+'</span>'+
                        '</div>'
                    );
}else if(data.photo!=null && data.sender_id==sender && '{{$conversation->first()->message->id}}'==data.message_id){
   console.log('popali photo')
   $('.wrapper_body_messege_scroll').append(
     '<div class="body_messege_item body_to_messege_item">'+
     '<img style="" src="/storage/message_images/'+data.photo+'">'+
     '<span>'+data.created+'</span>'+
     '</div>'
   );
 }

})

</script>

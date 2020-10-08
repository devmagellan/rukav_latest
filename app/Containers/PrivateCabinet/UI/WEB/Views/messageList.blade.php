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
        <p class="wrapper_header_name">{{$opponent->name}}</p>
        <p class="wrapper_header_add_name">{{$conversation->first()->message->title}}</p>
        <p class="wrapper_header_add_price">£ {{$conversation->first()->message->price}}</p>
        <p class="wrapper_header_date">Опубликовано: <span>{{$conversation->first()->message->created_at}}</span></p>
        <div class="wrapper_header_setting">
            <img src="/img/settings-icon.svg" alt="">
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

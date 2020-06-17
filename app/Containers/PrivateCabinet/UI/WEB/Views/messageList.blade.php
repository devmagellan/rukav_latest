<?
if(\Auth::user()->id==$conversation->first()->message->sender){
    $recepient=$conversation->first()->sender_id;
}
else{
    $recepient=$conversation->first()->receiver_id;
}

?>

<div class="wrapper_header_message">
    <div class="wrapper_header_message_left">
        <div class="massage_user_avatar massage_user_avatar_online">
            <img src="/img/messeg_img.svg" alt="">
        </div>
    </div>
    <div class="wrapper_header_message_right">
        <p class="wrapper_header_name">{{$conversation->first()->author->name}}</p>
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
                    <p>{{$segment->text}}</p>
                    <span>{{$segment->created_at}}</span>
                </div>
            @endif
        <!--  end .chat-segment -->
            <!-- start .chat-segment -->
            @if(\Auth::user()->id==$segment->receiver_id)
                    <div class="body_messege_item body_to_messege_item">
                        <p>{{$segment->text}}
                        </p>
                        <span>{{$segment->created_at}}</span>
                    </div>
            @endif
        <!--  end .chat-segment -->

        @endforeach

    </div>
</div>
<div class="wrapper_footer_messege">
    <form class="send_message_form">
        <label for="send_message_foto">
            <img src="/img/photo-camera-icon-black.svg" alt="">
        </label>
        <input type="file" id="send_message_foto" name="send_message_foto" style="display: none;">
        <input type="text" name="" placeholder="Текст сообщения..." required="">
        <button><img src="/img/paper-plane-icon.svg" alt=""></button>
    </form>
    <p>RUKAV оставляет за собой право проверять сообщения посланные через наш сервер для того чтобы защитить вас от мошенничества и подозрительных действий.</p>
</div>

<script>
    function sendMessage(){
        if($('#msgr_input').text().length>0){

            var text = $('#msgr_input').text()
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
                },
                success: function (data) {

                    console.log(data)
                    console.log({{$conversation->first()->message_id}})
                    reloadMessageList({{$conversation->first()->message_id}})

                }
            });
        }
    }
</script>
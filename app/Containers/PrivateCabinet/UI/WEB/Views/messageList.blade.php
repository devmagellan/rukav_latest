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
    <div class="send_message_form">
        <label for="send_message_foto">
            <img src="/img/photo-camera-icon-black.svg" alt="">
        </label>
        <input type="file" id="send_message_foto" name="send_message_foto" style="display: none;">
        <input id="msgr_input" type="text" name="" placeholder="Текст сообщения..." required="">
        <button onclick="sendMessage()"><img src="/img/paper-plane-icon.svg" alt=""></button>
    </div>
    <p>RUKAV оставляет за собой право проверять сообщения посланные через наш сервер для того чтобы защитить вас от мошенничества и подозрительных действий.</p>
</div>

<script>
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
					console.log('complete')
					 $('.wrapper_body_messege_scroll').append(
                    '<div class="body_messege_item body_my_messege_item">'+
                        '<p>'+text+'</p>'+
                        '<span>только что</span>'+
                        '</div>'
                    );
					
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
console.log(data)	
if('{{$conversation->first()->sender_id}}'=={{\Auth::user()->id}}){
	var sender='{{$conversation->first()->receiver_id}}';
}
else{
	var sender='{{$conversation->first()->sender_id}}'
}
console.log(sender)
console.log('{{$conversation->first()->message->id}}')
 if(data.sender_id==sender && '{{$conversation->first()->message->id}}'==data.message_id ){
	console.log('popali')
	 $('.wrapper_body_messege_scroll').append(
                    '<div class="body_messege_item body_to_messege_item">'+
                        '<p>'+data.text+'</p>'+
                        '<span>'+data.created+'</span>'+
                        '</div>'
                    );
} 

})

</script>
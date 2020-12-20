<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/select2/select2.bundle.css">
<style>
  .custom_tooltip {
    margin:10px;
    padding:12px;
    border:2px solid #ff007f;
    width:260px;
    position: absolute;
    display: none;
    background-color: #fff;
    z-index:9999;
    margin-left:300px;
    margin-top:15px;

  }
  .new_notification{
	  position:relative;
  }

    .new_notification .badge {
    position: absolute;
    top: -10px;
    right: -23px;
    padding: 5px 10px;
    border-radius: 50%;
    background: red;
    color: white;
  }

  .remove-bar::before {
     content: none;
}

</style>
<div class="row">
    <div class="col-md-4">
        <div class="message_sidebar">
            <div class="message_sidebar_scroll">
                <p class="message_sidebar_my_info">
                    <img src="/img/email-icon.svg" alt="">
                    <span>{{$email}}</span>
                </p>
              <div class="custom_tooltip">Не выбрана категория в списке!</div>
                <hr>
                <form action="/add_second_messanger_group" method="post" id="secondMessangerGroups">


                <div class=" form-group" style="width:84%;display:inline-block">
                    <select class="select2 form-control w-100 " id="single-default" name="group_id">
                        <option value="0" disabled selected>Выберите тему для поиска</option>
                        <optgroup label="Такси Ливерпуля">
                            <option value="1">Такси близ Аэропорта Ливерпуль</option>
                            <option value="2">Такси Центр Ливерпуль</option>
                        </optgroup>
                        <optgroup label="Заказ пасажирских перевозок">
                            <option value="3">Перевозки микроавтобусом</option>
                            <option value="4">Перевозки групп от 10человек</option>
                        </optgroup>
                    </select>

                </div>
                <button type="submit" class="message_sidebar_add_them" {{--data-toggle="tooltip" data-title="Hooray!" --}}style="top:7px;position:relative;">+</button>

                </form>

                @foreach($businessOwnerConversationsList as $list)
@if(isset($list))

                    <div class="message_sidebar_theme" id="message_{{$list->group->id}}">
                        @endif

                        <div class="message_sidebar_theme_head">
                            <input type="hidden" class="group_type" value="business">
                            <input type="hidden" class="group_id" value="{{$list->group->id}}">
                            <img src="img/right_icon_black.svg" alt="">
                            <p>{{$list->group->group_name}}</p>
                            <button class="message_item_remove"><img src="img/delete-icon-red.svg" alt=""></button>
                        </div>
                        <div class="message_sidebar_theme_body" style="display: none;">
						@if(isset($list->connects))
                            @foreach($list->connects as $cnv)

                            <div class="message_sidebar_theme_item message_sidebar_theme_item-new" id="conv_{{$cnv->id}}" onclick="reloadMessageList('{{$cnv->id}}','{{$list->group_id}}','{{\Auth::user()->id}}')">


								<div class="message_sidebar_theme_left">
                                    <div class="massage_user_avatar massage_user_avatar_online">
                                        <?
                                        $pht=App\Containers\Ad\Models\Picture::where('ads_id',$cnv->id)->first();
                                        ?>
                                        <img src="/storage/messages/{{$pht->photo}}" alt="">
                                    </div>

                                    <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                                </div>
                                <div class="message_sidebar_theme_right">
                                    <p class="message_sidebar_theme_name">
                                        Сергей
                                    </p>
                                    <p class="message_sidebar_theme_add">
                                        {{$cnv->title}}
                                    </p>
                                    <p class="message_sidebar_theme_date">
                                        {{$cnv->created_at}}
                                    </p>
                                    <p class="message_sidebar_theme_message">
                                        Привет! Никаких дефект...
                                    </p>
                                </div>
                            </div>
                                @endforeach
								@endif

                        </div>
                    </div>
                @endforeach

                @foreach($privateOwnerConversationsList as $privateList)


                    <div class="message_sidebar_theme" id="message_{{$privateList->group->id}}">

                        <div class="message_sidebar_theme_head" >
                            <img src="img/right_icon_black.svg" alt="">
                            <p>{{$privateList->group->group_name}}</p>
                            <input type="hidden" class="group_type" value="private">
                            <input type="hidden" class="group_id" value="{{$privateList->group->id}}">
                            <button class="message_item_remove"><img src="img/delete-icon-red.svg" alt=""></button>
                        </div>
                        <div class="message_sidebar_theme_body" style="display: none;">
                            @foreach($privateList->recipients as $recepient)
                                <!--find messages in with this recipient in this group-->

                                <?

                                    $conversationsN=\App\Containers\Connect\Models\Connect::where('group_id',$privateList->group->id)->
                                    where(function($query) use($recepient) {

                                    $query->where(function($query) use($recepient){
                                        $query->where('receiver_id',$recepient->id);
                                        $query->where('sender_id',\Auth::user()->id);
                                    });
                                    $query->orWhere(function($query) use($recepient){
                                        $query->where('receiver_id',\Auth::user()->id);
                                        $query->where('sender_id',$recepient->id);
                                    });

                                    })


                                        ->with('sender')->with('message')->with('pictures')
                                        ->groupBy('message_id','receiver_id')->distinct()->orderBy('created_at')->get();
                                    $tmp_msg=[];
                                    $tmp=[];
                                    $groupConversations=$conversationsN;
                       /*             foreach($conversationsN as $conver){
                                        if( (in_array($conver->sender_id,$tmp) && in_array($conver->receiver_id,$tmp))&& in_array($conver->message_id,$tmp_msg)){

                                        }
                                        else{
                                            $tmp[]=$conver->sender_id;
                                            $tmp[]=$conver->receiver_id;
                                            $tmp_msg[]=$conver->message_id;
                                            $groupConversations[]= $conver;
                                        }
                                    }

                                        dump('$groupConversations',$groupConversations);*/
                                ?>

                                @if($groupConversations->first())

                                    <div class="message_sidebar_theme_item message_sidebar_theme_item-new" onclick="reloadMessageList('{{$groupConversations->first()->id}}','{{$groupConversations->first()->group_id}}','{{\Auth::user()->id}}')">



									<div class="message_sidebar_theme_left">
                                        <div class="massage_user_avatar massage_user_avatar_online">
                                            <?
                                    $pht=App\Containers\Ad\Models\Picture::where('ads_id',$groupConversations->first()->id)->first();
                                    ?>
                                            <img src="/storage/messages/{{$pht->photo}}" alt="">
                                        </div>

                                        <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                                    </div>
                                    <div class="message_sidebar_theme_right">
                                        <p class="message_sidebar_theme_name">
                                           {{$groupConversations->first()->message->getSender->name}}
                                            </p>
                                            <p class="message_sidebar_theme_add">
                                            {{$groupConversations->first()->title}}
                                            </p>
                                            <p class="message_sidebar_theme_date">
                                            {{$groupConversations->first()->created_at}}
                                            </p>
                                            <p class="message_sidebar_theme_message">
                                    <?
                                    $string = strip_tags($groupConversations->first()->text);
                                    if (strlen($string) > 40) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 40);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);

                                    }
                                    $string .= '... ';

                                    ?>
                                    {{$string}}
                                            </p>
                                        </div>
                                    </div>
                                 @else
                                    <?

                                        foreach($recepient->adsWithGroup as $ad){
                                            if($privateList->group->id==$ad->second_messanger_group_id){
                                                $ad->pictures=App\Containers\Ad\Models\Picture::where('ads_id',$ad->first()->id)->first();
                                                $finGroupMessage=$ad;
                                            }
                                        }
                                        //dump($finGroupMessage);
                                        ?>

                                    @if($recepient->adsWithGroup->first())
                                        <div class="message_sidebar_theme_item message_sidebar_theme_item-new" onclick="reloadCleanMessageList('{{$recepient->adsWithGroup->first()->id}}')">

										   <div class="message_sidebar_theme_left">
                                                <div class="massage_user_avatar massage_user_avatar_online">
                                                    <?
                                                    //$pht=App\Containers\Ad\Models\Picture::where('ads_id',$groupConversations->first()->id)->first();
                                                    ?>
													@if(isset($finGroupMessage))
                                                    <img src="/storage/messages/{{$finGroupMessage->pictures->first()->photo}}" alt="">
												@endif
                                                </div>

                                                <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                                            </div>
                                            <div class="message_sidebar_theme_right">
                                                <p class="message_sidebar_theme_name">
                                                    {{$recepient->name}}
                                                </p>
                                                <p class="message_sidebar_theme_add">

                                                </p>
                                                <p class="message_sidebar_theme_date">

                                                </p>
                                                <p class="message_sidebar_theme_message">
                                                    <?
                                                    $string = strip_tags($recepient->adsWithGroup->first()->title);
                                                    if (strlen($string) > 40) {

                                                        // truncate string
                                                        $stringCut = substr($string, 0, 40);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        //if the string doesn't contain any space then it will cut without word basis.
                                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);

                                                    }
                                                    $string .= '... ';

                                                    ?>
                                                    {{$string}}
                                                </p>
                                            </div>
                                        </div>
                                    @endif

                                 @endif
                            @endforeach

                        </div>
                    </div>


                @endforeach


                <hr>
                <div class="message_sidebar_theme">
                    <div class="message_sidebar_theme_head">
                        <img src="img/right_icon_f.svg" alt="">
                        <p class="theme_main_text"><b>Основное ({{count($conversations)}})</b></p></div>
                    <div class="message_sidebar_theme_body">
                        @foreach($conversations as $conversation)

                          <?

						  if($conversation->sender_id!=Auth::user()->id){
                            $opponent=\App\Containers\User\Models\User::where('id',$conversation->sender_id)->first();
                          }
                          else{
                            $opponent=\App\Containers\User\Models\User::where('id',$conversation->receiver_id)->first();
                          }
                          ?>
                        <div class="new_notification message_sidebar_theme_item conv_notify_class_{{$conversation->message->id}}_{{$conversation->sender_id}} conv_class_{{$conversation->message->id}} @if($conversation->viewed_at==null) message_sidebar_theme_item-new @endif" id="conv_id_{{$conversation->id}}" onclick="reloadMessageList('{{$conversation->id}}',null,'{{$opponent->id}}');cleanCounter('{{$conversation->message->id}}','{{$opponent->id}}')" >

							        <?
									$connects=\App\Containers\Connect\Models\Connect::where('sender_id',$conversation->sender_id)->where('receiver_id',\Auth::user()->id)->where('message_id',$conversation->message->id)->where('viewed_at',null)->get();
									?>
									@if(count($connects)>0 && count($connects)<99 )

									<style>
							   .conv_notify_class_{{$conversation->message->id}}_{{$conversation->sender_id}}:before{
								content: "{{count($connects)}}";
								display: block;
								position: absolute;
								right: 12px;
								top: 12px;
								font-weight: 500;
								font-size: 10px;
								line-height: 14px;
								color: #FFFFFF;
								width: 44px;
								text-align: center;
								background: red;
								border-radius: 30px;
							}
							.conv_class_{{$conversation->message->id}}.nobefore:before{
								display:none;
							}
							</style>


										  <!--span class="badge">{{count($connects)}}</span-->
									@endif

							<div class="message_sidebar_theme_left">
                                <div class="massage_user_avatar">
                                    <?
                                    $photo=App\Containers\Ad\Models\Picture::where('ads_id',$conversation->message->id)->first();
                                    ?>
									@if($photo)
                                    <img src="/storage/messages/{{$photo->photo}}" alt="">
									@else
									<img src="/storage/pictures/photo_icon2.png" alt="">
									@endif
                                </div>
                                <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                            </div>
                            <div class="message_sidebar_theme_right">
							@if($opponent)
                                <a  href="/all_author_ads?id={{$opponent->id}}"><p class="message_sidebar_theme_name">
                                  {{$opponent->name}}
                                </p></a>
								@endif
                                <a href="/ads/{{$conversation->message->id}}"><p class="message_sidebar_theme_add">
                                    {{$conversation->message->title}}
                                </p></a>
                                <p class="message_sidebar_theme_date">
                                    {{$conversation->created_at}}
                                </p>
                                <p class="message_sidebar_theme_message">

                                    <?
                                    $string = strip_tags($conversation->text);
                                    if (strlen($string) > 40) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 40);
                                        $endPoint = strrpos($stringCut, ' ');

                                        //if the string doesn't contain any space then it will cut without word basis.
                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);

                                    }
                                    $string .= '... ';

                                    ?>
                                    {{$string}}
                                </p>
                            </div>
                        </div>
                         @endforeach




                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-8  result_of_messageList_table">











    </div>
</div>
<script src="/NewSmartAdmin/js/formplugins/select2/select2.bundle.js"></script>

<script>

    $(document).ready(function(){

        $('.select2').select2();
        reloadMessageList('{{$conversations[0]->id}}')
		console.log('reloadMessageListFinished');


    $('.message_sidebar_theme_head p').click(function () {
        $('.message_sidebar_theme_body').hide();
        console.log('12345');
        $(this).parent().next().slideDown();
    });


    })

	function cleanCounter(message_id,sender_id){
		$('.conv_notify_class_'+message_id+'_'+sender_id+'').addClass('nobefore')



	}



    function reloadMessageList(conversation,group_id,flag_sender){
 $('#conv_id_'+conversation+'').removeClass('message_sidebar_theme_item-new');
        var module='conversation'
        console.log('conversation>',conversation);

        var url='/cabinet/conversation';
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: url,
            data: {module: module, conversation:conversation,group_id:group_id,flag_sender:flag_sender},
            beforeSend: function() {
                $('#loader2').show();
            },
            complete: function() {
                $('#loader2').hide();
            },
            success: function (data) {
            console.log('data>',data)
                $('.result_of_messageList_table').html(data);

            }
        });
    }

    function reloadCleanMessageList(ad_id){

        var url='/cabinet/clean_conversation';
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: url,
            data: {ad_id:ad_id},
            beforeSend: function() {
                $('#loader2').show();
            },
            complete: function() {
                $('#loader2').hide();
            },
            success: function (data) {
//console.log(data)
                $('.result_of_messageList_table').html(data);

            }
        });
    }

    $('.message_sidebar').delegate('.message_item_remove','click',function(e){
      console.log('message_item_remove')
        var url='/delete_second_group';
        var type=$(this).parent().find('.group_type').val();
        var group_id=$(this).parent().find('.group_id').val();
console.log(type,group_id)
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: url,
            data: {type: type,group_id:group_id},
            beforeSend: function() {
                $('#loader2').show();
            },
            complete: function() {
                $('#loader2').hide();
                console.log('complete')
                $('#message_'+group_id+'').remove()
            },
            success: function (data) {

            }
        });
    })

</script>

<script>

  $('#secondMessangerGroups').submit(function(e){
    e.preventDefault();
    console.log('secondMessangerGroups')
    var group_id= $('#single-default option:selected').val()
    var url='/add_second_messanger_group';
    console.log('group_id',group_id)
    if(group_id>0){
      $.ajax({
        method: 'POST',
        dataType: 'json',
        async:false,
        url: url,
        data: {group_id:group_id},
        beforeSend: function() {
          $('#loader2').show();
        },
        complete: function() {
          $('#loader2').hide();
          console.log('complete')
        },
        success: function (data) {
          console.log('success',data.data)
          if (($('#message_'+data.data.id+'').length > 0)){
            $('#alert_category_already_present').modal({show:true});
          }else{
          $('#secondMessangerGroups').after(

            '<div class="message_sidebar_theme" id="message_'+data.data.id+'">'+
            '<div class="message_sidebar_theme_head">'+
            '<input type="hidden" class="group_type" value="business">'+
            '<input type="hidden" class="group_id" value="'+data.data.id+'">'+
            '<img src="img/right_icon_black.svg" alt="">'+
            '<p>'+data.data.group_name+'</p>'+
            '<button class="message_item_remove"><img src="img/delete-icon-red.svg" alt=""></button>'+
            '</div>'+
            '</div>'
        );
        }}
      });
    }
    else{


      function showBox(e){
        console.log('click')
        $('.custom_tooltip').fadeIn().css(({ left:  e.pageX, top: e.pageY }));
      }

      function hideBox(){
        $('.custom_tooltip').fadeOut();
      }
      console.log('tooltip')
      //$('#alert_category_not_choosen').modal({show:true});
      $('.message_sidebar_add_them').click(showBox(e)).mouseleave(hideBox);

    }

  })




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
console.log('data#>',data);
$('.conv_notify_class_'+data.message_id+'_'+data.sender_id+'').addClass('nobefore')
$('.conv_notify_class_'+data.message_id+'_'+data.sender_id+'').addClass('message_sidebar_theme_item-new')
$('body').append(
'<style>'+
							   '.conv_notify_class_'+data.message_id+'_'+data.sender_id+':before{'+
								'content: "'+data.viewed+'";'+
								'display: block;'+
								'position: absolute;'+
								'right: 12px;'+
								'top: 12px;'+
								'font-weight: 500;'+
								'font-size: 10px;'+
								'line-height: 14px;'+
								'color: #FFFFFF;'+
								'width: 44px;'+
								'text-align: center;'+
								'background: red;'+
								'border-radius: 30px;'+
							'} '+
							'.conv_notify_class_'+data.message_id+'_'+data.sender_id+'.nobefore:before{'+
								'display:none;'+
							'}'+
							'</style>'
)

$('.conv_notify_class_'+data.message_id+'_'+data.sender_id+'').removeClass('nobefore')
if('{{$conversation->first()->sender_id}}'=={{\Auth::user()->id}}){
	var sender='{{$conversation->first()->receiver_id}}';
}
else{
	var sender='{{$conversation->first()->sender_id}}'
}
console.log('sender>',sender)
console.log('{{$conversation->first()->message->id}}')
  console.log('popali')
 if(data.photo==null && /* data.sender_id==sender && */ '{{$conversation->first()->message->id}}'==data.message_id ){
   console.log('popali##messageBlock_'+data.message_id+'_'+data.sender_id+'')
	 $('#messageBlock_'+data.message_id+'_'+data.sender_id+'').append(//old version $('.wrapper_body_messege_scroll')
                    '<div class="body_messege_item body_to_messege_item">'+
                        '<p>'+data.text+'</p>'+
                        '<span>'+data.created+'</span>'+
                        '</div>'
                    );
}else if(data.photo!=null && /* data.sender_id==sender && */ '{{$conversation->first()->message->id}}'==data.message_id){
   console.log('popali photo')
   $('#messageBlock_'+data.message_id+'_'+data.sender_id+'').append( //old version $('.wrapper_body_messege_scroll')
     '<div class="body_messege_item body_to_messege_item">'+
     '<img style="" src="/storage/message_images/'+data.photo+'">'+
     '<span>'+data.created+'</span>'+
     '</div>'
   );
 }

})


</script>

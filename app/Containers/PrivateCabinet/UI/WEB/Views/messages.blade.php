<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/select2/select2.bundle.css">

<div class="row">
    <div class="col-md-4">
        <div class="message_sidebar">
            <div class="message_sidebar_scroll">
                <p class="message_sidebar_my_info">
                    <img src="/img/email-icon.svg" alt="">
                    <span>{{$email}}</span>
                </p>
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

                <button type="submit" class="message_sidebar_add_them" style="top:7px;position:relative;">+</button>
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
                            <div class="message_sidebar_theme_item message_sidebar_theme_item-new" onclick="reloadMessageList('{{$cnv->id}}','{{$list->group_id}}')">
                                <div class="message_sidebar_theme_left">
                                    <div class="massage_user_avatar massage_user_avatar_online">
                                        <?
                                        $pht=App\Containers\Ad\Models\Picture::where('ads_id',$cnv->id)->first();
                                        ?>
                                        <img src="/storage/pictures/{{$pht->photo}}" alt="">
                                    </div>

                                    <a href="#" class="viber-icon"><img src="img/viber-icon.svg" alt=""></a>
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

                                    <div class="message_sidebar_theme_item message_sidebar_theme_item-new" onclick="reloadMessageList('{{$groupConversations->first()->id}}','{{$groupConversations->first()->group_id}}')">
                                    <div class="message_sidebar_theme_left">
                                        <div class="massage_user_avatar massage_user_avatar_online">
                                            <?
                                    $pht=App\Containers\Ad\Models\Picture::where('ads_id',$groupConversations->first()->id)->first();
                                    ?>
                                            <img src="/storage/pictures/{{$pht->photo}}" alt="">
                                        </div>

                                        <a href="#" class="viber-icon"><img src="img/viber-icon.svg" alt=""></a>
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
                                                    <img src="/storage/pictures/{{$finGroupMessage->pictures->first()->photo}}" alt="">
												@endif
                                                </div>

                                                <a href="#" class="viber-icon"><img src="img/viber-icon.svg" alt=""></a>
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

                          <? if($conversation->sender_id!=Auth::user()->id){
                            $opponent=\App\Containers\User\Models\User::where('id',$conversation->sender_id)->first();
                          }
                          else{
                            $opponent=\App\Containers\User\Models\User::where('id',$conversation->receiver_id)->first();
                          }
                          ?>
                        <div class="message_sidebar_theme_item " onclick="reloadMessageList('{{$conversation->id}}')" >
                            <div class="message_sidebar_theme_left">
                                <div class="massage_user_avatar">
                                    <?
                                    $photo=App\Containers\Ad\Models\Picture::where('ads_id',$conversation->message->id)->first();
                                    ?>
                                    <img src="/storage/pictures/{{$photo->photo}}" alt="">
                                </div>
                                <a href="#" class="viber-icon"><img src="img/viber-icon.svg" alt=""></a>
                            </div>
                            <div class="message_sidebar_theme_right">
                                <p class="message_sidebar_theme_name">
                                  {{$opponent->name}}
                                </p>
                                <p class="message_sidebar_theme_add">
                                    {{$conversation->message->title}}
                                </p>
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


    $('.message_sidebar_theme_head p').click(function () {
        $('.message_sidebar_theme_body').hide();
        console.log('12345');
        $(this).parent().next().slideDown();
    });
    })

    function reloadMessageList(conversation,group_id){

        var module='conversation'
        console.log('conversation',conversation);
        var url='/cabinet/conversation';
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: url,
            data: {module: module, conversation:conversation,group_id:group_id},
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
        }
      });
    }
  })
</script>

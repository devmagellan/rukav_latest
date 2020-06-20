<div class="row">
    <div class="col-md-4">
        <div class="message_sidebar">
            <div class="message_sidebar_scroll">
                <p class="message_sidebar_my_info">
                    <img src="/img/email-icon.svg" alt="">
                    <span>Alexander@gmail.com</span>
                </p>
                <hr>
                <input type="text" class="message_sidebar_input_search" name="" placeholder="Выберите тему для поиска">
                <button class="message_sidebar_add_them">+</button>
                <hr>
                <div class="message_sidebar_theme">
                    <div class="message_sidebar_theme_head">
                        <img src="img/right_icon_f.svg" alt="">
                        <p class="theme_main_text"><b>Основное ({{count($conversations)}})</b></p></div>
                    <div class="message_sidebar_theme_body">
                        @foreach($conversations as $conversation)

<? dump($conversation);?>

                        <div class="message_sidebar_theme_item message_sidebar_theme_item-remove" onclick="reloadMessageList('{{$conversation->id}}')" >
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
                                    {{$conversation->author->name}}
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
                                    if (strlen($string) > 10) {

                                        // truncate string
                                        $stringCut = substr($string, 0, 10);
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

<script>

    $(document).ready(function(){
        reloadMessageList('{{$conversations[0]->id}}')
		
		
    $('.message_sidebar_theme_head p').click(function () {
        $('.message_sidebar_theme_body').hide();
        console.log('12345');
        $(this).parent().next().slideDown();
    });
    })

    function reloadMessageList(conversation){

        var module='conversation'
        console.log('conversation',conversation);
        var url='/cabinet/conversation';
        $.ajax({
            method: 'POST',
            dataType: 'html',
            async:false,
            url: url,
            data: {module: module, conversation:conversation},
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
</script>
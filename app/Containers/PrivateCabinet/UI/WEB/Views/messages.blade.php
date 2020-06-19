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

                @foreach($conversations as $conversation)
                    <div class="message_sidebar_theme">
                        <div class="message_sidebar_theme_head">
                            <img src="/img/right_icon_black.svg" alt="">
                            <p>Такси аэропорт Ливерпуля</p>
                            <button class="message_item_remove"><img src="/img/delete-icon-red.svg" alt=""></button>
                        </div>
                        <div class="message_sidebar_theme_body" style="display: none;">
                            <div class="message_sidebar_theme_item message_sidebar_theme_item-new">
                                <div class="message_sidebar_theme_left">
                                    <div class="massage_user_avatar massage_user_avatar_online">
                                        <img src="/img/Avatar.png" alt="">
                                    </div>
                                    <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                                </div>
                                <div class="message_sidebar_theme_right">
                                    <p class="message_sidebar_theme_name">
                                        Сергей
                                    </p>
                                    <p class="message_sidebar_theme_add">
                                        Mercedes-Benz e220 w210! 2.2disel...
                                    </p>
                                    <p class="message_sidebar_theme_date">
                                        30 Мая 13:09
                                    </p>
                                    <p class="message_sidebar_theme_message">
                                        Привет! Никаких дефект...
                                    </p>
                                </div>
                            </div>
                            <div class="message_sidebar_theme_item message_sidebar_theme_item-remove">
                                <div class="message_sidebar_theme_left">
                                    <div class="massage_user_avatar massage_user_avatar_online">
                                        <img src="/img/Avatar.png" alt="">
                                    </div>
                                    <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                                </div>
                                <div class="message_sidebar_theme_right">
                                    <p class="message_sidebar_theme_name">
                                        Сергей
                                    </p>
                                    <p class="message_sidebar_theme_add">
                                        Mercedes-Benz e220 w210! 2.2disel...
                                    </p>
                                    <p class="message_sidebar_theme_date">
                                        30 Мая 13:09
                                    </p>
                                    <p class="message_sidebar_theme_message">
                                        Привет! Никаких дефект...
                                    </p>
                                </div>
                            </div>
                            <div class="message_sidebar_theme_item">
                                <div class="message_sidebar_theme_left">
                                    <div class="massage_user_avatar massage_user_avatar_online">
                                        <img src="/img/Avatar.png" alt="">
                                    </div>
                                    <a href="#" class="viber-icon"><img src="/img/viber-icon.svg" alt=""></a>
                                </div>
                                <div class="message_sidebar_theme_right">
                                    <p class="message_sidebar_theme_name">
                                        Сергей
                                    </p>
                                    <p class="message_sidebar_theme_add">
                                        Mercedes-Benz e220 w210! 2.2disel...
                                    </p>
                                    <p class="message_sidebar_theme_date">
                                        30 Мая 13:09
                                    </p>
                                    <p class="message_sidebar_theme_message">
                                        Привет! Никаких дефект...
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-8  result_of_messageList_table">











    </div>
</div>

<script>

    $(document).ready(function(){
        reloadMessageList('{{$conversations->first()->id}}')
		
		
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
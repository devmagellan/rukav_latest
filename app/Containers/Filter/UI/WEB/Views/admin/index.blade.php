@extends('adminpanel::layouts.app_admin')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/summernote/summernote.css">
@endsection
@section('theme_scripts')


    <?
    $createdAt = \Carbon\Carbon::now();
    $today=$createdAt->format('m/d/Y');
    $html='';
    ?>
{{--    @foreach($values as $value) {
      @php $html.='<div><input name="values[]" value="'.$value.'" class="form-control" style="width:250px;"><a href="#" class="remove_field">Удалить</a></div>'; @endphp
    }
    @endforeach--}}





@endsection
@section('content')


    <?
    $user=\Auth::user();
    if($user->hasRole('Gods_mode')){
        $company_temp=true;
    }
    else{
        $company_temp=false;
    }
    ?>
    <main id="js-page-content" role="main" class="page-content">
        <div class="demo">

            <button type="button" onclick="clearCustomerAdding()" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                <span class="fal fa-plus  mr-1"></span>
                Создать Фильтр</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех фильтров компании</i></span>
                </h2>
                <div class="panel-toolbar">
               </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Вы можете редактировать информацию нажав на  <a href="utilities_color_pallet.html" title="Color Pallets">карандаш</a> справа от информации
                    </div>
                    <h5 class="frame-heading">
                        Фильтра
                    </h5>
                    <div id="loader">
                        <div class="border p-3">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-tag result_of_staticpages_table">


                    </div>

                </div>
            </div>
        </div>
</main>

    <div class="modal fade default-example-modal-right-lg-user" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Форма добавления фильтра 2</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <form class="needs-validation" id="filter_create" novalidate onsubmit="theSubmitFunction(); return false;">

                <div class="modal-body">
                    <input type="hidden" id="filter_id" name="filter_id" value="0">
                    <input type="hidden" id="company_id" name="company_id" value="1">





                    <div class="form-group">
                        <label class="form-label" for="filter_name">Название страницы</label>
                        <input type="text" id="filter_name" name="filter_name" required class="form-control" placeholder="Название фильтра">

                    </div>
                  <div class="form-group">
                    <label class="form-label" for="filter_name">Метка фильтра</label>
                    <input type="text" id="pointer" name="pointer" class="form-control" >

                  </div>


                    <!--div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="managerSwitch" checked>
                            <label class="custom-control-label" for="managerSwitch">Активна/не активна</label>
                        </div>
                    </div-->

                  <div class="form-group">
                    <label class="form-label" for="customer_name">Формат ввода</label>

                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input vid_user" id="dropdown" value="dropdown" name="format" checked="">
                      <label class="custom-control-label" for="dropdown">Дропдаун</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input vid_user" id="input" value="input" name="format" >
                      <label class="custom-control-label" for="input">Ввод текста</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input vid_user" id="input_digits" value="input_digits" name="format" >
                      <label class="custom-control-label" for="input_digits">Ввод цифр</label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" class="custom-control-input vid_user" id="multiple_choice" value="multiple_choice" name="format" >
                      <label class="custom-control-label" for="multiple_choice">Мульти выбор</label>
                    </div>


                  </div>

                  <div class="form-group">
                    <label class="form-label" for="filter_name">Значение по умолчанию</label>
                    <input type="text" id="default_value" name="default_value" value="-" required class="form-control" placeholder="-">

                  </div>
                  <div class="form-group" id="text_value_block">
                    <label class="form-label" for="filter_name"><span style="display:none" id="text_value_name">Текстовое значение</span><span style="display:none" id="digital_value_name">Цифровое значение</span></label>
                    <input type="text" maxlength="20" style="width:40%;display:none" id="text_value" disabled  value="" class="form-control" placeholder="Англ-Русс max 20 знаков">
                    <input type="number" max="1000" style="width:40%;display:none" id="digital_value" disabled  value="" class="form-control" placeholder="0-1000 max 20 знаков">
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="input_fields_wrap">
                          <button style="width:300px;" class="add_field_button">+ Добавить дополнительное значение</button>
                          <div class="folder_deals">

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="filter_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="filter_create btn btn-primary waves-effect waves-themed" >Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>




@endsection

@section('scripts')
    <script src="/NewSmartAdmin/js/formplugins/summernote/summernote.js"></script>

    <script>

      $(document).ready(function() {
        var max_fields      = 30; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
          e.preventDefault();
          if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<? print($html);?>'); //add input box
          }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
          e.preventDefault(); $(this).parent('div').remove(); x--;
        })
      });
    </script>


    <script>
        var autoSave = $('#autoSave');
        var interval;
        var timer = function()
        {
            interval = setInterval(function()
            {
                //start slide...
                if (autoSave.prop('checked'))
                    saveToLocal();

                clearInterval(interval);
            }, 100);
        };

        //save
        var saveToLocal = function()
        {
            localStorage.setItem('summernoteData', $('#saveToLocal').summernote("code"));
            console.log("saved");
        }

        //delete
        var removeFromLocal = function()
        {
            localStorage.removeItem("summernoteData");
            $('#saveToLocal').summernote('reset');
        }

        $(document).ready(function()
        {
            //init default
            $('.js-summernote').summernote(
                {
                    height: 200,
                    tabsize: 2,
                    placeholder: "Type here...",
                    dialogsFade: true,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['strikethrough', 'superscript', 'subscript']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']]
                            ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ],
                    callbacks:
                        {
                            //restore from localStorage
                            onInit: function(e)
                            {
                                $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
                            },
                            onChange: function(contents, $editable)
                            {
                                clearInterval(interval);
                                timer();
                            }
                        }
                });

            //load emojis
            $.ajax(
                {
                    url: 'https://api.github.com/emojis',
                    async: false
                }).then(function(data)
            {
                window.emojis = Object.keys(data);
                window.emojiUrls = data;
            });

            //init emoji example
            $(".js-hint2emoji").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: 'type starting with : and any alphabet',
                    hint:
                        {
                            match: /:([\-+\w]+)$/,
                            search: function(keyword, callback)
                            {
                                callback($.grep(emojis, function(item)
                                {
                                    return item.indexOf(keyword) === 0;
                                }));
                            },
                            template: function(item)
                            {
                                var content = emojiUrls[item];
                                return '<img src="' + content + '" width="20" /> :' + item + ':';
                            },
                            content: function(item)
                            {
                                var url = emojiUrls[item];
                                if (url)
                                {
                                    return $('<img />').attr('src', url).css('width', 20)[0];
                                }
                                return '';
                            }
                        }
                });

            //init mentions example
            $(".js-hint2mention").summernote(
                {
                    height: 100,
                    toolbar: false,
                    placeholder: "type starting with @",
                    hint:
                        {
                            mentions: ['jayden', 'sam', 'alvin', 'david'],
                            match: /\B@(\w*)$/,
                            search: function(keyword, callback)
                            {
                                callback($.grep(this.mentions, function(item)
                                {
                                    return item.indexOf(keyword) == 0;
                                }));
                            },
                            content: function(item)
                            {
                                return '@' + item;
                            }
                        }
                });

        });

    </script>


    <script>


        // Class definition

        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }

$('#managerSwitch').change(function(){
    console.log('Manager1',$(this).is(':checked'))
})

        $('#filter_create').find('input[name="format"]').click(function(){
          console.log($(this))
          if($(this).val()=='input'){
            $('.input_fields_wrap').hide()

            $('#text_value_block').show()
            $('#text_value').show()
            $('#digital_value').hide()
            $('#text_value_name').show()
            $('#digital_value_name').hide()
          }
          else if($(this).val()=='input_digits'){
            $('.input_fields_wrap').hide()

            $('#text_value_block').show()
            $('#digital_value').show()
            $('#text_value').hide()
            $('#digital_value_name').show()
            $('#text_value_name').hide()
          }
          else{
            $('.input_fields_wrap').show()
            $('#text_value').hide()
            $('#digital_value').hide()
            $('#text_value_block').hide()
          }
        })

/*$('.staticpage_create').click(function(){*/
        function  theSubmitFunction () {
            $('.has_been_taken_message').hide();
            var form = $('#filter_create')
            if (form[0].checkValidity() === false || localStorage.getItem('email_state') == 1) {
                if (localStorage.getItem('email_state') == 1) {
                    console.log(555)
                    $('#filter_create').removeClass('was-validated')
                }

            }
            else {
              console.log(777)
              $('#filter_create').addClass('was-validated')
              var format=$('#filter_create').find('input[name="format"]:checked').val()
              console.log('format',format)
              var default_value=$('#filter_create').find('input[name="default_value"]').val()
              var pointer=$('#filter_create').find('input[name="pointer"]').val()
              console.log('pointer',pointer)
              console.log('default_value',default_value)

              var values=$( "input[name^='values']" ).serializeArray();
              console.log('values',values)
                var filter_name = $('#filter_name').val()
                //var active =$('#managerSwitch')[0].checked
                var filter_id=$('#filter_id').val()
                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    async: false,
                    url: '/filter/create',
                    data: {
                        filter_name: filter_name,
                        //active:active,
                        filter_id:filter_id,
                        format:format,
                      default_value:default_value,
                      values:values,
                      pointer:pointer

                    },
                    beforeSend: function () {
                    },
                    complete: function () {
                        $('.filter_create_close').click();
                        $('#filter_id').val('')
                        reloadData();

                    },
                    success: function (data) {
                        console.log('success')
                    }
                });
            }
        }

 /*      })*/



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        reloadData();
        function reloadData(){

            var module='admin.company.users.data'
            var url='/admin/filters/data';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_staticpages_table').html(data);


                }
            });


        }


/*(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                else{
                console.log(667)}

            }, false);
        });
    }, false);
})();*/


function clearCustomerAdding(){
    $('#staticpage_create').removeClass('was-validated');
    $('#staticpage_id').val("")
    $('#staticpage_name').val("")
    $('#staticpage_sername').val("")
    $('#staticpage_location').val("")
    $('#staticpage_department').val("")
    $('#staticpage_position').val("")
    $('#staticpage_email').val("")
    $('#staticpage_phone').val("")

}

        $(document).ready(function() {
            var max_fields      = 10; //maximum input boxes allowed
            var wrapper         = $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
                e.preventDefault();
                if(x < max_fields){ //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div><input type="text" style="width:300px" name="values[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').remove(); x--;
            })
        });
    </script>
@endsection

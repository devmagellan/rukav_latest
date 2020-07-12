@extends('adminpanel::layouts.app_admin')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/summernote/summernote.css">
@endsection
@section('theme_scripts')


    <?
    $createdAt = \Carbon\Carbon::now();
    $today=$createdAt->format('m/d/Y');

    ?>


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
                Создать статическую страницу</button>
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                <h2>
                    Таблица  <span class="fw-300"><i>всех статических страниц компании</i></span>
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
                        Пользователи
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
                    <h5 class="modal-title h4">Форма добавления статической страницы</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>

                <form class="needs-validation" id="staticpage_create" novalidate onsubmit="theSubmitFunction(); return false;">

                <div class="modal-body">
                    <input type="hidden" id="staticpage_id" name="staticpage_id" value="0">
                    <input type="hidden" id="company_id" name="company_id" value="1">
                    <input type="hidden" id="manager_id" name="manager_id" value="1">




                    <div class="form-group">
                        <label class="form-label" for="staticpage_name">Название страницы</label>
                        <input type="text" id="staticpage_name" name="staticpage_name" required class="form-control" placeholder="Название страницы">

                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="managerSwitch" >
                            <label class="custom-control-label" for="managerSwitch">Активна/не активна</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="staticpage_name">Текст статической страницы</label>

                        <div class="col-xl-12">
                            <div id="panel-1" class="panel">
                                <div class="panel-hdr">
                                    <h2>
                                        AutoSave <span class="fw-300"><i>Script</i></span>
                                    </h2>
                                    <div class="panel-toolbar">
                                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                        <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                        <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                    </div>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <div class="js-summernote" id="saveToLocal"></div>
                                        <div class="mt-3">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="autoSave" checked="checked">
                                                <label class="custom-control-label" for="autoSave">Autosave changes to LocalStorage <span class="fw-300">(every 3 seconds)</span></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="staticpage_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="staticpage_create btn btn-primary waves-effect waves-themed" >Сохранить</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/NewSmartAdmin/js/formplugins/summernote/summernote.js"></script>
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
            }, 3000);
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

        var runDatePicker = function()
        {

            // minimum setup
            $('#datepicker-1').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });


            // input group layout
            $('#datepicker-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

            // input group layout for modal demo
            $('#datepicker-modal-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

            // enable clear button
            $('#datepicker-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

            // enable clear button for modal demo
            $('#datepicker-modal-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

            // orientation
            $('#datepicker-4-1').datepicker(
                {
                    orientation: "top left",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-2').datepicker(
                {
                    orientation: "top right",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-3').datepicker(
                {
                    orientation: "bottom left",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-4').datepicker(
                {
                    orientation: "bottom right",
                    todayHighlight: true,
                    templates: controls
                });

            // range picker
            $('#datepicker-5').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });

            // inline picker
            $('#datepicker-6').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });
        }


$(document).ready(function(){ runDatePicker();})

$('#managerSwitch').change(function(){
    console.log('Manager1',$(this).is(':checked'))
})



        $('#staticpage_email').change(function(){
            var company_email = $('#staticpage_email').val()

            $.ajax({
                url: '/admin/main_admin/company/email_check',
                method: 'POST',
                dataType: 'json',
                async: false,
                data: {
                    'email_check': 1,
                    'email': company_email,
                },
                success: function (response) {
                    console.log(response )
                    if (response == 'taken') {
                        localStorage.setItem('email_state',1);
                        console.log(response )
                        $('#staticpage_email').addClass("is-invalid");
                        $('#staticpage_email').removeClass("is-valid");
                        /*           $('#company_email').parent().removeClass();
                         $('#company_email').parent().addClass("form_error");
                         $('#company_email').siblings("span").text('Sorry... Email already taken');*/
                    } else if (response == 'not_taken') {
                        console.log(response )
                        localStorage.setItem('email_state',0);
                        $('#staticpage_email').removeClass("is-invalid");
                        $('#staticpage_email').addClass("is-valid");
                        /*       $('#company_email').parent().removeClass();
                         $('#company_email').parent().addClass("form_success");
                         $('#company_email').siblings("span").text('Email available');*/
                    }
                }
            });
        })



/*$('.staticpage_create').click(function(){*/
        function  theSubmitFunction () {
            $('.has_been_taken_message').hide();
            var form = $('#staticpage_create')
            if (form[0].checkValidity() === false || localStorage.getItem('email_state') == 1) {
                if (localStorage.getItem('email_state') == 1) {
                    console.log(555)
                    $('#staticpage_email').closest('.form-control').removeClass('is-valid').addClass('is-invalid')
                    $('#staticpage_create').removeClass('was-validated')
                    $('.has_been_taken_message').show();
                }
                console.log(777)
            }
            else {

                $('#staticpage_create').addClass('was-validated')
                console.log(222, company_id)
                @if($company_temp)
                    company_id = $('#selectCompany').val()
                @endif

                //'name','content','active','editor'

                console.log(998)
                var staticpage_name = $('#staticpage_name').val()
                var staticpage_content = localStorage.getItem('summernoteData');
                var active =$('#managerSwitch')[0].checked
                var staticpage_id=$('#staticpage_id').val()

                console.log(staticpage_name);
                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    async: false,
                    url: '/staticpage/create',
                    data: {
                        staticpage_name: staticpage_name,
                        staticpage_content: staticpage_content,
                        active:active,
                        staticpage_id:staticpage_id

                    },
                    beforeSend: function () {
                    },
                    complete: function () {
                        $('.staticpage_create_close').click();
                        $('#staticpage_id').val('')
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
            var url='/admin/staticpages/data';
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


    </script>
@endsection

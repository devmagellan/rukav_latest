$(document).ready(function(){

    var hash = location.hash.replace('#','');
    console.log(hash);
    if(hash == 'myads'){
        $('.choosen').addClass('page_hidden');
        $('#my-announcements').removeClass('page_hidden');
    }
    if(hash == 'my_profile'){
        $('.choosen').addClass('page_hidden');
        $('#my-profile').removeClass('page_hidden');
    }
    if(hash == 'favorits'){
        $('.choosen').addClass('page_hidden');
        $('#favorites').removeClass('page_hidden');
    }

    $('.tab_my_announcements').on('click', function () {
        $('.choosen').addClass('page_hidden');
        $('#my-announcements').removeClass('page_hidden');
    });

    $('.tab_my_profile').on('click', function () {
        $('.choosen').addClass('page_hidden');
        $('#my-profile').removeClass('page_hidden');
    });

    $('.tab_favorites').on('click', function () {
        $('.choosen').addClass('page_hidden');
        $('#favorites').removeClass('page_hidden');
    });

    $('.user_cabinet_login').on('click', function () {
        $('.user_cabinet_dropdown').toggleClass('user_cabinet_dropdown-active');
    });

    $(document).on('click', function (e) {
        var div = $('.user_cabinet_login');
        if(!div.is(e.target) && div.has(e.target).length === 0){
            $('.user_cabinet_dropdown').removeClass('user_cabinet_dropdown-active');
        }
    });

    $('.modal_password_close').on('click', function () {
        $('.modal_password').addClass('modal_password-unactive');
    });

    $('.prophile_change_pass').on('click', function () {
        $('.modal_password').removeClass('modal_password-unactive');
    });

    $('<div class="quantity-nav"><div class="quantity-button quantity-up"><img src="img/more_arrow.png" alt=""></div><div class="quantity-button quantity-down"><img src="img/less_arrow.png" alt=""></div></div>').insertAfter('.quantity input');
    $('.quantity').each(function() {
        var spinner = $(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else if (spinner.hasClass('quantity2')) {
                var newVal = oldValue + 5;
            }
            else{
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else if (spinner.hasClass('quantity2')) {
                var newVal = oldValue - 5;
            }
            else{
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
    function readURL2(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                $(input).closest(".prophile_main_wrapper").find('.prophile_photo_picked').attr('src', e.target.result);
                $(input).closest(".prophile_main_wrapper").find('.prophile_photo_wrapper').hide();

                $(input).closest(".prophile_main_wrapper ").find('.prophile_photo_picked').show();
                $(input).closest(".prophile_main_wrapper ").find('.prophile_photo_picked').addClass('working');
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

  /*   $("#imgInputakk").change(function(){
        readURL2(this);
    });



    $('.slider_block').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        prevArrow: '<div class="slick_left"></div>',
        nextArrow: '<div class="slick_prev"></div>',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }]
    }); 

    $('.button_show_reg').on('click', function () {
        $('#ModalReg').modal('show');
    });

    $('.select_company select').on('change', function () {
        if($('.select_company select').val() == "Само-занятый"){
            $('.input-name-company').hide();
            $('.input-yur-addres').hide();
            $('.input-reg-number').hide();
            $('.input-vat-number').hide();

            $('.input-name-buisnes').show();
            $('.input-addres').show();
        }else{
            $('.input-name-company').show();
            $('.input-yur-addres').show();
            $('.input-reg-number').show();
            $('.input-vat-number').show();

            $('.input-name-buisnes').hide();
            $('.input-addres').hide();
        }
    });

    $('#private').on('click', function () {
        $('.company_modal_block').hide();
        $('.socials_reg').show();
    });

    $('#buisnes').on('click', function () {
        $('.company_modal_block').show();
        $('.socials_reg').hide();
    });*/


    var countryData = $.fn.intlTelInput.getCountryData(),
        telInput = $("#telphone"),
        addressDropdown = $("#address-country");

    telInput.intlTelInput({

        nationalMode: true,
        defaultCountry: "ua",
        utilsScript: "/js/utils.js" //для форматирования/плейсхолдера и т.д.
    });

    $.each(countryData, function(i, country) {
        addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
    });

    telInput.change(function() {
        var countryCode = telInput.intlTelInput("getSelectedCountryData").iso2;
        addressDropdown.val(countryCode);
    });

    telInput.change();

// отслеживаем изменение страны в выпадающем списке
    addressDropdown.change(function() {
        var countryCode = $(this).val();
        telInput.intlTelInput("selectCountry", countryCode);
    });

    $('#show_password').on('click', function(){

        if ($(this).is(':checked')){
            $('.input_password').attr('type', 'text');

        } else {
            $('.input_password').attr('type', 'password');
        }
    });
    $('.category_dropdown').css('min-height', $('.category_dropdown_main_list').outerHeight());
    $('.category_dropdown_main_list li p').on('click', function(){
        $('.category_dropdown_main_list li').removeClass('category_link_active');
        $('.category_dropdown_main_list ul').hide();
        $(this).closest("ul").show();
        $(this).parent().addClass('category_link_active');
        $(this).closest(".category_dropdown_main_list-li").addClass('category_link_active');
        $(this).next().show();
        $('.category_dropdown').innerHeight($(this).next('.category_dropdown_sub_list').height());
    });

    $('.btn_category').on('click', function(e){
        e.preventDefault();
        $('.category_dropdown').toggle();
        $('.dropDownHide').toggle();
        $('.dropDownShow').toggle();
        $('.btn_category span').toggle();
        if($(".category_dropdown").is(":hidden"))
        {
            console.log('yes');
        }
        else
        {
            console.log('no');
        }
    });

/*     $('.product_slider_main').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        infinite: true,
        fade: true,
        prevArrow: '<a class="product_slider_icon product_slider_prev"><img src="img/slide_icon2.svg" alt=""></a>',
        nextArrow: '<a class="product_slider_icon product_slider_next"><img src="img/slide_icon1.svg" alt=""></a>',
        asNavFor: '.product_slider_nav',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                adaptiveHeight: true
            }
        }]
    });
    $('.product_slider_nav').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.product_slider_main',
        focusOnSelect: true,
        infinite: true
    }); */

    //$('.product_slider_main_item').zoom({ on:'click' });

    $('.product_slider_advantage_slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        adaptiveHeight: true,
        prevArrow: '<div class="slick_left product_slider_advantage_arrow"></div>',
        nextArrow: '<div class="slick_prev product_slider_advantage_arrow"></div>',
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1
            }
        }]
    });

    $('#telphone2').intlTelInput({
        nationalMode: true,
        defaultCountry: "ua",
        utilsScript: "js/utils.js" //для форматирования/плейсхолдера и т.д.
    });

    $('#telphone5').intlTelInput({
        nationalMode: true,
        defaultCountry: "ua",
        utilsScript: "js/utils.js" //для форматирования/плейсхолдера и т.д.
    });

    $('#telphone6').intlTelInput({
        nationalMode: true,
        defaultCountry: "ua",
        utilsScript: "js/utils.js" //для форматирования/плейсхолдера и т.д.
    });

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {

                $(input).closest(".upload-file-container-text").find('.add_foto_file_img').attr('src', e.target.result);
                $(input).closest(".upload-file-container-text").find('.add_foto_file_item_load').hide();
                $(input).closest(".upload-file-container-text").find('.add_foto_file_img_wrapper').show();
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInput").change(function(){
        readURL(this);
    });
    $("#imgInput2").change(function(){
        readURL(this);
    });
    $("#imgInput3").change(function(){
        readURL(this);
    });
    $("#imgInput4").change(function(){
        readURL(this);
    });
    $("#imgInput5").change(function(){
        readURL(this);
    });
    $("#imgInput6").change(function(){
        readURL(this);
    });
    $("#imgInput7").change(function(){
        readURL(this);
    });
    $("#imgInput8").change(function(){
        readURL(this);
    });
    $("#imgInput9").change(function(){
        readURL(this);
    });
    $("#imgInput10").change(function(){
        readURL(this);
    });

    $(".add_foto_file_delete").on("click", function(){
        var photo = $(this).closest(".upload-file-container-text").find(".photo");

        $(photo)[0].value = "";
        $(photo).closest(".upload-file-container-text").find('.add_foto_file_img').attr('src', '');
        $(photo).closest(".upload-file-container-text").find('.add_foto_file_item_load').show();
        $(photo).closest(".upload-file-container-text").find('.add_foto_file_img_wrapper').hide();
        console.log($(photo));
    });

    $('input[name="name_ad"]').on('input', function () {
        console.log(70 - $(this).val().length);
        if(70 - $(this).val().length)
            $('.number_of_signs span').html(70 - $(this).val().length)
    });

    $(".select_category").on('click', function(){
        $('#mainCatalog').modal('show');
    });

    $(".listCatalog1 li").on('click', function(){
        $(".listCatalog1 li").removeClass('active');
        $(this).addClass('active');
        $(".catalogBlock1").hide();
        $(".select_category + img").hide();
        $(".catalogBlock2").show();
    });

    $(".listCatalog2 li").on('click', function(){
        $(".listCatalog2 li").removeClass('active');
        $(this).addClass('active');
        $(".catalogBlock2").hide();
        $(".catalogBlock3").show();
    });
    $(".catalogBlock2 .arrow_left").on('click', function(){
        $(".catalogBlock2").hide();
        $(".catalogBlock1").show();
    });
    $(".catalogBlock3 .arrow_left").on('click', function(){
        $(".catalogBlock3").hide();
        $(".catalogBlock2").show();
    });
    $(".catalogBlock4 .arrow_left").on('click', function(){
        $(".catalogBlock4").hide();
        $(".catalogBlock3").show();
    });

    $(".outUk .listCatalog3 li").on('click', function(){
        $(".catalogBlock3").hide();
        $(".catalogBlock4").show();
    });

    $(".listCatalog3 li").on('click', function(){
        $(".listCatalog3 li").removeClass('active');
        $(this).addClass('active');
    });

    $(".listCatalog4 li").on('click', function(){
        $(".listCatalog4 li").removeClass('active');
        $(this).addClass('active');
    });

    $(".listCatalog li").on('click', function() {
        var category = $(".listCatalog1").find('.active').html();
        var heading = $(".listCatalog2").find('.active').html();
        var subheading = $(".listCatalog3").find('.active').html();
        if(category == undefined){
            $(".select_category").val();
        }else{
            $(".select_category").val(category);
        }
        if(heading == undefined){
            $(".select_category").val();
        }else{
            $(".select_category").val(category + "/" + heading);
        }
        if(subheading == undefined){
            $(".select_category").val();
        }else{
            $(".select_category").val(category + "/" + heading + "/" + subheading);
        }

    });

    $('#out_uk').on('click', function () {
        $('.all_user_block').hide();
        $('.outUk').show();
    });

    $('#all_adress').on('click', function () {
        $('.all_user_block').show();
        $('.outUk').hide();
    });

    $('.btn-wishlist').on('click', function () {
        $(this).toggleClass('active');
    });

    $("input[type='tel']").on("blur", function () {
        $(this).val("+" + $(".country[class*='active']").attr("data-dial-code") + $(this).val());
    });
	
	$(document).ready(function(){

        var hash = location.hash.replace('#','');
        console.log(hash);
        if(hash == 'myads'){
            $('.choosen').addClass('page_hidden');
            $('#my-announcements').removeClass('page_hidden');
        }
        if(hash == 'my_profile'){
            $('.choosen').addClass('page_hidden');
            $('#my-profile').removeClass('page_hidden');
        }
        if(hash == 'favorits'){
            $('.choosen').addClass('page_hidden');
            $('#favorites').removeClass('page_hidden');
        }

        $('.tab_my_announcements').on('click', function () {
            $('.choosen').addClass('page_hidden');
            $('#my-announcements').removeClass('page_hidden');
        });

        $('.tab_my_profile').on('click', function () {
            $('.choosen').addClass('page_hidden');
            $('#my-profile').removeClass('page_hidden');
        });

        $('.tab_favorites').on('click', function () {
            $('.choosen').addClass('page_hidden');
            $('#favorites').removeClass('page_hidden');
        });

        $('.user_cabinet_login').on('click', function () {
            $('.user_cabinet_dropdown').toggleClass('user_cabinet_dropdown-active');
        });

        $(document).on('click', function (e) {
            var div = $('.user_cabinet_login');
            if(!div.is(e.target) && div.has(e.target).length === 0){
                $('.user_cabinet_dropdown').removeClass('user_cabinet_dropdown-active');
            }
        });

        $('.modal_password_close').on('click', function () {
            $('.modal_password').addClass('modal_password-unactive');
        });

        $('.prophile_change_pass').on('click', function () {
            $('.modal_password').removeClass('modal_password-unactive');
        });

        $('<div class="quantity-nav"><div class="quantity-button quantity-up"><img src="img/more_arrow.png" alt=""></div><div class="quantity-button quantity-down"><img src="img/less_arrow.png" alt=""></div></div>').insertAfter('.quantity input');
        $('.quantity').each(function() {
            var spinner = $(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');

            btnUp.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else if (spinner.hasClass('quantity2')) {
                    var newVal = oldValue + 5;
                }
                else{
                    var newVal = oldValue + 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else if (spinner.hasClass('quantity2')) {
                    var newVal = oldValue - 5;
                }
                else{
                    var newVal = oldValue - 1;
                }
                spinner.find("input").val(newVal);
                spinner.find("input").trigger("change");
            });

        });
        function readURL2(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    $(input).closest(".prophile_main_wrapper").find('.prophile_photo_picked').attr('src', e.target.result);
                    $(input).closest(".prophile_main_wrapper").find('.prophile_photo_wrapper').hide();

                    $(input).closest(".prophile_main_wrapper ").find('.prophile_photo_picked').show();
                    $(input).closest(".prophile_main_wrapper ").find('.prophile_photo_picked').addClass('working');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInputakk").change(function(){
            readURL2(this);
        });



        $('.slider_block').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: '<div class="slick_left"></div>',
            nextArrow: '<div class="slick_prev"></div>',
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }]
        });

        $('.button_show_reg').on('click', function () {
            $('#ModalReg').modal('show');
        });

        $('.select_company select').on('change', function () {
            if($('.select_company select').val() == "Само-занятый"){
                $('.input-name-company').hide();
                $('.input-yur-addres').hide();
                $('.input-reg-number').hide();
                $('.input-vat-number').hide();

                $('.input-name-buisnes').show();
                $('.input-addres').show();
            }else{
                $('.input-name-company').show();
                $('.input-yur-addres').show();
                $('.input-reg-number').show();
                $('.input-vat-number').show();

                $('.input-name-buisnes').hide();
                $('.input-addres').hide();
            }
        });

        $('#private').on('click', function () {
            $('.company_modal_block').hide();
            $('.socials_reg').show();
        });

        $('#buisnes').on('click', function () {
            $('.company_modal_block').show();
            $('.socials_reg').hide();
        });


        var countryData = $.fn.intlTelInput.getCountryData(),
            telInput = $("#telphone"),
            addressDropdown = $("#address-country");

        telInput.intlTelInput({

            nationalMode: true,
            defaultCountry: "ua",
            utilsScript: "js/utils.js" //для форматирования/плейсхолдера и т.д.
        });

        $.each(countryData, function(i, country) {
            addressDropdown.append($("<option></option>").attr("value", country.iso2).text(country.name));
        });

        telInput.change(function() {
            var countryCode = telInput.intlTelInput("getSelectedCountryData").iso2;
            addressDropdown.val(countryCode);
        });

        telInput.change();

// отслеживаем изменение страны в выпадающем списке
        addressDropdown.change(function() {
            var countryCode = $(this).val();
            telInput.intlTelInput("selectCountry", countryCode);
        });

        $('#show_password').on('click', function(){

            if ($(this).is(':checked')){
                $('.input_password').attr('type', 'text');

            } else {
                $('.input_password').attr('type', 'password');
            }
        });
        $('.category_dropdown').css('min-height', $('.category_dropdown_main_list').outerHeight());
        $('.category_dropdown_main_list li p').on('click', function(){
            $('.category_dropdown_main_list li').removeClass('category_link_active');
            $('.category_dropdown_main_list ul').hide();
            $(this).closest("ul").show();
            $(this).parent().addClass('category_link_active');
            $(this).closest(".category_dropdown_main_list-li").addClass('category_link_active');
            $(this).next().show();
            $('.category_dropdown').innerHeight($(this).next('.category_dropdown_sub_list').height());
        });

        $('.btn_category').on('click', function(e){
            e.preventDefault();
            $('.category_dropdown').toggle();
            $('.dropDownHide').toggle();
            $('.dropDownShow').toggle();
            $('.btn_category span').toggle();
            if($(".category_dropdown").is(":hidden"))
            {
                console.log('yes');
            }
            else
            {
                console.log('no');
            }
        });

        $('.product_slider_main').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            fade: true,
            prevArrow: '<a class="product_slider_icon product_slider_prev"><img src="img/slide_icon2.svg" alt=""></a>',
            nextArrow: '<a class="product_slider_icon product_slider_next"><img src="img/slide_icon1.svg" alt=""></a>',
            asNavFor: '.product_slider_nav',
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                    adaptiveHeight: true
                }
            }]
        });
        $('.product_slider_nav').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            asNavFor: '.product_slider_main',
            focusOnSelect: true,
            infinite: true
        });

/*         $('.product_slider_main_item').zoom({ on:'click' });

        $('.product_slider_advantage_slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            prevArrow: '<div class="slick_left product_slider_advantage_arrow"></div>',
            nextArrow: '<div class="slick_prev product_slider_advantage_arrow"></div>',
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }]
        }); */

        $('#telphone2').intlTelInput({
            nationalMode: true,
            defaultCountry: "ua",
            utilsScript: "/js/utils.js" //для форматирования/плейсхолдера и т.д.
        });

        $('#telphone5').intlTelInput({
            nationalMode: true,
            defaultCountry: "ua",
            utilsScript: "/js/utils.js" //для форматирования/плейсхолдера и т.д.
        });

        $('#telphone6').intlTelInput({
            nationalMode: true,
            defaultCountry: "ua",
            utilsScript: "/js/utils.js" //для форматирования/плейсхолдера и т.д.
        });

        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {

                    $(input).closest(".upload-file-container-text").find('.add_foto_file_img').attr('src', e.target.result);
                    $(input).closest(".upload-file-container-text").find('.add_foto_file_item_load').hide();
                    $(input).closest(".upload-file-container-text").find('.add_foto_file_img_wrapper').show();
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInput").change(function(){
            readURL(this);
        });
        $("#imgInput2").change(function(){
            readURL(this);
        });
        $("#imgInput3").change(function(){
            readURL(this);
        });
        $("#imgInput4").change(function(){
            readURL(this);
        });
        $("#imgInput5").change(function(){
            readURL(this);
        });
        $("#imgInput6").change(function(){
            readURL(this);
        });
        $("#imgInput7").change(function(){
            readURL(this);
        });
        $("#imgInput8").change(function(){
            readURL(this);
        });
        $("#imgInput9").change(function(){
            readURL(this);
        });
        $("#imgInput10").change(function(){
            readURL(this);
        });

        $(".add_foto_file_delete").on("click", function(){
            var photo = $(this).closest(".upload-file-container-text").find(".photo");

            $(photo)[0].value = "";
            $(photo).closest(".upload-file-container-text").find('.add_foto_file_img').attr('src', '');
            $(photo).closest(".upload-file-container-text").find('.add_foto_file_item_load').show();
            $(photo).closest(".upload-file-container-text").find('.add_foto_file_img_wrapper').hide();
            console.log($(photo));
        });

        $('input[name="name_ad"]').on('input', function () {
            console.log(70 - $(this).val().length);
            if(70 - $(this).val().length)
                $('.number_of_signs span').html(70 - $(this).val().length)
        });

        $(".select_category").on('click', function(){
            $('#mainCatalog').modal('show');
        });

        $(".listCatalog1 li").on('click', function(){
            $(".listCatalog1 li").removeClass('active');
            $(this).addClass('active');
            $(".catalogBlock1").hide();
            $(".select_category + img").hide();
            $(".catalogBlock2").show();
        });

        $(".listCatalog2 li").on('click', function(){
            $(".listCatalog2 li").removeClass('active');
            $(this).addClass('active');
            $(".catalogBlock2").hide();
            $(".catalogBlock3").show();
        });
        $(".catalogBlock2 .arrow_left").on('click', function(){
            $(".catalogBlock2").hide();
            $(".catalogBlock1").show();
        });
        $(".catalogBlock3 .arrow_left").on('click', function(){
            $(".catalogBlock3").hide();
            $(".catalogBlock2").show();
        });
        $(".catalogBlock4 .arrow_left").on('click', function(){
            $(".catalogBlock4").hide();
            $(".catalogBlock3").show();
        });

        $(".outUk .listCatalog3 li").on('click', function(){
            $(".catalogBlock3").hide();
            $(".catalogBlock4").show();
        });

        $(".listCatalog3 li").on('click', function(){
            $(".listCatalog3 li").removeClass('active');
            $(this).addClass('active');
        });

        $(".listCatalog4 li").on('click', function(){
            $(".listCatalog4 li").removeClass('active');
            $(this).addClass('active');
        });

        $(".listCatalog li").on('click', function() {
            var category = $(".listCatalog1").find('.active').html();
            var heading = $(".listCatalog2").find('.active').html();
            var subheading = $(".listCatalog3").find('.active').html();
            if(category == undefined){
                $(".select_category").val();
            }else{
                $(".select_category").val(category);
            }
            if(heading == undefined){
                $(".select_category").val();
            }else{
                $(".select_category").val(category + "/" + heading);
            }
            if(subheading == undefined){
                $(".select_category").val();
            }else{
                $(".select_category").val(category + "/" + heading + "/" + subheading);
            }

        });

        $('#out_uk').on('click', function () {
            $('.all_user_block').hide();
            $('.outUk').show();
        });

        $('#all_adress').on('click', function () {
            $('.all_user_block').show();
            $('.outUk').hide();
        });

        $('.btn-wishlist').on('click', function () {
            $(this).toggleClass('active');
        });

        $('.btn-outline-secondary').on('click', function () {
            $(this).toggleClass('active');
        });

        $("input[type='tel']").on("blur", function () {
            $(this).val("+" + $(".country[class*='active']").attr("data-dial-code") + $(this).val());
        });



    });

});
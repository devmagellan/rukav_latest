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
    if (hash == 'messages') {
        $('.choosen').addClass('page_hidden');
        $('#messages').removeClass('page_hidden');
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

    $('.tab_message').on('click', function () {
        $('.choosen').addClass('page_hidden');
        $('#messages').removeClass('page_hidden');
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
        console.log('Registration')
        $('#ModalReg').modal('show');
        $('#ModalIn').modal('hide');
    });
    $('#enterButton').on('click', function () {
        console.log('LogIn')
        $('#ModalReg').modal('hide');
        $('#ModalIn').modal('show');
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
        $('.organisation_modal_block').hide();
        $('.company_modal_block').hide();
        $('.individual_modal_block').hide();
        $('.socials_reg').show();
        $('.phoneDiv').hide();
    });

    $('#organisation').on('click', function () {
        $('.organisation_modal_block').show();
        $('.company_modal_block').hide();
        $('.individual_modal_block').hide();
        $('.socials_reg').hide();
        $('.phoneDiv').show();
        $('.company_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.company_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.company_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );

    });

    $('#company').on('click', function () {
        $('.company_modal_block').show();
        $('.organisation_modal_block').hide();
        $('.individual_modal_block').hide();
        $('.socials_reg').hide();
        $('.phoneDiv').show();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );
    });

    $('#individual').on('click', function () {
        $('.company_modal_block').hide();
        $('.organisation_modal_block').hide();
        $('.individual_modal_block').show();
        $('.socials_reg').hide();
        $('.phoneDiv').show();
    });

    var countryData = window.intlTelInputGlobals.getCountryData(),
        input = document.querySelector("#telphone"),
        addressDropdown = document.querySelector("#address-country");

// init plugin
    var iti = window.intlTelInput(input, {
        separateDialCode: true,
        loadUtils: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.2/js/utils.js",
        initialCountry: "gb"
    });

    // $("#registerForm").submit(function() {
    //     var countryData2 = iti.getSelectedCountryData();
    //     // $("#hidden_input").val(iti.intlTelInput('getSelectedCountryData').dialCode);
    //     console.log("test123445");
    //     console.log(countryData2);
    // });


// populate the country dropdown
    for (var i = 0; i < countryData.length; i++) {
        var country = countryData[i];
        var optionNode = document.createElement("option");
        optionNode.value = country.iso2;
        var textNode = document.createTextNode(country.name);
        optionNode.appendChild(textNode);
        addressDropdown.appendChild(optionNode);
    }
// set it's initial value
    addressDropdown.value = iti.getSelectedCountryData().iso2;

// listen to the telephone input for changes
    input.addEventListener('countrychange', function(e) {
        addressDropdown.value = iti.getSelectedCountryData().iso2;
    });

// listen to the address dropdown for changes
    addressDropdown.addEventListener('change', function() {
        iti.setCountry(this.value);
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
        $('.category_dropdown').innerHeight($(this).next('ul.category_dropdown_sub_list').height());
        console.log($(this).next('ul.category_dropdown_sub_list').height());
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
        adaptiveHeight: true,
        fade: true,
        prevArrow: '<a class="product_slider_icon product_slider_prev"><img src="/img/slide_icon2.svg" alt=""></a>',
        nextArrow: '<a class="product_slider_icon product_slider_next"><img src="/img/slide_icon1.svg" alt=""></a>',
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

    $('.product_slider_main_item').zoom({ on:'click' });

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

    var input2 = document.querySelector("#telphone2");
    if(input2!=null){
        var iti = window.intlTelInput(input2, {
            separateDialCode: true,
            hiddenInput: "full_phone",
            loadUtils: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.2/js/utils.js",
            initialCountry: "gb"
        });
    }

    var input5 = document.querySelector("#telphone5");
    if(input5!=null) {
        var iti = window.intlTelInput(input5, {
            separateDialCode: true,
            hiddenInput: "full_phone",
            loadUtils: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.2/js/utils.js",
            initialCountry: "gb"
        });
    }

    var input6 = document.querySelector("#telphone6");
    if(input6!=null) {
        var iti = window.intlTelInput(input6, {
            separateDialCode: true,
            hiddenInput: "full_phone",
            loadUtils: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/13.0.2/js/utils.js",
            initialCountry: "gb"
        });
    }

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

    $('textarea[name="description"]').on('input', function () {
        console.log(7000 - $(this).val().length);
        if(7000 - $(this).val().length)
            $('.number_of_signs_text span').html(7000 - $(this).val().length)
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

    $('.btn-wishlist').on('click', function () {
        $(this).toggleClass('active');
    });

    $('.btn-outline-secondary').on('click', function () {
        $(this).toggleClass('active');
    });

    // $("input[type='tel']").on("blur", function () {
    //     $(this).val("+" + $(".country[class*='active']").attr("data-dial-code") + $(this).val());
    // });

    $(function () {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [75, 300],
            slide: function (event, ui) {
                $("#amount").val("£ " + ui.values[0] + " - " + ui.values[1]);
                $("#price_start").val(ui.values[0]);
                $("#price_end").val(ui.values[1]);
            }
        });
        $("#amount").val("£ " + $("#slider-range").slider("values", 0) +
            " - " + $("#slider-range").slider("values", 1));
        $("#price_start").val($("#slider-range").slider("values", 0));
        $("#price_end").val($("#slider-range").slider("values", 1));
    });

    $('.message_sidebar_theme_head').click(function () {
        $('.message_sidebar_theme_body').hide();
        console.log('12345');
        $(this).parent().next().slideDown();
    });

    ScreenWidth = screen.width;

    $('.cat_block_1').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper1").hide();
            $(".block_main_categories_wrapper2").show();
        }
    });
    $('.block_main_categories1_next').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper1").hide();
            $(".block_main_categories_wrapper2").show();
        }
    });

    $('.cat_block_2').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper2").hide();
            $(".block_main_categories_wrapper3").show();
        }
    });
    $('.block_main_categories2_prev').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper2").hide();
            $(".block_main_categories_wrapper1").show();
        }
    });
    $('.block_main_categories2_next').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper2").hide();
            $(".block_main_categories_wrapper3").show();
        }
    });

    $('.cat_block_3').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper3").hide();
            $(".block_main_categories_wrapper4").show();
        }
    });
    $('.block_main_categories3_prev').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper3").hide();
            $(".block_main_categories_wrapper2").show();
        }
    });
    $('.block_main_categories3_next').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper3").hide();
            $(".block_main_categories_wrapper4").show();
        }
    });

    $('.block_main_categories4_prev').on('click', function () {
        if(ScreenWidth < 720){
            $(".block_main_categories_wrapper4").hide();
            $(".block_main_categories_wrapper3").show();
        }
    });

    $('.btn_search_m').on('click', function () {
        if(ScreenWidth < 720){
            $(".form_category").show();
            $("#location_search").css("display", "inline-block");
            $("header.header").css("padding-bottom","94px");
        }
    });


});
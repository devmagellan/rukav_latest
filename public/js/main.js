$(document).ready(function(){
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
            $('.input-name-job').attr('placeholder','Название бизнеса');
            $('.input-address').attr('placeholder','Адресс');
            $('.input-reg-number').hide();
            $('.input-vat-number').hide();

            $('.input-name-buisnes').show();
            $('.input-addres').show();
        }else{
          $('.input-name-job').attr('placeholder','Название компании');
            $('.input-address').attr('placeholder','Юридический адрес');
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

});

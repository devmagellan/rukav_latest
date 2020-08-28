$(document).ready(function () {
  window.cont=0
  $(".listCatalog1 li").on('click', function () {
    $(".listCatalog1 li").removeClass('active');
    $(this).addClass('active');
    $(".select_category").val($(this).html());
    getChildCategory($(this).data('category_id'), '.listCatalog2', true);
    console.log('WithOrWihout',window.cont)
    if(window.cont==1){$('#category_id').val($(this).data('category_id'));
      if($('input[name="name_ad"]').is(':valid')){
        $('#add_header').removeClass('redBorder')
      }
      window.cat_id=$(this).data('category_id');
      $.ajax({
        type: "POST",
        dataType: 'html',
        async: false,
        url: '/search_for_filters',
        data: {cat_id:window.cat_id}, // serializes the form's elements.
        beforeSend: function() {

        },
        complete:function(){

        },
        success: function (data) {
          $('.filters_block').html(data)
        }


      });

      $.ajax({
        type: "POST",
        dataType: 'html',
        async: false,
        url: '/search_for_filter_deals',
        data: {cat_id:window.cat_id}, // serializes the form's elements.
        beforeSend: function() {

        },
        complete:function(){

        },
        success: function (data) {
          $('.filter_deals_block').html(data)
        }


      });
    }
  });
  $(document).on('click', '.listCatalog2 li', function () {
     $(".listCatalog2 li").removeClass('active');
     $(this).addClass('active');
    var category = $(".listCatalog1").find('.active').html();
    $(".select_category").val(category + '/' + $(this).html());
    console.log('#2',$(this).data('category_id'))

    console.log('listCatalog2')
      $('.listCatalog3').empty()
    getChildCategory($(this).data('category_id'), '.listCatalog3', true);
    if(window.cont==1){$('#category_id').val($(this).data('category_id'));
      if($('input[name="name_ad"]').is(':valid')){
        $('#add_header').removeClass('redBorder')
      }
    window.cat_id=$(this).data('category_id');
      $.ajax({
        type: "POST",
        dataType: 'html',
        async: false,
        url: '/search_for_filters',
        data: {cat_id:window.cat_id}, // serializes the form's elements.
        beforeSend: function() {

        },
        complete:function(){

        },
        success: function (data) {
          $('.filters_block').html(data)
        }


      });

      $.ajax({
        type: "POST",
        dataType: 'html',
        async: false,
        url: '/search_for_filter_deals',
        data: {cat_id:window.cat_id}, // serializes the form's elements.
        beforeSend: function() {

        },
        complete:function(){

        },
        success: function (data) {
          $('.filter_deals_block').html(data)
        }


      });
    }
    console.log('WithOrWihout',window.cont)
  });
  $(document).on('click', ".listCatalog3 li", function () {
      console.log('listCatalog3')
    $(".listCatalog3 li").removeClass('active');
    $(this).addClass('active');
    var category = $(".listCatalog1").find('.active').html();
      var category2 = $(".listCatalog2").find('.active').html();
    $(".select_category").val(category + '/'+category2+'/' + $(this).html()).change();
    console.log('#3',$(this).data('category_id'))
    $('#category_id').val($(this).data('category_id'));
    if($('input[name="name_ad"]').is(':valid')){
      $('#add_header').removeClass('redBorder')
    }
    window.cat_id=$(this).data('category_id');
    $.ajax({
      type: "POST",
      dataType: 'html',
      async: false,
      url: '/search_for_filters',
      data: {cat_id:window.cat_id}, // serializes the form's elements.
      beforeSend: function() {

      },
      complete:function(){

      },
      success: function (data) {
        $('.filters_block').html(data)
      }


    });

    $.ajax({
      type: "POST",
      dataType: 'html',
      async: false,
      url: '/search_for_filter_deals',
      data: {cat_id:window.cat_id}, // serializes the form's elements.
      beforeSend: function() {

      },
      complete:function(){

      },
      success: function (data) {
        $('.filter_deals_block').html(data)
      }


    });
    $('#mainCatalog').modal('hide');
  });

    $(document).on('click', ".previous_cat", function () {
      var current=$('.listCatalog ').parent('div :not([style*="display: none"])').attr('class').split(' ')[1];
      var previous=$('.listCatalog ').parent('div [style*="display: none"]').attr('class').split(' ')[1]
console.log('Active',current)
        console.log('Active',previous)
        //$('.'+current+'').hide()
        $('.'+previous+'').show()
    });

  function getChildCategory(categoryId, listForAppendChildCategory, clearFinishRubric = false) {
    console.log(listForAppendChildCategory)
      console.log('clearFinishRubric',clearFinishRubric)
    console.log('getChildren Cat')
    $.ajax({
      method: 'post',
      url: '/ads/search-rubrics',
      async:false,
      data: {
        categoryId: categoryId
      },
      success: function (data) {
        $(listForAppendChildCategory).html(data);
        console.log('DatA',data)
        if (clearFinishRubric && listForAppendChildCategory!='.listCatalog3') {


          $('.listCatalog3').html('');
        }
        else{

          console.log('without#3')
        }
      },
      error: function (errors) {
        window.cont=1;
        $('#mainCatalog').modal('hide');
      }
    });
  }
});



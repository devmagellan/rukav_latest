$(document).ready(function () {
  $(".listCatalog1 li").on('click', function () {
    $(".listCatalog1 li").removeClass('active');
    $(this).addClass('active');
    $(".select_category").val($(this).html());
    $('#category_id').val($(this).data('category_id'));
    getChildCategory($(this).data('category_id'), '.listCatalog2', true);
  });
  $(document).on('click', '.listCatalog2 li', function () {
     $(".listCatalog2 li").removeClass('active');
     $(this).addClass('active');
    var category = $(".listCatalog1").find('.active').html();
    $(".select_category").val(category + '/' + $(this).html());
    $('#category_id').val($(this).data('category_id'));
    console.log('listCatalog2')
      $('.listCatalog3').empty()
    getChildCategory($(this).data('category_id'), '.listCatalog3', true);
  });
  $(document).on('click', ".listCatalog3 li", function () {
      console.log('listCatalog3')
    $(".listCatalog3 li").removeClass('active');
    $(this).addClass('active');
    var category = $(".listCatalog1").find('.active').html();
      var category2 = $(".listCatalog2").find('.active').html();
    $(".select_category").val(category + '/'+category2+'/' + $(this).html()).change();
    $('#category_id').val($(this).data('category_id'));
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
      data: {
        categoryId: categoryId
      },
      success: function (data) {
        $(listForAppendChildCategory).html(data);
        if (clearFinishRubric && listForAppendChildCategory!='.listCatalog3') {
          $('.listCatalog3').html('');
        }
      },
      error: function (errors) {
        $('#mainCatalog').modal('hide');
      }
    });
  }
});



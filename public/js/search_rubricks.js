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
    getChildCategory($(this).data('category_id'), '.listCatalog3', true);
  });
  $(document).on('click', ".listCatalog3 li", function () {
    $(".listCatalog3 li").removeClass('active');
    $(this).addClass('active');
    var category = $(".listCatalog1").find('.active').html();
    $(".select_category").val(categoryIdVal + '/' + $(this).html());
    $('#category_id').val($(this).data('category_id'));
    $('#mainCatalog').modal('hide');
  });

  function getChildCategory(categoryId, listForAppendChildCategory, clearFinishRubric = false) {
    $.ajax({
      method: 'post',
      url: '/ads/search-rubrics',
      data: {
        categoryId: categoryId
      },
      success: function (data) {
        $(listForAppendChildCategory).html(data);
        if (clearFinishRubric) {
          $('.listCatalog3').html('');
        }
      },
      error: function (errors) {
        $('#mainCatalog').modal('hide');
      }
    });
  }
});



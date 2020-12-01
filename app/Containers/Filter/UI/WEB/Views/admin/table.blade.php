<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Название</th>
          <th>Метка</th>
          <th>Вид</th>
            <th>Активeн/неактивeн</th>
            <th>Действия</th>

        </tr>
        </thead>
        <tbody>
        <? $last=count($filters);?>
        @foreach($filters as $key=>$filter)
            <form class="staticpage_form">


        <tr>

            <th class="customer_id" scope="row">{{$filter->id}}</th>
            <td class="customer_name">{{$filter->name}}

            </td>
          <td class="customer_pointer">{{$filter->pointer}}

          </td>
          @switch($filter->format)
            @case('input')
          <td class="customer_format">текстовый

          </td>
          @break
            @case('dropdown')
            <td class="customer_format">дропдаун

            </td>
            @break
            @case('multiple_choice')
            <td class="customer_format">мультивыбор

            </td>
            @break
            @case('input_digits')
            <td class="customer_format">цифровой

            </td>
            @break
          @endswitch


            <td class="company_switch">
                <div class="custom-control custom-switch">

                    <input type="checkbox" class="active_filter_switch custom-control-input" id="customSwitch_{{$filter->id}}" @if($filter->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$filter->id}}">@if($filter->active==0) Not Active @else Active @endif</label>
                </div>
            </td>



            <td>
                <input class="staticpage_text" type="hidden" value="{{$filter->content}}">

                <a href="javascript:void(0)" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>

        </tr>
            </form>

      @endforeach
        </tbody>
    </table>
</div>

    <script>
        $('.PrependChangeCustomer').click(function(){
            console.log('PrependChangeCustomer73')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
          console.log('customer_id',customer_id)
            var manager =  $(this).parent().parent().find('.customer_manager').find('.is_manager').val()
            var name= $(this).parent().parent().find('.customer_name').text()
			var link= $(this).parent().parent().find('.staticpage_link').text()
          $('#filter_id').val($(this).parent().parent().find('.customer_id').text())
            $('#filter_name').val(name)
			$('#staticpage_link').val(link)
            var active= $(this).parent().parent().find('.company_switch').find('.custom-switch').find('.active_filter_switch')[0].checked;
            console.log(active)
            console.log($(this).parent().find('input').val())
            var text= $(this).parent().find('.staticpage_text').val()
            console.log('text',text)
            $('#staticpage_id').val(customer_id)
            localStorage.setItem('summernoteData', text);
            $('.js-summernote').summernote("code", localStorage.getItem("summernoteData"));
            if(active==true){
                $('#managerSwitch').prop('checked', true);
            }
            else{
                $('#managerSwitch').prop('checked',false);
            }

          $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/filter/get',
            data: {id:customer_id
            },
            beforeSend: function() {
            },
            complete: function() {
              reloadData();
            },
            success: function (data) {
              console.log('PrependChangeCustomer',data);

              $('#default_value').val(data.filter.default_value)
              var wrapper         = $(".input_fields_wrap"); //Fields wrapper
              switch (data.filter.format){
                case 'dropdown':
                  console.log('point7')
                  $('#dropdown').prop("checked", true);
                  $('#input').prop('checked',false);
                  $('#input_digits').prop('checked',false);
                  $('#multiple_choice').prop('checked',false);
                  $('.input_fields_wrap').show()
                  $('.input_fields_wrap').empty();
                  $(wrapper).append('<button style="width:300px;" class="add_field_button">+ Добавить дополнительное значение</button>');
                    $.each(JSON.parse(data.filter.values), function (key, val) {
                      console.log('current_values=>', key + val);

                      $(wrapper).append('<div><input type="text" style="width:300px" value="'+val+'" name="values[]"/><a href="#" class="remove_field">Remove</a></div>');
                    });

                  break;
                case 'input':
                  console.log('point8')
                  $('#input').prop('checked',true);
                  $('.input_fields_wrap').hide()
                  break;
                case 'input_digits':
                  console.log('point9')
                  $('#input_digits').prop('checked',true);
                  $('.input_fields_wrap').hide()
                  break;
                case 'multiple_choice':
                  console.log('point6')
                  $('#multiple_choice').prop('checked',true);
                  $('.input_fields_wrap').show()
                  $('.input_fields_wrap').empty();
                  $(wrapper).append('<button style="width:300px;" class="add_field_button">+ Добавить дополнительное значение</button>');
                  $.each(JSON.parse(data.filter.values), function (key, val) {
                    console.log('current_values=>', key + val);

                    $(wrapper).append('<div><input type="text" style="width:300px" value="'+val+'" name="values[]"/><a href="#" class="remove_field">Remove</a></div>');
                  });
                  break;
              }
            }
          });


            console.log(name);
        });


        $('.PrependChangeSidebar').click(function(){
            console.log('PrependChangeSidebar1')
            var staticpage_id =  $(this).parent().parent().find('.customer_id').text()
            $('#staticpage_group_id').val(staticpage_id)
            console.log(staticpage_id)

               $.ajax({
                method: 'POST',
                dataType: 'html',
                async:false,
                url: '/staticpages_groups/sidebar/get',
                data: {staticpage_id: staticpage_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {
                $('.folder').html(data)
                  $('.default-example-modal-right-lg-sidebar').modal({show:true})
                }
            });


        });


        $('.DeleteCustomer').click(function(){
            var filter_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/filter/delete',
                data: {filter_id: filter_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    console.log('success')
                    reloadData();
                }
            });

        });

        $('.active_filter_switch').change(function(e){
            e.preventDefault();
            console.log('Switch')
            var id=$(this).parent().parent().parent().find('.customer_id').text()
            console.log('id',id)
            var this_=$(this)
            console.log(this_)
            var status = $(this).is(":checked")
            var checked = $(this).is(':checked');
            /*  if(checked){
             $(".active_slider_switch").each(function(){
             $(this).prop("checked",false);
             this_.prop("checked",true);
             });
             }
             else{
             var $checkboxes = $(".active_slider_switch").not(this_)
             var first=$checkboxes[0]
             console.log($checkboxes[0])

             $($checkboxes).each(function(){
             console.log($(this))
             $(this).prop("checked",true);
             });
             $(".active_slider_switch").not(this_).slice(1).prop("checked",false);

             }*/

            console.log(status)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/filter/update_status',
                data: {id: id,status:status
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    reloadData();



                    console.log('success')

                }
            });
        });


        $('.staticpage_group').change(function(){
            console.log('staticpage_group')
            var staticpage_id =  $(this).parent().parent().find('.customer_id').text()
            console.log(staticpage_id)
            var group_id=$(this).val()
            console.log(group_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/staticpages_groups/groups/update',
                data: {staticpage_id: staticpage_id,group_id:group_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                }
            });


        });

        $('.staticpage_type').change(function(){
            console.log('staticpage_group')
            var staticpage_id =  $(this).parent().parent().find('.customer_id').text()
            console.log(staticpage_id)
            var type_id=$(this).val()
            console.log(type_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/staticpages_types/update',
                data: {staticpage_id: staticpage_id,type_id:type_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                }
            });


        });


        $('.arrow_press').click(function(){
            var restorant=$(this).parent().find('.restorant_id').val()
            var id=$(this).parent().find('.id').val()
            var state = ($(this).hasClass("arrow_down")) ? 0 : 1;
            console.log(restorant,state,id)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/staticpages_position',
                data: {state:state,id:id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    console.log('success')
                    reloadData();
                }
            });
        })



    </script>



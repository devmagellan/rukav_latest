<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Название</th>
            <th>Link</th>
            <th>Админ</th>
            <th>Активна/неактивна</th>
            <th>Сайдбар страницы</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($staticpages as $staticpage)

            <form class="staticpage_form">


        <tr>

            <th class="customer_id" scope="row">{{$staticpage->id}}</th>
            <td class="customer_name">{{$staticpage->name}}

            </td>
            <td class="customer_name">{{$staticpage->link}}

            </td>
            <td class="customer_sditor">{{$staticpage->editor}}</td>
            <td class="company_switch">
                <div class="custom-control custom-switch">

                    <input type="checkbox" class="active_static_page_switch custom-control-input" id="customSwitch_{{$staticpage->id}}" @if($staticpage->active==0)  @else checked="true" @endif>
                    <label class="custom-control-label" for="customSwitch_{{$staticpage->id}}">@if($staticpage->active==0) Not Active @else Active @endif</label>
                </div>
            </td>

            <td class="customer_group">
                <a href="javascript:void(0)" class="PrependChangeSidebar btn btn-primary btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-object-group"></i>
                </a>


               <? $groups=\App\Containers\StaticPage\Models\StaticPageGroup::get();?>
                @if($staticpage->getGroup)
                    <select class="form-control bootstrap-select" id="staticpage_group">
                        @foreach($groups as $group)
                            @if($group->id==$staticpage->getGroup->id)
                        <option selected value="{{$group->id}}">{{$staticpage->getGroup->name}}</option>
                                @else
                                <option value="{{$group->id}}">{{$staticpage->getGroup->name}}</option>
                            @endif
@endforeach
                    </select>
@endif
            </td>
            <td>
                <input class="staticpage_text" type="hidden" value="{{$staticpage->content}}">

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
            console.log('PrependChangeCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            var manager =  $(this).parent().parent().find('.customer_manager').find('.is_manager').val()
            var name= $(this).parent().parent().find('.customer_name').text()
            $('#staticpage_name').val(name)
            var active= $(this).parent().parent().find('.company_switch').find('.custom-switch').find('.active_static_page_switch')[0].checked;
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
            console.log(name);
            //$('#manager_selected').val(1); //<---below this one
 /*          $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/get',
                data: {company_id: company_id,customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                    reloadData();
                },
                success: function (data) {
                    console.log('PrependChangeCustomer',data)
                    console.log(data.get_customers_company)
                    $('#customer_id').val(customer_id)
                    $('#customer_name').val(data.name)
                    $('#customer_sername').val(data.sername)

                    $('#customer_email').val(data.email)
                    $('#customer_info').val(data.info)
                    $('#customer_phone').val(data.get_customers_company.phone)
                    $('#customer_address').val(data.get_customers_company.address)
                    $('#select option:selected').removeAttr("selected");
                    $("#select option[value="+data.get_customers_company.manager_id+"]").attr('selected', 'selected');
                    if(manager==1){
                        $('#managerSwitch').prop('checked', true);
                    }
                    else{
                        $('#managerSwitch').prop('checked',false);
                    }


                    console.log(data.get_customers_company.manager_id)
                    reloadData();
                      console.log('success')

                }
            });*/
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
                url: '/staticpages_groups/groups/get',
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
            var staticpage_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/staticpages/delete',
                data: {staticpage_id: staticpage_id
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

        $('.active_static_page_switch').change(function(e){
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
                url: '/staticpage/update_status',
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



    </script>



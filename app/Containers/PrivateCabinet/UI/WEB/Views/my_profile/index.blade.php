@extends('homepage::layouts.layout')
@section('content')
  <div class="breadcums_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs d-flex align-items-center">
            <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a></li>
            <li>Личный кабинет</li>
            <img class="breadcrumbs_pointer" src="/img/back_Icon.svg" alt="">
            <li >Мой профиль</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <main>


    @if(\Session::has('OpenConfirmationModal') && \Session::get('OpenConfirmationModal')==1 && \Auth::user())
      <script>
        $(document).ready(function(){
          $('#confirmEmail').modal({show:true})
        })
      </script>
      @php \Session::put('OpenConfirmationModal',0)@endphp

    @endif

      @if(\Session::has('updating_from_simpleUser') && \Session::get('updating_from_simpleUser')==1 && \Auth::user())
        @php
          \Log::info('updating_from_simpleUserGET'.\Session::get('updating_from_simpleUser'));
          @endphp
        <script>
          $(document).ready(function(){
            $('#confirmPhone').modal({show:true})
          })
        </script>
        @php \Session::put('updating_from_simpleUser',0)@endphp

      @endif




    @if(\Auth::user()->getBusinessAccount && \Auth::user()->business_users_flag==false)
<script>
  $(document).ready(function(){
    $('#goToBusinessUsersModal').modal({show:true})

    $('#businessUsersCompanyName').val('{{\Auth::user()->getBusinessAccount['company_name']}}')
    $('#businessUsersCompanyEmail').val('{{\Auth::user()->email}}')
    $('#businessUsersCompanyWww').val('{{\Auth::user()->getBusinessAccount['www']}}')
  })
</script>
      @endif
    @if(\Session::has('message'))
      <p class="alert {{ \Session::get('alert-class', 'alert-info') }}">{{ \Session::get('message') }}</p>
    @endif
      <p id="updated_data" style="display:none" class="alert  alert-info ">Ваши данные обновлены</p>
    <div class="choosen" id="my-profile">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h5 class="add_advert_block_title">
              Личный кабинет
            </h5>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 d-flex prophile_tab_column">
            <a href="/private_cabinet/screen/myads" class="choosen_tab_title tab_my_announcements">
              <div class="choosen_tab_icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path class="svg_tab_path" d="M16.4482 14.6094C16.2325 14.6094 16.0576 14.7843 16.0576 15V18.8281C16.0576 19.0435 15.8824 19.2188 15.667 19.2188H2.23047C2.01508 19.2188 1.83985 19.0435 1.83985 18.8281V11.7578C1.83985 11.5421 1.66496 11.3672 1.44922 11.3672C1.23348 11.3672 1.05859 11.5421 1.05859 11.7578V18.8281C1.05859 19.4743 1.5843 20 2.23047 20H15.667C16.3132 20 16.8389 19.4743 16.8389 18.8281V15C16.8389 14.7843 16.664 14.6094 16.4482 14.6094Z" fill="#808080"/>
                  <path class="svg_tab_path" d="M17.9817 7.31048C17.6461 6.97494 17.2555 6.72771 16.8389 6.56704V4.21833C16.8386 4.21829 16.8383 4.21825 16.838 4.21825C16.8379 4.11665 16.7992 4.0168 16.7245 3.94212L12.8968 0.114453C12.8221 0.0397657 12.7222 0.00105469 12.6206 0.00101563C12.6206 0.000664064 12.6206 0.000351563 12.6206 0H2.23047C1.5843 0 1.05859 0.525704 1.05859 1.17188V8.45052C1.05859 8.66627 1.23348 8.84115 1.44922 8.84115C1.66496 8.84115 1.83985 8.66627 1.83985 8.45052V1.17184C1.83985 0.956447 2.01508 0.781213 2.23047 0.781213H12.23V3.43708C12.23 4.08325 12.7557 4.60895 13.4019 4.60895H16.0576V6.37122C15.0809 6.24978 14.0601 6.56224 13.3119 7.31048L7.74462 12.8777C7.59208 13.0302 7.59208 13.2776 7.74462 13.4301C7.89716 13.5827 8.14451 13.5827 8.29709 13.4301L13.8643 7.86291C14.8471 6.88009 16.4464 6.88005 17.4293 7.86291C18.4121 8.84576 18.4121 10.445 17.4293 11.4278L12.2079 16.6491C11.595 17.262 10.5978 17.262 9.98494 16.6491C9.68806 16.3523 9.52455 15.9575 9.52455 15.5376C9.52455 15.1178 9.68806 14.723 9.98494 14.4262L15.2317 9.17943C15.3473 9.06381 15.501 9.0001 15.6646 9.0001C15.8281 9.0001 15.9818 9.06377 16.0975 9.17943C16.2131 9.29506 16.2767 9.44881 16.2767 9.61232C16.2767 9.77584 16.2131 9.92959 16.0974 10.0452L11.3688 14.7738C11.2162 14.9264 11.2162 15.1737 11.3688 15.3263C11.5213 15.4788 11.7687 15.4788 11.9212 15.3263L16.6498 10.5976C16.913 10.3345 17.058 9.98451 17.058 9.61232C17.058 9.24014 16.913 8.89017 16.6499 8.62701C16.3867 8.36381 16.0367 8.21884 15.6646 8.21884C15.2924 8.21884 14.9425 8.36381 14.6792 8.62697L9.43252 13.8737C8.51505 14.7912 8.51505 16.2841 9.43252 17.2016C9.89131 17.6603 10.4938 17.8897 11.0964 17.8896C11.6989 17.8896 12.3017 17.6602 12.7603 17.2016L17.9817 11.9802C19.2691 10.6928 19.2691 8.59791 17.9817 7.31048ZM13.4019 3.8277C13.1865 3.8277 13.0112 3.65247 13.0112 3.43708V1.33371L15.5052 3.8277H13.4019Z" fill="#808080"/>
                  <path class="svg_tab_path" d="M1.72149 9.84919C1.64883 9.77654 1.54805 9.73474 1.44531 9.73474C1.34219 9.73474 1.2418 9.77654 1.16875 9.84919C1.09609 9.92185 1.05469 10.0226 1.05469 10.1254C1.05469 10.2281 1.09609 10.3289 1.16875 10.4015C1.2418 10.4746 1.34219 10.516 1.44531 10.516C1.54805 10.516 1.64883 10.4746 1.72149 10.4015C1.79414 10.3289 1.83594 10.2281 1.83594 10.1254C1.83594 10.0226 1.79414 9.92185 1.72149 9.84919Z" fill="#808080"/>
                  <path class="svg_tab_path" d="M7.14529 14.2327L7.13756 14.2089C7.07096 14.0037 6.8506 13.8913 6.64541 13.9579C6.44021 14.0245 6.32783 14.2449 6.39443 14.4501L6.40216 14.4739C6.45576 14.6391 6.60892 14.7441 6.77365 14.7441C6.81361 14.7441 6.85427 14.7379 6.89431 14.7249C7.09951 14.6583 7.21189 14.4379 7.14529 14.2327Z" fill="#808080"/>
                </svg>

              </div>
              <p>Мои объявления</p>
            </a>
            <a href="/private_cabinet/screen/messages" class="choosen_tab_title tab_message">
              <div class="choosen_tab_icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0)">
                    <path class="svg_tab_path" d="M19.8025 0.05134C19.6807 -0.0181913 19.5308 -0.0170194 19.4101 0.0543868L12.2517 4.28735C12.066 4.39716 12.0045 4.63669 12.1143 4.82239C12.2241 5.00806 12.4636 5.06958 12.6494 4.95982L17.7854 1.92275L8.21872 11.849L3.46059 10.3933L9.67017 6.72146C9.85587 6.61161 9.9174 6.37208 9.80759 6.18638C9.69783 6.00071 9.45826 5.93911 9.27255 6.04896L2.3007 10.1716C2.1675 10.2504 2.09332 10.4003 2.11164 10.554C2.12996 10.7077 2.23727 10.8361 2.38524 10.8814L8.06763 12.6198L10.5745 17.1828C10.5772 17.1875 10.5799 17.1915 10.5826 17.1951C10.6245 17.2649 10.6872 17.3218 10.7654 17.3547C10.8143 17.3753 10.8658 17.3854 10.9169 17.3854C11.017 17.3854 11.1155 17.3468 11.1899 17.2741L14.0725 14.4569L19.4946 16.1157C19.5321 16.1272 19.5706 16.1328 19.6089 16.1328C19.6916 16.1328 19.7732 16.1066 19.8412 16.0562C19.9408 15.9825 19.9996 15.866 19.9996 15.7422V0.390637C19.9996 0.250363 19.9243 0.120832 19.8025 0.05134ZM10.5958 12.8606C10.5506 12.9259 10.5263 13.0035 10.5263 13.083V15.4725L8.8145 12.3567L16.3896 4.49689L10.5958 12.8606ZM11.3076 16.0668V13.611L13.2213 14.1965L11.3076 16.0668ZM19.2183 15.2142L11.5426 12.8659L19.2183 1.78532V15.2142Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M6.42206 13.5772C6.26949 13.4246 6.02222 13.4246 5.8696 13.5772L2.22305 17.2237C2.07051 17.3763 2.07051 17.6236 2.22305 17.7762C2.29937 17.8525 2.39934 17.8906 2.4993 17.8906C2.59926 17.8906 2.69922 17.8525 2.77551 17.7762L6.42206 14.1296C6.5746 13.9771 6.5746 13.7298 6.42206 13.5772Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M1.56551 18.4347C1.41293 18.2822 1.16566 18.2822 1.01309 18.4347L0.114648 19.3331C-0.0378906 19.4857 -0.0378906 19.733 0.114648 19.8856C0.190938 19.9619 0.290898 20 0.390859 20C0.49082 20 0.590781 19.9618 0.66707 19.8856L1.56551 18.9871C1.71805 18.8346 1.71805 18.5872 1.56551 18.4347Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M5.57301 19.3101C5.50039 19.2375 5.39961 19.1957 5.29688 19.1957C5.19371 19.1957 5.09336 19.2375 5.0207 19.3101C4.94805 19.3828 4.90625 19.4832 4.90625 19.5863C4.90625 19.689 4.94801 19.7898 5.0207 19.8625C5.09336 19.9351 5.19414 19.9769 5.29688 19.9769C5.39961 19.9769 5.50039 19.9351 5.57301 19.8625C5.64566 19.7898 5.6875 19.689 5.6875 19.5863C5.6875 19.4832 5.6457 19.3828 5.57301 19.3101Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M8.47771 16.4037C8.32524 16.2512 8.07798 16.2512 7.92528 16.4037L5.9938 18.3352C5.84126 18.4877 5.84126 18.735 5.9938 18.8876C6.07009 18.9639 6.17005 19.002 6.27001 19.002C6.36997 19.002 6.46993 18.9638 6.54622 18.8876L8.47771 16.9561C8.63024 16.8036 8.63024 16.5563 8.47771 16.4037Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M15.1433 16.2555C14.9907 16.103 14.7435 16.103 14.5909 16.2555L12.6542 18.1922C12.5017 18.3447 12.5017 18.5921 12.6542 18.7447C12.7305 18.8209 12.8304 18.8591 12.9304 18.8591C13.0304 18.8591 13.1303 18.8209 13.2066 18.7447L15.1433 16.8079C15.2959 16.6554 15.2959 16.4081 15.1433 16.2555Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M11.073 5.32466C11.0004 5.252 10.8996 5.21021 10.7969 5.21021C10.6941 5.21021 10.5934 5.252 10.5207 5.32466C10.4481 5.39731 10.4062 5.4981 10.4062 5.60122C10.4062 5.70395 10.448 5.80435 10.5207 5.877C10.5934 5.95005 10.6941 5.99145 10.7969 5.99145C10.8996 5.99145 11.0004 5.95005 11.073 5.877C11.1457 5.80435 11.1875 5.70395 11.1875 5.60122C11.1875 5.4981 11.1457 5.39731 11.073 5.32466Z" fill="#A269F7"/>
                  </g>
                  <defs>
                    <clipPath id="clip0">
                      <rect class="svg_tab_path" width="20" height="20" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <p>Сообщения</p>
            </a>
            <a href="/private_cabinet/screen/favorits" class="choosen_tab_title tab_favorites">
              <div class="choosen_tab_icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path class="svg_tab_path" d="M17.5 13.737C17.2843 13.737 17.1094 13.9119 17.1094 14.1276V18.9658L10.1803 15.3603C10.0673 15.3015 9.93277 15.3015 9.81969 15.3603L2.89062 18.9658V7.67578C2.89062 7.46004 2.7157 7.28516 2.5 7.28516C2.2843 7.28516 2.10938 7.46004 2.10938 7.67578V19.6093C2.10938 19.7459 2.18063 19.8724 2.2973 19.9433C2.4141 20.0141 2.5593 20.0188 2.68031 19.9559L10 16.1472L17.3197 19.9559C17.3763 19.9853 17.4382 20 17.5 20C17.5704 20 17.6405 19.981 17.7027 19.9433C17.8194 19.8724 17.8906 19.7459 17.8906 19.6093V14.1276C17.8906 13.9119 17.7157 13.737 17.5 13.737Z" fill="white"/>
                  <path class="svg_tab_path" d="M17.5 0H2.5C2.2843 0 2.10938 0.174883 2.10938 0.390625V4.53125C2.10938 4.74699 2.2843 4.92188 2.5 4.92188C2.7157 4.92188 2.89062 4.74699 2.89062 4.53125V0.78125H17.1094V11.1849C17.1094 11.4006 17.2843 11.5755 17.5 11.5755C17.7157 11.5755 17.8906 11.4006 17.8906 11.1849V0.390625C17.8906 0.174883 17.7157 0 17.5 0Z" fill="white"/>
                  <path class="svg_tab_path" d="M15.0093 6.88563C14.9633 6.74423 14.8411 6.64118 14.6939 6.61985L11.6941 6.18478L10.3518 3.46692C10.286 3.33364 10.1503 3.24927 10.0016 3.24927C10.0016 3.24927 10.0015 3.24927 10.0015 3.24927C9.85277 3.24931 9.71703 3.33376 9.65125 3.46712L8.31047 6.18567L5.31093 6.62235C5.16382 6.64376 5.0416 6.74685 4.99566 6.88829C4.94976 7.0297 4.98808 7.18493 5.09461 7.28868L7.26578 9.40392L6.75414 12.3916C6.72902 12.5382 6.78929 12.6863 6.90961 12.7736C6.97765 12.823 7.05824 12.8482 7.13918 12.8482C7.2014 12.8482 7.26386 12.8333 7.32105 12.8033L10.0037 11.392L12.687 12.8019C12.8187 12.8711 12.9781 12.8595 13.0984 12.772C13.2187 12.6846 13.2789 12.5365 13.2537 12.39L12.7405 9.40251L14.9106 7.2861C15.017 7.18228 15.0553 7.02704 15.0093 6.88563ZM12.048 8.98653C11.956 9.07634 11.914 9.20564 11.9358 9.33235L12.3498 11.7421L10.1853 10.6049C10.0715 10.545 9.93554 10.5451 9.82168 10.6049L7.65777 11.7433L8.07047 9.33333C8.09218 9.20657 8.05011 9.07731 7.95804 8.98759L6.20668 7.28138L8.62629 6.92919C8.75351 6.91067 8.86347 6.83075 8.92035 6.71544L10.0019 4.52255L11.0846 6.71485C11.1415 6.83009 11.2515 6.90997 11.3787 6.92845L13.7985 7.27939L12.048 8.98653Z" fill="white"/>
                  <path class="svg_tab_path" d="M2.77613 5.84331C2.70352 5.77065 2.60273 5.72925 2.5 5.72925C2.39727 5.72925 2.29648 5.77065 2.22383 5.84331C2.15113 5.91636 2.10938 6.01675 2.10938 6.11987C2.10938 6.22261 2.15117 6.32339 2.22383 6.39605C2.29648 6.4687 2.39727 6.5105 2.5 6.5105C2.60273 6.5105 2.70352 6.4687 2.77613 6.39605C2.84883 6.323 2.89062 6.22261 2.89062 6.11987C2.89062 6.01714 2.84879 5.91636 2.77613 5.84331Z" fill="white"/>
                  <path class="svg_tab_path" d="M17.7761 12.341C17.7035 12.2684 17.6027 12.2266 17.5 12.2266C17.3973 12.2266 17.2965 12.2684 17.2238 12.341C17.1511 12.4137 17.1094 12.5145 17.1094 12.6172C17.1094 12.7199 17.1512 12.8207 17.2238 12.8934C17.2965 12.966 17.3973 13.0078 17.5 13.0078C17.6027 13.0078 17.7035 12.966 17.7761 12.8934C17.8488 12.8207 17.8906 12.7199 17.8906 12.6172C17.8906 12.5145 17.8488 12.4137 17.7761 12.341Z" fill="white"/>
                </svg>


              </div>
              <p>Избранное</p>
            </a>
            <a href="/private_cabinet/screen/my_profile" class="choosen_tab_title tab_active tab_my_profile">
              <div class="choosen_tab_icon">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g clip-path="url(#clip0)">
                    <path class="svg_tab_path" d="M16.1714 5.81055C16.3871 5.81055 16.562 5.63566 16.562 5.41992V1.17188C16.562 0.525703 16.0363 0 15.3901 0H1.17139C0.525215 0 -0.000488281 0.525703 -0.000488281 1.17188V18.8281C-0.000488281 19.4743 0.525215 20 1.17139 20H15.3901C16.0363 20 16.562 19.4743 16.562 18.8281V15.9503C16.562 15.7346 16.3871 15.5597 16.1714 15.5597C15.9557 15.5597 15.7808 15.7346 15.7808 15.9503V18.8281C15.7808 19.0435 15.6055 19.2188 15.3901 19.2188H1.17139C0.955996 19.2188 0.780762 19.0435 0.780762 18.8281V1.17188C0.780762 0.956484 0.955996 0.78125 1.17139 0.78125H15.3901C15.6055 0.78125 15.7808 0.956484 15.7808 1.17188V5.41992C15.7808 5.63566 15.9557 5.81055 16.1714 5.81055Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M8.28075 2.10938C6.29916 2.10938 4.68701 3.72152 4.68701 5.70312C4.68701 6.73113 5.121 7.65957 5.81521 8.3152C5.82822 8.3291 5.84205 8.34227 5.85717 8.35426C6.49666 8.93937 7.34771 9.29684 8.28072 9.29684C9.21372 9.29684 10.0648 8.93934 10.7043 8.35426C10.7194 8.34227 10.7332 8.32906 10.7462 8.3152C11.4405 7.65957 11.8745 6.73113 11.8745 5.70312C11.8745 3.72152 10.2624 2.10938 8.28075 2.10938ZM8.28075 8.51562C7.6429 8.51562 7.05423 8.30188 6.58189 7.94266C6.92521 7.33387 7.56587 6.95312 8.28075 6.95312C8.99564 6.95312 9.6363 7.33387 9.97962 7.94266C9.50724 8.30188 8.9186 8.51562 8.28075 8.51562ZM7.65576 5.54688V5.29297C7.65576 4.94836 7.93615 4.66797 8.28075 4.66797C8.62536 4.66797 8.90575 4.94836 8.90575 5.29297V5.54688C8.90575 5.89148 8.62536 6.17188 8.28075 6.17188C7.93615 6.17188 7.65576 5.89148 7.65576 5.54688ZM10.544 7.37043C10.2559 6.94316 9.85669 6.61086 9.39313 6.4057C9.57712 6.16793 9.687 5.87008 9.687 5.54688V5.29297C9.687 4.51754 9.05618 3.88672 8.28075 3.88672C7.50533 3.88672 6.87451 4.51754 6.87451 5.29297V5.54688C6.87451 5.87008 6.98439 6.16793 7.16837 6.4057C6.70482 6.61086 6.30556 6.94316 6.01748 7.37043C5.6726 6.90352 5.46826 6.32684 5.46826 5.70312C5.46826 4.1523 6.72994 2.89062 8.28075 2.89062C9.83157 2.89062 11.0932 4.1523 11.0932 5.70312C11.0932 6.32684 10.8889 6.90352 10.544 7.37043Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M10.3901 17.1094H8.28076C8.06506 17.1094 7.89014 17.2843 7.89014 17.5C7.89014 17.7157 8.06506 17.8906 8.28076 17.8906H10.3901C10.6058 17.8906 10.7807 17.7157 10.7807 17.5C10.7807 17.2843 10.6058 17.1094 10.3901 17.1094Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M10.3901 14.9219H4.84326C4.62756 14.9219 4.45264 15.0968 4.45264 15.3125C4.45264 15.5282 4.62756 15.7031 4.84326 15.7031H10.3901C10.6058 15.7031 10.7807 15.5282 10.7807 15.3125C10.7807 15.0968 10.6058 14.9219 10.3901 14.9219Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M10.3901 12.7344H4.84326C4.62756 12.7344 4.45264 12.9093 4.45264 13.125C4.45264 13.3407 4.62756 13.5156 4.84326 13.5156H10.3901C10.6058 13.5156 10.7807 13.3407 10.7807 13.125C10.7807 12.9093 10.6058 12.7344 10.3901 12.7344Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M3.4523 10.6613C3.37969 10.5887 3.27891 10.5469 3.17578 10.5469C3.07301 10.5469 2.97223 10.5887 2.89961 10.6613C2.82695 10.734 2.78516 10.8348 2.78516 10.9375C2.78516 11.0402 2.82691 11.141 2.89961 11.2137C2.97266 11.2863 3.07301 11.3281 3.17578 11.3281C3.27891 11.3281 3.3793 11.2863 3.4523 11.2137C3.52496 11.141 3.5668 11.0402 3.5668 10.9375C3.5668 10.8348 3.525 10.734 3.4523 10.6613Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M3.4523 12.8488C3.3793 12.7762 3.27891 12.7344 3.17578 12.7344C3.07301 12.7344 2.97266 12.7762 2.89961 12.8488C2.82695 12.9215 2.78516 13.0223 2.78516 13.125C2.78516 13.2277 2.82691 13.3285 2.89961 13.4012C2.97266 13.4738 3.07301 13.5156 3.17578 13.5156C3.27891 13.5156 3.3793 13.4738 3.4523 13.4012C3.52496 13.3285 3.5668 13.2277 3.5668 13.125C3.5668 13.0223 3.525 12.9215 3.4523 12.8488Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M3.4523 15.0363C3.3793 14.9637 3.27891 14.9219 3.17578 14.9219C3.07301 14.9219 2.97266 14.9637 2.89961 15.0363C2.82695 15.109 2.78516 15.2098 2.78516 15.3125C2.78516 15.4152 2.82691 15.516 2.89961 15.5887C2.97223 15.6613 3.07301 15.7031 3.17578 15.7031C3.27891 15.7031 3.37969 15.6613 3.4523 15.5887C3.52496 15.516 3.5668 15.4152 3.5668 15.3125C3.5668 15.2098 3.525 15.109 3.4523 15.0363Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M10.3901 10.5469H4.84326C4.62756 10.5469 4.45264 10.7218 4.45264 10.9375C4.45264 11.1532 4.62756 11.3281 4.84326 11.3281H10.3901C10.6058 11.3281 10.7807 11.1532 10.7807 10.9375C10.7807 10.7218 10.6058 10.5469 10.3901 10.5469Z" fill="#A269F7"/>
                    <path class="svg_tab_path" d="M19.1802 5.09062C18.8007 4.87152 18.3586 4.81331 17.9352 4.92671C17.5119 5.04015 17.1581 5.31163 16.9391 5.69112L12.0233 14.2053C11.9964 14.252 11.9794 14.3037 11.9734 14.3573L11.6274 17.4567C11.6102 17.6109 11.6859 17.7607 11.8203 17.8383C11.881 17.8733 11.9484 17.8906 12.0156 17.8906C12.0973 17.8906 12.1787 17.8651 12.2473 17.8145L14.7584 15.9652C14.8017 15.9332 14.8381 15.8926 14.865 15.846L19.7807 7.33179C20.233 6.54835 19.9636 5.54296 19.1802 5.09062ZM12.5029 16.656L12.6836 15.0376L13.8141 15.6903L12.5029 16.656ZM14.3837 15.117L12.8953 14.2576L16.84 7.42522L18.3285 8.2846L14.3837 15.117ZM19.1041 6.94112L18.7191 7.60804L17.2306 6.74866L17.6156 6.08175C17.7304 5.88296 17.9157 5.74077 18.1374 5.68136C18.3592 5.62191 18.5908 5.65245 18.7895 5.76722C18.9883 5.88198 19.1305 6.0673 19.1899 6.28901C19.2493 6.51073 19.2189 6.74233 19.1041 6.94112Z" fill="#A269F7"/>
                  </g>
                  <defs>
                    <clipPath id="clip0">
                      <rect class="svg_tab_path" width="20" height="20" fill="white"/>
                    </clipPath>
                  </defs>
                </svg>
              </div>
              <p>Мой профиль</p>
            </a>
          </div>
        </div>
        <div class="row flex">
          <div class="col-md-12">
            <form class="prophile_form changeUserTypeForm" id="changeRegisterForm" method="post" action="/profile/save">
              <input type="hidden" value="{{\Auth::user()->id}}" name="id">
              <?
              switch($toAccountType){
                    case 'to_individual':
                      $accountType='Предприниматель';
                      break;
                  case 'to_organisation':
                      $accountType='Организация';
                      break;
                  case 'to_company':
                      $accountType='Компания';
                      break;
              }
              ?>
              <input type="hidden" value="{{\Auth::user()->vid_user}}" name="vid_user">
              <input type="hidden" name="code" id="code" value="0">
              <div class="prophile_show-wrapper ">
                <div class="col-md-12">
                  <p class="prophile_show_title">
                    @if(\Auth::user()->vid_user=='Компания')
                    Профиль компании
                      @elseif(\Auth::user()->vid_user=='Частная')
                      Профиль частного лица
                    @elseif(\Auth::user()->vid_user=='Организация')
                      Профиль организации
                    @else
                      Профиль предпринимателя
                      @endif
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    <p class="prophile_show_input_text">
                      Показывать в объявлениях
                    </p>
                  </div>
                </div>
              </div>
              <div class="prophile_main_wrapper prophile_main_info-wrapper d-flex">
                <div class="col-sm-12 col-md-7 flex-column">
                  <p class="prophile_main_text">
                    Ваше имя <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_name" type="checkbox" @if(\Auth::user()->show_name) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="text" class="prophile_main_input" name="name" value="{{\Auth::user()->name}}">
                  </div>
                  <p class="prophile_main_text">
                    Ваша фамилия <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_sername" type="checkbox" @if(\Auth::user()->show_sername) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="text" class="prophile_main_input" name="sername" value="{{\Auth::user()->sername}}">
                  </div>
                  <p class="prophile_main_text">
                    Страна резиденции <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container checkbox_unactive">
                      <input class="checkbox_hidden"  type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    <input type="hidden" class="prophile_main_input" name="country" value="{{\Auth::user()->country}}">
                    <input type="text" disabled class="prophile_main_input" name="country_view" value="{{$countrycode}}">
                    <!--a href="#" class="prophile_change_country" >
                      Сменить
                    </a-->
                  </div>
                  @if(((\Auth::user()->getIndividualAccount   && $toAccountType!='to_company' && $toAccountType!='to_organisation' && \Auth::user()->vid_user !='Частная'
                  && \Auth::user()->vid_user !='Организация' && \Auth::user()->vid_user !='Компания')|| $toAccountType=='to_individual'))
                    <p class="prophile_main_text">
                      Название бизнеса <span>*</span>
                    </p>
                    <div class="prophile_show_input-wrapper d-flex align-items-center">
                      <label class="checkbox_container checkbox_unactive">
                        <input class="checkbox_hidden"  type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                      @if(\Auth::user()->getIndividualAccount)

                      <input type="text" class="prophile_main_input" name="business_name" value="{{\Auth::user()->getIndividualAccount->business_name}}">
                        @else
                        <input type="text" class="prophile_main_input" name="business_name" value="">
                        @endif
                    </div>
                    <div style="display:block;color:red" id="business_name" class="errorBlock"></div>

                  @endif
                  @if(((\Auth::user()->getOrganisationAccount   && $toAccountType!='to_company' && $toAccountType!='to_individual' && \Auth::user()->vid_user !='Частная'
                  && \Auth::user()->vid_user !='Предприниматель' && \Auth::user()->vid_user !='Компания')|| $toAccountType=='to_organisation'))
                    <p class="prophile_main_text">
                      Название организации <span>*</span>
                    </p>
                    <div class="prophile_show_input-wrapper d-flex align-items-center">
                      <label class="checkbox_container checkbox_unactive">
                        <input class="checkbox_hidden"  type="checkbox" checked="checked">
                        <span class="checkmark"></span>
                      </label>
                      @if(\Auth::user()->getOrganisationAccount)
                      <input type="text" class="prophile_main_input" name="organisation_name" value="{{\Auth::user()->getOrganisationAccount->organisation_name}}">
                   @else
                        <input type="text" class="prophile_main_input" name="organisation_name" value="">

                      @endif

                    </div>
					<div style="display:block;color:red" id="organisation_name" class="errorBlock"></div>

                  @endif
                </div>

                <div class="col-sm-12 col-md-5">
                  <label for="imgInputakk" class="prophile_photo_picked_wrapper">
				  <?
				  if(filter_var(\Auth::user()->avatar, FILTER_VALIDATE_URL)){
					 $urlAvatar=true;
				  }else{$urlAvatar=false;
				  }

				  ?>
                    <img class="prophile_photo_picked" for="imgInputakk" src="@if(\Auth::user()->avatar && $urlAvatar==false)  /storage/avatars/{{\Auth::user()->avatar}} @elseif(\Auth::user()->avatar && $urlAvatar==true) {{\Auth::user()->avatar}} @else /img/slide_img1.png @endif " alt="">
                  </label>
                  <label class="prophile_photo_wrapper" for="imgInputakk">
                    <div class="prophile_photo_img" style="width:100%;height:100%">
                      @if(\Auth::user()->avatar)
                        <img style="width:100%;height:100%" src="@if(\Auth::user()->avatar && $urlAvatar==false)  /storage/avatars/{{\Auth::user()->avatar}} @elseif(\Auth::user()->avatar && $urlAvatar==true) {{\Auth::user()->avatar}} @else /img/slide_img1.png @endif " alt="">

                      @else
                      <img src="img/prophile_camera.png" alt="">@endif
                    </div>
                    @if(!\Auth::user()->avatar)

                      <a class="prophile_photo_change">
                        Добавить фото или логотип
                      </a>
                    @endif

                  </label>
                  <input type="file" name="loadphoto" id="imgInputakk">
                  <div class="prophile_show_input-wrapper prophile_photo_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    <p class="prophile_show_input_text">
                      Публиковать в объявлениях
                    </p>
                  </div>
                </div>


                <!--div class="col-sm-12 col-md-5">
                  <img class="prophile_photo_picked" src="/img/slide_img1.png" alt="">
                  <label class="prophile_photo_wrapper" for="loadphoto">
                    <div class="prophile_photo_img">
                      <img src="/img/prophile_camera.png" alt="">
                    </div>

                    <a href="#" class="prophile_photo_change">
                      Добавить фото или логотип
                    </a>
                  </label>
                  <input type="file" name="loadphoto" id="imgInputakk">
                  <div class="prophile_show_input-wrapper prophile_photo_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    <p class="prophile_show_input_text">
                      Публиковать в объявлениях
                    </p>
                  </div>
                </div-->
              </div>

              @if(\Auth::user()->getBusinessAccount || $toAccountType=='to_company')
              <div class="prophile_main_wrapper d-flex">
                <div class="col-md-7 flex-column">
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container checkbox_unactive">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    @if(\Auth::user()->getBusinessAccount)
                    <input type="text" class="prophile_main_input" value="{{\Auth::user()->getBusinessAccount->company_name}}" name="company_name" placeholder="Название компании">
                      <span id="company_name" class="errorBlock"></span>
                    @else
                      <input type="text" class="prophile_main_input" name="company_name" placeholder="Название компании">
                  <br>


                    @endif
                    <p class="prophile_required">
                      *
                    </p>
                  </div>
                  <div style="display:block;color:red" id="company_name" class="errorBlock"></div>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container checkbox_unactive">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    @if(\Auth::user()->getBusinessAccount)
                    <input type="text" class="prophile_main_input" name="regNumber" value="{{\Auth::user()->getBusinessAccount->reg_number}}" placeholder="Регистрационный номер">
                    @else
                      <input type="text" class="prophile_main_input" name="regNumber" placeholder="Регистрационный номер">
                      @endif
                    <p class="prophile_required">
                      *
                    </p>
                  </div>
                  <div style="display:block;color:red" id="regNumber" class="errorBlock"></div>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container checkbox_unactive">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
                    @if(\Auth::user()->getBusinessAccount)
                    <input type="text" class="prophile_main_input" name="vatNumber" value="{{\Auth::user()->getBusinessAccount->vat_number}}" placeholder="VAT номер">
                      @else
                      <input type="text" class="prophile_main_input" name="vatNumber" placeholder="VAT номер">

                    @endif
                  </div>
                  <div style="display:block;color:red" id="vatNumber" class="errorBlock"></div>
                </div>
              </div>
              @endif

              <div class="prophile_main_wrapper d-flex">
                <div-- class="col-md-7 col-lg-5 flex-column">
                  <p class="prophile_main_text">
                    Ваш e-mail <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_email" type="checkbox" @if(\Auth::user()->show_email) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="email" class="prophile_main_input" placeholder="E-mail" name="email" value="{{\Auth::user()->email}}">
                    <!--a href="#" class="prophile_change_country">
                      Сменить
                    </a-->
                  </div>
                  <p class="prophile_main_text">
                    Телефон мобильный <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <input type="hidden" class="phone_code" value="{{\Auth::user()->phone_code}}">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_phone" type="checkbox" @if(\Auth::user()->show_phone) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="tel" id="telphone5" name="phone" class="prophile_main_input" value="{{\Auth::user()->phone}}">

                    <!--a href="#" class="prophile_change_country">
                      Сменить
                    </a-->
                  </div>
				  <div style="display:block;color:red" id="phone" class="errorBlock"></div>
                  <!--p class="prophile_main_text">
                    Телефон дополнительный
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden"  name="show_additional_phone" type="checkbox" @if(\Auth::user()->show_additional_phone) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="tel" id="telphone6" name="additional_phone" class="prophile_main_input" value="{{\Auth::user()->additional_phone}}">
                  </div-->
                  <p class="prophile_main_text">
                    Пароль <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper d-flex align-items-center">
                    <input type="text" class="prophile_main_input prophile_password" name="password"  placeholder="************">
                    <a href="#" class="prophile_change_country prophile_change_pass" data-toggle="modal" data-target="#passwordUpdate">
                      Сменить
                    </a>
                  </div>
                </div>
              <!--/div-->
              @if(\Auth::user()->getIndividualAccount || $toAccountType=='to_individual'
              || \Auth::user()->getOrganisationAccount || $toAccountType=='to_organisation'
              || \Auth::user()->getBusinessAccount || $toAccountType=='to_company'
              )
              <div class="prophile_main_wrapper d-flex">
                <div class="col-md-7 flex-column">
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_skype" type="checkbox" @if(\Auth::user()->show_skype) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="text" class="prophile_main_input" name="skype" value="{{\Auth::user()->skype}}" placeholder="Skype ник">

                  </div>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_facebook" type="checkbox" @if(\Auth::user()->show_facebook) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="text" class="prophile_main_input" name="facebook" value="{{\Auth::user()->facebook}}" placeholder="Facebook страница">

                  </div>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_instagram" type="checkbox" @if(\Auth::user()->show_instagram) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="text" class="prophile_main_input" name="instagram" value="{{\Auth::user()->instagram}}" placeholder="Instagram страница">
                  </div>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">
                      <input class="checkbox_hidden" name="show_www" type="checkbox" @if(\Auth::user()->show_www) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    <input type="text" class="prophile_main_input prophile_site" name="www" value="{{\Auth::user()->www}}" placeholder="Веб сайт">
                    <div class="prophile_site_add">
                      <p class="prophile_www">www.</p>
                    </div>
                  </div>
				  <div style="display:block;color:red" id="www" class="errorBlock"></div>
                </div>
              </div>


              @if(\Auth::user()->getIndividualAccount || $toAccountType=='to_individual'
              || \Auth::user()->getOrganisationAccount || $toAccountType=='to_organisation'
              || \Auth::user()->getBusinessAccount || $toAccountType=='to_company'

              )
              <div class="prophile_main_wrapper d-flex flex-wrap">
                <div class="col-md-9 col-lg-5 flex-column">
                  @if(\Auth::user()->getOrganisationAccount || $toAccountType=='to_organisation'
                    || \Auth::user()->getIndividualAccount || $toAccountType=='to_individual')
                    <p class="prophile_main_text">
                      Aдрес <span>*</span>
                    </p>
                    @elseif(\Auth::user()->getBusinessAccount || $toAccountType=='to_company')
                    <p class="prophile_main_text">
                      Юридический адрес <span>*</span>
                    </p>
                  @endif

                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container checkbox_unactive">
                      <input class="checkbox_hidden" name="show_business_address" type="checkbox"
                             @if(isset(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->address
                             || isset(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->address
                             ) checked="checked" @endif>
                      <span class="checkmark"></span>
                    </label>
                    @if((null!=(\Auth::user()->getOrganisationAccount)
                    && \Auth::user()->getOrganisationAccount->address)
                    && null==\Auth::user()->getIndividualAccount
                    )
                    <input type="text" class="prophile_main_input" name="address" value="{{\Auth::user()->getOrganisationAccount->address}}" placeholder="Адрес">
@elseif((null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->address)
&& null==\Auth::user()->getBusinessAccount
)

                      <input type="text" class="prophile_main_input" name="address" value="{{\Auth::user()->getIndividualAccount->address}}" placeholder="Адрес">

                    @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->address)
                      <input type="text" class="prophile_main_input" name="address" value="{{\Auth::user()->getBusinessAccount->address}}" placeholder="Адрес">

                    @else

                      <input type="text" class="prophile_main_input" name="address"  placeholder="Адрес">
                    @endif
                  </div>
				  <div style="display:block;color:red" id="address" class="errorBlock"></div>
                </div>

                <div class="col-md-3 col-lg-7 flex-column">
                  <p class="prophile_main_text prophile_postcode_text prophile_postcode_text_first">
                    Почт. индекс <span>*</span>
                  </p>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper prophile_postcode d-flex align-items-center flex-column">
                    @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->post_code
                    && null==\Auth::user()->getIndividualAccount
                    )
                      <input type="text" class="prophile_main_input" name="postCode" value="{{\Auth::user()->getOrganisationAccount->post_code}}" placeholder="Postcode">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->post_code
                      && null==\Auth::user()->getBusinessAccount
                      )
                      <input type="text" class="prophile_main_input" name="postCode" value="{{\Auth::user()->getIndividualAccount->post_code}}" placeholder="Postcode">
                    @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->post_code)
                      <input type="text" class="prophile_main_input" name="postCode" value="{{\Auth::user()->getBusinessAccount->post_code}}" placeholder="Postcode">


                    @else
                      <input type="text" class="prophile_main_input" name="postCode"  placeholder="Postcode">
                    @endif


                  </div>
				  <div style="display:block;color:red" id="postCode" class="errorBlock"></div>
                </div>

                @if(\Auth::user()->getBusinessAccount || $toAccountType=='to_company')

                <div class="col-md-9 col-lg-5 flex-column">
                  <p class="prophile_main_text">
                    Фактический адрес
                  </p>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container checkbox_unactive">
                      <input class="checkbox_hidden" type="checkbox" checked="checked">
                      <span class="checkmark"></span>
                    </label>
               @if(\Auth::user()->getBusinessAccount && \Auth::user()->getBusinessAccount->phisical_address)
                    <input type="text" class="prophile_main_input" name="phisical_address" value="{{\Auth::user()->getBusinessAccount->phisical_address}}" placeholder="Адрес">
                    @else
                      <input type="text" class="prophile_main_input" name="phisical_address" placeholder="Адрес">
                 @endif
                    <a href="#" class="prophile_adress_question">
                      Если фактический адрес другой
                    </a>
                  </div>
                </div>
                <div class="col-md-3 col-lg-7 flex-column">
                  <p class="prophile_main_text prophile_postcode_text">
                    Почт. индекс
                  </p>
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper prophile_postcode d-flex align-items-center flex-column">
                    @if(\Auth::user()->getBusinessAccount && \Auth::user()->getBusinessAccount->phisical_post_code)
                    <input type="text" class="prophile_main_input" name="phisical_post_code" value="{{\Auth::user()->getBusinessAccount->phisical_post_code}}" placeholder="Postcode">
                    @else
                      <input type="text" class="prophile_main_input" name="phisical_post_code" placeholder="Postcode">
                      @endif
                  </div>
                </div>
                @endif

              </div>
                @endif


              <div class="prophile_main_wrapper d-flex ">
                <div class="col-md-10 col-lg-7 flex-column">
                  <div class="prophile_show_input-wrapper prophile_id_input-wrapper d-flex align-items-center">
                    <label class="checkbox_container">




                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->post_code
                    && null==\Auth::user()->getIndividualAccount
                    )
                        <input type="checkbox" class="checkbox_hidden" name="show_work_hours" value="{{\Auth::user()->getOrganisationAccount->show_work_hours}}"
                        @if(\Auth::user()->getOrganisationAccount->show_work_hours==1)  checked="checked" @endif>
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->show_work_hours
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="checkbox" class="checkbox_hidden" name="show_work_hours" value="{{\Auth::user()->getIndividualAccount->show_work_hours}}"
                               @if(\Auth::user()->getIndividualAccount->show_work_hours==1)  checked="checked" @endif>
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->post_code)
                        <input type="checkbox" class="checkbox_hidden" name="show_work_hours" value="{{\Auth::user()->getBusinessAccount->show_work_hours}}"
                               @if(\Auth::user()->getBusinessAccount->show_work_hours==1)  checked="checked" @endif>

                      @else
                        <input class="checkbox_hidden" type="checkbox" name="show_work_hours" checked="checked">
                      @endif







                      <span class="checkmark"></span>
                    </label>
                    <p class="prophile_hours_text">
                      Время работы
                    </p>
                  </div>
                  <div class="prophile_time_grid">
                    <p class="prophile_day_text">
                      Пн.-Пт.
                    </p>
                    <div class="quantity">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->hours_from_weekday
                   && null==\Auth::user()->getIndividualAccount
                   )
                        <input type="number" min="1" max="24" step="1" name="hours_from_weekday" value="{{\Auth::user()->getOrganisationAccount->hours_from_weekday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->hours_from_weekday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="1" max="24" step="1" name="hours_from_weekday" value="{{\Auth::user()->getIndividualAccount->hours_from_weekday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->hours_from_weekday)
                        <input type="number" min="1" max="24" step="1" name="hours_from_weekday" value="{{\Auth::user()->getBusinessAccount->hours_from_weekday}}">

                      @else
                        <input type="number" min="1" max="24" step="1" name="hours_from_weekday" value="1">
                      @endif








                    </div>
                    <p class="prophile_day_text prophile_day_divider">
                      :
                    </p>
                    <div class="quantity quantity2">
                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->minutes_from_weekday
                && null==\Auth::user()->getIndividualAccount
                )
                        <input type="number" min="0" max="59" step="1" name="minutes_from_weekday" value="{{\Auth::user()->getOrganisationAccount->minutes_from_weekday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->minutes_from_weekday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="0" max="59" step="1" name="minutes_from_weekday" value="{{\Auth::user()->getIndividualAccount->minutes_from_weekday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->minutes_from_weekday)
                        <input type="number" min="0" max="59" step="1" name="minutes_from_weekday" value="{{\Auth::user()->getBusinessAccount->minutes_from_weekday}}">

                      @else
                        <input type="number" min="0" max="59" step="1" name="minutes_from_weekday" value="1">
                      @endif
                    </div>
                    <p class="prophile_day_text prophile_day_divider prophile_day_adddivider">
                      до
                    </p>
                    <div class="quantity">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->hours_till_weekday
                   && null==\Auth::user()->getIndividualAccount
                   )
                        <input type="number" min="1" max="24" step="1" name="hours_till_weekday" value="{{\Auth::user()->getOrganisationAccount->hours_till_weekday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->hours_till_weekday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="1" max="24" step="1" name="hours_till_weekday" value="{{\Auth::user()->getIndividualAccount->hours_till_weekday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->hours_till_weekday)
                        <input type="number" min="1" max="24" step="1" name="hours_till_weekday" value="{{\Auth::user()->getBusinessAccount->hours_till_weekday}}">

                      @else
                        <input type="number" min="1" max="24" step="1" name="hours_till_weekday" value="1">
                      @endif
                    </div>
                    <p class="prophile_day_text prophile_day_divider">
                      :
                    </p>
                    <div class="quantity quantity2">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->minutes_till_weekday
               && null==\Auth::user()->getIndividualAccount
               )
                        <input type="number" min="0" max="59" step="1" name="minutes_from_weekday" value="{{\Auth::user()->getOrganisationAccount->minutes_till_weekday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->minutes_till_weekday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="0" max="59" step="1" name="minutes_till_weekday" value="{{\Auth::user()->getIndividualAccount->minutes_till_weekday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->minutes_till_weekday)
                        <input type="number" min="0" max="59" step="1" name="minutes_till_weekday" value="{{\Auth::user()->getBusinessAccount->minutes_till_weekday}}">

                      @else
                        <input type="number" min="0" max="59" step="1" name="minutes_till_weekday" value="1">
                      @endif


                    </div>
                    <p class="prophile_day_text">
                      Сб.
                    </p>

                    <div class="quantity">





                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->hours_from_saturday
                 && null==\Auth::user()->getIndividualAccount
                 )
                        <input type="number" min="1" max="24" step="1" name="hours_from_saturday" value="{{\Auth::user()->getOrganisationAccount->hours_from_saturday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->hours_from_saturday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="1" max="24" step="1" name="hours_from_saturday" value="{{\Auth::user()->getIndividualAccount->hours_from_saturday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->hours_from_saturday)
                        <input type="number" min="1" max="24" step="1" name="hours_from_saturday" value="{{\Auth::user()->getBusinessAccount->hours_from_saturday}}">

                      @else
                        <input type="number" min="1" max="24" step="1" name="hours_from_saturday" value="1">
                      @endif



                    </div>
                    <p class="prophile_day_text prophile_day_divider">
                      :
                    </p>
                    <div class="quantity quantity2">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->minutes_from_saturday
               && null==\Auth::user()->getIndividualAccount
               )
                        <input type="number" min="0" max="59" step="1" name="minutes_from_saturday" value="{{\Auth::user()->getOrganisationAccount->minutes_from_saturday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->minutes_from_saturday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="0" max="59" step="1" name="minutes_from_saturday" value="{{\Auth::user()->getIndividualAccount->minutes_from_saturday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->minutes_from_saturday)
                        <input type="number" min="0" max="59" step="1" name="minutes_from_saturday" value="{{\Auth::user()->getBusinessAccount->minutes_from_saturday}}">

                      @else
                        <input type="number" min="0" max="59" step="1" name="minutes_from_saturday" value="1">
                      @endif


                    </div>
                    <p class="prophile_day_text prophile_day_divider prophile_day_adddivider">
                      до
                    </p>
                    <div class="quantity">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->hours_till_saturday
                 && null==\Auth::user()->getIndividualAccount
                 )
                        <input type="number" min="1" max="24" step="1" name="hours_till_saturday" value="{{\Auth::user()->getOrganisationAccount->hours_till_saturday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->hours_till_saturday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="1" max="24" step="1" name="hours_till_saturday" value="{{\Auth::user()->getIndividualAccount->hours_till_saturday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->hours_till_saturday)
                        <input type="number" min="1" max="24" step="1" name="hours_till_saturday" value="{{\Auth::user()->getBusinessAccount->hours_till_saturday}}">

                      @else
                        <input type="number" min="1" max="24" step="1" name="hours_till_saturday" value="1">
                      @endif


                    </div>
                    <p class="prophile_day_text prophile_day_divider">
                      :
                    </p>
                    <div class="quantity quantity2">



                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->minutes_till_saturday
               && null==\Auth::user()->getIndividualAccount
               )
                        <input type="number" min="0" max="59" step="1" name="minutes_till_saturday" value="{{\Auth::user()->getOrganisationAccount->minutes_till_saturday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->minutes_till_saturday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="0" max="59" step="1" name="minutes_till_saturday" value="{{\Auth::user()->getIndividualAccount->minutes_till_saturday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->minutes_till_saturday)
                        <input type="number" min="0" max="59" step="1" name="minutes_till_saturday" value="{{\Auth::user()->getBusinessAccount->minutes_till_saturday}}">

                      @else
                        <input type="number" min="0" max="59" step="1" name="minutes_till_saturday" value="1">
                      @endif

                    </div>
                    <p class="prophile_day_text">
                      Вс.
                    </p>

                    <div class="quantity">

                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->hours_from_sunday
                 && null==\Auth::user()->getIndividualAccount
                 )
                        <input type="number" min="1" max="24" step="1" name="hours_from_sunday" value="{{\Auth::user()->getOrganisationAccount->hours_from_sunday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->hours_from_sunday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="1" max="24" step="1" name="hours_from_sunday" value="{{\Auth::user()->getIndividualAccount->hours_from_sunday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount-> hours_from_sunday)
                        <input type="number" min="1" max="24" step="1" name="hours_from_sunday" value="{{\Auth::user()->getBusinessAccount->hours_from_sunday}}">

                      @else
                        <input type="number" min="1" max="24" step="1" name="hours_from_sunday" value="1">
                      @endif

                    </div>
                    <p class="prophile_day_text prophile_day_divider">
                      :
                    </p>
                    <div class="quantity quantity2">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->minutes_from_sunday
                && null==\Auth::user()->getIndividualAccount
                )
                        <input type="number" min="0" max="59" step="1" name="minutes_from_sunday" value="{{\Auth::user()->getOrganisationAccount->minutes_from_sunday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->minutes_from_sunday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="0" max="59" step="1" name="minutes_from_sunday" value="{{\Auth::user()->getIndividualAccount->minutes_from_sunday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->minutes_from_sunday)
                        <input type="number" min="0" max="59" step="1" name="minutes_from_sunday" value="{{\Auth::user()->getBusinessAccount->minutes_from_sunday}}">

                      @else
                        <input type="number" min="0" max="59" step="1" name="minutes_from_sunday" value="1">
                      @endif
                    </div>
                    <p class="prophile_day_text prophile_day_divider prophile_day_adddivider">
                      до
                    </p>
                    <div class="quantity">


                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->hours_till_sunday
                && null==\Auth::user()->getIndividualAccount
                )
                        <input type="number" min="1" max="24" step="1" name="hours_till_sunday" value="{{\Auth::user()->getOrganisationAccount->hours_till_sunday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->hours_till_sunday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="1" max="24" step="1" name="hours_till_sunday" value="{{\Auth::user()->getIndividualAccount->hours_till_sunday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->hours_till_sunday)
                        <input type="number" min="1" max="24" step="1" name="hours_till_sunday" value="{{\Auth::user()->getBusinessAccount->hours_till_sunday}}">

                      @else
                        <input type="number" min="1" max="24" step="1" name="hours_till_sunday" value="1">
                      @endif
                    </div>
                    <p class="prophile_day_text prophile_day_divider">
                      :
                    </p>
                    <div class="quantity quantity2">

                      @if(null!=(\Auth::user()->getOrganisationAccount) && \Auth::user()->getOrganisationAccount->minutes_till_sunday
                 && null==\Auth::user()->getIndividualAccount
                 )
                        <input type="number" min="0" max="59" step="1" name="minutes_till_sunday" value="{{\Auth::user()->getOrganisationAccount->minutes_till_sunday}}">
                      @elseif(null!=(\Auth::user()->getIndividualAccount) && \Auth::user()->getIndividualAccount->minutes_till_sunday
                      && null==\Auth::user()->getBusinessAccount
                      )

                        <input type="number" min="0" max="59" step="1" name="minutes_till_sunday" value="{{\Auth::user()->getIndividualAccount->minutes_till_sunday}}">
                      @elseif(null!=(\Auth::user()->getBusinessAccount) && \Auth::user()->getBusinessAccount->minutes_till_sunday)
                        <input type="number" min="0" max="59" step="1" name="minutes_till_sunday" value="{{\Auth::user()->getBusinessAccount->minutes_till_sunday}}">

                      @else
                        <input type="number" min="0" max="59" step="1" name="minutes_till_sunday" value="1">
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              @endif
              <div class="prophile_main_wrapper prophile_down_wrapper d-flex align-items-center">
                <a href="/export_user_contacts/{{\Auth::user()->id}}" class="prophile_mydata d-flex align-items-center">
                  <img src="/img/data_icon.svg" alt="">Скачать мои данные
                </a>

				<select name="forma" style="position:relative;padding-right:10px;" onchange="location = this.value;">
				<option selected disabled value="Home.php" class="prophile_change_account" style="background-image:url(/img/user_icon_profile.svg);">Сменить вид учётной записи</option>
@if(\Auth::user()->vid_user!='Организация' && \Auth::user()->vid_user!='Предприниматель' &&
                  \Auth::user()->vid_user!='Компания'
                  )

					<option class="prophile_change_account" value="/private_cabinet/to_organisation">Сменить на Организацию</option>

					@endif
                  @if( \Auth::user()->vid_user!='Предприниматель' &&
                 \Auth::user()->vid_user!='Компания'
                 )
					 <option class="prophile_change_account" value="/private_cabinet/to_individual">Сменить на Предприниматель</option>
				@endif
                  @if(\Auth::user()->vid_user!='Компания')

					 <option class="prophile_change_account" value="/private_cabinet/to_company">Сменить на Компанию</option>
					 @endif
				</select>


                <a href="/delete_registration" style="padding-left:20px;" class="prophile_delete_registration">
                  <img src="/img/delete_icon_profile.svg" alt="">Удалить регистрацию
                </a>

                <input type="hidden" name="current_type" value="{{\Auth::user()->vid_user}}">

                      <?
                dump($toAccountType);
                      switch($toAccountType){
                        case 'to_individual':
                          echo '<button type="submit" formaction="/profile/save/to_individual" class="prophile_save ml-auto">';
                          break;
                        case 'to_organisation':
                          echo '<button type="submit" formaction="/profile/save/to_organisation" class="prophile_save ml-auto">';
                          break;
                        case 'to_company':
                          echo '<button type="submit" formaction="/profile/save/to_company" class="prophile_save ml-auto">';
                          break;
                        default:
                          echo '<button type="submit" class="prophile_save ml-auto">';
                      }
                      ?>


                  Сохранить
                <!--/button-->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>


@endsection
@section('scripts')
  <script>



      $(document).ready(function(){
          $('.triggerSwitch').each(function(indx,element){
              console.log('triggerSwitch',$(element).val())
              if($(element).val()==1){
                  $(element).parent().find('.slider').trigger('click')
              }
          })
      })


          $('.active_or_no').find('input').change(function(){


          var message=$(this).parent().parent().find('.customSwitch2_id').val()

          console.log(message);
          var state = $(this).is(":checked")
          console.log('Active or no',state)
          $.ajax({
              method: 'POST',
              dataType: 'json',
              async:true,
              url: '/ad/message_activity_set',
              data: {message: message,state:state
              },
              beforeSend: function() {
              },
              complete: function() {

              },
              success: function (data) {

                  console.log('success')
              }
          });
      })

      function deleteFromFavorites(message_id){

          $.ajax({
              method: 'POST',
              dataType: 'html',
              async:false,
              url: '/add/wishList',
              data: {id: message_id,active:0
              },
              beforeSend: function() {
              },
              complete: function() {
                  $('#favorite_'+message_id).remove()
              },
              success: function (data) {

              }
          });



      }
</script>

  <style>
    #my-profile > div > div.row.flex > div.prophile_main_wrapper.prophile_down_wrapper.d-flex.align-items-center > select{
      height: calc(1.5em + .75rem + 2px);
      padding: .375rem .75rem;
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.5;
      color: #495057;
      background-color: #fff;
      background-clip: padding-box;
      border: 1px solid #ced4da;
      border-radius: .25rem;
      transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
      background: #fff;
      box-shadow: none;
      border-radius: 30px;
    }
  </style>

  <script>

      $("#idForm").submit(function(e) {

          e.preventDefault(); // avoid to execute the actual submit of the form.

          var form = $(this);
          var url = form.attr('action');

          $.ajax({
              type: "POST",
              url: url,
              data: form.serialize(), // serializes the form's elements.
              success: function(data)
              {
                 console.log(data); // show response from the php script.
                  if (data.status=='error'){
                  $('#oldPassword').text(data.message)}
                  else{
                      $('#passwordUpdate').modal('hide')
                  }
              }
          });


      });



      $(document).ready(function() {

         // reloadMessages()
        $('#imgInputBusiness').on('change', function() {
          console.log('imgInputBusiness')
          var fileName = '';
          fileName = $(this).val();
          $('#file-selected-business').html(fileName);


          var imageData = new FormData();
          imageData.append('image', $('#imgInputBusiness')[0].files[0]);

          //Make ajax call here:
          $.ajax({
            url: '/upload-profile-image-ajax',
            type: 'POST',
            processData: false, // important
            contentType: false, // important
            data: imageData,
            beforeSend: function() {
              $("#err").fadeOut();
            },
            success: function(result) {
              if (result == 'invalid file') {
                // invalid file format.
                $("#err").html("Invalid File. Image must be JPEG, PNG or GIF.").fadeIn();
              } else {

                // view uploaded file.
                // $("#image").attr('src', '/' + result);
                /* $("#preview").html(data).fadeIn();*/
                /* $("#form")[0].reset(); */
                //show the remove image button
                /*  $('#file-selected').empty();
                  $("#remove-image").show();
                  $("#custom-file-upload").hide();
                  $("#uploadImage").hide();
                  $("#button").hide();*/
              }
            },
            error: function(result) {
              $("#err").html("errorcity").fadeIn();
            }
          });

        });
          $('#imgInputakk').on('change', function() {
console.log('imgInputakk')
              var fileName = '';
              fileName = $(this).val();
              $('#file-selected').html(fileName);


              var imageData = new FormData();
              imageData.append('image', $('#imgInputakk')[0].files[0]);

              //Make ajax call here:
              $.ajax({
                  url: '/upload-profile-image-ajax',
                  type: 'POST',
                  processData: false, // important
                  contentType: false, // important
                  data: imageData,
                  beforeSend: function() {
                      $("#err").fadeOut();
                  },
                  success: function(result) {
                      if (result == 'invalid file') {
                          // invalid file format.
                          $("#err").html("Invalid File. Image must be JPEG, PNG or GIF.").fadeIn();
                      } else {

                          // view uploaded file.
                         // $("#image").attr('src', '/' + result);
                        /* $("#preview").html(data).fadeIn();*/
                        /* $("#form")[0].reset(); */
                          //show the remove image button
                        /*  $('#file-selected').empty();
                          $("#remove-image").show();
                          $("#custom-file-upload").hide();
                          $("#uploadImage").hide();
                          $("#button").hide();*/
                      }
                  },
                  error: function(result) {
                      $("#err").html("errorcity").fadeIn();
                  }
              });

          });

      });

      if('{{\Auth::user()->country }}'!=''){
          var cnt='{{\Auth::user()->country }}'
      }
      else{var cnt='gb'}

//$('#telphone5,#telphone6').intlTelInput(
//    {
//    onlyCountries:[cnt],
//        preferredCountries:""
//    }
//)


     /* function reloadMessages(){

          var module='staff.roles'
          console.log();
          var url='/cabinet/messagesData';
          $.ajax({
              method: 'POST',
              dataType: 'html',
              async:false,
              url: url,
              data: {module: module},
              beforeSend: function() {
                  $('#loader2').show();
              },
              complete: function() {
				  console.log(778)
                  $('#loader2').hide();
              },
              success: function (data) {
				  console.log(777)
              $('.result_of_messages_table').html(data);

              },error: function (error) {
              console.log(768)
              $('.result_of_messages_table').html('<br>'+
              '<h3 style="color:grey">Вам пока нет сообщений</h3>'+
			  '<div class="choosen_item-wrapper d-flex" style="height:300px"></div>'
			  );

            }
          });
      }*/

      $('.edit_ad').click(function(){
        var id = $(this).parent().find('.customSwitch2_id').val()
        console.log(id)
        window.location.href='/ads/'+id+'/edit/'
      })

      $("#GoBusinessForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        var url = form.attr('action');

        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(), // serializes the form's elements.
          success: function(data)
          {
            console.log(data); // show response from the php script.
            if (data.status=='error'){
              $('#oldPassword').text(data.message)}
            else{
              $('#passwordUpdate').modal('hide')
            }
            $('#goToBusinessUsersModal').modal('hide')
          }
        });


      });


$('.show_ad').click(function() {
	console.log($(this).attr("data-id"))
    document.location.href='/ads/'+$(this).attr('data-id');
});
$('#telphone5').focusout(function() {
  var code = $('.iti__selected-dial-code').text().split('+')[1]
  $('#code').val('+'+code)
})

  </script>

@endsection

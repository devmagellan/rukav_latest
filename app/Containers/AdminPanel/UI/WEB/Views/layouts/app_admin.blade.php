<!DOCTYPE html>
<!--
Template Name:  SmartAdmin Responsive WebApp - Template build with Twitter Bootstrap 4
Version: 4.0.2
Author: Sunnyat Ahmmed
Website: http://gootbootstrap.com
Purchase: https://wrapbootstrap.com/theme/smartadmin-responsive-webapp-WB0573SK0
License: You must have a valid license purchased only from wrapbootstrap.com (link above) in order to legally use this theme for your project.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        Marketing Dashboard - Application Intel - SmartAdmin v4.0.2
    </title>
    <meta name="description" content="Marketing Dashboard">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <!-- Call App Mode on ios devices -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no">
    <!-- CSRF Token -->
    <meta name="csrf-token" id="csrf-token" content="{!! csrf_token() !!} ">
    <!-- base css -->
    <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/vendors.bundle.css">
    <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/app.bundle.css">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" sizes="180x180" href="/templates/smartadmin/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/templates/smartadmin/img/favicon/favicon-32x32.png">
    <link rel="mask-icon" href="/templates/smartadmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/datagrid/datatables/datatables.bundle.css">
  <link rel="stylesheet" media="screen, print" href="https://stackpath.bootstrapcdn.com/font-awesome/5.14.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/87c575d6be.js" crossorigin="anonymous"></script>


    @yield('styles')
</head>
<body class="mod-bg-1 ">
<!-- DOC: script to save and load page settings -->
<script>
    /**
     *	This script should be placed right after the body tag for fast execution
     *	Note: the script is written in pure javascript and does not depend on thirdparty library
     **/
    'use strict';

    var classHolder = document.getElementsByTagName("BODY")[0],
        /**
         * Load from localstorage
         **/
        themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {},
        themeURL = themeSettings.themeURL || '',
        themeOptions = themeSettings.themeOptions || '';
    /**
     * Load theme options
     **/
    if (themeSettings.themeOptions)
    {
        classHolder.className = themeSettings.themeOptions;
        console.log("%c✔ Theme settings loaded", "color: #148f32");
    }
    else
    {
        console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
    }
    if (themeSettings.themeURL && !document.getElementById('mytheme'))
    {
        var cssfile = document.createElement('link');
        cssfile.id = 'mytheme';
        cssfile.rel = 'stylesheet';
        cssfile.href = themeURL;
        document.getElementsByTagName('head')[0].appendChild(cssfile);
    }
    /**
     * Save to localstorage
     **/
    var saveSettings = function()
    {
        themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
        {
            return /^(nav|header|mod|display)-/i.test(item);
        }).join(' ');
        if (document.getElementById('mytheme'))
        {
            themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
        };
        localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
    }
    /**
     * Reset settings
     **/
    var resetSettings = function()
    {
        localStorage.setItem("themeSettings", "");
    }

</script>
@yield('theme_scripts')
<!-- BEGIN Page Wrapper -->
<div class="page-wrapper">
    <div class="page-inner">
        <!-- BEGIN Left Aside -->
@include('adminpanel::layouts.aside')

        <!-- END Left Aside -->
        <div class="page-content-wrapper">
            <!-- BEGIN Page Header -->
        @include('adminpanel::layouts.header')
            <!-- END Page Header -->
            <!-- BEGIN Page Content -->
            <!-- the #js-page-content id is needed for some plugins to initialize -->
@yield('content')
            <!-- this overlay is activated only when mobile menu is triggered -->
            <div class="page-content-overlay" data-action="toggle" data-class="mobile-nav-on"></div> <!-- END Page Content -->
            <!-- BEGIN Page Footer -->
          @include('adminpanel::layouts.footer')
            <!-- END Page Footer -->
            <!-- BEGIN Shortcuts -->
            <div class="modal fade modal-backdrop-transparent" id="modal-shortcut" tabindex="-1" role="dialog" aria-labelledby="modal-shortcut" aria-hidden="true">
                <div class="modal-dialog modal-dialog-top modal-transparent" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <ul class="app-list w-auto h-auto p-0 text-left">
                                <li>
                                    <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                        <div class="icon-stack">
                                            <i class="base base-7 icon-stack-3x opacity-100 color-primary-500 "></i>
                                            <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                            <i class="fal fa-home icon-stack-1x opacity-100 color-white"></i>
                                        </div>
                                        <span class="app-list-name">
                                                    Home
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="page_inbox_general.html" class="app-list-item text-white border-0 m-0">
                                        <div class="icon-stack">
                                            <i class="base base-7 icon-stack-3x opacity-100 color-success-500 "></i>
                                            <i class="base base-7 icon-stack-2x opacity-100 color-success-300 "></i>
                                            <i class="ni ni-envelope icon-stack-1x text-white"></i>
                                        </div>
                                        <span class="app-list-name">
                                                    Inbox
                                                </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="intel_introduction.html" class="app-list-item text-white border-0 m-0">
                                        <div class="icon-stack">
                                            <i class="base base-7 icon-stack-2x opacity-100 color-primary-300 "></i>
                                            <i class="fal fa-plus icon-stack-1x opacity-100 color-white"></i>
                                        </div>
                                        <span class="app-list-name">
                                                    Add More
                                                </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Shortcuts -->
            <!-- BEGIN Color profile -->
            <!-- this area is hidden and will not be seen on screens or screen readers -->
            <!-- we use this only for CSS color refernce for JS stuff -->
            <p id="js-color-profile" class="d-none">
                <span class="color-primary-50"></span>
                <span class="color-primary-100"></span>
                <span class="color-primary-200"></span>
                <span class="color-primary-300"></span>
                <span class="color-primary-400"></span>
                <span class="color-primary-500"></span>
                <span class="color-primary-600"></span>
                <span class="color-primary-700"></span>
                <span class="color-primary-800"></span>
                <span class="color-primary-900"></span>
                <span class="color-info-50"></span>
                <span class="color-info-100"></span>
                <span class="color-info-200"></span>
                <span class="color-info-300"></span>
                <span class="color-info-400"></span>
                <span class="color-info-500"></span>
                <span class="color-info-600"></span>
                <span class="color-info-700"></span>
                <span class="color-info-800"></span>
                <span class="color-info-900"></span>
                <span class="color-danger-50"></span>
                <span class="color-danger-100"></span>
                <span class="color-danger-200"></span>
                <span class="color-danger-300"></span>
                <span class="color-danger-400"></span>
                <span class="color-danger-500"></span>
                <span class="color-danger-600"></span>
                <span class="color-danger-700"></span>
                <span class="color-danger-800"></span>
                <span class="color-danger-900"></span>
                <span class="color-warning-50"></span>
                <span class="color-warning-100"></span>
                <span class="color-warning-200"></span>
                <span class="color-warning-300"></span>
                <span class="color-warning-400"></span>
                <span class="color-warning-500"></span>
                <span class="color-warning-600"></span>
                <span class="color-warning-700"></span>
                <span class="color-warning-800"></span>
                <span class="color-warning-900"></span>
                <span class="color-success-50"></span>
                <span class="color-success-100"></span>
                <span class="color-success-200"></span>
                <span class="color-success-300"></span>
                <span class="color-success-400"></span>
                <span class="color-success-500"></span>
                <span class="color-success-600"></span>
                <span class="color-success-700"></span>
                <span class="color-success-800"></span>
                <span class="color-success-900"></span>
                <span class="color-fusion-50"></span>
                <span class="color-fusion-100"></span>
                <span class="color-fusion-200"></span>
                <span class="color-fusion-300"></span>
                <span class="color-fusion-400"></span>
                <span class="color-fusion-500"></span>
                <span class="color-fusion-600"></span>
                <span class="color-fusion-700"></span>
                <span class="color-fusion-800"></span>
                <span class="color-fusion-900"></span>
            </p>
            <!-- END Color profile -->
        </div>
    </div>
</div>
<!-- END Page Wrapper -->
<!-- BEGIN Quick Menu -->
<!-- to add more items, please make sure to change the variable '$menu-items: number;' in your _page-components-shortcut.scss -->
<nav class="shortcut-menu d-none d-sm-block">
    <input type="checkbox" class="menu-open" name="menu-open" id="menu_open" />
    <label for="menu_open" class="menu-open-button ">
        <span class="app-shortcut-icon d-block"></span>
    </label>
    <a href="#" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Scroll Top">
        <i class="fal fa-arrow-up"></i>
    </a>
    <a href="page_login_alt.html" class="menu-item btn" data-toggle="tooltip" data-placement="left" title="Logout">
        <i class="fal fa-sign-out"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-fullscreen" data-toggle="tooltip" data-placement="left" title="Full Screen">
        <i class="fal fa-expand"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-print" data-toggle="tooltip" data-placement="left" title="Print page">
        <i class="fal fa-print"></i>
    </a>
    <a href="#" class="menu-item btn" data-action="app-voice" data-toggle="tooltip" data-placement="left" title="Voice command">
        <i class="fal fa-microphone"></i>
    </a>
</nav>
<!-- END Quick Menu -->
<!-- BEGIN Messenger -->
<div class="modal fade js-modal-messenger modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right">
        <div class="modal-content h-100">
            <div class="dropdown-header bg-trans-gradient d-flex align-items-center w-100">
                <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                            <span class="mr-2">
                                <span class="rounded-circle profile-image d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
                            </span>
                    <div class="info-card-text">
                        <a href="javascript:void(0);" class="fs-lg text-truncate text-truncate-lg text-white" data-toggle="dropdown" aria-expanded="false">
                            Tracey Chang
                            <i class="fal fa-angle-down d-inline-block ml-1 text-white fs-md"></i>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Send Email</a>
                            <a class="dropdown-item" href="#">Create Appointment</a>
                            <a class="dropdown-item" href="#">Block User</a>
                        </div>
                        <span class="text-truncate text-truncate-md opacity-80">IT Director</span>
                    </div>
                </div>
                <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body p-0 h-100 d-flex">
                <!-- BEGIN msgr-list -->
                <div class="msgr-list d-flex flex-column bg-faded border-faded border-top-0 border-right-0 border-bottom-0 position-absolute pos-top pos-bottom">
                    <div>
                        <div class="height-4 width-3 h3 m-0 d-flex justify-content-center flex-column color-primary-500 pl-3 mt-2">
                            <i class="fal fa-search"></i>
                        </div>
                        <input type="text" class="form-control bg-white" id="msgr_listfilter_input" placeholder="Filter contacts" aria-label="FriendSearch" data-listfilter="#js-msgr-listfilter">
                    </div>
                    <div class="flex-1 h-100 custom-scroll">
                        <div class="w-100">
                            <ul id="js-msgr-listfilter" class="list-unstyled m-0">
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="tracey chang online">
                                        <div class="d-table-cell align-middle status status-success status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-d.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Tracey Chang
                                                <small class="d-block font-italic text-success fs-xs">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="oliver kopyuv online">
                                        <div class="d-table-cell align-middle status status-success status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-b.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Oliver Kopyuv
                                                <small class="d-block font-italic text-success fs-xs">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="dr john cook phd away">
                                        <div class="d-table-cell align-middle status status-warning status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-e.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Dr. John Cook PhD
                                                <small class="d-block font-italic fs-xs">
                                                    Away
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney online">
                                        <div class="d-table-cell align-middle status status-success status-sm ">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-g.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Ali Amdaney
                                                <small class="d-block font-italic fs-xs text-success">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="sarah mcbrook online">
                                        <div class="d-table-cell align-middle status status-success status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-h.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                Sarah McBrook
                                                <small class="d-block font-italic fs-xs text-success">
                                                    Online
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
                                        <div class="d-table-cell align-middle status status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-a.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                oliver.kopyuv@gotbootstrap.com
                                                <small class="d-block font-italic fs-xs">
                                                    Offline
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney busy">
                                        <div class="d-table-cell align-middle status status-danger status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-j.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                oliver.kopyuv@gotbootstrap.com
                                                <small class="d-block font-italic fs-xs text-danger">
                                                    Busy
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney offline">
                                        <div class="d-table-cell align-middle status status-sm">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-c.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                oliver.kopyuv@gotbootstrap.com
                                                <small class="d-block font-italic fs-xs">
                                                    Offline
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-table w-100 px-2 py-2 text-dark hover-white" data-filter-tags="ali amdaney inactive">
                                        <div class="d-table-cell align-middle">
                                            <span class="profile-image-md rounded-circle d-block" style="background-image:url('/templates/smartadmin/img/demo/avatars/avatar-m.png'); background-size: cover;"></span>
                                        </div>
                                        <div class="d-table-cell w-100 align-middle pl-2 pr-2">
                                            <div class="text-truncate text-truncate-md">
                                                +714651347790
                                                <small class="d-block font-italic fs-xs opacity-50">
                                                    Missed Call
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            <div class="filter-message js-filter-message"></div>
                        </div>
                    </div>
                    <div>
                        <a class="fs-xl d-flex align-items-center p-3">
                            <i class="fal fa-cogs"></i>
                        </a>
                    </div>
                </div>
                <!-- END msgr-list -->
                <!-- BEGIN msgr -->
                <div class="msgr d-flex h-100 flex-column bg-white">
                    <!-- BEGIN custom-scroll -->
                    <div class="custom-scroll flex-1 h-100">
                        <div id="chat_container" class="w-100 p-4">
                            <!-- start .chat-segment -->
                            <div class="chat-segment">
                                <div class="time-stamp text-center mb-2 fw-400">
                                    Jun 19
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-sent">
                                <div class="chat-message">
                                    <p>
                                        Hey Tracey, did you get my files?
                                    </p>
                                </div>
                                <div class="text-right fw-300 text-muted mt-1 fs-xs">
                                    3:00 pm
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get">
                                <div class="chat-message">
                                    <p>
                                        Hi
                                    </p>
                                    <p>
                                        Sorry going through a busy time in office. Yes I analyzed the solution.
                                    </p>
                                    <p>
                                        It will require some resource, which I could not manage.
                                    </p>
                                </div>
                                <div class="fw-300 text-muted mt-1 fs-xs">
                                    3:24 pm
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-sent chat-start">
                                <div class="chat-message">
                                    <p>
                                        Okay
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-sent chat-end">
                                <div class="chat-message">
                                    <p>
                                        Sending you some dough today, you can allocate the resources to this project.
                                    </p>
                                </div>
                                <div class="text-right fw-300 text-muted mt-1 fs-xs">
                                    3:26 pm
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get chat-start">
                                <div class="chat-message">
                                    <p>
                                        Perfect. Thanks a lot!
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get">
                                <div class="chat-message">
                                    <p>
                                        I will have them ready by tonight.
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment -->
                            <div class="chat-segment chat-segment-get chat-end">
                                <div class="chat-message">
                                    <p>
                                        Cheers
                                    </p>
                                </div>
                            </div>
                            <!--  end .chat-segment -->
                            <!-- start .chat-segment for timestamp -->
                            <div class="chat-segment">
                                <div class="time-stamp text-center mb-2 fw-400">
                                    Jun 20
                                </div>
                            </div>
                            <!--  end .chat-segment for timestamp -->
                        </div>
                    </div>
                    <!-- END custom-scroll  -->
                    <!-- BEGIN msgr__chatinput -->
                    <div class="d-flex flex-column">
                        <div class="border-faded border-right-0 border-bottom-0 border-left-0 flex-1 mr-3 ml-3 position-relative shadow-top">
                            <div class="pt-3 pb-1 pr-0 pl-0 rounded-0" tabindex="-1">
                                <div id="msgr_input" contenteditable="true" data-placeholder="Type your message here..." class="height-10 form-content-editable"></div>
                            </div>
                        </div>
                        <div class="height-8 px-3 d-flex flex-row align-items-center flex-wrap flex-shrink-0">
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl width-1 mr-1" data-toggle="tooltip" data-original-title="More options" data-placement="top">
                                <i class="fal fa-ellipsis-v-alt color-fusion-300"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Attach files" data-placement="top">
                                <i class="fal fa-paperclip color-fusion-300"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-icon fs-xl mr-1" data-toggle="tooltip" data-original-title="Insert photo" data-placement="top">
                                <i class="fal fa-camera color-fusion-300"></i>
                            </a>
                            <div class="ml-auto">
                                <a href="javascript:void(0);" class="btn btn-info">Send</a>
                            </div>
                        </div>
                    </div>
                    <!-- END msgr__chatinput -->
                </div>
                <!-- END msgr -->
            </div>
        </div>
    </div>
</div>
<!-- END Messenger -->
<!-- BEGIN Page Settings -->
<div class="modal fade js-modal-settings modal-backdrop-transparent" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right modal-md">
        <div class="modal-content">
            <div class="dropdown-header bg-trans-gradient d-flex justify-content-center align-items-center w-100">
                <h4 class="m-0 text-center color-white">
                    Layout Settings
                    <small class="mb-0 opacity-80">User Interface Settings</small>
                </h4>
                <button type="button" class="close text-white position-absolute pos-top pos-right p-2 m-1 mr-2" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body p-0">
                <div class="settings-panel">
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                App Layout
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="fh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="header-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Header</span>
                        <span class="onoffswitch-title-desc">header is in a fixed at all times</span>
                    </div>
                    <div class="list" id="nff">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-fixed"></a>
                        <span class="onoffswitch-title">Fixed Navigation</span>
                        <span class="onoffswitch-title-desc">left panel is fixed</span>
                    </div>
                    <div class="list" id="nfm">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-minify"></a>
                        <span class="onoffswitch-title">Minify Navigation</span>
                        <span class="onoffswitch-title-desc">Skew nav to maximize space</span>
                    </div>
                    <div class="list" id="nfh">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-hidden"></a>
                        <span class="onoffswitch-title">Hide Navigation</span>
                        <span class="onoffswitch-title-desc">roll mouse on edge to reveal</span>
                    </div>
                    <div class="list" id="nft">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-function-top"></a>
                        <span class="onoffswitch-title">Top Navigation</span>
                        <span class="onoffswitch-title-desc">Relocate left pane to top</span>
                    </div>
                    <div class="list" id="mmb">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-main-boxed"></a>
                        <span class="onoffswitch-title">Boxed Layout</span>
                        <span class="onoffswitch-title-desc">Encapsulates to a container</span>
                    </div>
                    <div class="expanded">
                        <ul class="">
                            <li>
                                <div class="bg-fusion-50" data-action="toggle" data-class="mod-bg-1"></div>
                            </li>
                            <li>
                                <div class="bg-warning-200" data-action="toggle" data-class="mod-bg-2"></div>
                            </li>
                            <li>
                                <div class="bg-primary-200" data-action="toggle" data-class="mod-bg-3"></div>
                            </li>
                            <li>
                                <div class="bg-success-300" data-action="toggle" data-class="mod-bg-4"></div>
                            </li>
                        </ul>
                        <div class="list" id="mbgf">
                            <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-fixed-bg"></a>
                            <span class="onoffswitch-title">Fixed Background</span>
                        </div>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Mobile Menu
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="nmp">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-push"></a>
                        <span class="onoffswitch-title">Push Content</span>
                        <span class="onoffswitch-title-desc">Content pushed on menu reveal</span>
                    </div>
                    <div class="list" id="nmno">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-no-overlay"></a>
                        <span class="onoffswitch-title">No Overlay</span>
                        <span class="onoffswitch-title-desc">Removes mesh on menu reveal</span>
                    </div>
                    <div class="list" id="sldo">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="nav-mobile-slide-out"></a>
                        <span class="onoffswitch-title">Off-Canvas <sup>(beta)</sup></span>
                        <span class="onoffswitch-title-desc">Content overlaps menu</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Accessibility
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="mbf">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-bigger-font"></a>
                        <span class="onoffswitch-title">Bigger Content Font</span>
                        <span class="onoffswitch-title-desc">content fonts are bigger for readability</span>
                    </div>
                    <div class="list" id="mhc">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-high-contrast"></a>
                        <span class="onoffswitch-title">High Contrast Text (WCAG 2 AA)</span>
                        <span class="onoffswitch-title-desc">4.5:1 text contrast ratio</span>
                    </div>
                    <div class="list" id="mcb">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-color-blind"></a>
                        <span class="onoffswitch-title">Daltonism <sup>(beta)</sup> </span>
                        <span class="onoffswitch-title-desc">color vision deficiency</span>
                    </div>
                    <div class="list" id="mpc">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-pace-custom"></a>
                        <span class="onoffswitch-title">Preloader Inside</span>
                        <span class="onoffswitch-title-desc">preloader will be inside content</span>
                    </div>
                    <div class="mt-4 d-table w-100 px-5">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Global Modifications
                            </h5>
                        </div>
                    </div>
                    <div class="list" id="mcbg">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-clean-page-bg"></a>
                        <span class="onoffswitch-title">Clean Page Background</span>
                        <span class="onoffswitch-title-desc">adds more whitespace</span>
                    </div>
                    <div class="list" id="mhni">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-nav-icons"></a>
                        <span class="onoffswitch-title">Hide Navigation Icons</span>
                        <span class="onoffswitch-title-desc">invisible navigation icons</span>
                    </div>
                    <div class="list" id="dan">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-disable-animation"></a>
                        <span class="onoffswitch-title">Disable CSS Animation</span>
                        <span class="onoffswitch-title-desc">Disables CSS based animations</span>
                    </div>
                    <div class="list" id="mhic">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-hide-info-card"></a>
                        <span class="onoffswitch-title">Hide Info Card</span>
                        <span class="onoffswitch-title-desc">Hides info card from left panel</span>
                    </div>
                    <div class="list" id="mlph">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-lean-subheader"></a>
                        <span class="onoffswitch-title">Lean Subheader</span>
                        <span class="onoffswitch-title-desc">distinguished page header</span>
                    </div>
                    <div class="list" id="mnl">
                        <a href="#" onclick="return false;" class="btn btn-switch" data-action="toggle" data-class="mod-nav-link"></a>
                        <span class="onoffswitch-title">Hierarchical Navigation</span>
                        <span class="onoffswitch-title-desc">Clear breakdown of nav links</span>
                    </div>
                    <div class="list mt-1">
                        <span class="onoffswitch-title">Global Font Size <small>(RESETS ON REFRESH)</small> </span>
                        <div class="btn-group btn-group-sm btn-group-toggle my-2" data-toggle="buttons">
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-sm" data-target="html">
                                <input type="radio" name="changeFrontSize"> SM
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text" data-target="html">
                                <input type="radio" name="changeFrontSize" checked=""> MD
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-lg" data-target="html">
                                <input type="radio" name="changeFrontSize"> LG
                            </label>
                            <label class="btn btn-default btn-sm" data-action="toggle-swap" data-class="root-text-xl" data-target="html">
                                <input type="radio" name="changeFrontSize"> XL
                            </label>
                        </div>
                        <span class="onoffswitch-title-desc d-block mb-0">Change <strong>root</strong> font size to effect rem
                                    values</span>
                    </div>
                    <hr class="mb-0 mt-4">
                    <div class="mt-2 d-table w-100 pl-5 pr-3">
                        <div class="fs-xs text-muted p-2 alert alert-warning mt-3 mb-2">
                            <i class="fal fa-exclamation-triangle text-warning mr-2"></i>The settings below uses localStorage to load
                            the external CSS file as an overlap to the base css. Due to network latency and CPU utilization, you may
                            experience a brief flickering effect on page load which may show the intial applied theme for a split
                            second. Setting the prefered style/theme in the header will prevent this from happening.
                        </div>
                    </div>
                    <div class="mt-2 d-table w-100 pl-5 pr-3">
                        <div class="d-table-cell align-middle">
                            <h5 class="p-0">
                                Theme colors
                            </h5>
                        </div>
                    </div>
                    <div class="expanded theme-colors pl-5 pr-3">
                        <ul class="m-0">
                            <li>
                                <a href="#" id="myapp-0" data-action="theme-update" data-themesave data-theme="" data-toggle="tooltip" data-placement="top" title="Wisteria (base css)" data-original-title="Wisteria (base css)"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-1" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-1.css')}}" data-toggle="tooltip" data-placement="top" title="Tapestry" data-original-title="Tapestry"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-2" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-2.css')}}" data-toggle="tooltip" data-placement="top" title="Atlantis" data-original-title="Atlantis"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-3" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-3.css')}}" data-toggle="tooltip" data-placement="top" title="Indigo" data-original-title="Indigo"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-4" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-4.css')}}" data-toggle="tooltip" data-placement="top" title="Dodger Blue" data-original-title="Dodger Blue"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-5" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-5.css')}}" data-toggle="tooltip" data-placement="top" title="Tradewind" data-original-title="Tradewind"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-6" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-6.css')}}" data-toggle="tooltip" data-placement="top" title="Cranberry" data-original-title="Cranberry"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-7" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-7.css')}}" data-toggle="tooltip" data-placement="top" title="Oslo Gray" data-original-title="Oslo Gray"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-8" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-8.css')}}" data-toggle="tooltip" data-placement="top" title="Chetwode Blue" data-original-title="Chetwode Blue"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-9" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-9.css')}}" data-toggle="tooltip" data-placement="top" title="Apricot" data-original-title="Apricot"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-10" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-10.css')}}" data-toggle="tooltip" data-placement="top" title="Blue Smoke" data-original-title="Blue Smoke"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-11" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-11.css')}}" data-toggle="tooltip" data-placement="top" title="Green Smoke" data-original-title="Green Smoke"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-12" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-12.css')}}" data-toggle="tooltip" data-placement="top" title="Wild Blue Yonder" data-original-title="Wild Blue Yonder"></a>
                            </li>
                            <li>
                                <a href="#" id="myapp-13" data-action="theme-update" data-themesave data-theme="{{public_path('templates/smartadmin/css/themes/cust-theme-13.css')}}" data-toggle="tooltip" data-placement="top" title="Emerald" data-original-title="Emerald"></a>
                            </li>
                        </ul>
                    </div>
                    <hr class="mb-0 mt-4">
                    <div class="pl-5 pr-3 py-3 bg-faded">
                        <div class="row no-gutters">
                            <div class="col-6 pr-1">
                                <a href="#" class="btn btn-outline-danger fw-500 btn-block" data-action="app-reset">Reset Settings</a>
                            </div>
                            <div class="col-6 pl-1">
                                <a href="#" class="btn btn-danger fw-500 btn-block" data-action="factory-reset">Factory Reset</a>
                            </div>
                        </div>
                    </div>
                </div> <span id="saving"></span>
            </div>
        </div>
    </div>
</div>
<!-- END Page Settings -->
<!-- base vendor bundle:
			 DOC: if you remove pace.js from core please note on Internet Explorer some CSS animations may execute before a page is fully loaded, resulting 'jump' animations
						+ pace.js (recommended)
						+ jquery.js (core)
						+ jquery-ui-cust.js (core)
						+ popper.js (core)
						+ bootstrap.js (core)
						+ slimscroll.js (extension)
						+ app.navigation.js (core)
						+ ba-throttle-debounce.js (core)
						+ waves.js (extension)
						+ smartpanels.js (extension)
						+ src/../jquery-snippets.js (core) -->
<script src="/templates/smartadmin/js/vendors.bundle.js"></script>
<script src="/templates/smartadmin/js/app.bundle.js"></script>
<script src="/templates/smartadmin/js/formplugins/select2/select2.bundle.js"></script>




<script type="text/javascript">
    /* Activate smart panels */
    $('#js-page-content').smartPanel();

    $(".add_foto_file_delete_present").on("click", function(){
        var current_img=$(this).parent().parent().find('.add_foto_file_img').attr('src');
        console.log('event',current_img);
        var photo = $(this).closest(".upload-file-container-text").find(".photo");

        $(photo)[0].value = "";
        $(photo).closest(".upload-file-container-text").find('.add_foto_file_img').attr('src', '');
        $(photo).closest(".upload-file-container-text").find('.add_foto_file_item_load').show();
        $(photo).closest(".upload-file-container-text").find('.add_foto_file_img_wrapper').hide();
        console.log($(photo));
        var present_id=$($(this).parent().find('.add_foto_file_item_load2')[0])[0].attributes.id.nodeValue.split('_')[1];
        console.log(present_id)

        $(this).closest('.add_foto_file_item').remove()
        $('.add_foto_file_wrapper').append( '<div class="add_foto_file_item">'+
            '<div class="upload-file-container-text">'+
            '<label for="imgInput2" class="add_foto_file_item_load">'+
            '<img src="/img/photo-camera-icon.svg" alt="">'+
            '<span>Добавить фото</span>'+
            '</label>'+
            '<div class="add_foto_file_img_wrapper">'+
            '<img  src="#" alt="" class="add_foto_file_img" />'+
            '<div class="add_foto_file_block_hover">'+
            ' <label for="imgInput'+present_id+'" class="add_foto_file_item_load2">'+
            '<img src="/img/refresh_icon.svg" alt="">'+
            '</label>'+
            '<div class="add_foto_file_delete">'+
            '<img src="/img/delete-icon.svg" alt="">'+
            '</div>'+
            '</div>'+
            '</div>'+
            '<input type="file" name="files[]" class="photo" id="imgInput'+present_id+'"/>'+
            '</div>'+
            '</div>');
        var add_id=$(this).parent().parent().find('.add_id').val();
        $.ajax({
            type: "POST",
            dataType: 'json',
            async: false,
            url: '/add_deleted_imgs_to_session',
            data: {img:current_img,id:add_id},
            success: function (wata) {

            }

        });


        current_img




    });
</script>
<script src="/templates/smartadmin/js/formplugins/dropzone/dropzone.js"></script>
<script>

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    })
    function logout(){
        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/logout',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            beforeSend: function() {
            },
            complete: function() {
                location.reload(true);
            },
            success: function (data) {
            }
        });
    }

</script>


<script>

    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    Dropzone.autoDiscover = false;
    var accept = ".xls,.xlsx";
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var DZ = $('#mydropzone').dropzone({
            url: "/wholesalers/import",
            data : {
                "_token": $('#csrf-token')[0].content  //pass the CSRF_TOKEN()
            },
            autoProcessQueue: true,
            uploadMultiple: false,
            addRemoveLinks: true,
            acceptedFiles: accept,
            createImageThumbnails: false,
            init: function(){
                this.on("addedfile", handleFileAdded);
                this.on("removedfile", handleFileRemoved);
                this.on("error", function(file){if (!file.accepted) this.removeFile(file);});
            }
        });
    });



</script>
<div id="map" style="display:none"></div>
@yield('scripts')

<script>
  console.log('876')
  function initContinued(addr,ajax) {
    console.log('aJax=>',ajax)
    if(!addr.city){
      city=addr.postal_town
    }
    else{
      city=addr.city
    }
    if(ajax){
      $.ajax({
        method: 'POST',
        dataType: 'json',
        async:false,
        url: '/customer/badge/send',
        data: {location:window.location_place_id,city:city,administrative:addr.administrative,customer: window.customer,message:window.message,
          category:window.category,title:window.title,visibility:window.visibility
        },
        beforeSend: function() {
        },
        complete: function() {
          $('.company_create_close').trigger('click')
        },
        success: function (data) {

          $('#badges_modal').modal("hide");
          $(".modal-backdrop").remove();
          $('.categoryModalClose').trigger('click')
          $('.company_create_close').trigger('click')
          $('.modal-backdrop').removeClass('show').addClass('hide')



          console.log('success')

        }
      });
    }
    else{
      console.log(890)
      window.uk_only=$('#uk_only').val()
      window.location.replace("/search?search_string="+window.search_field+"&city="+addr.city+"&administrative="+addr.administrative+"&uk_only="+window.uk_only);
    }

  }


  function getCity(latlng) {
    geocoder.geocode({'latLng': latlng}, function (results) {
      var result = [];
      for (i = 0; i < results.length; i++) {
        console.log(results[i].address_components)
        if (results[i].address_components[0].types[0] == "locality") {
          console.log(i + ": locality:" + results[i].address_components[0].long_name);
          result.city = results[i].address_components[0].long_name;
          console.log(result.city)

          $('#city').val(result.city)
        }
        if (results[i].address_components[0].types[0] == "administrative_area_level_1") {
          console.log(i + ": administrative_area_level_1:" + results[i].address_components[0].long_name);
          result.administrative = results[i].address_components[0].long_name;
          $('#administrative').val(result.administrative)
        }
        if (results[i].address_components[0].types[0] == "administrative_area_level_2") {
          console.log(i + ": administrative_area_level_2:" + results[i].address_components[0].long_name);
          result.administrative_2 = results[i].address_components[0].long_name;
        }
        if (results[i].address_components[0].types[0] == "postal_town") {
          console.log(i + ": postal_town:" + results[i].address_components[0].long_name);
          result.postal_town = results[i].address_components[0].long_name;
        }
        if (results[i].address_components[0].types[0] == "political") {

          console.log(i + ": political:" + results[i].address_components[0].long_name);
        }
        if (results[i].address_components[0].types[0] == "country") {

          console.log(i + ": country:" + results[i].address_components[0].long_name);
          if(results[i].address_components[0].long_name!='United Kingdom'){
            $('#administrative').val(results[i].address_components[0].long_name)
          }
        }
        for (var j = 0; j < results[i].address_components.length; j++) {
          for (var k = 0; k < results[i].address_components[j].types.length; k++) {
            if (results[i].address_components[j].types[k] == "postal_code") {
              zipcode = results[i].address_components[j].short_name;
              //$('span.zip').html(zipcode);

            }
          }
        }
      }





      console.log('result=>', result)

    });
  }

  function codeLatLng(latlng,ajax) {
    geocoder.geocode({'latLng': latlng}, function (results) {
      var result = [];
      for (i = 0; i < results.length; i++) {
        console.log(results[i].address_components)
        if (results[i].address_components[0].types[0] == "locality") {
          console.log(i + ": locality:" + results[i].address_components[0].long_name);
          result.city = results[i].address_components[0].long_name;
          console.log(result.city)

        }
        if (results[i].address_components[0].types[0] == "administrative_area_level_1") {
          console.log(i + ": administrative_area_level_1:" + results[i].address_components[0].long_name);
          result.administrative = results[i].address_components[0].long_name;
        }
        if (results[i].address_components[0].types[0] == "administrative_area_level_2") {
          console.log(i + ": administrative_area_level_2:" + results[i].address_components[0].long_name);
          result.administrative_2 = results[i].address_components[0].long_name;
        }
        if (results[i].address_components[0].types[0] == "postal_town") {
          console.log(i + ": postal_town:" + results[i].address_components[0].long_name);
          result.postal_town = results[i].address_components[0].long_name;
        }
        if (results[i].address_components[0].types[0] == "political") {
          console.log(i + ": political:" + results[i].address_components[0].long_name);
        }
        for (var j = 0; j < results[i].address_components.length; j++) {
          for (var k = 0; k < results[i].address_components[j].types.length; k++) {
            if (results[i].address_components[j].types[k] == "postal_code") {
              zipcode = results[i].address_components[j].short_name;
              //$('span.zip').html(zipcode);

            }
          }
        }
      }

      console.log('result=>', result)

      initContinued(result,ajax);

    });
  }



  $dropPin = function() {
    console.log('NET',place)

  };

  $initAutoComplete = function(){

    //get textbox used for address or place search
    var input = document.getElementById('location');

    //create google places variable and bind input to it.
    var searchBox = new google.maps.places.SearchBox(input);


    // When the user selects an address from the dropdown,  trigger function

    searchBox.addListener('places_changed', function () {
      //calling "getPlaces" instead of get place()

      var place = searchBox.getPlaces();
      console.log('NET',place)

      //passing place to my dropPin service
      dropPin(place);
    });
  };

  $(document).ready(function() {
    $('#uk_only').change(function () {
      window.uk_only = $(this).val()
      console.log('uk_only')
      if ($(this).attr('checked') == 'checked') {
        console.log('uk_only1')
        $('#location_search').val('')
        $('#location_search').prop("disabled", false);
      }
      else {
        console.log('uk_only0')
        $('#location_search').val('Ищем по миру :)')
        $('#location_search').prop("disabled", true);
      }
    })
  })
</script>

<script>
  // This example uses the autocomplete feature of the Google Places API.
  // It allows the user to find all hotels in a given place, within a given
  // country. It then displays markers for all the hotels returned,
  // with on-click details for each hotel.

  // This example requires the Places library. Include the libraries=places
  // parameter when you first load the API. For example:
  // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

  var map, places, infoWindow;
  var markers = [];
  var autocomplete;
  var countryRestrict = {'country': 'us'};
  var MARKER_PATH = 'https://developers.google.com/maps/documentation/javascript/images/marker_green';
  var hostnameRegexp = new RegExp('^https?://.+?/');

  var countries = {
    'au': {
      center: {lat: -25.3, lng: 133.8},
      zoom: 4
    },
    'br': {
      center: {lat: -14.2, lng: -51.9},
      zoom: 3
    },
    'ca': {
      center: {lat: 62, lng: -110.0},
      zoom: 3
    },
    'fr': {
      center: {lat: 46.2, lng: 2.2},
      zoom: 5
    },
    'de': {
      center: {lat: 51.2, lng: 10.4},
      zoom: 5
    },
    'mx': {
      center: {lat: 23.6, lng: -102.5},
      zoom: 4
    },
    'nz': {
      center: {lat: -40.9, lng: 174.9},
      zoom: 5
    },
    'it': {
      center: {lat: 41.9, lng: 12.6},
      zoom: 5
    },
    'za': {
      center: {lat: -30.6, lng: 22.9},
      zoom: 5
    },
    'es': {
      center: {lat: 40.5, lng: -3.7},
      zoom: 5
    },
    'pt': {
      center: {lat: 39.4, lng: -8.2},
      zoom: 6
    },
    'us': {
      center: {lat: 37.1, lng: -95.7},
      zoom: 3
    },
    'ru': {
      center: {lat: 55.751244, lng: 37.618423},
      zoom: 3
    },
    'uk': {
      center: {lat: 54.8, lng: -4.6},
      zoom: 5
    }
  };

  function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: countries['us'].zoom,
      center: countries['us'].center,
      mapTypeControl: false,
      panControl: false,
      zoomControl: false,
      streetViewControl: false
    });

    infoWindow = new google.maps.InfoWindow({
      content: document.getElementById('info-content')
    });

    // Create the autocomplete object and associate it with the UI input control.
    // Restrict the search to the default country, and to place type "cities".
    autocomplete = new google.maps.places.Autocomplete(
      /** @type {!HTMLInputElement} */ (
        document.getElementById('autocomplete')), {
        types: ['(cities)'],
        componentRestrictions: countryRestrict
      });
    places = new google.maps.places.PlacesService(map);

    autocomplete.addListener('place_changed', onPlaceChanged);

    // Add a DOM event listener to react when the user selects a country.
    var elementExists = document.getElementById("country");
    if(elementExists){
      document.getElementById('country').addEventListener(
        'change', setAutocompleteCountry);}










    /*        window.autocomplete;
            window.geocoder;
            window.input = document.getElementById('location');//
            window.options = {
                componentRestrictions: {'country':'uk'},
                types: ['(regions)'] // (cities)
            };

            window.autocomplete = new google.maps.places.Autocomplete(window.input,window.options);*/


 /*   var $autocompleteAdAddress;
    var geocoderAdAddress;
    var inputAdAddress = document.getElementById('clntInfoEditAddr1');//
    var optionsAdAddress = {
      componentRestrictions: {'country':'uk'},
      types: ['(regions)'] // (cities)
    };
    $autocompleteAdAddress = new google.maps.places.Autocomplete(inputAdAddress,optionsAdAddress);

    google.maps.event.addListener($autocompleteAdAddress, 'place_changed', function () {
      var location = $autocompleteAdAddress.getPlace();
      console.log('777=>',location);
      console.log(location.place_id)
      //location=JSON.stringify(location);
      geocoder = new google.maps.Geocoder();
      console.log('LOC',location)
      lat = location['geometry']['location'].lat();
      lng = location['geometry']['location'].lng();
      var latlng = new google.maps.LatLng(lat,lng);
      location=location.place_id
      getCity(latlng);


    });*/



    var $autocompletePostCode;
    var geocoderPostCode;
    var inputPostCode = document.getElementById('allUsersClntInfoEditZip');//
    var inputMerged = document.getElementById('clntInfoEditAddr1');
    var optionsPostCode = {
      componentRestrictions: {'country':'uk'},
      types: ['(regions)'] // (cities)
    };
    $autocompletePostCode = new google.maps.places.Autocomplete(inputPostCode,optionsPostCode);

    google.maps.event.addListener($autocompletePostCode, 'place_changed', function () {
      var location = $autocompletePostCode.getPlace();
      console.log('777=>',location);
      console.log(location.place_id)
      //location=JSON.stringify(location);
      geocoder = new google.maps.Geocoder();
      console.log('LOC',location)
      lat = location['geometry']['location'].lat();
      lng = location['geometry']['location'].lng();
      var latlng = new google.maps.LatLng(lat,lng);
      location=location.place_id
      //inputMerged.value=inputPostCode.value
      document.getElementById('place_id').value=location
      getCity(latlng);


    });

    var $autocompleteOnlyPostCode;
    var geocoderOnlyPostCode;
    var inputOnlyPostCode = document.getElementById('clntInfoEditZip');//
    var inputMerged = document.getElementById('clntInfoEditAddr1');
    var optionsOnlyPostCode = {
      componentRestrictions: {'country':'uk'},
      types: ['(regions)'] // (cities)
    };
    $autocompleteOnlyPostCode = new google.maps.places.Autocomplete(inputOnlyPostCode,optionsOnlyPostCode);

    google.maps.event.addListener($autocompleteOnlyPostCode, 'place_changed', function () {
      var location = $autocompleteOnlyPostCode.getPlace();
      console.log('777=>',location);
      console.log(location.place_id)
      //location=JSON.stringify(location);
      geocoder = new google.maps.Geocoder();
      console.log('LOC',location)
      lat = location['geometry']['location'].lat();
      lng = location['geometry']['location'].lng();
      var latlng = new google.maps.LatLng(lat,lng);
      location=location.place_id
      //inputMerged.value=inputOnlyPostCode.value
      document.getElementById('place_id').value=location
      getCity(latlng);


    });

    var $autocompleteOutUk;
    var geocoderOutUk;
    var inputOutUk = document.getElementById('clntInfoEditOutUk');//
    var inputMerged = document.getElementById('clntInfoEditAddr1');
    var optionsOutUk = {

      types: ['(regions)'] // (cities)
    };
    $autocompleteOutUk = new google.maps.places.Autocomplete(inputOutUk,optionsOutUk);

    google.maps.event.addListener($autocompleteOutUk, 'place_changed', function () {
      var location = $autocompleteOutUk.getPlace();
      console.log('777=>',location);
      console.log(location.place_id)
      //location=JSON.stringify(location);
      geocoder = new google.maps.Geocoder();
      console.log('LOC',location)
      lat = location['geometry']['location'].lat();
      lng = location['geometry']['location'].lng();
      var latlng = new google.maps.LatLng(lat,lng);
      location=location.place_id
      inputMerged.value=inputOutUk.value
      document.getElementById('place_id').value=location

      getCity(latlng);


    });








    var $autocompleteSearch;
    var geocoderSearch;
    var inputSearch = document.getElementById('location_search');//
    var optionsSearch = {
      componentRestrictions: {'country':'uk'},
      types: ['(regions)'] // (cities)
    };
    $autocompleteSearch = new google.maps.places.Autocomplete(inputSearch,optionsSearch);
    $('#go').click(function(){
      console.log(444)
      google.maps.event.addListener($autocompleteSearch, 'place_changed', function () {
        var place = $autocompleteSearch.getPlace();
        console.log('PLACE',place);
      });
      var location = $autocompleteSearch.getPlace();
      console.log('777=>',location);
      var search_field = $('#search-field').val()
      window.search_field=search_field;
      window.uk_only=$('#uk_only').val()
      //location=JSON.stringify(location);
      //geocoder = new google.maps.Geocoder();

      if(!location){
        console.log(990)
        window.uk_only=$('#uk_only').attr('checked')
        console.log(window.uk_only)
        window.location.replace("/search?search_string="+window.search_field+"&administrative=0&uk_only="+window.uk_only);
      }
      console.log(location.place_id)
      //location=JSON.stringify(location);
      geocoder = new google.maps.Geocoder();
      console.log('LOC',location)
      lat = location['geometry']['location'].lat();
      lng = location['geometry']['location'].lng();
      var latlng = new google.maps.LatLng(lat,lng);
      location=location.place_id
      codeLatLng(latlng,false);









    });





  }

  // When the user selects a city, get the place details for the city and
  // zoom the map in on the city.
  function onPlaceChanged() {
    var place = autocomplete.getPlace();
    if (place.geometry) {
      map.panTo(place.geometry.location);
      map.setZoom(15);
      search();
        ///////////////////////////////////////////////////////////////////////////////

        console.log('777=>',place);
        console.log(place.place_id)
        //location=JSON.stringify(location);
        geocoder = new google.maps.Geocoder();
        console.log('LOC',place)
        lat = place['geometry']['location'].lat();
        lng = place['geometry']['location'].lng();
        var latlng = new google.maps.LatLng(lat,lng);
        getCity(latlng);
        /////////////////////////////////////////////////////

    } else {
      document.getElementById('autocomplete').placeholder = 'Enter a city';
    }
  }

  // Search for hotels in the selected city, within the viewport of the map.
  function search() {
    var search = {
      bounds: map.getBounds(),
      types: ['lodging']
    };

    places.nearbySearch(search, function(results, status) {
      if (status === google.maps.places.PlacesServiceStatus.OK) {
        clearResults();
        clearMarkers();
        // Create a marker for each hotel found, and
        // assign a letter of the alphabetic to each marker icon.
        for (var i = 0; i < results.length; i++) {
          var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
          var markerIcon = MARKER_PATH + markerLetter + '.png';
          // Use marker animation to drop the icons incrementally on the map.
          markers[i] = new google.maps.Marker({
            position: results[i].geometry.location,
            animation: google.maps.Animation.DROP,
            icon: markerIcon
          });
          // If the user clicks a hotel marker, show the details of that hotel
          // in an info window.
          markers[i].placeResult = results[i];
          google.maps.event.addListener(markers[i], 'click', showInfoWindow);
          setTimeout(dropMarker(i), i * 100);
          addResult(results[i], i);
        }
      }
    });
  }

  function clearMarkers() {
    for (var i = 0; i < markers.length; i++) {
      if (markers[i]) {
        markers[i].setMap(null);
      }
    }
    markers = [];
  }

  // Set the country restriction based on user input.
  // Also center and zoom the map on the given country.
  function setAutocompleteCountry() {
    var country = document.getElementById('country').value;
    if (country == 'all') {
      autocomplete.setComponentRestrictions({'country': []});
      map.setCenter({lat: 15, lng: 0});
      map.setZoom(2);
    } else {
      autocomplete.setComponentRestrictions({'country': country});
      map.setCenter(countries[country].center);
      map.setZoom(countries[country].zoom);
    }
    clearResults();
    clearMarkers();
  }

  function dropMarker(i) {
    return function() {
      markers[i].setMap(map);
    };
  }

  function addResult(result, i) {
    var results = document.getElementById('results');
    var markerLetter = String.fromCharCode('A'.charCodeAt(0) + (i % 26));
    var markerIcon = MARKER_PATH + markerLetter + '.png';

    var tr = document.createElement('tr');
    tr.style.backgroundColor = (i % 2 === 0 ? '#F0F0F0' : '#FFFFFF');
    tr.onclick = function() {
      google.maps.event.trigger(markers[i], 'click');
    };

    var iconTd = document.createElement('td');
    var nameTd = document.createElement('td');
    var icon = document.createElement('img');
    icon.src = markerIcon;
    icon.setAttribute('class', 'placeIcon');
    icon.setAttribute('className', 'placeIcon');
    var name = document.createTextNode(result.name);
    iconTd.appendChild(icon);
    nameTd.appendChild(name);
    tr.appendChild(iconTd);
    tr.appendChild(nameTd);
    results.appendChild(tr);
  }

  function clearResults() {
    var results = document.getElementById('results');
    while (results.childNodes[0]) {
      results.removeChild(results.childNodes[0]);
    }
  }

  // Get the place details for a hotel. Show the information in an info window,
  // anchored on the marker for the hotel that the user selected.
  function showInfoWindow() {
    var marker = this;
    places.getDetails({placeId: marker.placeResult.place_id},
      function(place, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          return;
        }
        infoWindow.open(map, marker);
        buildIWContent(place);
      });
  }

  // Load the place information into the HTML elements used by the info window.
  function buildIWContent(place) {
    document.getElementById('iw-icon').innerHTML = '<img class="hotelIcon" ' +
      'src="' + place.icon + '"/>';
    document.getElementById('iw-url').innerHTML = '<b><a href="' + place.url +
      '">' + place.name + '</a></b>';
    document.getElementById('iw-address').textContent = place.vicinity;

    if (place.formatted_phone_number) {
      document.getElementById('iw-phone-row').style.display = '';
      document.getElementById('iw-phone').textContent =
        place.formatted_phone_number;
    } else {
      document.getElementById('iw-phone-row').style.display = 'none';
    }

    // Assign a five-star rating to the hotel, using a black star ('&#10029;')
    // to indicate the rating the hotel has earned, and a white star ('&#10025;')
    // for the rating points not achieved.
    if (place.rating) {
      var ratingHtml = '';
      for (var i = 0; i < 5; i++) {
        if (place.rating < (i + 0.5)) {
          ratingHtml += '&#10025;';
        } else {
          ratingHtml += '&#10029;';
        }
        document.getElementById('iw-rating-row').style.display = '';
        document.getElementById('iw-rating').innerHTML = ratingHtml;
      }
    } else {
      document.getElementById('iw-rating-row').style.display = 'none';
    }

    // The regexp isolates the first part of the URL (domain plus subdomain)
    // to give a short URL for displaying in the info window.
    if (place.website) {
      var fullUrl = place.website;
      var website = hostnameRegexp.exec(place.website);
      if (website === null) {
        website = 'http://' + place.website + '/';
        fullUrl = website;
      }
      document.getElementById('iw-website-row').style.display = '';
      document.getElementById('iw-website').textContent = website;
    } else {
      document.getElementById('iw-website-row').style.display = 'none';
    }
  }
</script>
<script>
  /*   $(function(){*/


  /*  });*/

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaZXMHQgJkoXZkkBbtelY8SLAwMOasg0Y&libraries=places&language=en&callback=initMap" async defer></script>


</body>
</html>

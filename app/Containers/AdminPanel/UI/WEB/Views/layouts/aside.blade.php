



<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->
<aside class="page-sidebar">
    <!--div class="page-logo">
        <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
            <img src="/NewSmartAdmin/img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
            <span class="page-logo-text mr-1">DWEM</span>
            <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
            <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
        </a>
    </--div>
    <!-- end user info -->
    <div style="position:relative;">
        <!-- NAVIGATION : This navigation is also responsive-->
@include('adminpanel::layouts.nav')

        <!-- NAV FOOTER -->
        <div class="nav-footer shadow-top">
            <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
                <i class="ni ni-chevron-right"></i>
                <i class="ni ni-chevron-right"></i>
            </a>
            <ul class="list-table m-auto nav-footer-buttons">
                <li>
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
                        <i class="fal fa-comments"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
                        <i class="fal fa-life-ring"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
                        <i class="fal fa-phone"></i>
                    </a>
                </li>
            </ul>
        </div> <!-- END NAV FOOTER -->
    </div>

</aside>
<!-- END NAVIGATION -->
<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
        <div class="position-relative">
            <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
            <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
                <i class="fal fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <div class="info-card" style="display:block !important">
        <div class="info-card-text" style="display:block !important;text-align:center;margin-left:0px;margin-top:100px">

            <span class="d-inline-block text-truncate text-truncate-sm" style="font-size: 18px;max-width:200px">Toronto, Canada</span>
        </div>
        <img src="/storage/1.jpg" class="cover" alt="cover">
        <a href="#" style="margin-left:230px" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
            <i class="fal fa-angle-down"></i>
        </a>
    </div>
    <ul id="js-nav-menu" class="nav-menu">

     @php

         print($menu);

     @endphp

    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
</nav>
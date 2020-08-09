@extends('adminpanel::layouts.app_admin')

@section('title', 'Main page')

@section('content')

<main id="js-page-content" role="main" class="page-content">
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
        <li class="breadcrumb-item">Application Intel</li>
        <li class="breadcrumb-item active">Marketing Dashboard</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-chart-area'></i> Marketing <span class='fw-300'>Dashboard</span>
        </h1>
        <div class="d-flex mr-4">
            <div class="mr-2">
                <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#967bbd&quot;, &quot;#ccbfdf&quot;],  &quot;innerRadius&quot;: 14, &quot;radius&quot;: 20 }">7/10</span>
            </div>
            <div>
                <label class="fs-sm mb-0 mt-2 mt-md-0">New Sessions</label>
                <h4 class="font-weight-bold mb-0">70.60%</h4>
            </div>
        </div>
        <div class="d-flex mr-0">
            <div class="mr-2">
                <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#2196F3&quot;, &quot;#9acffa&quot;],  &quot;innerRadius&quot;: 14, &quot;radius&quot;: 20 }">3/10</span>
            </div>
            <div>
                <label class="fs-sm mb-0 mt-2 mt-md-0">Page Views</label>
                <h4 class="font-weight-bold mb-0">14,134</h4>
            </div>
        </div>
    </div>

</main>

@endsection
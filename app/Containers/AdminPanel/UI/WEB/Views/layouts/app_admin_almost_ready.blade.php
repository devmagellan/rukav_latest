<!DOCTYPE html>
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
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <!--link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" /-->
  <link href="//datatables.net/download/build/dataTables.fixedHeader.nightly.css?_=67f9e44416b4ab8fcae6a5a3e8455094.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/datagrid/datatables/datatables.bundle.css">
  <link href="//datatables.net/download/build/nightly/jquery.dataTables.css?_=d19ecea59b598f607542abf22a99ef9a.css" rel="stylesheet" type="text/css" />

  <link href="https://rawgit.com/DataTables/Plugins/master/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

  <script src="/templates/smartadmin/js/formplugins/dropzone/dropzone.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="https://rawgit.com/DataTables/Plugins/master/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="//datatables.net/download/build/nightly/jquery.dataTables.js?_=d19ecea59b598f607542abf22a99ef9a"></script>
  <script src="https://rawgit.com/DataTables/Plugins/master/integration/bootstrap/3/dataTables.bootstrap.js"></script>
  <script src="/js/FixedHeader.nightly.js"></script>
  <script src="https://rawgit.com/maca88/datatables.plugins/master/Source/dataTables.colResize.js"></script>
  <!-- Place favicon.ico in the root directory -->
  <link rel="apple-touch-icon" sizes="180x180" href="/templates/smartadmin/img/favicon/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/templates/smartadmin/img/favicon/favicon-32x32.png">
  <link rel="mask-icon" href="/templates/smartadmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
  <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/datagrid/datatables/datatables.bundle.css">
  <link rel="stylesheet" media="screen, print" href="https://stackpath.bootstrapcdn.com/font-awesome/5.14.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/87c575d6be.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
  <link rel="stylesheet" href="/css/jquery.scrollbar.css" />
  <script src="/js/jquery.scrollbar.js"></script>



    @yield('styles')
</head>



@yield('theme_scripts')

@yield('content')


@yield('scripts')

<script>

  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })
</script>

@yield('scripts')

</html>

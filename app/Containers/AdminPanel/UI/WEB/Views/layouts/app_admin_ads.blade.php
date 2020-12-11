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









    @yield('styles')
</head>
<body class="mod-bg-1">

<!-- END Color profile -->
<!-- Place favicon.ico in the root directory -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/app.bundle.css">
<!--link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" /-->
<link href="//datatables.net/download/build/dataTables.fixedHeader.nightly.css?_=67f9e44416b4ab8fcae6a5a3e8455094.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/datagrid/datatables/datatables.bundle.css">
<link href="//datatables.net/download/build/nightly/jquery.dataTables.css?_=d19ecea59b598f607542abf22a99ef9a.css" rel="stylesheet" type="text/css" />

<link href="https://rawgit.com/DataTables/Plugins/master/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="https://rawgit.com/DataTables/Plugins/master/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="//datatables.net/download/build/nightly/jquery.dataTables.js?_=d19ecea59b598f607542abf22a99ef9a"></script>

<script src="/templates/smartadmin/js/formplugins/select2/select2.bundle.js" ></script>
<script src="https://rawgit.com/DataTables/Plugins/master/integration/bootstrap/3/dataTables.bootstrap.js" ></script>
<script src="/js/FixedHeader.nightly.js" ></script>
<!--script src="https://rawgit.com/maca88/datatables.plugins/master/Source/dataTables.colResize.js" ></script-->
<script src="/js/dataTables.colResize_.js" ></script>
<!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" sizes="180x180" href="/templates/smartadmin/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/templates/smartadmin/img/favicon/favicon-32x32.png">
<link rel="mask-icon" href="/templates/smartadmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
<link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/datagrid/datatables/datatables.bundle.css">
<link rel="stylesheet" media="screen, print" href="https://stackpath.bootstrapcdn.com/font-awesome/5.14.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/87c575d6be.js" crossorigin="anonymous"></script>
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script-->
<link rel="stylesheet" href="/css/jquery.scrollbar.css" />
<script src="/js/jquery.scrollbar.js"></script>


@yield('theme_scripts')


        <!-- END Left Aside -->
        <div class="scrollbar-external_wrapper">
          <div class="scrollbar-external" style="top:40px">

@yield('content')











<script type="text/javascript">
    /* Activate smart panels */
   // $('#js-page-content').smartPanel();

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

@php
  if(isset($ad) ){
    $placeId=$ad->place_id;
}
else{
    $placeId='ChIJod7tSseifDUR9hXHLFNGMIs';
}
@endphp
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


  function getPostcode(latlng) {
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({'latLng': latlng}, function (results) {
      var result = [];
      for (i = 0; i < results.length; i++) {
        console.log(results[i].address_components)

        for (var j = 0; j < results[i].address_components.length; j++) {
          for (var k = 0; k < results[i].address_components[j].types.length; k++) {
            if (results[i].address_components[j].types[k] == "postal_code") {
              zipcode = results[i].address_components[j].short_name;
              console.log('zipcode',zipcode)
              $('#allUsersClntInfoEditZip').val(zipcode);
              $('#clntInfoEditZip').val(zipcode);

            }
          }
        }
      }





      console.log('result=>', result)

    });
  }



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

    var service = new google.maps.places.PlacesService(map);
    console.log('{{$placeId}}')
    service.getDetails({
      placeId: '{{$placeId}}'
    }, function (place, status) {
      console.log('place',place.geometry.location.lat())
      if (status === google.maps.places.PlacesServiceStatus.OK) {


        lat = place.geometry.location.lat();
        lng = place.geometry.location.lng();
        // Create marker
        console.log('lng4',lat,lng)

        var latlng = new google.maps.LatLng(lat,lng);
        getPostcode(latlng)
      }



    })

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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaZXMHQgJkoXZkkBbtelY8SLAwMOasg0Y&libraries=places&language=en&callback=initMap" async defer></script>


</body>
</html>

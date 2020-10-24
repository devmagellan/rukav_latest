<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Rukav</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@ 1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link href="{{asset('/css/intlTelInput.css')}}" rel="stylesheet">
  <link href="{{asset('/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('/css/media.css')}}" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="shortcut icon" href="/img/favicon.png" type="image/png">

  <script>
  console.log('874')
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
				  console.log('PostalTownCase');
                  console.log(i + ": postal_town:" + results[i].address_components[0].long_name);
                  result.postal_town = results[i].address_components[0].long_name;
				   console.log('Postal_town',result.postal_town)
                $('#city').val(result.postal_town)
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

</head>
<body id="body">


@include('homepage::layouts.sections.header')
@yield('content')
<div id="map" style="display:none"></div>
@include('homepage::layouts.sections.footer')
@include('homepage::layouts.sections.popups')
@include('homepage::layouts.sections.scripts')


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
            language: 'en-GB',
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
                  language: 'en-GB',
                componentRestrictions: countryRestrict
            });
        places = new google.maps.places.PlacesService(map);

        autocomplete.addListener('place_changed', onPlaceChanged);

        // Add a DOM event listener to react when the user selects a country.
        var elementExists = document.getElementById("country");
        if(elementExists){
        document.getElementById('country').addEventListener(
            'change', setAutocompleteCountry);
          $('#add_place').removeClass('redBorder')
        }










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
          $('#add_place').removeClass('redBorder')


        });*/



        var $autocompletePostCode;
        var geocoderPostCode;
        var inputPostCode = document.getElementById('allUsersClntInfoEditZip');//
        var inputMerged = document.getElementById('clntInfoEditAddr1');
        var optionsPostCode = {
            componentRestrictions: {'country':'uk'},
            types: ['(regions)'],
          language: 'en-GB',
          // (cities)
        };
        $autocompletePostCode = new google.maps.places.Autocomplete(inputPostCode,optionsPostCode);

        google.maps.event.addListener($autocompletePostCode, 'place_changed', function () {
            var location = $autocompletePostCode.getPlace();
            console.log('778=>',location);
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
          $('#add_place').removeClass('redBorder')


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
          $('#add_place').removeClass('redBorder')

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
          $('#add_place').removeClass('redBorder')

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
          $('#add_place').removeClass('redBorder')








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


          $('#add_place').removeClass('redBorder')
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.13&sensor=false&key=AIzaSyDaZXMHQgJkoXZkkBbtelY8SLAwMOasg0Y&libraries=places&callback=initMap&language=en" async defer></script>


@if(null!=(session()->get('registration_error')))
{{session()->get('registration_error')}}
<script>
$(document).ready(function(){
	console.log('777');
  $('#emailUpdate').modal({show:true});
$('#ModalIn').modal('show');
});
</script>
{{session()->forget('registration_error')}}
@endif
@if(null!=(session()->get('ShowWeeklyAdminCreatedConfirmation')) )
  <script>
      console.log('778');
      $('#emailUpdate').modal({show:true});


      $('.changeEmail').click(function(){
        $('.closeEmailUpdate').trigger('click');
        $('#changeEmail').modal({show:true});
      })
  </script>
{{session()->forget('ShowWeeklyAdminCreatedConfirmation')}}
@endif


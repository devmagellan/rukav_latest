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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaZXMHQgJkoXZkkBbtelY8SLAwMOasg0Y&libraries=places&language=en"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>

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
            window.location.replace("/search?search_string="+window.search_field+"&city="+addr.city+"&administrative="+addr.administrative+"");
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

  $(function(){



      window.autocomplete;
      window.geocoder;
      window.input = document.getElementById('location');//
      window.options = {
          componentRestrictions: {'country':'uk'},
          types: ['(regions)'] // (cities)
      };

      window.autocomplete = new google.maps.places.Autocomplete(window.input,window.options);


      var $autocompleteAdAddress;
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


      });



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
          inputMerged.value=inputPostCode.value
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
          //location=JSON.stringify(location);
          //geocoder = new google.maps.Geocoder();
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

  });

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
  </script>
</head>
<body>


@include('homepage::layouts.sections.header')
@yield('content')
@include('homepage::layouts.sections.footer')
@include('homepage::layouts.sections.popups')
@include('homepage::layouts.sections.scripts')


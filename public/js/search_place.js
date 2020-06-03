$(document).ready(function(){
  window.autocomplete;
  window.geocoder;
  window.input = document.getElementById('location');//
  window.options = {
    componentRestrictions: {'country': 'uk'},
    types: ['(regions)'] // (cities)
  };

  window.autocomplete = new google.maps.places.Autocomplete(window.input, window.options);

  var autocompleteSearch;
  var geocoderSearch;
  var inputSearch = document.getElementById('location_search');//
  var optionsSearch = {
    componentRestrictions: {'country': 'uk'},
    types: ['(regions)'] // (cities)
  };

  autocompleteSearch = new google.maps.places.Autocomplete(inputSearch, optionsSearch);
  $('.postcode').change(function () {
    var location = autocompleteSearch.getPlace();
    var search_field = $('#search-field').val()
    window.search_field = search_field;
    //location=JSON.stringify(location);
    //geocoder = new google.maps.Geocoder();
    console.log(location.place_id)
    //location=JSON.stringify(location);
    geocoder = new google.maps.Geocoder();
    console.log(location)
    lat = location['geometry']['location'].lat();
    lng = location['geometry']['location'].lng();
    var latlng = new google.maps.LatLng(lat, lng);
    location = location.place_id
    codeLatLng(latlng, false);


  });

});

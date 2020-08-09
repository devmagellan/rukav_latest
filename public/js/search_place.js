
$(document).ready(function(){
/*  window.autocomplete;
  window.geocoder;
  window.input = document.getElementById('location');//
  window.options = {
    componentRestrictions: {'country': 'uk'},
    types: ['(regions)'] // (cities)
  };

  window.autocomplete = new google.maps.places.Autocomplete(window.input, window.options);*/


  /*$('.postcode').change(function () {
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


  });*/





});

////  Global Vars

var  editClntInfoAutocomplete, addrStreet ="",
    addressComponets = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

var  editClntInfoAutocompleteOutUk,editClntInfoAutocompleteOutUkCountry, addrStreetOutUk ="",
    addressComponetsOutUk = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

function initEditClntInfoAutoComplete() {   // Callback

    editClntInfoAutocompleteOutUk = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('clntInfoEditOutUk')),
        {types: ['(regions)']});

    editClntInfoAutocompleteOutUkCountry = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('clntInfoEditAddrOutUk1')),
        {types: ['(regions)']});

    editClntInfoAutocompleteOutUkCountry.addListener('place_changed', fillInEditClntInfoAddressCountry);

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    editClntInfoAutocompleteOutUk.addListener('place_changed', fillInEditClntInfoAddressOutUk);

    editClntInfoAutocomplete = new google.maps.places.Autocomplete(
        /** @type {!HTMLInputElement} */(document.getElementById('clntInfoEditZip')),
        {componentRestrictions: {country: 'uk'},types: ['(regions)']});

    // When the user selects an address from the dropdown, populate the address
    // fields in the form.
    editClntInfoAutocomplete.addListener('place_changed', fillInEditClntInfoAddress);

    var autocompleteSearch;
    var geocoderSearch;
    var inputSearch = document.getElementById('location_search');
    var optionsSearch = {
        componentRestrictions: {'country': 'uk'},
        types: ['(regions)'] // (cities)
    };

    autocompleteSearch = new google.maps.places.Autocomplete(inputSearch, optionsSearch);
}

function fillInEditClntInfoAddressCountry() {

    var place = editClntInfoAutocompleteOutUkCountry.getPlace();

}

function fillInEditClntInfoAddress() {

    var place = editClntInfoAutocomplete.getPlace();

    clearPrevEditFrmAddrVals();

    for ( var i = 0; i < place.address_components.length; i++) {

        var addressType = place.address_components[i].types[0];
        if (  addressComponets[addressType] ) {
            var val = place.address_components[i][addressComponets[addressType]];

            assignEditFrmAddrFieldsVal(addressType, val );
        }

    }

    if( addrStreet != "")
        document.getElementById("clntInfoEditAddr1").value = addrStreet;

}

function assignEditFrmAddrFieldsVal( addressType , val ) {

    switch( addressType ) {
        //case "administrative_area_level_1":
        //document.getElementById("clntInfoEditState").value = val;  break;
        // case "locality":
        //document.getElementById("clntInfoEditCity").value = val;  break;
        //case "country":
        //        document.getElementById("addressType").value = val;  break;
        case "postal_code":
            document.getElementById("clntInfoEditZip").value = val;  break;
        case "street_number":
        case "route":
            addrStreet += " "+val;      break;

    }

}

function assignEditFrmAddrFieldsValOutUk( addressType , val ) {

    switch( addressType ) {
        //case "administrative_area_level_1":
        //document.getElementById("clntInfoEditState").value = val;  break;
        // case "locality":
        //document.getElementById("clntInfoEditCity").value = val;  break;
        case "country":
               document.getElementById("clntInfoEditAddrOutUk1").value = val;  break;
        case "locality":
            document.getElementById("clntInfoEditOutUk").value = val;  break;
        case "street_number":
        case "route":
            addrStreetOutUk += " "+val;      break;

    }

}

function clearPrevEditFrmAddrVals(){
    var editClntFrmAddrIDs = [/*"clntInfoEditState","clntInfoEditCity",*/"clntInfoEditZip","clntInfoEditAddr1"];
    addrStreet = "";

    for( var frmID in editClntFrmAddrIDs )
        $(editClntFrmAddrIDs[frmID]).val("");
}

function clearPrevEditFrmAddrValsOutUk(){
    var editClntFrmAddrIDsOutUk = ["clntInfoEditOutUk","clntInfoEditAddrOutUk1"];
    addrStreetOutUk = "";

    for( var frmID in editClntFrmAddrIDsOutUk )
        $(editClntFrmAddrIDsOutUk[frmID]).val("");
}

function fillInEditClntInfoAddressOutUk() {

    var place = editClntInfoAutocompleteOutUk.getPlace();

    clearPrevEditFrmAddrValsOutUk();

    for ( var i = 0; i < place.address_components.length; i++) {

        var addressType = place.address_components[i].types[0];
        if (  addressComponets[addressType] ) {
            var val = place.address_components[i][addressComponetsOutUk[addressType]];

            assignEditFrmAddrFieldsValOutUk(addressType, val );
        }

    }

    if( addrStreetOutUk != "")
        document.getElementById("clntInfoEditAddrOutUk1").value = addrStreetOutUk;

}
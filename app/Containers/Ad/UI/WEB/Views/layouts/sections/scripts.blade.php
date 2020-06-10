
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script type="text/javascript" src="{{asset('/js/intlTelInput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/jquery.zoom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/register_user.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/login_user.js')}}"></script>

<script type="text/javascript" src="{{asset('/js/show_status_ads.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/search_rubricks.js')}}"></script>


<script>


    $(document).ready(function(){
        setTimeout(function () {
            $('.success_message').hide()
        }, 5000)

    })
function initMap(){}
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





</script>
<script type="text/javascript" src="{{asset('/js/search_place.js')}}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaZXMHQgJkoXZkkBbtelY8SLAwMOasg0Y&libraries=places&language=en&callback=initEditClntInfoAutoComplete" async defer></script>

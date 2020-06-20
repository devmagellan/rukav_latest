<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="/js/intlTelInput.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<script type="text/javascript" src="/js/jquery.zoom.min.js"></script>
<script type="text/javascript" src="/js/register_user.js"></script>
<script type="text/javascript" src="/js/login_user.js"></script>

<script src="https://js.pusher.com/6.0/pusher.min.js"></script>

<script>
console.log('totify pusher')
   var notify_pusher = new Pusher('500e0547867ccfe184af', {
      cluster: 'eu'
    });
var notify_channel = notify_pusher.subscribe('notification-channel');

Pusher.logToConsole = true;
var notify_user='{{\Auth::user()->id}}'
console.log('notify - mid=>',notify_user)
var notify='notification-'+notify_user+'-'
console.log(notify)
	notify_channel.unbind();

	notify_channel.bind(notify, function(data) {

	$('.notify_badge').append(
	' <button type="button" class="btn bg-neutral-success text-success font-size-lg mr-2 p-0 d-inline-block shadow-none text-center d-44 rounded position-relative" data-toggle="modal" data-target="#modal-notifications">'+
                '<span class="badge badge-circle badge-success">New notifications</span>'+
                '<i class="far fa-comment"></i>'+
            '</button>'
	);
	 
	  
	  
    });
</script>

@yield('scripts')

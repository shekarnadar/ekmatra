<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

	<title>Ekmatra</title>

	<meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
	<meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
	<meta name="author" content="D-THEMES">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{url('front/images/icons/favicon.png')}}">

	<!-- WebFont.js -->
	<script>
		WebFontConfig = {
			google: { families: ['Poppins:400,500,600,700,800','Jost:400,500,600,700,800'] }
		};
		(function (d) {
			var wf = d.createElement('script'), s = d.scripts[0];
			wf.src = "{{url('front/js/webfont.js')}}";
			wf.async = true;
			s.parentNode.insertBefore(wf, s);
		})(document);
		function signin(){
			 let formValue = new FormData(document.getElementById('loginForm'));
			 $.ajax({
       		type: "post",
          url: '{{ url("login") }}',
          data: formValue,
          cache: false,
          contentType: false,
          processData: false,
          success: function(response) {
          		 if (response.success) {
          		 		setTimeout(function(){
                        window.location.href ='{{ url("dashboard") }}';
                  },2000);
          		 }
          },
          error: function(response) {
          	let error = response.responseJSON;
            if(!error){
            		error = JSON.parse(response.responseText);
            }
            $.each( error.errors, function( key, value ) {
  								$("#"+key+"_error").text(value);
						});
          },
       });
		}
	</script>

	 <link rel="preload" href="{{url('front/vendor/fontawesome-free/webfonts/fa-regular-400.woff2')}}" as="font" type="font/woff2"
		crossorigin="anonymous">
	<link rel="preload" href="{{url('front/vendor/fontawesome-free/webfonts/fa-solid-900.woff2')}}" as="font" type="font/woff2"
		crossorigin="anonymous">
	<link rel="preload" href="{{url('front/vendor/fontawesome-free/webfonts/fa-brands-400.woff2')}}" as="font" type="font/woff2"
			crossorigin="anonymous">
	<link rel="preload" href="{{url('front/fonts/wolmart87d5.ttf?png09e')}}" as="font" type="font/ttf" crossorigin="anonymous">

	<!-- Vendor CSS -->
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/fontawesome-free/css/all.min.css')}}">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/swiper/swiper-bundle.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/animate/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('front/vendor/magnific-popup/magnific-popup.min.css')}}">

	<!-- Default CSS -->
     @if(request()->is('/') || request()->is('shop/*'))
     	<link rel="stylesheet" type="text/css" href="{{url('front/css/demo12.min.css')}}">
     @else
     		    <link rel="stylesheet" type="text/css" href="{{url('front/css/style.min.css')}}">

     @endif
		<script src="{{url('front/vendor/jquery/jquery.min.js')}}"></script>

	
</head>

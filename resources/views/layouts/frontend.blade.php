<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>James Boogie</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset ('frontend/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset ('frontend/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset ('frontend/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset ('frontend/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset ('frontend/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <!-- BASE CSS -->
    <link href="{{ asset ('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset ('frontend/css/style.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{ asset ('frontend/css/home_1.css')}}" rel="stylesheet">
    <link href="{{ asset ('frontend/css/listing.css') }}" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset ('frontend/css/custom.css')}}" rel="stylesheet">

</head>

<body>

	<div id="page">

	<header class="version_1">
		<div class="layer"></div><!-- Mobile menu overlay mask -->
        @include('include.frontend.header')
		<!-- /main_header -->

        @include('include.frontend.navbar')
		<!-- /main_nav -->
	</header>
	<!-- /header -->

	@yield('content')
    @stack('scripts')
	<!-- /main -->

    {{-- @include('include.frontend.footer') --}}
	<!--/footer-->
	</div>
	<!-- page -->

	<div id="toTop"></div><!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
    <script src="{{ asset ('frontend/js/common_scripts.min.js')}}"></script>
    <script src="{{ asset ('frontend/js/main.js')}}"></script>

	<!-- SPECIFIC SCRIPTS -->
    <script src="{{ asset ('frontend/js/modernizr.js')}}"></script>
	<script src="{{ asset ('frontend/js/video_header.min.js')}}"></script>
	<script>
		// Video Header
		HeaderVideo.init({
			container: $('.header-video'),
			header: $('.header-video--media'),
			videoTrigger: $("#video-trigger"),
			autoPlayVideo: true
		});
	</script>
	<script src="js/isotope.min.js"></script>
	<script>
		// Isotope filter
		$(window).on('load',function(){
		  var $container = $('.isotope-wrapper');
		  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
		});
		$('.isotope_filter').on( 'click', 'a', 'change', function(){
		  var selector = $(this).attr('data-filter');
		  $('.isotope-wrapper').isotope({ filter: selector });
		});
	</script>

</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="{{ url('/').$site_info->favicon }}">
	@if (isset($site_info->index_google))
		<meta name="robots" content="{{ $site_info->index_google == 1 ? 'index, follow' : 'noindex, nofollow' }}">
	@else
		<meta name="robots" content="noindex, nofollow">
	@endif
	{!! SEO::generate() !!}
	<meta name='revisit-after' content='1 days' />
	<meta name="copyright" content="GCO" />
	<meta http-equiv="content-language" content="vi" />
	<meta name="geo.region" content="VN" />
    <meta name="geo.position" content="10.764338, 106.69208" />
    <meta name="geo.placename" content="Hà Nội" />
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
 	<meta name="_token" content="{{csrf_token()}}" />
 	<link rel="canonical" href="{{ \Request::fullUrl() }}"> 


	 <!--link css-->
	
	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/tool.min.css">

	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/reset.css">

	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/main.min.css">

	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/custom.css">
	
	<link rel="stylesheet" type="text/css" title="" href="{{ __BASE_URL__ }}/css/toastr.min.css">

	<link href="{{ captcha_layout_stylesheet_url() }}" type="text/css" rel="stylesheet">
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
 	
</head> 
	<body>
		
		<div class="loadingcover" style="display: none;">
			<p class="csslder">
				<span class="csswrap">
					<span class="cssdot"></span>
					<span class="cssdot"></span>
					<span class="cssdot"></span>
				</span>
			</p>
		</div>

		@include('frontend.teamplate.header')
			<main id="main">
				@yield('main')
			</main>

		@include('frontend.teamplate.footer')

		<button class="btn btn__backtop-home"></button>

		<!--Link js-->

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/tool.min.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/main.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/custom.js"></script>

		<script type="text/javascript" src="{{ __BASE_URL__ }}/js/toastr.min.js"></script>

		

		@yield('script')

		<script type="text/javascript">
			var urlContact = "{{ route('home.post-contact') }}";
			
			$(document).ready(function(){
				toastr.options = {
					"closeButton": false,
					"debug": false,
					"newestOnTop": false,
					"progressBar": false,
					"positionClass": "toast-top-right",
					"preventDuplicates": false,
					"onclick": null,
					"showDuration": "300",
					"hideDuration": "1000",
					"timeOut": "5000",
					"extendedTimeOut": "1000",
					"showEasing": "swing",
					"hideEasing": "linear",
					"showMethod": "fadeIn",
					"hideMethod": "fadeOut"
				}
			});
		</script>

		@if(Session::has('message'))
			<script type='text/javascript'>
				toastr["{!! Session::get('level') !!}"]("{!! Session::get('message') !!}")
			</script>
		@endif
	</body>
</html>
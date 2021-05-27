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
	
	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	@if (!empty($site_info->ticktok))
	<!-- Ticktok -->
		<script>
			(function() {
				var ta = document.createElement('script'); ta.type = 'text/javascript'; ta.async = true;
				ta.src = 'https://analytics.tiktok.com/i18n/pixel/sdk.js?sdkid={{ $site_info->ticktok }}';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ta, s);
			})();
		</script>
	@endif

	@if (!empty($site_info->google_analytics))
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id={{ $site_info->google_analytics }}"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', '{{ $site_info->google_analytics }}');
		</script>
	@endif


	@if (!empty($site_info->google_tag_manager))
	<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
			})(window,document,'script','dataLayer','{{ $site_info->google_tag_manager }}');</script>
	@endif
 	
</head> 
	<body>

		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ @$site_info->google_tag_manager }}" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

		@if (!empty($site_info->facebook_pixel))
		<!-- Facebook Pixel -->
			<script>
				!function(f,b,e,v,n,t,s)
				{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
				n.callMethod.apply(n,arguments):n.queue.push(arguments)};
				if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
				n.queue=[];t=b.createElement(e);t.async=!0;
				t.src=v;s=b.getElementsByTagName(e)[0];
				s.parentNode.insertBefore(t,s)}(window, document,'script',
				'https://connect.facebook.net/en_US/fbevents.js');
				fbq('init', '{{ $site_info->facebook_pixel }}');
				fbq('track', 'PageView');
		  </script>
		@endif

		@if (!empty($site_info->facebook_chat))
			{!! $site_info->facebook_chat !!}
		@endif

		<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id={{ @$site_info->facebook_pixel }}&ev=PageView&noscript=1"/></noscript>
		
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
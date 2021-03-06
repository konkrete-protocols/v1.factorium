<!DOCTYPE Html>
<!--[if IE 8]> <Html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <Html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <Html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="Estate Baron">
	<meta name="description" content="Invest in top Australian property developments of your choice with as little as $100. Australia's only platform open to everyone not just wholesale investors.">
	<meta name="copyright" content="Estate Baron Crowdinvest Pty Ltd copyright (c) 2016">
	<!-- <title>estatebaron.com - Equity Crowdfunding | Flexible Crowd Sourced Equity Funding Solutions</title> -->
	@if($siteConfiguration->title_text != '')
	<title>{{$siteConfiguration->title_text}}</title>
	@else
	<title>Best way to invest in Australian Real Estate Projects</title>
	@endif
	@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
	@if($faviconImg=$siteConfigMedia->where('type', 'favicon_image_url')->first())
	<link rel="shortcut icon" href="{{asset($faviconImg->path)}}?v=<?php echo filemtime($faviconImg->path); ?>" type="image/x-icon">
	@else
	<link rel="shortcut icon" href="/favicon.png?v=<?php echo filemtime('favicon.png'); ?>" type="image/x-icon">
	@endif
	@else
	<link rel="shortcut icon" href="/favicon.png?v=<?php echo filemtime('favicon.png'); ?>" type="image/x-icon">
	@endif
	<!-- <link rel="shortcut icon" href="/favicon.png" type="image/x-icon"> -->
	<!-- Open Graphic -->
	<meta property="og:image" content="@if($siteConfiguration->siteconfigmedia)@if($mainImg = $siteConfiguration->siteconfigmedia->where('type', 'homepg_back_img')->first()){{$siteConfiguration->project_site}}/{{$mainImg->path}}@endif @else https://www.estatebaron.com/images/hero-image-1.jpg @endif" />
	<meta property="og:site_name" content="@if($siteConfiguration->website_name != '') {{$siteConfiguration->website_name}} @else Estate Baron @endif" />
	<meta property="og:url" content="@if($siteConfiguration->project_site != '') {{$siteConfiguration->project_site}} @else https://estatebaron.com @endif" />
	<meta property="og:type" content="website" />
	<!-- META DATA -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">

	@section('meta-section')
	<meta property="og:title" content="@if($siteConfiguration->title_text != '') {{$siteConfiguration->title_text}} @else Estate Baron @endif" />
	<meta property="og:description" content="@if($siteConfiguration->homepg_text1 != '') {{$siteConfiguration->homepg_text1}} @else Invest in Melbourne Real Estate Developments from $100. View listing now. @endif " />
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	@show

	@if (Config::get('analytics.gtm.enable'))
	@include('partials.gtm-script')
	@endif

	<!-- Bootstrap -->
	{!! Html::script('js/jquery-1.11.3.min.js') !!}
	{!! Html::style('css/bootstrap.min.css') !!}
	{!! Html::style('plugins/font-awesome-4.6.3/css/font-awesome.min.css') !!}
	{!! Html::style('plugins/animate.css') !!}
	<!-- <link rel="stylesheet" href="https://youcanbook.me/resources/css/simplemodal/simplemodal.css" type="text/css"/> -->
	{!! Html::style('css/app.css') !!}

	@if($siteConfiguration->font_family != '')
	<link href="https://fonts.googleapis.com/css?family={{preg_replace('/\s+/', '+', $siteConfiguration->font_family)}}" rel="stylesheet">
	@else
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700,200italic,400italic,700italic' rel='stylesheet' type='text/css'>
	@endif
	<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- JCrop -->
	{!! Html::style('/assets/plugins/JCrop/css/jquery.Jcrop.css') !!}

	<style type="text/css">
		.btn-hover-default-color:hover{
			color: #fff !important;
		}

		@if($siteConfiguration->font_family != '')
		/*Override fonts*/
		body, .font-regular, p {
			font-family: {{$siteConfiguration->font_family}};
			font-weight: 400;
		}
		.heading-font-light, .h1-faq, h1>small, h2>small, h3>small, h4>small{
			font-family: {{$siteConfiguration->font_family}};
			font-weight: 300;
		}
		.font-semibold{
			font-family: {{$siteConfiguration->font_family}};
			font-weight: 600;
		}
		h1, h2, h3, h4, a, .font-bold {
			font-family: {{$siteConfiguration->font_family}};
			font-weight: 700;
		}
		@endif

		.investment-title1-description-section, .csef-text{
			color: #888 !important;
			text-align: center;
		}

		.compliance-text-style {
			color: #FFF !important;
		}

		/*Center align sweetalert continue to site button*/
		.swal-footer {
			text-align: center;
		}

		.konkrete-slide-link {
			color: #337ab7;
		}

		.konkrete-slide-link:hover {
			color: #23527c !important;
			text-decoration: underline !important;
		}

		.konkrete-slide-link:visited {
			color: #23527c !important;
		}

		.konkrete-slide-link:focus {
			color: #23527c !important;
			text-decoration: underline !important;
		}
		.venture-btn{
			font-family: {{$siteConfiguration->font_family}};
			background-color: transparent;
			color: #23527c;
			border-radius: 30px;
			transition: transform .2s;
			border: 2px solid !important;
		}
		.venture-btn:hover{
			transform: scale(1.04);
		}
		.buy-now-btn {
			font-family: {{$siteConfiguration->font_family}};
			background-color: transparent;
			color: #23527c;
			border-radius: 30px;
			transition: transform .2s;
		}
		.buy-now-btn:hover{
			transform: scale(1.04);
		}
		#borderB{
			border-bottom: 0px solid transparent;
			background-image: linear-gradient(-135deg, #ffffff 50%, transparent 50%),linear-gradient(-45deg,#dedede 50%, transparent 50%);
			background-position: bottom left, bottom left;
			background-size: 24px 24px;
			background-repeat: repeat-x;
		}
		/*.filterDiv {

			display: none; /* Hidden by default */
			}*/

			/* The "show" class is added to the filtered elements */
			.show {
				display: block;
			}

			/* Style the buttons */
			.filterbtn {
				border: none;
				outline: none;
				padding: 12px 16px;
				background-color: #f1f1f1;
				cursor: pointer;
			}

			/* Add a light grey background on mouse-over */
			.filterbtn:hover {
				background-color: #ddd;
			}

			/* Add a dark background to the active button */
			.filterbtn.active {
				background-color: #666;
				color: white;
			}
			@media screen and (max-width: 480px) {
				.chunk-of-vis{
					overflow: visible !important;
				}
				.video-section{
					padding-top: 2em !important;
				}
			}

			.white-space-wrap {
				white-space: nowrap;
				overflow: hidden;
				text-overflow: ellipsis;
			}
		</style>

		<!-- Google tag manager header script if set  -->
		@if($siteConfiguration->tag_manager_header)
		{!!$siteConfiguration->tag_manager_header!!}
		@endif

		{!! Html::script('assets/plugins/jscolor-2.0.4/jscolor.min.js') !!}
		<!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/Html5shiv/3.7.0/Html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->

	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-73934803-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>
<body data-spy="scroll" >
	<!-- Google tag manager body script if set  -->
	@if($siteConfiguration->tag_manager_body)
	{!!$siteConfiguration->tag_manager_body!!}
	@endif

	@if (Config::get('analytics.gtm.enable'))
	@include('partials.gtm-noscript')
	@endif
	<!-- Loader for jquery Ajax calls. -->
	<div class="loader-overlay" style="display: none;">
		<div class="overlay-loader-image">
			<img id="loader-image" src="{{ asset('/assets/images/loader.GIF') }}">
		</div>
	</div>
	<nav id="header" class="main-nav navbar navbar-fixed-top navbar-0" >
		<div id="header-container" class="container navbar-container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				@if($siteConfiguration->siteconfigmedia)
				@if($mainLogo = $siteConfiguration->siteconfigmedia->where('type', 'brand_logo')->first())
				<a id="brand" class="navbar-brand hide small-logo" href="{{route('home')}}"><img src="{{$mainLogo->path}}" alt="Brand logo" id="logo" style="margin-top:-5px; height: inherit;"></a>
				<a id="brand" class="navbar-brand big-logo" href="{{route('home')}}"><img class="img-responsive brand-big-image" src="{{$mainLogo->path}}" alt="Logo" width="80%" class="main-logo" data-wow-duration="1.5s" data-wow-delay="0.2s" style="margin-left:50px; margin-top:-30px;"></a>
				@else
				<a id="brand" class="navbar-brand hide small-logo" href="{{route('home')}}"><img src="{{asset('assets/images/main_logo.png')}}" width="130" alt="Brand logo" id="logo" style="margin-top:-5px;"></a>
				<a id="brand" class="navbar-brand big-logo" href="{{route('home')}}"><img class="img-responsive brand-big-image" src="/assets/images/main_logo.png" alt="Logo" width="80%" class="main-logo" data-wow-duration="1.5s" data-wow-delay="0.2s" style="margin-left:50px; margin-top:-30px;"></a>
				@endif
				@else
				<a id="brand" class="navbar-brand hide small-logo" href="{{route('home')}}"><img src="{{asset('assets/images/main_logo.png')}}" width="130" alt="Brand logo" id="logo" style="margin-top:-5px;"></a>
				<a id="brand" class="navbar-brand big-logo" href="{{route('home')}}"><img class="img-responsive brand-big-image" src="/assets/images/main_logo.png" alt="Logo" width="80%" class="main-logo" data-wow-duration="1.5s" data-wow-delay="0.2s" style="margin-left:50px; margin-top:-30px;"></a>
				@endif
					<!-- <a id="brand" class="navbar-brand hide small-logo" href="{{route('home')}}"><img src="{{asset('assets/images/main_logo.png')}}" width="130" alt="Brand logo" id="logo" style="margin-top:-5px;"></a>
						<a id="brand" class="navbar-brand big-logo" href="{{route('home')}}"><img class="img-responsive brand-big-image" src="/assets/images/header_logo.png" alt="Logo" width="80%" class="main-logo" data-wow-duration="1.5s" data-wow-delay="0.2s" style="margin-left:50px; margin-top:-30px;"></a> -->
						@if(Auth::guest())
						@else
						@if($admin_access == 1)
						<div class="edit-button-style edit-brand-img" style="margin-left: 15px; margin-top: 50px; display: none;"><a data-toggle="tooltip" title="Edit"><i class="fa fa fa-edit fa-lg"></i></a></div>
						<input class="hide" type="file" name="brand_logo" id="brand_logo">
						<input type="hidden" name="brand_logo_name" id="brand_logo_name">
						@endif
						@endif
					</div>
					<div id="navbar" class="collapse navbar-collapse navbar-right" style="margin-top:10px;">
						<ul class="nav navbar-nav">
							<li class="active nav-item"><a href="{{route('home')}}/#promo" data-href="{{route('home')}}/#promo" class="scrollto hide scroll-links reference-link-with-js fold-text-color" id="nav_home">Home</a></li>
							<li class="nav-item"><a href="{{route('home')}}/#how-it-works" data-href="{{route('home')}}/#how-it-works" class="scrollto scroll-links reference-link-with-js fold-text-color">How it works</a></li>
							<li class="nav-item"><a href="{{route('home')}}/#projects" data-href="{{route('home')}}/#projects" class="scrollto scroll-links reference-link-with-js fold-text-color">Invoices</a></li>
							@if($siteConfiguration->show_funding_options != '')
							<li class="nav-item"><a href="{{route('home')}}/#funding" data-href="{{route('home')}}/#funding" class="scrollto scroll-links reference-link-with-js fold-text-color">Funding</a></li>
							@endif
							<li class="nav-item"><a href="/pages/team" class="fold-text-color">About us</a></li>
							<li class="nav-item"><a href="/pages/faq" class="fold-text-color">FAQ</a></li>
							@if (Auth::guest())
							<li class="nav-item"><a href="{{route('users.create')}}" class="fold-text-color">Register</a></li>
							<li class="nav-item">{!! Html::linkRoute('users.login', 'Sign in', array(), array('class' => 'fold-text-color')) !!}</li>
							@else
							<li class="nav-item last dropdown" role="dropdown">
								<a href="#" class="dropdown-toggle fold-text-color" data-toggle="dropdown" role="button" aria-expanded="false">
									My Account <span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									@if(Auth::user()->roles->contains('role', 'admin') || Auth::user()->roles->contains('role', 'master'))
									<li>
										{!! Html::linkRoute('dashboard.index', 'Dashboard', null, ['class'=>'anchor-color', 'style'=>'padding:5px 17px;']) !!}
									</li>
									@endif
									<li>
										{!! Html::linkRoute('users.show', 'Profile', Auth::id(), ['class'=>'anchor-color', 'style'=>'padding:5px 17px;']) !!}
									</li>
									<li>
										{!! Html::linkRoute('users.logout', 'logout', null, ['class'=>'anchor-color', 'style'=>'padding:5px 17px;']) !!}
									</li>
								</ul>
							</li>
							@endif
						</ul>
					</div><!-- /.nav-collapse -->
					<input type="hidden" name="current_user_role" id="current_user_role" value="{{$currentUserRole}}">
				</div><!-- /.container -->
			</nav><!-- /.navbar -->
			<nav class="navbar navbar-default navbar-fixed-top header navbar-1" id="header" role="navigation">
				<!-- topbar nav content here -->
				<div class="container">
					<div class="logo pull-left">
						<a href="{{route('home')}}">
							@if($siteConfiguration->siteconfigmedia)
							@if($mainLogo = $siteConfiguration->siteconfigmedia->where('type', 'brand_logo')->first())
							<span class="logo-title"><img src="{{$mainLogo->path}}" width="55%" alt="Brand logo" id="logo" style="margin-top:10px;margin-bottom:10px;"></span>
							@else
							<span class="logo-title"><img src="{{asset('assets/images/main_logo.png')}}" width="55%" alt="Brand logo" id="logo" style="margin-top:10px;margin-bottom:10px;"></span>
							@endif
							@else
							<span class="logo-title"><img src="{{asset('assets/images/main_logo.png')}}" width="55%" alt="Brand logo" id="logo" style="margin-top:10px;margin-bottom:10px;"></span>
							@endif
						</a>
					</div><!--//logo-->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item"><a href="{{route('home')}}" data-href="{{route('home')}}" class="scrollto hide scroll-links reference-link-with-js" id="nav_home">Home</a></li>
							<!-- <li class="nav-item"><a href="{{route('home')}}#what-is-this" class="scrollto">WHAT IS THIS</a></li> -->
							<li class="nav-item"><a href="{{route('home')}}/#how-it-works" data-href="{{route('home')}}/#how-it-works" class="scrollto scroll-links reference-link-with-js">How it works</a></li>
							<li class="nav-item" style="color: #eee;"><a href="{{route('home')}}/#projects" data-href="{{route('home')}}/#projects" class="scrollto scroll-links reference-link-with-js">Invoices</a></li>
							@if($siteConfiguration->show_funding_options != '')
							<li class="nav-item" style="color: #eee;"><a href="{{route('home')}}/#funding" data-href="{{route('home')}}/#funding" class="scrollto scroll-links reference-link-with-js">Funding</a></li>
							@endif
							<li class="nav-item"><a href="/pages/team">About us</a></li>
							<li class="nav-item"><a href="/pages/faq">FAQ</a></li>
							@if (Auth::guest())
							<li class="nav-item"><a href="{{route('users.create')}}">Register</a></li>
							<li class="nav-item"><a href="{{route('users.login')}}">Sign in</a></li>
							@else
							<li class="dropdown nav-item last">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> My Account <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									@if(Auth::user()->roles->contains('role', 'admin') || Auth::user()->roles->contains('role', 'master'))
									<li class="nav-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
									@endif
									<li class="nav-item"><a href="{{route('users.show',[Auth::user()])}}">Profile</a></li>
									<li class="nav-item"><a href="{{route('users.logout')}}">Logout</a></li>
								</ul>
							</li>
							<li class="hide"><a href="#"><i class="fa fa-bell"></i></a></li>
							@endif
						</ul>
					</div>
				</div>
			</nav>
			<!-- header content here -->
			@if($siteConfiguration->siteconfigmedia)
			@if($mainImg = $siteConfiguration->siteconfigmedia->where('type', 'homepg_back_img')->first())
			<section id="promo" style="background: url({{$mainImg->path}}); background-size: cover; background-repeat: no-repeat; background-position: center center;" @if(array_key_exists('city', $geoIpArray)) @if(in_array($geoIpArray['city'], $BannerCities))  @endif @endif>
				@else
				<section id="promo" style="background: url({{asset('assets/images/main_bg.png')}}); background-size: cover; background-repeat: no-repeat; background-position: center center;" @if(array_key_exists('city', $geoIpArray)) @if(in_array($geoIpArray['city'], $BannerCities))  @endif @endif>
					@endif
					@else
					<section id="promo" style="background: url({{asset('assets/images/main_bg.png')}}); background-size: cover; background-repeat: no-repeat; background-position: center center;" @if(array_key_exists('city', $geoIpArray)) @if(in_array($geoIpArray['city'], $BannerCities))  @endif @endif>
						@endif
						<div class="color-overlay main-fold-overlay-color">
							<div class="content container" id="promo-content" style="padding-top:5%;">
								<!-- <img class="img-responsive" src="/assets/images/main_logo.png" alt="Vestabyte" width="250px" class="main-logo" data-wow-duration="1.5s" data-wow-delay="0.2s" style="margin-left:20px; margin-top:20px;"> -->
								<!-- <h2 class="text-center " data-wow-duration="1.5s" data-wow-delay="0.3s" style="font-size: 3.5em; line-height: 1.3em; ">Property Investment starting $2000</h2> -->
								<br><br><br><br>
								<div class="row">
									<div class="homepg-text1 text-center form-group col-md-6 col-md-offset-3">
										<h2 style="color: white; font-size:32px;" class="text-center font-regular fold-text-color">
											@if(!empty($siteConfiguration))
											@if($siteConfiguration->homepg_text1 != '')
											{!! nl2br(e($siteConfiguration->homepg_text1)) !!}
											@else
											Join Australia's 1st Venture<br> Retail Fundraising platform
											@endif
											@else
											Join Australia's 1st Venture<br> Retail Fundraising platform
											@endif
										</h2>
										@if(Auth::guest())
										@else
										@if($admin_access == 1)
										<div>
											<input id="homepg_text1_color" class="jscolor {onFineChange:'updateHomePgText1Color(this)'}" value="@if($color) {{$color->fold_text_color}} @endif">
											<button name="save_homepg_text1_color" class="btn btn-sm btn-primary" onclick="changeFoldTextColor();">Save Color</button>
										</div>
										<div class="text-align" style="margin-top: 10px;"><i class="fa fa-pencil edit-pencil-style edit-homepg-text1" style="font-size: 20px;" data-toggle="tooltip" title="Edit Text" data-placement="right"></i></div>
										@endif
										@endif
										<br>
									</div>
								</div>
								<br><br><br>
								<div class="row">
									<div class="center-btn text-center homepg-btn1-section col-md-12" data-wow-duration="1.5s" data-wow-delay="0.5s">
										<a href="
										@if($siteConfiguration->homepg_btn1_gotoid!='' && $siteConfiguration->homepg_btn1_gotoid != 'projects')
										{!!$siteConfiguration->homepg_btn1_gotoid!!}
										@else
										@if(Auth::check())
										/#projects
										@else
										/users/login
										@endif
										@endif"
										@if($siteConfiguration->homepg_btn1_gotoid!='' && $siteConfiguration->homepg_btn1_gotoid != 'projects')
										class="
										@else
										@if(Auth::check())
										data-href="/#{{'projects'}}" class="scrollto scroll-links
										@else
										class="
										@endif
										@endif
										btn btn-lg font-regular buy-now-btn reference-link-with-js" role="button" style="font-size:22px;z-index: 99999;border:2px solid;">
										@if(!empty($siteConfiguration))
										@if($siteConfiguration->homepg_btn1_text != '')
										{!! nl2br(e($siteConfiguration->homepg_btn1_text)) !!}
										@else
										View Live Ventures
										@endif
										@else
										View Live Ventures
										@endif
									</a>
									@if(Auth::guest())
									@else
									@if($admin_access == 1)
									<div class="text-center">
										<i class="fa fa-pencil edit-pencil-style edit-homepg-btn-text1" style="font-size: 20px; font-size: 20px; margin: 20px 0px 0px -20px; position: absolute;" data-toggle="tooltip" title="Edit Button Text" data-placement="right"></i>
									</div>
									@endif
									@endif
								</div>
								<br>
							</div>
							<br>
						</div>
					</div>
					<div class="row" style="padding: 10% 0 10% 0;background:rgba(255,255,255,1); margin-left: 0px; margin-right: 0px;">
						<div class="col-md-4 text-center">
							<h1 style="font-size: 5em;" ><span style="color: #000;">{{ $totalProjects }}</span></h1>
							<h3 style="color: #000;" >Invoices</h3>
						</div>
						<div class="col-md-4  text-center ">
							<h1 style="font-size: 5em; color: #000;" ><span>{{ $users }}</span></h1>
							<h3 style="color: #000;" >Financiers</h3>
						</div>
						<div class="col-md-4  text-center ">
							<h1 style="font-size: 5em; color: #000;" ><span>100%</span></h1>
							<h3 style="color: #000" >Repayment Rate</h3>
						</div>
					</div>
					<div class="row" style="background:rgba(0,0,0,0);  margin-left: 0px; margin-right: 0px;">
						<div class="col-md-6" style="padding-right: 0px;">
							<div class="col-md-3 col-xs-6"  >
								<img src="/assets/images/spons/5b5e697ac3f7cb075a48c0a6_Konkrete logo-dark-500 -comp.png" width="100%" style="padding-top:21px;">
							</div>
							<div class="col-md-3 col-xs-6" style="padding:0px">
								<img src="/assets/images/spons/anti-hero-capital.png" width="100%">
							</div>
							<div class="col-md-3 col-xs-6" style="padding: 0px;">
								<img src="/assets/images/spons/signum-capital.png" width="100%">
							</div>
							<div class="col-md-3 col-xs-6" style="padding: 0px;">
								<img src="/assets/images/spons/5baad0100657c03f43ca6178_AFR.png" width="100%">
							</div>
						</div>
						<div class="col-md-6" style="padding-left: 0px;">
							<div class="col-md-3 col-xs-6" style="padding: 0px;">
								<img src="/assets/images/spons/5baad00f0657c02052ca6177_Skynews.png" width="100%">
							</div>
							<div class="col-md-3 col-xs-6" style="padding: 0px;" >
								<img src="/assets/images/spons/5bac21335d3456838f1f1d3d_Thirty K.png" width="100%">
							</div>
							<div class="col-md-3 col-xs-6" style="padding: 0px;">
								<img src="/assets/images/spons/5bac21339e1da03725525ed0_Global banking and finance review.png" width="100%">
							</div>
							<div class="col-md-3 col-xs-6" style="padding: 0px;">
								<img src="/assets/images/spons/5bb16032c110e4dd90804988_CTN.png" width="100%">
							</div>
						</div>
					</div>
					<div class="content container" id="promo-content" style="padding-top:1%;">
						@if(Auth::guest())
						@else
						@if($admin_access == 1)
						<br><br>
						<form action="{{route('configuration.uploadVideo')}}" method="POST">
							{{csrf_field()}}
							<span style="font-weight: bold; margin-left: 2em; margin-right: 1.5em; background: rgba(0, 0, 0, 0.3); padding: 5px 15px 5px 15px; border-radius: 20px;">Video:</span><input type="text" name="explainer_video_url" value="{{$siteConfiguration->explainer_video_url}}" data-toggle="tooltip" title="Please enter the iframe link (source) of the video you would like to upload" size="35">
							<button class="btn btn-primary btn-sm" type="submit" style="margin-left: 1.5em;">Save</button>
						</form>
						@endif
						@endif
						<br>
						@if(Auth::guest())
						@else
						@if($admin_access == 1)
						<div class="row">
							<div class="col-md-12">
								<div class="edit-button-style edit-homepg-back-img" style=""><a><i class="fa fa fa-edit fa-lg"></i></a></div>
								<span style="margin: 5px 5px 5px 22px; float: left; background: rgba(0, 0, 0, 0.3); padding: 2px 10px 2px 20px; border-radius: 20px;"><small>Edit Background</small></span>
								<input class="hide" type="file" name="homepg_back_img" id="homepg_back_img">
								<input type="hidden" name="homepg_back_img_name" id="homepg_back_img_name">
							</div>
						</div><br>
						<div class="row text-center col-md-6">
							<div class="col-md-1 update-overlay-opacity" action="decrease" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 100% 0% 0% 100%; border:1px solid #000; cursor: pointer;"><span style="color: #000;"><b>-</b></span></div>
							<div class="col-md-3" style="background-color: rgba(255, 255, 255, 0.7); border:1px solid #000;"><span style="color: #000;"><small><small>Overlay Opacity</small></small></span></div>
							<div class="col-md-1 update-overlay-opacity" action="increase" style="background-color: rgba(255, 255, 255, 0.7); border-radius: 0% 100% 100% 0%; border:1px solid #000; cursor: pointer;"><span style="color: #000;"><b>+</b></span></div>
						</div>
						@endif
						@endif
						<br>
							{{-- <div class="text-center " data-wow-duration="1.5s" data-wow-delay="0.6s">
								<a href="#how-it-works" class="scrollto" style="color:#fff;">Tell Me More <i class="fa fa-angle-down"></i></a>
							</div> --}}
						</div>
					</section>
					<br><br>
					<section class="chunk-box chunk-of-vis @if($siteConfiguration->explainer_video_url == '') hide @endif" style="@if($admin_access == 1) margin-top: 58em ; position:relative; overflow:visible; @else padding: 8% 5% 5% 5% @endif;">
						<div class="container ">
							<div class="row">
								<div class="col-md-offset-1 col-md-10 col-xs-12 video-section">
									<div class="row">
										<div class="col-md-10 col-md-offset-1 text-center">
											<div class="embed-responsive embed-responsive-16by9" style="margin-bottom:4em;position: relative;padding-bottom: 53%;padding-top: 25px;height: 0;">
												<iframe class="embed-responsive-item" width="100%" height="100%" src="{{$siteConfiguration->explainer_video_url}}" frameborder="0" allowfullscreen></iframe>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
					<div class="container ">
						<hr class="first_color @if($siteConfiguration->explainer_video_url == '') hide @endif" style="height:2px;border:none;color:#282a73;background-color:#282a73;" />
					</div>
					<section id="how-it-works" class="chunk-box" style="padding: 2em 0;">
						<div class="container-fluid">
							<div class="row how-it-works-section">
								@if(Auth::guest())
								@else
								@if($admin_access == 1)
								<form action="{{route('configuration.storeHowItWorksContent')}}" method="POST">
									{{csrf_field()}}
									@endif
									@endif
									<div class="col-md-offset-1 col-md-2 " data-wow-duration="1.5s" data-wow-delay="0.5s" style="margin-top: 50px;">
										<div class="" style="color:#6B798F;">
											@if(Auth::guest())
											@else
											@if($admin_access == 1)
											<div class="edit-button-style edit-how-it-works-img1" style="z-index: 10; position: inherit;" action="hiw_img1"><a data-toggle="tooltip" title="Edit Image"><i class="fa fa fa-edit fa-lg"></i></a></div>
											<input class="hide" type="file" name="how_it_works_image" id="how_it_works_image">
											<input type="hidden" name="how_it_works_image_name" id="how_it_works_image_name">
											@endif
											@endif
											@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
											@if($hiwimg = $siteConfigMedia->where('type', 'how_it_works_image1')->first())
											<img src="{{asset($hiwimg->path)}}" class="img-responsive center-block"  width="200" height="200">
											@else
											<img src="{{asset('assets/images/1.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											@else
											<img src="{{asset('assets/images/1.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											<h3 class="how-it-works-title1-section first_color text-center" style="min-height: 52px;">@if($siteConfiguration->how_it_works_title1 != ''){{$siteConfiguration->how_it_works_title1}}@endif</h3>
										</div>
										<p class="how-it-works-desc1-section" style="font-weight:100; color:#6B798F;">@if($siteConfiguration->how_it_works_desc1 != ''){!!$siteConfiguration->how_it_works_desc1!!}@endif</p>
									</div>
									<div class="col-md-2 " data-wow-duration="1.5s" data-wow-delay="0.6s" style="margin-top: 50px;">
										<div class="" style="color:#6B798F;">
											@if(Auth::guest())
											@else
											@if($admin_access == 1)
											<div class="edit-button-style edit-how-it-works-img2" style="z-index: 10; position: inherit;" action="hiw_img2"><a data-toggle="tooltip" title="Edit Image"><i class="fa fa fa-edit fa-lg"></i></a></div>
											@endif
											@endif
											@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
											@if($hiwimg = $siteConfigMedia->where('type', 'how_it_works_image2')->first())
											<img src="{{asset($hiwimg->path)}}" class="img-responsive center-block"  width="200" height="200">
											@else
											<img src="{{asset('assets/images/2.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											@else
											<img src="{{asset('assets/images/2.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											<h3 class="how-it-works-title2-section first_color text-center" style="min-height: 52px;">@if($siteConfiguration->how_it_works_title2 != ''){{$siteConfiguration->how_it_works_title2}}@endif</h3>
										</div>
										<p class="how-it-works-desc2-section" style="font-weight:100; color:#6B798F;">@if($siteConfiguration->how_it_works_desc2 != ''){!!$siteConfiguration->how_it_works_desc2!!}@endif
										</p>
									</div>
									<div class="col-md-2 " data-wow-duration="1.5s" data-wow-delay="0.7s" style="margin-top: 50px;">
										<div class="" style="color:#6B798F;">
											@if(Auth::guest())
											@else
											@if($admin_access == 1)
											<div class="edit-button-style edit-how-it-works-img3" style="z-index: 10; position: inherit;" action="hiw_img3"><a data-toggle="tooltip" title="Edit Image"><i class="fa fa fa-edit fa-lg"></i></a></div>
											@endif
											@endif
											@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
											@if($hiwimg = $siteConfigMedia->where('type', 'how_it_works_image3')->first())
											<img src="{{asset($hiwimg->path)}}" class="img-responsive center-block"  width="200" height="200">
											@else
											<img src="{{asset('assets/images/3.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											@else
											<img src="{{asset('assets/images/3.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											<h3 class="how-it-works-title3-section first_color text-center" style="min-height: 52px;">@if($siteConfiguration->how_it_works_title3 != ''){{$siteConfiguration->how_it_works_title3}}@endif</h3>
										</div>
										<p class="how-it-works-desc3-section" style="font-weight:100; color:#6B798F;">@if($siteConfiguration->how_it_works_desc3 != ''){!!$siteConfiguration->how_it_works_desc3!!}@endif
										</p>
									</div>
									<div class="col-md-2 " data-wow-duration="1.5s" data-wow-delay="0.8s" style="margin-top: 50px;">
										<div class="" style="color:#6B798F;">
											@if(Auth::guest())
											@else
											@if($admin_access == 1)
											<div class="edit-button-style edit-how-it-works-img4" style="z-index: 10; position: inherit;" action="hiw_img4"><a data-toggle="tooltip" title="Edit Image"><i class="fa fa fa-edit fa-lg"></i></a></div>
											@endif
											@endif
											@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
											@if($hiwimg = $siteConfigMedia->where('type', 'how_it_works_image4')->first())
											<img src="{{asset($hiwimg->path)}}" class="img-responsive center-block"  width="200" height="200">
											@else
											<img src="{{asset('assets/images/4.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											@else
											<img src="{{asset('assets/images/4.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											<h3 class="how-it-works-title4-section first_color text-center" style="min-height: 52px;">@if($siteConfiguration->how_it_works_title4 != ''){{$siteConfiguration->how_it_works_title4}}@endif</h3>
										</div>
										<p class="how-it-works-desc4-section" style="font-weight:100; color:#6B798F;">@if($siteConfiguration->how_it_works_desc4 != ''){!!$siteConfiguration->how_it_works_desc4!!}@endif
										</p>
									</div>
									<div class="col-md-2 " data-wow-duration="1.5s" data-wow-delay="0.8s" style="margin-top: 50px;">
										<div class="" style="color:#6B798F;">
											@if(Auth::guest())
											@else
											@if($admin_access == 1)
											<div class="edit-button-style edit-how-it-works-img5" style="z-index: 10; position: inherit;" action="hiw_img5"><a data-toggle="tooltip" title="Edit Image"><i class="fa fa fa-edit fa-lg"></i></a></div>
											@endif
											@endif
											@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
											@if($hiwimg = $siteConfigMedia->where('type', 'how_it_works_image5')->first())
											<img src="{{asset($hiwimg->path)}}" class="img-responsive center-block"  width="200" height="200">
											@else
											<img src="{{asset('assets/images/5.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											@else
											<img src="{{asset('assets/images/5.png')}}" class="img-responsive center-block"  width="200" height="200">
											@endif
											<h3 class="how-it-works-title5-section first_color text-center" style="min-height: 52px;">@if($siteConfiguration->how_it_works_title5 != ''){{$siteConfiguration->how_it_works_title5}}@endif</h3>
										</div>
										<p class="how-it-works-desc5-section" style="font-weight:100; color:#6B798F;">@if($siteConfiguration->how_it_works_desc5 != ''){!!$siteConfiguration->how_it_works_desc5!!}@endif
										</p>
									</div>
									@if(Auth::guest())
									@else
									@if($admin_access == 1)
									<div class="col-md-10 col-md-offset-1">
										<i class="fa fa-pencil edit-pencil-style show-how-it-works-contents-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000;" data-toggle="tooltip" title="Edit How it works Content" data-placement="right"></i>
									</div>
								</form>
								@endif
								@endif
							</div>
						</div>
						<a class="scrollto scroll-links" href="#projects">
							<svg class="arrows">
								<path class="a1" d="M0 0 L15 16 L30 0"></path>
								<path class="a2" d="M0 10 L15 26 L30 10"></path>
								<path class="a3" d="M0 20 L15 36 L30 20"></path>
							</svg>
						</a>
					</section>
					<section class="chunk-box" id="projects" name="projects">
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									@if(Auth::guest())
									@else
									@if($admin_access == 1)
									<i class="fa fa-pencil edit-pencil-style show-smsf-reference-text-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit the text below" data-placement="right"></i>
									@endif
									@endif
									<h2 class="text-center first_color smsf-reference-txt" style="font-weight: 100 !important;">{{$siteConfiguration->smsf_reference_txt}}</h2>
									<br><br>
									<input class="hide" type="file" name="
									project_thumb_image" id="project_thumb_image">
									<input type="hidden" name="project_thumb_image_name" id="project_thumb_image_name">
									<div class="@if(Auth::check()) hide  @endif hide row" >
										<div class="col-md-4 col-md-offset-4 text-center" >
											<a href="/users/login" class="btn btn-block buy-now-btn first_color">
												Sign in to see invoices up for sale
											</a>
										</div>
									</div>
									<br>
									<div id="myBtnContainer" @if(!Auth::check()) class="hide" @endif >
										<button class="filterbtn @if(!request('filter') || (request('filter') == 'all')) active @endif" onclick="filterSelection('all')"> Show all</button>
										<button class="filterbtn @if(request('filter') && (request('filter') == 'buy')) active @endif" onclick="filterSelection('buy')"> Buy Now</button>
										<button class="filterbtn @if(request('filter') && (request('filter') == 'sold')) active @endif" onclick="filterSelection('sold')"> Invoice Sold</button>
										<button class="filterbtn @if(request('filter') && (request('filter') == 'repaid')) active @endif" onclick="filterSelection('repaid')">Invoice Paid</button>
									</div>
									{{-- <div style="padding-top: 1em;">
										@if (Session::has('message'))
										{!! Session::get('message') !!}
										@endif
									</div> --}}
									@if(count($projects)==1)
									@foreach($projects->chunk(1) as $sets)
									<div class="row" >
										@foreach($sets as $project)
										<?php
										$pledged_amount = $investments->where('project_id', $project->id)->where('hide_investment', false)->sum('amount');
										$paid = $investments->where('project_id',$project->id)->where('accepted',1);
										$repurchased = $investments->where('project_id',$project->id)->where('accepted',1)->where('is_repurchased',1);
										$invoice_sold = '0';
									/*if($paid->sum('amount') == $project->investment->goal_amount && $repurchased->sum('amount') ==! $project->investment->goal_amount){
										$invoice_sold = '1';
									}elseif($repurchased->sum('amount') == $project->investment->goal_amount){
										$invoice_sold = '2';
									}*/
									if($project->repurchased->first() || $project->repurchased_by_partial_pay->first())
									{
										$invoice_sold = 2;
									}else if($project->soldInvoice) {
										if($project->soldInvoice->first())
										{
											$invoice_sold = 1;
										}
									}
									if($project->investment) {
										$completed_percent = ($pledged_amount/$project->investment->goal_amount)*100;
										$remaining_amount = $project->investment->goal_amount - $pledged_amount;
									} else {
										$completed_percent = 0;
										$remaining_amount = 0;
									}
									?>
									<div class="col-md-8 col-md-offset-2" style="" id="circle{{$project->id}}">
										@if(Auth::guest())
										@else
										@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin())
										<div class="edit-button-style edit-project-thumb-img" style="z-index: 10; position: inherit;" action="project-img-{{$project->id}}" projectid="{{$project->id}}"><a data-toggle="tooltip" title="Edit Project Image" data-placement="right"><i class="fa fa fa-edit fa-lg"></i></a></div>
										@endif
										@endif
										<a @if($project->is_coming_soon) @if(Auth::user())
											@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin()) href="{{route('projects.show', [$project])}}" @else href="javascript:void(0);"@endif
											@else
											href="javascript:void(0);"
											@endif
											@else @if($invoice_sold == '1') href="{{route('projects.show', [$project])}}" @endif
											@endif name="project-link" style="display: none;">
											<div class="" id="borderB" data-wow-duration="1.5s" data-wow-delay="0.2s" style="padding: 0px; overflow:hidden; box-shadow: 1px 3px 20px 5px #ccc;border-top-left-radius: 30px;">
												<div style="width: 100%; position: relative;" class="project-back  img-responsive bg-imgs @if($project->is_coming_soon) project-details @endif">
													<img src="@if($projectThumb=$project->media->where('type', 'project_thumbnail')->where('project_site', url())->last()){{asset($projectThumb->path)}} @else {{asset('assets/images/Default_thumbnail.jpg')}} @endif" class="img-responsive project-image-style" style="width: 100%" />
													<div class="row" style="padding: 10px 10px 0px 10px; font-size: 16px;">
														<div class="col-md-6" style="padding-top: 10px;">
															<a class="btn btn-block buy-now-btn" href="https://kovan.etherscan.io/token/{{$project->contract_address}}" style="padding: 5px; border: 0px;" target="_blank"><img src="/assets/images/etherium_logo.png" style="margin-right: 20px; height:20px;">{{$project->token_symbol}}</a>
														</div>
														<div class="col-md-6" style="padding-top: 10px">
															<?php $buyBtnText = ($invoice_sold == '1') ? 'Invoice Sold' : (($invoice_sold == '2') ? 'Invoice Paid' : 'Buy ' . $project->title . ' Now'); ?>
															<a class="btn btn-block buy-now-btn white-space-wrap buy-invoice" data-id="{{$project->id}}" data-address="{{$project->contract_address}}" data-amount="@if($project->investment){{number_format($project->investment->calculated_asking_price, 2)}}@endif" @if($invoice_sold == '1' || $invoice_sold == '2') style="border: none; cursor: default;" disabled @else href="{{route('projects.interest', [$project->id])}}" @endif title="{{ $buyBtnText }}" >{{ $buyBtnText }}</a>
															@if($project->repurchased)
															<br>
															<button data-toggle="modal" data-target="#redeemInvTokenModal"></button>
															@endif
														</div>
													</div>
													<div class="project-thumb-overflow" @if(!$project->is_coming_soon) style="display:none;" @endif>
														<span class="project-interest-error-text" style="font-size: 12px; color: #ff0000; font-weight: 100;"></span>
														<input type="text" class="form-control project-{{$project->id}}-email" placeholder="Email ID" value="@if(!Auth::guest()){{Auth::user()->email}}@endif">
														<input type="text" class="form-control project-{{$project->id}}-phone" placeholder="Phone Number" value="@if(!Auth::guest()){{Auth::user()->phone_number}}@endif">
														<br>
														<input type="button" class="btn btn-primary btn-block show-upcoming-project-interest-btn" value="Notify me when live" projectId="{{$project->id}}">
													</div>
													<div class="@if($project->invite_only) invite-only-overlay @endif thn">
														<div class="content">
															<div class="row">
																<div class="col-md-12">
																	@if($project->invite_only)
																	<div class="pull-left text-left" data-wow-duration="1.5s" data-wow-delay="0.3s" style="color:#fff; padding:16px;">
																		@if(Auth::user())
																		<h3>
																			Invite Only Project
																		</h3>
																		@else
																		<h3>
																			<a href="/users/signin?next=#opportunities" style="color:white;">Please Sign In</a>
																			<small style="color:white;">
																				<br> to access Private Project
																			</small>
																		</h3>
																		@endif
																	</div>
																	@endif

																</div>
															</div>
														</div>
													</div>
												</div>

											</a>
											<br>
											@if(Auth::guest())
											@else
											@if($admin_access == 1)
											<i class="fa fa-pencil edit-pencil-style show-project-thumbnail-text-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit the text below" data-placement="right"></i>
											@endif
											@endif
											<div class="caption">
												<form action="{{route('ProjectThumbnailText', $project->id)}}" method="POST">
													{{csrf_field()}}
													<div class="project-thumbnail-txt"></div>
												</form>
												<a @if($project->is_coming_soon) @if(Auth::user())
													@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin()) href="{{route('projects.show', [$project])}}" @else href="javascript:void(0);"@endif
													@else
													href="javascript:void(0);"
													@endif
													@else href="{{route('projects.show', [$project])}}"
													@endif>
													@if($invoice_sold == '1' || $invoice_sold == '2') @else
													<p><small><small>@if($project->project_thumbnail_text){{$project->project_thumbnail_text}} @else @if($project->projectspvdetail)Securities are being offered in a @if($project->project_prospectus_text!='') {{$project->project_prospectus_text}} @elseif((App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->prospectus_text)) {{(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->prospectus_text)}} @else Prospectus @endif for issue of {{$project->projectspvdetail->spv_name}}@endif @endif</small></small></p>
													@endif
													<div class="text-left" @if($invoice_sold == '1' || $invoice_sold == '2') style="margin-top: 5.7rem;" @endif>
														{{--															<div class="col-xs-4 col-sm-4 col-md-4" data-wow-duration="1.5s" data-wow-delay="0.7s">--}}
															{{--																<h4 class="text-left first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px; font-size:22px;" data-wow-duration="1.5s" data-wow-delay="0.4s"><b>{{$project->title}}</b></h4>--}}
														{{--															</div>--}}
														<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.6s" style="@if(!$project->projectconfiguration->show_expected_return) display:none; @endif padding: 0 5px;"><h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">@if($project->investment)${{number_format((int)$project->investment->invoice_amount)}}@endif<small><small><br>@if($config=$project->projectconfiguration)@if($config->expected_return_label_text){{$config->expected_return_label_text}}@else Invoice Amount @endif @else Invoice Amount @endif</small></small></h4>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.6s" style="@if(!$project->projectconfiguration->show_duration) display:none; @endif border-left: thin solid #000; padding: 0 5px;" ><h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">@if(!$invoice_sold)<span class="invoice-due-date hide" id="invoice_due_date_{{ $project->id }}" data-project-id="{{ $project->id }}" data-due-date="@if(!$invoice_sold) {{ $project->investment->fund_raising_close_date }} @endif"> @if($project->investment){{$project->investment->remaining_hours}}@endif</span>@else <span class="invoice-sold-date hide" id="invoice_sold_date_{{ $project->id }}" data-project-id="{{ $project->id }}" data-due-date="{{ $project->investment->fund_raising_close_date }}" data-sold-date="@if($invoice_sold == 1){{ $project->soldInvoice->first()->share_certificate_issued_at }}@elseif($invoice_sold == 2) @if($project->repurchased->first()){{ $project->repurchased->first()->share_certificate_issued_at }}@else{{ $project->repurchased_by_partial_pay->first()->share_certificate_issued_at }}@endif @endif"></span>@endif<span>{{ date("d-m-Y",strtotime($project->investment->fund_raising_close_date)) }}</span><small><small><br>Payment Date</small></small></h4>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.5s" style="border-left: thin solid #000; padding: 0 5px;">
															<h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">
																@if($project->soldInvoice->count())
																<span>${{number_format($project->soldInvoice->first()->amount, 2)}}</span><small><small><br>Asking Price</small></small>
																@elseif($project->repurchased->count())
																<span>${{number_format($project->repurchased->first()->amount, 2)}}</span><small><small><br>Asking Price</small></small>
																@else
																<span class="invoice-asking-amount" id="invoice_asking_amount_{{ $project->id }}" data-project-id="{{ $project->id }}">@if($project->investment) ${{number_format($project->investment->calculated_asking_price, 2)}} @endif</span><small><small><br>Asking Price</small></small>
																@endif
															</h4>
														</div>
													</div>
												</div>
												<br>
												<div style="@if($project->projectconfiguration) @if(!$project->projectconfiguration->show_project_progress) display: none; @endif @endif">
													<div class="progress" style="height:10px; border-radius:0px;background-color:#cccccc;">
														<div class="progress-bar progress-bar-warning second_color_btn" role="progressbar" aria-valuenow="{{$completed_percent}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$completed_percent}}%">
														</div>
													</div>
													<p style="color:#282a73; margin-top:-10px; font-size:18px;">@if($project->investment) ${{number_format($pledged_amount)}} raised of ${{number_format($project->investment->goal_amount)}} @endif</p>
												</div>
											</div>
										</a>
									</div>
									@endforeach
								</div>
								@endforeach
								@else
								@if(count($projects) >2 && count($projects) !== 4)
								@if(Auth::guest())
								@else
								@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin())
								<div class="row" style="margin-bottom: 20px;">
									<input type="button" class="btn btn-default col-md-2 col-md-offset-5 enable-swap-btn" value="Enable Swap">
									&nbsp;&nbsp;&nbsp;<button style="background: none; border: none;"><i class="fa fa-refresh swap-projects-btn" aria-hidden="true" style="font-size: 2em; cursor: pointer;color: #000; vertical-align: -webkit-baseline-middle;" data-toggle="tooltip" title="Swap"></i></button><br>
									<div style="text-align: center;"><span class="projects-swap-guide-msg" style="font-size: 0.7em; color: #ce1e1e;"></span></div>
								</div>
								@endif
								@endif
								@foreach($projects->chunk(3) as $sets)
								<div class="row" id="project-section-to-reload1">
									@foreach($sets as $project)
									<?php
									$pledged_amount = $investments->where('project_id', $project->id)->where('hide_investment', false)->sum('amount');
									$paid = $investments->where('project_id',$project->id)->where('accepted',1);
									$repurchased = $investments->where('project_id',$project->id)->where('accepted',1)->where('is_repurchased',1);
									$invoice_sold = '0';
								/*if($paid->sum('amount') == $project->investment->goal_amount && $repurchased->sum('amount') ==! $project->investment->goal_amount){
									$invoice_sold = '1';
								}elseif($repurchased->sum('amount') == $project->investment->goal_amount){
									$invoice_sold = '2';
								}*/
								if($project->repurchased->first() || $project->repurchased_by_partial_pay->first())
								{
									$invoice_sold = 2;
								}else if($project->soldInvoice) {
									if($project->soldInvoice->first())
									{
										$invoice_sold = 1;
									}
								}

								if($project->investment) {
									$completed_percent = ($pledged_amount/$project->investment->goal_amount)*100;
									$remaining_amount = $project->investment->goal_amount - $pledged_amount;
								} else {
									$completed_percent = 0;
									$remaining_amount = 0;
								}
								?>
								@if($invoice_sold =='1')

								<div class="col-md-4 swap-select-overlay  sold" style="padding-top: 15px;" id="circle{{$project->id}}">
									@elseif($invoice_sold == '2')

									<div class="col-md-4 swap-select-overlay  repaid" style="padding-top: 15px;" id="circle{{$project->id}}">
										@else
										<div class="col-md-4 swap-select-overlay  buy" style="padding-top: 15px;" id="circle{{$project->id}}">
											@endif
											<div class="swap-select-overlay-style" data-toggle="tooltip" title="Select project to swap" projectRank="{{$project->project_rank}}" style="display: none;"></div>
											@if(Auth::guest())
											@else
											@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin())
											<div class="edit-button-style edit-project-thumb-img" style="z-index: 10; position: inherit;" action="project-img-{{$project->id}}" projectid="{{$project->id}}"><a data-toggle="tooltip" title="Edit Project Image" data-placement="right"><i class="fa fa fa-edit fa-lg"></i></a></div>
											@endif
											@endif
											<a @if($project->is_coming_soon) @if(Auth::user())
												@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin()) href="{{route('projects.interest', [$project->id])}}" @else href="javascript:void(0);"@endif
												@else
												href="javascript:void(0);"
												@endif
												@else @if($invoice_sold == '1') @elseif($invoice_sold == '2')  @else href="{{route('projects.interest', [$project->id])}}" @endif style="display: none;"
												@endif>
												<div class="" id="borderB" data-wow-duration="1.5s" data-wow-delay="0.2s" style="padding: 0px 10px; overflow:hidden; box-shadow: 1px 3px 20px 5px #ccc;border-top-left-radius: 30px;">
													<div style="width: 100%; position: relative;" class="project-back  img-responsive bg-imgs @if($project->is_coming_soon) project-details @endif">
														<img src="@if($projectThumb=$project->media->where('type', 'project_thumbnail')->where('project_site', url())->last()){{asset($projectThumb->path)}} @else {{asset('assets/images/Default_thumbnail.jpg')}} @endif" class="img-responsive project-image-style" style="width: 100%"/>
														<div class="row" style="padding: 10px 10px 0px 10px; font-size: 16px;">
															<div class="col-md-6" style="padding-top: 10px;">
																<a class="btn btn-block buy-now-btn" href="https://kovan.etherscan.io/token/{{$project->contract_address}}" target="_blank" style="padding: 5px; border: 0px;"><img src="/assets/images/etherium_logo.png" style="margin-right: 20px;height: 20px;">{{$project->token_symbol}}</a>
															</div>
															<div class="col-md-6" style="padding-top: 10px;">
																<?php $buyBtnText = ($invoice_sold =='1') ? 'Invoice Sold' : (($invoice_sold == '2') ? 'Invoice Paid' : 'Buy ' . $project->title . ' Now'); ?>
																<a class="btn btn-block buy-now-btn white-space-wrap buy-invoice"  @if($invoice_sold == '1' || $invoice_sold == '2') style="border: none; cursor: default;" disabled @else href="{{route('projects.interest', [$project->id])}}" @endif title="{{ $buyBtnText }}" data-id="{{$project->id}}" data-address="{{$project->contract_address}}" data-amount="@if($project->investment){{number_format($project->investment->calculated_asking_price, 2)}}@endif">{{ $buyBtnText }}</a>
															@if(!$project->repurchased->isEmpty())
															<br>
															<button class="btn btn-info buy-now-btn redeemInvTokenModal" data-address="{{$project->contract_address}}"> Redeem Inv Token</button>
															@endif
															</div>
														</div>
														<div class="project-thumb-overflow text-center" @if(!$project->is_coming_soon) style="display:none;" @endif>
															<span class="project-interest-error-text" style="font-size: 12px; color: #ff0000; font-weight: 100;"></span>
															<input type="text" class="form-control project-{{$project->id}}-email" placeholder="Email ID" value="@if(!Auth::guest()){{Auth::user()->email}}@endif">
															<input type="text" class="form-control project-{{$project->id}}-phone" placeholder="Phone Number" value="@if(!Auth::guest()){{Auth::user()->phone_number}}@endif">
															<br>
															<input type="button" class="btn btn-primary btn-block show-upcoming-project-interest-btn" value="Notify me when live" projectId="{{$project->id}}">
														</div>
														<div class="@if($project->invite_only) invite-only-overlay @endif thn">
															<div class="content">
																<div class="row">
																	<div class="col-md-12">
																		@if($project->invite_only)
																		<div class="pull-left text-left" data-wow-duration="1.5s" data-wow-delay="0.3s" style="color:#fff; padding:16px;">
																			@if(Auth::user())
																			<h3>
																				Invite Only Project
																			</h3>
																			@else
																			<h3>
																				<a href="/users/signin?next=#opportunities" style="color:white;">Please Sign In</a>
																				<small style="color:white;">
																					<br> to access Private Project
																				</small>
																			</h3>
																			@endif
																		</div>
																		@endif

																	</div>
																</div>
															</div>
														</div>
													</div>
												</a>
												<br>
												@if(Auth::guest())
												@else
												@if($admin_access == 1)
												<i class="fa fa-pencil edit-pencil-style show-project-thumbnail-text-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit the text below" data-placement="right"></i>
												@endif
												@endif
												<div class="caption">
													<form action="{{route('ProjectThumbnailText', $project->id)}}" method="POST">
														{{csrf_field()}}
														<div class="project-thumbnail-txt"></div>
													</form>
													<a @if($project->is_coming_soon) @if(Auth::user())
														@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin()) href="{{route('projects.interest', [$project->id])}}" @else href="javascript:void(0);"@endif
														@else
														href="javascript:void(0);"
														@endif
														@else @if($invoice_sold == '1') @elseif($invoice_sold == '2')  @else href="{{route('projects.interest', [$project->id])}} @endif"
														@endif>
														@if($invoice_sold == '1' || $invoice_sold == '2') @else
														<p><small><small>@if($project->project_thumbnail_text){{$project->project_thumbnail_text}} @else @if($project->projectspvdetail)Securities are being offered in a @if($project->project_prospectus_text!='') {{$project->project_prospectus_text}} @elseif((App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->prospectus_text)) {{(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->prospectus_text)}} @else Prospectus @endif for issue of {{$project->projectspvdetail->spv_name}}@endif @endif</small></small></p>
														@endif
														<div class="row text-left" @if($invoice_sold == '1' || $invoice_sold == '2') style="margin-top: 5.7rem;" @endif>
															{{--																<div class="col-xs-4 col-sm-4 col-md-4 listing-3-0" data-wow-duration="1.5s" data-wow-delay="0.7s">--}}
																{{--																	<h4 class="text-left first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px; font-size:22px;" data-wow-duration="1.5s" data-wow-delay="0.4s"><b>{{$project->title}}</b></h4>--}}
															{{--																</div>--}}
															<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.6s" style="@if(!$project->projectconfiguration->show_expected_return) display:none; @endif padding: 0 5px;"><h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;"><span style="white-space: nowrap;">@if($project->investment)${{number_format((int)$project->investment->invoice_amount)}}@endif</span><small><small><br>@if($config=$project->projectconfiguration)@if($config->expected_return_label_text){{$config->expected_return_label_text}}@else Invoice Amount @endif @else Invoice Amount @endif</small></small></h4>
															</div>
															<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.6s" style="@if(!$project->projectconfiguration->show_duration) display:none; @endif border-left: thin solid #000; padding: 0 5px;" ><h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">@if(!$invoice_sold)<span class="invoice-due-date hide" id="invoice_due_date_{{ $project->id }}" data-project-id="{{ $project->id }}" data-due-date="@if(!$invoice_sold) {{ $project->investment->fund_raising_close_date }} @endif"> @if($project->investment){{$project->investment->remaining_hours}}@endif</span>@else <span class="invoice-sold-date hide" id="invoice_sold_date_{{ $project->id }}" data-project-id="{{ $project->id }}" data-due-date="{{ $project->investment->fund_raising_close_date }}" data-sold-date="@if($invoice_sold == 1){{ $project->soldInvoice->first()->share_certificate_issued_at }}@elseif($invoice_sold == 2) @if($project->repurchased->first()){{ $project->repurchased->first()->share_certificate_issued_at }}@else{{ $project->repurchased_by_partial_pay->first()->share_certificate_issued_at }}@endif @endif"></span>@endif<span>{{ date("d-m-Y",strtotime($project->investment->fund_raising_close_date)) }}</span><small><small><br>Payment Date</small></small></h4>
															</div>
															<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.5s" style="border-left: thin solid #000; padding: 0 5px;">
																<h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">
																	@if($project->soldInvoice->count())
																	<span>${{number_format($project->soldInvoice->first()->amount, 2)}}</span><small><small><br>Asking Price</small></small>
																	@elseif($project->repurchased->count())
																	<span>${{number_format($project->repurchased->first()->amount, 2)}}</span><small><small><br>Asking Price</small></small>
																	@else
																	<span class="invoice-asking-amount" id="invoice_asking_amount_{{ $project->id }}" data-project-id="{{ $project->id }}">@if($project->investment) ${{number_format($project->investment->calculated_asking_price, 2)}} @endif</span><small><small><br>Asking Price</small></small>
																	@endif
																</h4>
															</div>
														</div>
													</div>
													<br>
													<div style="@if($project->projectconfiguration) @if(!$project->projectconfiguration->show_project_progress) display: none; @endif @endif">
														<div class="progress" style="height:10px; border-radius:0px;background-color:#cccccc;">
															<div class="progress-bar progress-bar-warning second_color_btn" role="progressbar" aria-valuenow="{{$completed_percent}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$completed_percent}}%">
															</div>
														</div>
														<p style="color:#282a73; margin-top:-10px; font-size:18px;">@if($project->investment) ${{number_format($pledged_amount)}} raised of ${{number_format($project->investment->goal_amount)}} @endif</p>
													</div>
												</div>
											</a>
										</div>
										@endforeach
									</div>
									<br>
									@endforeach
									@else
									@if(Auth::guest())
									@else
									@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin())
									<div class="row" style="margin-bottom: 20px;">
										<input type="button" class="btn btn-default col-md-2 col-md-offset-5 enable-swap-btn" value="Enable Swap">
										&nbsp;&nbsp;&nbsp;<button style="background: none; border: none;"><i class="fa fa-refresh swap-projects-btn" aria-hidden="true" style="font-size: 2em; cursor: pointer;color: #000; vertical-align: -webkit-baseline-middle;" data-toggle="tooltip" title="Swap"></i></button><br>
										<div style="text-align: center;"><span class="projects-swap-guide-msg" style="font-size: 0.7em; color: #ce1e1e;"></span></div>
									</div>
									@endif
									@endif
									@foreach($projects->chunk(2) as $sets)
									<div class="row" id="project-section-to-reload2">
										@foreach($sets as $project)
										<?php
										$pledged_amount = $investments->where('project_id', $project->id)->where('hide_investment', false)->sum('amount');
										$paid = $investments->where('project_id',$project->id)->where('accepted',1);
										$repurchased = $investments->where('project_id',$project->id)->where('accepted',1)->where('is_repurchased',1);
										$invoice_sold = '0';
									/*if($paid->sum('amount') == $project->investment->goal_amount && $repurchased->sum('amount') ==! $project->investment->goal_amount){
										$invoice_sold = '1';
									}elseif($repurchased->sum('amount') == $project->investment->goal_amount){
										$invoice_sold = '2';
									}*/
									if($project->repurchased->first() || $project->repurchased_by_partial_pay->first())
									{
										$invoice_sold = 2;
									}else if($project->soldInvoice) {
										if($project->soldInvoice->first())
										{
											$invoice_sold = 1;
										}
									}
									if($project->investment) {
										$completed_percent = ($pledged_amount/$project->investment->goal_amount)*100;
										$remaining_amount = $project->investment->goal_amount - $pledged_amount;
									} else {
										$completed_percent = 0;
										$remaining_amount = 0;
									}
									?>
									@if($invoice_sold == '1')
									<div class="col-sm-6 col-md-6 swap-select-overlay  sold"  id="circle{{$project->id}}" style=" padding-top: 20px;">
										@elseif($invoice_sold == '2')
										<div class="col-sm-6 col-md-6 swap-select-overlay  repaid"  id="circle{{$project->id}}" style=" padding-top: 20px;">
											@else <div class="col-sm-6 col-md-6 swap-select-overlay  buy"  id="circle{{$project->id}}" style=" padding-top: 20px;">
												@endif
												<div class="swap-select-overlay-style" data-toggle="tooltip" title="Select project to swap" projectRank="{{$project->project_rank}}" style="display: none;"></div>
												@if(Auth::guest())
												@else
												@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin())
												<div class="edit-button-style edit-project-thumb-img" style="z-index: 10; position: inherit;" action="project-img-{{$project->id}}" projectid="{{$project->id}}"><a data-toggle="tooltip" title="Edit Project Image" data-placement="right"><i class="fa fa fa-edit fa-lg"></i></a></div>
												@endif
												@endif
												<a style="display: none;" @if($project->is_coming_soon) @if(Auth::user())
													@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin()) href="{{route('projects.interest', [$project->id])}}" @else href="javascript:void(0);"@endif
													@else
													href="javascript:void(0);"
													@endif
													@else @if($invoice_sold == '1') @elseif($invoice_sold == '2')  @else href="{{route('projects.interest', [$project->id])}}" style="display: none;" @endif
													@endif>
													<div class="" id="borderB" data-wow-duration="1.5s" data-wow-delay="0.2s" style="padding: 0px 10px; overflow:hidden;box-shadow: 1px 3px 20px 5px #ccc;border-top-left-radius: 30px;">
														<div style="width: 100%; position: relative;" class="project-back  img-responsive bg-imgs @if($project->is_coming_soon) project-details @endif">
															<img src="@if($projectThumb=$project->media->where('type', 'project_thumbnail')->where('project_site', url())->last()){{asset($projectThumb->path)}} @else {{asset('assets/images/Default_thumbnail.jpg')}} @endif" class="img-responsive project-image-style" style="width: 100%"/>
															<div class="row" style="padding: 10px 10px 0px 10px; font-size: 16px;">
																<div class="col-md-6" style="padding-top: 10px;">
																	<a class="btn btn-block buy-now-btn" href="https://kovan.etherscan.io/token/{{$project->contract_address}}" style="padding: 5px; border: 0px;" target="_blank"><img src="/assets/images/etherium_logo.png" style="margin-right: 20px; height:20px;">{{$project->token_symbol}}</a>
																</div>
																<div class="col-md-6" style="padding-top: 10px;">
																	<?php $buyBtnText = ($invoice_sold == '1') ? 'Invoice Sold' : (($invoice_sold == '2') ? 'Invoice Paid' : 'Buy ' . $project->title . ' Now'); ?>
																	<a class="btn btn-block buy-now-btn white-space-wrap buy-invoice" @if($invoice_sold == '1' || $invoice_sold == '2') style="border: none; cursor: default;" disabled @else href="{{route('projects.interest', [$project->id])}}" @endif title="{{ $buyBtnText }}" data-id="{{$project->id}}" data-address="{{$project->contract_address}}" data-amount="@if($project->investment){{number_format($project->investment->calculated_asking_price, 2)}}@endif">{{ $buyBtnText }}</a>
																</div>
															</div>
															<div class="project-thumb-overflow" @if(!$project->is_coming_soon) style="display:none;" @endif>
																<span class="project-interest-error-text" style="font-size: 12px; color: #ff0000; font-weight: 100;"></span>
																<input type="text" class="form-control project-{{$project->id}}-email" placeholder="Email ID" value="@if(!Auth::guest()){{Auth::user()->email}}@endif">
																<input type="text" class="form-control project-{{$project->id}}-phone" placeholder="Phone Number" value="@if(!Auth::guest()){{Auth::user()->phone_number}}@endif">
																<br>
																<input type="button" class="btn btn-primary btn-block show-upcoming-project-interest-btn" value="Notify me when live" projectId="{{$project->id}}">
															</div>
															<div class="@if($project->invite_only) invite-only-overlay @endif thn">
																<div class="content">
																	<div class="row">
																		<div class="col-md-12">
																			@if($project->invite_only)
																			<div class="pull-left text-left" data-wow-duration="1.5s" data-wow-delay="0.3s" style="color:#fff; padding:16px;">
																				@if(Auth::user())
																				<h3>
																					Invite Only Project
																				</h3>
																				@else
																				<h3>
																					<a href="/users/signin?next=#opportunities" style="color:white;">Please Sign In</a>
																					<small style="color:white;">
																						<br> to access Private Project
																					</small>
																				</h3>
																				@endif
																			</div>
																			@endif
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</a>
													<br>
													@if(Auth::guest())
													@else
													@if($admin_access == 1)
													<i class="fa fa-pencil edit-pencil-style show-project-thumbnail-text-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit the text below" data-placement="right"></i>
													@endif
													@endif
													<div class="caption">
														<form action="{{route('ProjectThumbnailText', $project->id)}}" method="POST">
															{{csrf_field()}}
															<div class="project-thumbnail-txt"></div>
														</form>
														<a @if($project->is_coming_soon) @if(Auth::user())
															@if(App\Helpers\SiteConfigurationHelper::isSiteAdmin()) href="{{route('projects.interest', [$project->id])}}" @else href="javascript:void(0);"@endif
															@else
															href="javascript:void(0);"
															@endif
															@else @if($invoice_sold == '1') @elseif($invoice_sold == '2')  @else href="{{route('projects.interest', [$project->id])}}" @endif
															@endif>
															@if($invoice_sold == '1' || $invoice_sold == '2') @else
															<p><small><small>@if($project->project_thumbnail_text){{$project->project_thumbnail_text}} @else @if($project->projectspvdetail)Securities are being offered in a @if($project->project_prospectus_text!='') {{$project->project_prospectus_text}} @elseif((App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->prospectus_text)) {{(App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->prospectus_text)}} @else Prospectus @endif for issue of {{$project->projectspvdetail->spv_name}}@endif @endif</small></small></p>
															@endif
															<div class="row text-left" @if($invoice_sold == '1' || $invoice_sold == '2') style="margin-top: 5.7rem;" @endif>
																{{--																	<div class="col-xs-5 col-sm-5 col-md-6 " data-wow-duration="1.5s" data-wow-delay="0.7s">--}}
																	{{--																		<h4 class="text-left first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px; font-size:22px;" data-wow-duration="1.5s" data-wow-delay="0.4s"><b>{{$project->title}}</b></h4>--}}
																{{--																	</div>--}}
																<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.6s" style="@if(!$project->projectconfiguration->show_expected_return) display:none; @endif padding: 0 5px;">
																	<h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">@if($project->investment)${{number_format((int)$project->investment->invoice_amount)}}@endif<small><small><br>@if($config=$project->projectconfiguration)@if($config->expected_return_label_text){{$config->expected_return_label_text}}@else Invoice Amount @endif @else Invoice Amount @endif</small></small></h4>
																</div>
																<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.6s" style="@if(!$project->projectconfiguration->show_duration) display:none; @endif border-left: thin solid #000; padding: 0 5px;" ><h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">@if(!$invoice_sold)<span class="invoice-due-date hide" id="invoice_due_date_{{ $project->id }}" data-project-id="{{ $project->id }}" data-due-date="@if(!$invoice_sold) {{ $project->investment->fund_raising_close_date }} @endif"> @if($project->investment){{$project->investment->remaining_hours}}@endif</span>@else <span class="invoice-sold-date hide" id="invoice_sold_date_{{ $project->id }}" data-project-id="{{ $project->id }}" data-due-date="{{ $project->investment->fund_raising_close_date }}" data-sold-date="@if($invoice_sold == 1){{ $project->soldInvoice->first()->share_certificate_issued_at }}@elseif($invoice_sold == 2) @if($project->repurchased->first()){{ $project->repurchased->first()->share_certificate_issued_at }}@else{{ $project->repurchased_by_partial_pay->first()->share_certificate_issued_at }}@endif @endif"></span>@endif<span>{{ date("d-m-Y",strtotime($project->investment->fund_raising_close_date)) }}</span><small><small><br>Payment Date</small></small></h4>
																</div>
																<div class="col-xs-4 col-sm-4 col-md-4 text-center" data-wow-duration="1.5s" data-wow-delay="0.5s" style="border-left: thin solid #000; padding: 0 5px;">
																	<h4 class="first_color" style="color:#282a73;margin-top:1px;margin-bottom:1px;font-size:22px;">
																		@if($project->soldInvoice->count())
																		<span>${{number_format($project->soldInvoice->first()->amount, 2)}}</span><small><small><br>Asking Price</small></small>
																		@elseif($project->repurchased->count())
																		<span>${{number_format($project->repurchased->first()->amount, 2)}}</span><small><small><br>Asking Price</small></small>
																		@else
																		<span class="invoice-asking-amount" id="invoice_asking_amount_{{ $project->id }}" data-project-id="{{ $project->id }}">@if($project->investment) ${{number_format($project->investment->calculated_asking_price, 2)}} @endif</span><small><small><br>Asking Price</small></small>
																		@endif
																	</h4>
																</div>
															</div>
														</div>
														<br>
														<div style="@if($project->projectconfiguration) @if(!$project->projectconfiguration->show_project_progress) display: none; @endif @endif">
															<div class="progress" style="height:10px; border-radius:0px;background-color:#cccccc;">
																<div class="progress-bar progress-bar-warning second_color_btn" role="progressbar" aria-valuenow="{{$completed_percent}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$completed_percent}}%">
																</div>
															</div>
															<p style="color:#282a73; margin-top:-10px; font-size:18px;">@if($project->investment) ${{number_format($pledged_amount)}} raised of ${{number_format($project->investment->goal_amount)}} @endif</p>
														</div>
													</div>
												</a>
											</div>
											@endforeach
										</div>
										@endforeach
										@endif
										@endif
									</div>
								</div>
								<br><br>
								<?php

								if($siteConfiguration->prospectus_text != '') {
									$prospectus = $siteConfiguration->prospectus_text;
								} else {
									$prospectus = "Prospectus";
								}
								?>
								@if(Auth::guest())
								@else
								@if($admin_access == 1)
								<div class="row text-left hide">
									<i class="fa fa-pencil edit-pencil-style show-grey-box-note-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit the below content" data-placement="right"></i>
								</div>
								@endif
								@endif
								<div class="row grey hide" style="padding: 1em 1em; border-radius: 10px;">
									<form action="{{ route('configuration.updateGreyBoxNote') }}" method="POST">
										{{csrf_field()}}
										<p class="col-md-12 text-justify grey-box-note-content"><small style="color: #888;">@if($siteConfiguration->grey_box_note){{$siteConfiguration->grey_box_note}} @else You can download the {{$prospectus}} for the offer on the Project details page which can be accessed by clicking on the Project listing above. The online Application form will be provided alongside the {{$prospectus}}. You should carefully review the {{$prospectus}} in deciding whether to acquire the securities; and anyone who wants to acquire the securities will need to complete the online application form that will accompany the {{$prospectus}}. @endif</small></p>
									</form>
									<p class="col-md-12  investment-title1-description-section text-justify" style="font-size:16px;">
										<small class="fold-text-color">@if($siteConfiguration->compliance_description != '')
											{!!html_entity_decode($siteConfiguration->compliance_description)!!} @else
											The content provided on this website has been prepared without taking into account your financial situation, objectives and needs. Before making any decision in relation to any products offered on this website you should read the Factoring Arrangement terms and conditions or any other offer documents relevant to that offer and consider whether they are right for you. Konkrete Distributed Registries Ltd (ABN 67617252909) (Konkrete) provides technology, administrative and support services for the operation of this website. Konkrete is not a party to the offers made on the website.
										@endif</small>
									</p>
									@if(Auth::guest())
									@else
									@if($admin_access == 1)
									<i class="fa fa-pencil edit-pencil-style show-investment-title1-desc-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit Above Description" data-placement="right"></i>
									@endif
									@endif
									<input type="hidden" id="hiddent_investment_title1_description" value="@if($siteConfiguration->compliance_description != '') {!! html_entity_decode($siteConfiguration->compliance_description) !!} @else {!!  "The content provided on this website has been prepared without taking into account your financial situation, objectives and needs. Before making any decision in relation to any products offered on this website you should read the prospectus, product disclosure statement, information memorandum or any other offer documents relevant to that offer and consider whether they are right for you. The specific offer document is available at the Project and Project Application Pages. Tech Baron PTY LTD (ABN 67617252909) (Tech Baron) which is a Corporate Authorised Representative 001264952 of AFSL 275444) provides technology, administrative and support services for the operation of this website. Tech Baron is authorised to deal in securities only and is not party to the offers made on the website. Here is a copy of our <a href='"!!} @if($siteConfiguration->financial_service_guide_link){{$siteConfiguration->financial_service_guide_link}} @else{!!"https://www.dropbox.com/s/gux7ly75n4ps4ub/Tech%20Baron%20AusFirst%20Financial%20Services%20Guide.pdf?dl=0"!!}@endif{!!"' target='_blank'><span style='text-decoration: none; color: #888;'>Financial Services Guide<span></a>." !!} @endif">
									</div>
								</div>
							</section>
{{--<section id="security" class="chunk-box bottom-padding-zero" style="padding:2em 0;">
	<div class="container">
		<div class="row" id="pick">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4" data-wow-duration="1.5s">
						<div class="row">
							@if(Auth::guest())
							@else
							@if($admin_access == 1)
							<div class="edit-button-style edit-homepg-investment-img" style="margin-left: 15px; margin-top: 50px; z-index: 10"><a data-toggle="tooltip" title="Edit Investment Image"><i class="fa fa fa-edit fa-lg"></i></a></div>
							<input class="hide" type="file" name="investment_page_image" id="investment_page_image">
							<input type="hidden" name="investment_page_image_name" id="investment_page_image_name">
							@endif
							@endif
							<div class="col-md-12">
								<center>
								@if($siteConfigMedia=$siteConfiguration->siteconfigmedia)
								@if($InvestImg=$siteConfigMedia->where('type', 'investment_page_image')->first())
								<img src="{{asset($InvestImg->path)}}" alt="side image" class="security-image img-responsive" width="40%" style="padding-top:40px;">
								@else
								<img src="{{asset('assets/images/Disclosure-250.png')}}" alt="side image" class="security-image img-responsive" width="40%" style="padding-top:40px;">
								@endif
								@else
								<img src="{{asset('assets/images/Disclosure-250.png')}}" alt="side image" class="security-image img-responsive" width="40%" style="padding-top:40px;">
								@endif
								</center>
							</div>
						</div>
					</div>
					<div class="col-md-6" data-wow-duration="1.5s">
						<h3 class="text-left first_color investment-title1-section" style="font-weight:600 !important; color:#282a73; font-size:32px;">
							@if($siteConfiguration->compliance_title != '')
							{!!html_entity_decode($siteConfiguration->compliance_title)!!}
							@else
							Compliance
							@endif
							@if(Auth::guest())
							@else
							@if($admin_access == 1)
							<i class="fa fa-pencil edit-pencil-style show-investment-title1-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit Title" data-placement="right"></i>
							@endif
							@endif
						</h3><br>
						<p class="investment-title1-description-section text-justify" style="font-size:16px;">@if($siteConfiguration->compliance_description != '')
							{!!html_entity_decode($siteConfiguration->compliance_description)!!} @else
							The content provided on this website has been prepared without taking into account your financial situation, objectives and needs. Before making any decision in relation to any products offered on this website you should read the prospectus, product disclosure statement, information memorandum or any other offer documents relevant to that offer and consider whether they are right for you. The specific offer document is available at the Project and Project Application Pages. Tech Baron PTY LTD (ABN 67617252909) (Tech Baron) which is a Corporate Authorised Representative @if($siteConfiguration->car_no != '') {{$siteConfiguration->car_no}} @else 001264952 @endif of AFSL @if($siteConfiguration->afsl_no != '') {{$siteConfiguration->afsl_no}} @else 275444 @endif provides technology, administrative and support services for the operation of this website. Tech Baron is authorised to deal in securities only and is not party to the offers made on the website. Here is a copy of our <a href="https://www.dropbox.com/s/gux7ly75n4ps4ub/Tech%20Baron%20AusFirst%20Financial%20Services%20Guide.pdf?dl=0" target="_blank"><span style="color: @if($color) @if($color->nav_footer_color)#{{$color->nav_footer_color}}@else #282a73 @endif @else #282a73 @endif; text-decoration: none;">Financial Services Guide<span></a>.
							@endif
						</p>
						@if(Auth::guest())
							@else
							@if($admin_access == 1)
							<i class="fa fa-pencil edit-pencil-style show-investment-title1-desc-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000; margin-bottom: 0.7em;" data-toggle="tooltip" title="Edit Description" data-placement="right"></i>
							@endif
							@endif
						<input type="hidden" id="hiddent_investment_title1_description" value="@if($siteConfiguration->compliance_description != '') {!! html_entity_decode($siteConfiguration->compliance_description) !!} @else {!!  "The content provided on this website has been prepared without taking into account your financial situation, objectives and needs. Before making any decision in relation to any products offered on this website you should read the prospectus, product disclosure statement, information memorandum or any other offer documents relevant to that offer and consider whether they are right for you. The specific offer document is available at the Project and Project Application Pages. Tech Baron PTY LTD (ABN 67617252909) (Tech Baron) which is a Corporate Authorised Representative 001264952 of AFSL 275444) provides technology, administrative and support services for the operation of this website. Tech Baron is authorised to deal in securities only and is not party to the offers made on the website. Here is a copy of our <a href='https://www.dropbox.com/s/gux7ly75n4ps4ub/Tech%20Baron%20AusFirst%20Financial%20Services%20Guide.pdf?dl=0' target='_blank'><span class='compliance_description_color' style='text-decoration: none;'>Financial Services Guide<span></a>." !!} @endif">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<br><br>--}}
@if(Auth::guest())
@else
@if($admin_access == 1)
<form action="{{route('configuration.storeShowFundingOptionsFlag')}}" method="POST">
	{{csrf_field()}}
	<div class="text-center"><label><input type="checkbox" name="show_funding_options" data-toggle="toggle" @if($siteConfiguration->show_funding_options != '') checked @endif>Show Funding Options</label></div>
	<div class="text-center"><button type="Submit" class="btn btn-sm btn-primary">Save</button></div>
</form>
@endif
@endif
<div class="container @if($siteConfiguration->show_funding_options == '') hide @endif">
	<hr class="first_color" style="height:2px;border:none;color:#282a73;background-color:#282a73; " id="funding" />
</div>
<section id="developer" class="chunk-box @if($siteConfiguration->show_funding_options == '') hide @endif">
	<div class="container">
		@if(Auth::guest())
		@else
		@if($admin_access == 1)
		<form action="{{route('configuration.editHomePgFundingSectionContent')}}" method="POST">
			{{csrf_field()}}
			@endif
			@endif
			<div class="row">
				<div class="col-md-12">
					<h3 class="text-center heading-font-semibold first_color funding-section-title1-field" data-wow-duration="1.5s" data-wow-delay="0.3s" style=" font-size: 26px; line-height:1.3em;">
						@if($siteConfiguration->funding_section_title1 != ''){!!nl2br(e($siteConfiguration->funding_section_title1))!!}@endif
					</h3>
					<input type="hidden" id="hidden_funding_section_title1" value="@if($siteConfiguration->funding_section_title1 != '') {!! nl2br(e($siteConfiguration->funding_section_title1)) !!} @endif">
					<br>
					<div class="text-center funding-section-btn1-field" data-wow-duration="1.5s" data-wow-delay="0.4s">
						<a id="second_color_venture" href="{{route('projects.create')}}" class="btn text-center buy-now-btn" style="padding: 8px 24px;font-size:22px; border-radius:50px; letter-spacing:1px; border:2px solid;">
							@if($siteConfiguration->funding_section_btn1_text != ''){!!$siteConfiguration->funding_section_btn1_text!!}@endif
						</a>
					</div>
					<br><br>
				</div>
				<div class="col-md-5 hide">
					<h3 class="text-center heading-font-semibold first_color funding-section-title2-field" data-wow-duration="1.5s" data-wow-delay="0.3s" style=" font-size: 26px; line-height:1.3em;">
						@if($siteConfiguration->funding_section_title2 != ''){!!nl2br(e($siteConfiguration->funding_section_title2))!!}@endif
					</h3>
					<input type="hidden" id="hidden_funding_section_title2" value="@if($siteConfiguration->funding_section_title2 != '') {!! nl2br(e($siteConfiguration->funding_section_title2)) !!} @endif">
					<br>
					<div class="text-center funding-section-btn2-field" data-wow-duration="1.5s" data-wow-delay="0.4s">
						<a href="#projects" class="btn btn-default text-center scrollto font-regular second_color_btn btn-hover-default-color scroll-links" style="padding: 8px 24px;font-size:22px; background-color:#fed405; border-radius:50px; letter-spacing:1px; color: #fff !important">
							@if($siteConfiguration->funding_section_btn2_text != ''){!!$siteConfiguration->funding_section_btn2_text!!}@endif
						</a>
					</div>
					<br>
					<br>
				</div>
			</div>
			@if(Auth::guest())
			@else
			@if($admin_access == 1)
		</form>
		<div class="row text-center">
			<i class="fa fa-pencil edit-pencil-style show-funding-section-text-edit-box" style="font-size: 20px; color: #000; border: 2px solid #000" data-toggle="tooltip" title="Edit section content and button text" data-placement="right"></i>
		</div>
		@endif
		@endif
	</div>
</section>
<div class="container">
	<hr class="first_color" style="height:2px;border:none;color:#282a73;background-color:#282a73;" />
</div>
<br>
<section id="testimonials" class="chunk-box">
	<div class="container">
		@if(Auth::guest())
		@else
		@if($admin_access == 1)
		<span class="show-add-testimonial-form" style="cursor: pointer;"><i class="fa fa-plus-square" aria-hidden="true"></i>&nbsp;Add Testimonials</span>
		<div class="add-testimonial-form col-md-12" style="display: none;">
			<div class="col-md-6 col-md-offset-3 " style="border:1px solid #eee; border-radius: 5px; padding: 3%; margin-bottom: 3%">
				{!! Form::open(array('route'=>['pages.testimonial.store'], 'class'=>'form-horizontal', 'role'=>'form', 'name' => 'testimonial_form', 'files'=>true)) !!}

				{!!Form::label('user_name', 'Name', array('class'=>'control-label'))!!}
				{!! Form::text('user_name', null, array('placeholder'=>'User Name', 'class'=>'form-control', 'tabindex'=>'1','required'=>'yes')) !!}
				{!! $errors->first('user_name', '<small class="text-danger">:message</small>') !!}

				{!!Form::label('user_summary', 'Summary', array('class'=>'control-label'))!!}
				{!! Form::text('user_summary', null, array('placeholder'=>'User Summary(Who he is)', 'class'=>'form-control ', 'tabindex'=>'2', 'required'=>'yes')) !!}
				{!! $errors->first('user_summary', '<small class="text-danger">:message</small>') !!}

				{!!Form::label('user_content', 'Summary', array('class'=>'control-label'))!!}
				{!! Form::textarea('user_content', null, array('placeholder'=>'User Note', 'class'=>'form-control ', 'tabindex'=>'3', 'required'=>'yes')) !!}
				{!! $errors->first('user_content', '<small class="text-danger">:message</small>') !!}

				<br>
				<div class="input-group">
					<label class="input-group-btn">
						<span class="btn btn-primary" style="padding: 10px 12px;">
							Browse&hellip; <input type="file" name="user_image_url" id="testimonial_img_thumbnail" class="form-control" action="testimonial_image" style="display: none;">
						</span>
					</label>
					<input type="text" class="form-control" id="testimonial_image_name" readonly>
					<input type="hidden" name="testimonial_img_path" id="testimonial_img_path" value="">
				</div>

				<br>
				{!! Form::submit('Add Testimonial', array('class'=>'btn btn-warning btn-block', 'tabindex'=>'5')) !!}
				{!! Form::close() !!}

			</div>
		</div>
		<br><br>
		@endif
		@endif

		@if((int)(count($testimonials)/3) > 0)
		@foreach($testimonials->chunk(3) as $sets)
		<div class="row" style="clear: both;">
		@foreach($sets as $testimonial)
		<div class="col-md-4" style="margin: 3% 0%;">
		@if(Auth::guest())
		@else
		@if($admin_access == 1)
		{!! Form::open(array('route'=>['pages.testimonial.delete'], 'class'=>'form-horizontal', 'role'=>'form')) !!}
		<input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
		<input type="submit" class="btn btn-primary btn-sm" name="delete_testimonial" value="delete">
		{!! Form::close() !!}
		@endif
		@endif
		@if($testimonial->user_image_url != '')
		<div style="border-left: 5px solid #ddd;">
			<center>
				<img src="{{asset($testimonial->user_image_url)}}" class="img-circle"  width="200" height="200">
			</center>
		</div>
		@endif
		<span style="font-style: italic; float: left;"><b>{{$testimonial->user_name}}</b></span><br>
		<span style="font-style: italic; float: left;">{{$testimonial->user_summary}}</span><br>
		<div style="clear: both; padding-bottom: 5px;"></div>
		<p class="text-justify">
			<i class="fa fa-quote-left fa-3x fa-pull-left" style="color:#aaa;"></i>
			@if(strlen($testimonial->user_content) > 150)
			{{substr($testimonial->user_content, 0, 150)}}<span class="ellipsis">...</span><span class="moreText" style="display: none;">{{substr($testimonial->user_content, 150)}}</span><span class="read-more read-more-style"><small><small><u>read more</u></small></small></span>
			@else
			{{$testimonial->user_content}}
			@endif
		</p>
	</div>
	@endforeach
</div>
@endforeach
@else
<div class="row" style="display:-webkit-box;-webkit-box-pack:center;-webkit-box-align:center; clear: both;">
	@foreach($testimonials as $testimonial)

	<div class="col-md-4" style="margin-bottom: 3% 0%;">
		@if(Auth::guest())
		@else
		@if($admin_access == 1)
		{!! Form::open(array('route'=>['pages.testimonial.delete'], 'class'=>'form-horizontal', 'role'=>'form')) !!}
		<input type="hidden" name="testimonial_id" value="{{$testimonial->id}}">
		<input type="submit" class="btn btn-primary btn-sm" name="delete_testimonial" value="delete">
		{!! Form::close() !!}
		@endif
		@endif
		@if($testimonial->user_image_url != '')
		<div style="border-left: 5px solid #ddd;">
			<center>
				<img src="{{asset($testimonial->user_image_url)}}" class="img-circle"  width="200" height="200">
			</center>
		</div>
		@endif
		<span style="font-style: italic; float: left;"><b>{{$testimonial->user_name}}</b></span><br>
		<span style="font-style: italic; float: left;">{{$testimonial->user_summary}}</span><br>
		<div style="clear: both; padding-bottom: 5px;"></div>
		<p class="text-justify">
			<i class="fa fa-quote-left fa-3x fa-pull-left" style="color:#aaa;"></i>
			@if(strlen($testimonial->user_content) > 150)
			{{substr($testimonial->user_content, 0, 150)}}<span class="ellipsis">...</span><span class="moreText" style="display: none;">{{substr($testimonial->user_content, 150)}}</span><span class="read-more read-more-style"><small><small><u>read more</u></small></small></span>
			@else
			{{$testimonial->user_content}}
			@endif
		</p>
	</div>
	@endforeach
</div>
@endif


</div>
</section>
<br>
<h4 class="text-center h1-faq hide">As seen in</h4>
<section class="chunk-box hide">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<center>
						<div class="col-md-3">
							<img src="{{asset('assets/images/Layer8.png')}}" class="img-responsive">
						</div>
						<div class="col-md-3" style="margin-top: 3%;margin-bottom:3%">
							<img src="{{asset('assets/images/Layer9.png')}}" class="img-responsive">
						</div>
						<div class="col-md-3" style="margin-top: 2%; margin-bottom: 2%">
							<img src="{{asset('assets/images/Layer10.png')}}" class="img-responsive">
						</div>
						<div class="col-md-3" style="margin-top: 1%;margin-bottom: 1%;">
							<img src="{{asset('assets/images/Layer11.png')}}" class="img-responsive">
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</section>
<br><br><br>
@if(!Auth::guest())
<div style="position: fixed;bottom: 1em;left: 1em;" class="hide">
	<div id="countdown hide" style="display: none;">
		<div id="countdown-number"></div>
		<svg>
			<circle r="18" cx="20" cy="20"></circle>
		</svg>
	</div>
	<div id="timer_after_login" class="Timer">
	</div>
	<div id="factor_token" class="factor-token">
		{{Auth::user()->credits->where('currency','factor')->sum('amount')}} Factor
	</div>
</div>
@endif
<footer id="footer" class="chunk-box" @if($color) style="background-color: #{{$color->nav_footer_color}}" @endif>
	@if(Auth::guest())
	@else
	@if($admin_access == 1)
	<input id="footer_color" class="jscolor {onFineChange:'update(this)'}" value="@if($color){{$color->nav_footer_color}}@endif">
	<input id="second_color" class="jscolor {onFineChange:'update1(this)'}" value="@if($color){{$color->heading_color}}@endif">
	<button id="footer_color_btn">Apply Color</button>
	<div style="float: right;">
		<select id="font_style_select">
			<option value="">---Select Font Family---</option>
		</select>
		<button id="font_style_apply_btn">Apply Font</button>
	</div><br>
	<div style="position: absolute; right: 0; margin-top: 5px;">
		<textarea class="font-select-preview" style="width: 18em;">This is font preview of selected font</textarea>
	</div>
		<!-- <div class="row" style="position: absolute; z-index: 10; margin: auto;">
			<br>
			<div class="panel panel-default">
				<div class="panel-heading">Edit Social Links</div>
				<div class="panel-body">
					<form method="POST" action="{{ route('configuration.updateSocialSiteLinks') }}">
						{{csrf_field()}}
						<table>
							<tr><td colspan="2">
							{!! $errors->first(null, '<small class="text-danger">:message</small>') !!}
							@if (Session::has('message'))
								<div style="background-color: #c9ffd5;color: #027039;width: 100%;padding: 1px; margin-bottom: 5px; text-align: center;">
								<h5>{!! Session::get('message') !!}</h5>
								</div>
							@endif
							</td></tr>
							<tr><td>Facebook: &nbsp;</td><td><input type="text" name="facebook_link" value="{{$siteConfiguration->facebook_link}}"></td></tr>
							<tr><td>Twitter: &nbsp;</td><td><input type="text" name="twitter_link" value="{{$siteConfiguration->twitter_link}}"></td></tr>
							<tr><td>YouTube: &nbsp;</td><td><input type="text" name="youtube_link" value="{{$siteConfiguration->youtube_link}}"></td></tr>
							<tr><td>LinkedIn: &nbsp;</td><td><input type="text" name="linkedin_link" value="{{$siteConfiguration->linkedin_link}}"></td></tr>
							<tr><td>Google+: &nbsp;</td><td><input type="text" name="google_link" value="{{$siteConfiguration->google_link}}"></td></tr>
							<tr><td>Instagram: &nbsp;</td><td><input type="text" name="instagram_link" value="{{$siteConfiguration->instagram_link}}"></td></tr>
							<tr"><td colspan="2" style="text-align: center; padding-top: 10px"><button type="Submit">Save Links</button></td></tr>
						</table>
					</form>
				</div>
			</div>
		</div> -->
		@endif
		@endif
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center " data-wow-duration="1.5s" data-wow-delay="0.2s">
					<center>
						@if($siteConfiguration->siteconfigmedia)
						@if($mainLogo = $siteConfiguration->siteconfigmedia->where('type', 'brand_logo')->first())
						<img class="img-responsive" src="{{$mainLogo->path}}" alt="Logo" width="200">
						@else
						<img class="img-responsive" src="{{asset('assets/images/main_logo.png')}}" alt="Logo" width="200">
						@endif
						@else
						<img class="img-responsive" src="{{asset('assets/images/main_logo.png')}}" alt="Logo" width="200">
						@endif
					</center>
				</div>
			</div>
			<br>
			@if(Auth::guest())
			@else
			@if($admin_access == 1)
			<form action="{{route('configuration.storeShowSocialLinksFlag')}}" method="POST">
				{{csrf_field()}}
				<div class="text-center" style="color: white;"><label><input type="checkbox" name="show_social_icons" data-toggle="toggle" @if($siteConfiguration->show_social_icons != '') checked @endif>Show Social Icons</label></div>
				<div class="text-center" style="margin-bottom: 1em;"><button type="Submit" class="btn btn-sm btn-primary">Save</button></div>
			</form>
			@endif
			@endif
			<div class="row @if(!$siteConfiguration->show_social_icons) hide @endif">
				<div class="col-md-12 text-center " data-wow-duration="1.5s" data-wow-delay="0.3s">
					<a href="{{$siteConfiguration->facebook_link}}" class="footer-social-icon" target="_blank">
						<span class="fa-stack fa">
							<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
							<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
						</span>
					</a>
					<a href="{{$siteConfiguration->twitter_link}}" class="footer-social-icon" target="_blank">
						<span class="fa-stack fa">
							<i class="fa fa-twitter fa-stack-2x fa-inverse"></i>
						</span>
					</a>
					<a href="{{$siteConfiguration->youtube_link}}" class="footer-social-icon" target="_blank">
						<span class="fa-stack fa">
							<i class="fa fa-circle fa-stack-2x fa-inverse"></i>
							<i class="fa fa-youtube fa-stack-1x fa-inverse" style="color:#21203a;"></i>
						</span>
					</a>
					<a href="{{$siteConfiguration->linkedin_link}}" class="footer-social-icon" target="_blank">
						<span class="fa-stack fa">
							<i class="fa fa-linkedin-square fa-stack-2x fa-inverse"></i>
						</span>
					</a>
					<a href="{{$siteConfiguration->google_link}}" class="footer-social-icon" target="_blank">
						<span class="fa-stack fa">
							<i class="fa fa-google-plus fa-stack-2x fa-inverse" style="padding:4px; margin-left:-3px; font-size:24px !important;"></i>
						</span>
					</a>
					<a href="{{$siteConfiguration->instagram_link}}" class="footer-social-icon" target="_blank">
						<span class="fa-stack fa">
							<i class="fa fa-instagram fa-stack-2x fa-inverse"></i>
						</span>
					</a>
				</div>
			</div>
			@if(Auth::guest())
			@else
			@if($admin_access == 1)
			<div class="text-center @if(!$siteConfiguration->show_social_icons) hide @endif" style="margin-top: 10px;"><i class="fa fa-pencil edit-pencil-style show-social-link-edit-modal-btn" style="font-size: 20px;" data-toggle="tooltip" title="Edit Social Links" data-placement="right"></i></div>
			@endif
			@endif
			<br>
			{!! $errors->first(null, '<div class="col-md-4 col-md-offset-4" style="background-color: #FF0000; text-align: center; border-radius: 8px;"><small style="color: #FEFEFE">:message</small></div><br><br>') !!}
			<div class="row">
				<div class="col-md-4 col-md-offset-4 text-center">
					<ul class="list-inline footer-list " data-wow-duration="1.5s" data-wow-delay="0.4s" style="margin:0px;">
						<li class="footer-list-item">
							<a href="/#promo" data-href="/#promo" class="scrollto a-link scroll-links fold-text-color "><span class="font-semibold" style="font-size: 16px;">Home</span></a>
						</li>
						<li class="footer-list-item">
							<a href="{{$siteConfiguration->blog_link_new}}" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">Blog</span></a>
						</li>
						{{-- @if($siteConfiguration->show_funding_options != '')
						<li class="footer-list-item">
							<a href="{{$siteConfiguration->funding_link}}" class="a-link"><span class="font-semibold" style="font-size: 16px;">Funding</span></a>
						</li><br>
						@endif --}}
						{{-- <li class="footer-list-item"> --}}
							{{-- <a href="{{$siteConfiguration->terms_conditions_link}}" target="_blank"><span class="font-semibold" style="font-size: 16px;">Terms & conditions</span></a> --}}
							{{-- <a href="@if($siteConfiguration->terms_conditions_link){{$siteConfiguration->terms_conditions_link}}@else{{route('site.termsConditions')}}@endif" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">Terms & conditions</span></a> --}}
						{{-- </li> --}}
						<span style="color:#fff;"> </span>
						<!-- <li class="footer-list-item"><a href="#"><span>Venture Finance</span></a></li> -->
						<li class="footer-list-item">
							<a href="@if($siteConfiguration->privacy_link){{$siteConfiguration->privacy_link}}@else https://estatebaron.com/pages/privacy @endif" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">Privacy</span></a>
						</li><br>
						<li class="footer-list-item">
							<a href="https://www.legislation.gov.au/Details/F2017L01198" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">ASIC Corporations (Factoring Arrangements) Instrument 2017/794</span></a>
						</li>
						{{-- <li class="footer-list-item">
							<a href="/pages/faq" target="_blank" class="a-link"><span class="font-semibold" style="font-size: 16px;">FAQ</span></a>
						</li> --}}
						<!-- <li class="footer-list-item">
							<a href="{{$siteConfiguration->media_kit_link}}" download class="a-link"><span class="font-semibold" style="font-size: 16px;">Media Kit</span></a>
						</li> -->
						<li class="footer-list-item">
							<a href="https://www.legislation.gov.au/Details/F2017L01198" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">EXPLANATORY STATEMENT for ASIC Corporations (Factoring Arrangements) Instrument 2017/794</span></a>
						</li>
						<li class="footer-list-item">
							<a href="{{ route('pages.dispute') }}" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">Internal Dispute Resolution Process</span></a>
						</li>
						<li class="footer-list-item">
							<a href="https://download.asic.gov.au/media/3797986/rg185-published-24-march-2016.pdf" target="_blank" class="a-link fold-text-color"><span class="font-semibold" style="font-size: 16px;">Non Cash Payment Facility</span></a>
						</li>
					</ul>
				</div>
			</div>
			@if(Auth::guest())
			@else
			@if($admin_access == 1)
			<div class="text-center" style="margin-top: 10px;"><i class="fa fa-pencil edit-pencil-style show-sitemap-link-edit-modal-btn" style="font-size: 20px;" data-toggle="tooltip" title="Edit above links" data-placement="right"></i></div>
			@endif
			@endif
			<div class="row text-center @if(!App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->show_powered_by_estatebaron) hide @endif" style="padding-top: 20px;">
				<a href="https://konkrete.io" target="_blank"><img style="width: 50px;" src="{{asset('assets/images/konkrete.png')}}"></a>
				<p>
					<span style="" class="fold-text-color">Built on </span><a href="https://konkrete.io" target="_blank" style="cursor: pointer;" class="a-link fold-text-color">Konkrete</a>
				</p>
			</div>
			<br>
			<p class="investment-title1-description-section text-justify compliance-text-style" style="font-size:16px;">
				<small><small class="fold-text-color">@if($siteConfiguration->compliance_description != '')
					{!!html_entity_decode($siteConfiguration->compliance_description)!!} @else
					The content provided on this website has been prepared without taking into account your financial situation, objectives and needs. Before making any decision in relation to any products offered on this website you should read the Factoring Arrangement terms and conditions or any other offer documents relevant to that offer and consider whether they are right for you. Konkrete Distributed Registries Ltd (ABN 67617252909) (Konkrete) provides technology, administrative and support services for the operation of this website. Konkrete is not a party to the offers made on the website.
				@endif</small></small>
			</p>
		</div>
	</footer>
	<div class="row">
		<div class="text-center">
			<!-- Modal -->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog" style="min-width: 800px;">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" id="modal_close_btn" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Crop Image</h4>
						</div>
						<div class="modal-body">
							<div class="text-center" id="image_cropbox_container" style="display: inline-block;">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" id="perform_crop_btn">Perform Crop</button>
							<!-- Hidden Fields to refer for JCrop -->
							<input type="hidden" name="image_crop" id="image_crop" value="" action="">
							<input type="hidden" name="image_action" id="image_action" value="">
							<input type="hidden" name="x_coord" id="x_coord" value="">
							<input type="hidden" name="y_coord" id="y_coord" value="">
							<input type="hidden" name="w_target" id="w_target" value="">
							<input type="hidden" name="h_target" id="h_target" value="">
							<input type="hidden" name="orig_width" id="orig_width" value="">
							<input type="hidden" name="orig_height" id="orig_height" value="">
							<input type="hidden" name="project_id" id="project_id" value="">
						</div>
					</div>
				</div>
			</div>
			<!-- Modal for Social Links Edit -->
			<div class="modal fade" id="social_link_edit_modal" role="dialog">
				<div class="modal-dialog" style="width: 400px;">
					<!-- Modal content-->
					<div class="modal-content">
						<form method="POST" action="{{ route('configuration.updateSocialSiteLinks') }}">
							{{csrf_field()}}
							<div class="modal-header">
								<button type="button" class="close" id="modal_close_btn" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Social Links</h4>
							</div>
							<div class="modal-body">
								<table style="text-align: left; width: 100%">
									<tr><td colspan="2">
										<!-- {!! $errors->first(null, '<small class="text-danger">:message</small>') !!} -->
										@if (Session::has('socialLinkUpdateMessage'))
										<div style="background-color: #c9ffd5;color: #027039;width: 100%;padding: 1px; margin-bottom: 5px; text-align: center;">
											<h5>{!! Session::get('socialLinkUpdateMessage') !!}</h5>
										</div>
										@endif
									</td></tr>
									<tr><td>Facebook: &nbsp;</td><td><input class="form-control" type="text" name="facebook_link" value="{{$siteConfiguration->facebook_link}}"></td></tr>
									<tr><td>Twitter: &nbsp;</td><td><input class="form-control" type="text" name="twitter_link" value="{{$siteConfiguration->twitter_link}}"></td></tr>
									<tr><td>YouTube: &nbsp;</td><td><input class="form-control" type="text" name="youtube_link" value="{{$siteConfiguration->youtube_link}}"></td></tr>
									<tr><td>LinkedIn: &nbsp;</td><td><input class="form-control" type="text" name="linkedin_link" value="{{$siteConfiguration->linkedin_link}}"></td></tr>
									<tr><td>Google+: &nbsp;</td><td><input class="form-control" type="text" name="google_link" value="{{$siteConfiguration->google_link}}"></td></tr>
									<tr><td>Instagram: &nbsp;</td><td><input class="form-control" type="text" name="instagram_link" value="{{$siteConfiguration->instagram_link}}"></td></tr>
								</table>
							</div>
							<div class="modal-footer">
								<button type="Submit" class="btn btn-default">Save Links</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Modal for Sitemap Links Edit -->
			<div class="modal fade" id="sitemap_link_edit_modal" role="dialog">
				<div class="modal-dialog" style="width: 500px;">
					<!-- Modal content-->
					<div class="modal-content">
						<form method="POST" action="{{ route('configuration.updateSitemapLinks') }}">
							{{csrf_field()}}
							<div class="modal-header">
								<button type="button" class="close" id="modal_close_btn" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Edit Links</h4>
							</div>
							<div class="modal-body" style="padding: 3rem;">
								<table style="text-align: left; width: 100%">
									<tr><td colspan="2">
										<!-- {!! $errors->first(null, '<small class="text-danger">:message</small>') !!} -->
										@if (Session::has('sitemapLinksUpdateMessage'))
										<div style="background-color: #c9ffd5;color: #027039;width: 100%;padding: 1px; margin-bottom: 5px; text-align: center;">
											<h5>{!! Session::get('sitemapLinksUpdateMessage') !!}</h5>
										</div>
										@endif
									</td></tr>
									<tr><td style="width: 150px">Blog:</td><td><input class="form-control" type="url" name="blog_link_new" value="{{$siteConfiguration->blog_link_new}}" required="required"></td></tr>
									<tr><td>Terms & Conditions:</td><td><input class="form-control" placeholder="http://example.com" type="url" name="terms_conditions_link" value="{{$siteConfiguration->terms_conditions_link}}"></td></tr>
									<tr><td>Privacy:</td><td><input class="form-control" placeholder="http://example.com" type="url" name="privacy_link" value="{{$siteConfiguration->privacy_link}}"></td></tr>
									<tr><td>Financial Service Guide:</td><td><input class="form-control" placeholder="http://example.com" type="url" name="financial_service_guide_link" value="{{$siteConfiguration->financial_service_guide_link}}"></td></tr>
									{{-- <tr><td>Media Kit:</td><td><input class="form-control" type="text" name="media_kit_link" value="{{$siteConfiguration->media_kit_link}}"></td></tr> --}}
								</table>
							</div>
							<div class="modal-footer">
								<button type="Submit" class="btn btn-default">Save Links</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			@include('partials.approveTokenModal')
			@include('partials.redeemInvTokenModal')
			<script type = "text/javascript"
			src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
			{!! Html::script('js/bootstrap.min.js') !!}
			<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.0/jquery.scrollTo.min.js"></script>
			{{-- Sweetalert for daily sign in --}}
			<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			{!! Html::script('plugins/wow.min.js') !!}
			{!! Html::script('assets/plugins/owl-carousel/owl.carousel.js') !!}
			<script type="text/javascript" src="js/circle-progress.js"></script>
			<!-- <script src="https://youcanbook.me/resources/scripts/ycbm.modal.js"></script> -->
			{!! Html::script('js/typed.min.js') !!}
			{!! Html::script('js/navbar-transition.js') !!}
			<!-- JCrop -->
			{!! Html::script('/assets/plugins/JCrop/js/jquery.Jcrop.js') !!}
			<!-- TinyMCE Rich text editor -->
			{!! Html::script('/assets/plugins/tinymce/js/tinymce/tinymce.min.js') !!}
			{!! Html::script(asset('js/jQuery.countdownTimer.min.js')) !!}
			<script src="https://cdn.jsdelivr.net/gh/ethereum/web3.js@1.0.0-beta.36/dist/web3.min.js" integrity="sha256-nWBTbvxhJgjslRyuAKJHK+XcZPlCnmIAAMixz6EefVk=" crossorigin="anonymous"></script>
			<script type="text/javascript" src="/assets/abi/smartInvoiceABI.js"></script>
			<script type="text/javascript" src="/assets/abi/daiABI.js"></script>
			<script type="text/javascript" src="/assets/js/app.js"></script>
			<script>
				window.addEventListener('load', async () => {
		    		// Modern dapp browsers...
		    		if (window.ethereum) {
		    			window.web3 = new Web3(ethereum);
		    			try {
        					// Request account access if needed
        					ethereum.autoRefreshOnNetworkChange = false;
        					await ethereum.enable();
        					var financiersAddress = ethereum.selectedAddress;
        					$('.buy-invoice').on('click', function(e) {
        						e.preventDefault();
        						var pAddress = $(this).data('address');
        						var askingAmount = $(this).data('amount');
        						var pid = $(this).data('id');
        						var hPid = btoa(pid);
        						$('#modalTitleApprDai').text('Invoice '+pid.toString());
        						$('#approveTokenModal').modal('show');
        						$('#apprDai').on('click',function(r){
        							approval(pAddress,askingAmount);
        						});
        						$('#buyApprInvoice').on('click',function(b){
        							byInvoice(pAddress,askingAmount,hPid,pid);
        						});
        					});
        					$('.redeemInvTokenModal').on('click',function (e) {
        						e.preventDefault();
        						$('#redeemInvTokenModal').modal('show');
        						var cAddress = $(this).data('address');
        						getInvTokenBalance(cAddress);
        						$('form#redeemTokenForm').submit(function (t) {
        							t.preventDefault();
        							var invToken = $('input[name="invToken"]').val();
        							redeemInvToken(cAddress, invToken);
        							//getDaiBalance(ethereum.selectedAddress);
        						});
        					});
        				} catch (error) {
        					// User denied account access...
        				}
        			}
    				// Non-dapp browsers...
    				else {
    					console.log('Non-Ethereum browser detected. You should consider trying MetaMask!');
    				}
    			});
    		</script>
    		<script>
    			jQuery(document).ready(function($) {
					// overlay timer changes
					@if(!Auth::guest())
					var start = new Date("{{Auth::user()->last_login->toDateTimeString()}}");
					var countdownNumberEl = document.getElementById('countdown-number');
					setInterval(function() {
						var startdate=new Date();
						// console.log(startdate);
						var enddate=new Date("{{Auth::user()->last_login->toDateTimeString()}}");
						var diff = startdate - enddate;
						var s = diff/1000   ;
						var h = Math.floor(s/3600); //Get whole hours
						s -= h*3600;
    					var m = Math.floor(s/60); //Get remaining minutes
    					s -= m*60;
    					var s = Math.floor(s);
    					//countdownNumberEl.textContent = s;
    					$id = {{Auth::user()->id}};
    					// if(s == 59){
    					// 	console.log('Minute passed and Token deducted');
    					// 	$.ajax({
    					// 		'type': 'POST',
    					// 		'url': '/user/'+$id+'/tokenDeduction',
    					// 		data: {test:'test'},
    					// 		headers: {
    					// 			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    					// 		},
    					// 		success: function(credit) {
    					// 			console.log(credit.credit);
    					// 			if(credit.error){
    					// 				$('#factor_token').html(credit.error).fadeIn();
    					// 			}else{
    					// 				$('#factor_token').html(credit.credit+' Factor').fadeIn();
    					// 			}
    					// 		},
    					// 		error: function (data) {
    					// 			console.log(data.error);
    					// 			$('#factor_token').html(data.error).fadeIn();
    					// 		}
    					// 	},function (e) {
    					// 	});
    					// }
    					$('.Timer').text((h < 10 ? '0'+h : h)+":"+(m < 10 ? '0'+m : m)+":"+(s < 10 ? '0'+s : s));
    				}, 1000);
					@endif
					// overlay timer ends

					$("#owl-demo").owlCarousel({
						autoPlay : 3000,
						stopOnHover : true,
						navigation:true,
						paginationSpeed : 1000,
						goToFirstSpeed : 2000,
						singleItem : true,
						autoHeight : true,
						transitionStyle:"fade"
					});
					$(".element").typed({
						strings: ["Top quality projects.", "High returns, short duration.", "Retail AFSL", " Full PDS", "Registered MIS", "Open to everyone", "Exclusive new opportunity"],
						typeSpeed: 100,
						startDelay: 1000,
						backSpeed: 100,
						backDelay: 500,
						loop: true
					});

				});
			</script>
			<!-- Begin Inspectlet Embed Code -->
			<script type="text/javascript" id="inspectletjs">
				window.__insp = window.__insp || [];
				__insp.push(['wid', 916939494]);
				(function() {
					function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
					setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
				})();
			</script>
			<!-- End Inspectlet Embed Code -->
			<script type="text/javascript">
				(function(){
					var parallax = document.querySelectorAll(".parallax"),
					speed = 0.2;
					window.onscroll = function(){
						[].slice.call(parallax).forEach(function(el,i){
							var windowYOffset = window.pageYOffset,
							elBackgrounPos = "50% -" + (windowYOffset * speed) + "px";
							el.style.backgroundPosition = elBackgrounPos;
						});
					};
				})();

				function change1()
				{
					var elem = document.getElementById("button1");
					if (elem.value=="Show Less") elem.value = "Read More";
					else elem.value = "Show Less";
				}
				function change2()
				{
					var elem = document.getElementById("button2");
					if (elem.value=="Show Less") elem.value = "Read More";
					else elem.value = "Show Less";
				}
				function checkvalidi() {
					if ((document.getElementById('email').value != '')) {
						document.getElementById('password_form').style.display = 'block';
						if (document.getElementById('password').Value == '') {
							document.getElementById('err_msg').innerHTML = 'Just one more step, lets enter a password !';
							document.getElementById('password').focus();
							return false;
						}
						if (document.getElementById('password').value != '') {
							return true;
						}
						return false;
					}
					return true;
				}
				var intervalId = 0;
		// window.addEventListener('focus', function() {
		//   document.title = 'Vestabyte';
		//   clearInterval(intervalId);
		// });
		// window.addEventListener('blur', function() {
		//   intervalId = setInterval(function() { document.title = document.title == 'Make an Investment' ? 'from just $2000' : 'Make an Investment';} , 1500);
		// });
		new WOW().init({
			boxClass:     'wow',
			animateClass: 'animated',
			mobile:       true,
			live:         true
		});
		jQuery(document).ready(function($) {
			$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="popover"]').popover();
			$('a[data-disabled]').click(function (e) {
				e.preventDefault();
			});
			$('#scheduler_toggle').click(function() {
				$('#scheduler').toggle("slow");
			});
			@if(Auth::guest())
			@else
			@if($admin_access == 1)
			var c1 = $('.circle1');
			c1.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle1")!=null){
				document.getElementById("circle1").onmouseenter = function() {
					setTimeout(function() { c1.circleProgress(); }, 200);
				}
			};
			var c2 = $('.circle2');
			c2.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle2")!=null) {
				document.getElementById("circle2").onmouseenter = function() {
					setTimeout(function() { c2.circleProgress('redraw'); }, 200);
				}
			};
			$("#view_project").effect( "pulsate", {times:105}, 500000 );
			var c3 = $('.circle3');
			c3.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle3")!=null) {
				document.getElementById("circle3").onmouseenter = function() {
					setTimeout(function() { c3.circleProgress('redraw'); }, 200);
				}
			};
			var c4 = $('.circle4');
			c4.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle4")!=null) {
				document.getElementById("circle4").onmouseenter = function() {
					setTimeout(function() { c4.circleProgress('redraw'); }, 200);
				}
			};
			var c5 = $('.circle5');
			c5.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle5")!=null) {
				document.getElementById("circle5").onmouseenter = function() {
					setTimeout(function() { c5.circleProgress('redraw'); }, 200);
				}
			};
			var c6 = $('.circle6');
			c6.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle6")!=null) {
				document.getElementById("circle6").onmouseenter = function() {
					setTimeout(function() { c6.circleProgress('redraw'); }, 200);
				}
			};
			var c7 = $('.circle7');
			c7.circleProgress({
				fill: { color: '#5BC0DE' },
				emptyFill: "rgba(0, 0, 0, 0.5)"
			});
			if (document.getElementById("circle7")!=null) {
				document.getElementById("circle7").onmouseenter = function() {
					setTimeout(function() { c7.circleProgress('redraw'); }, 200);
				}
			};
			@endif
			@endif
			if ($(window).width() < 480) {
				$('#promo').removeClass('parallax');
				$('.small-logo').removeClass('hide');
				$(".big-logo").remove();
				// $(".navbar-0").remove();
			} else {
				$('#promo').addClass('parallax');
				// $(".navbar-1").remove();
			}
			if ($(window).width() < 1025) {
				// $('#promo').removeClass('parallax');
				$('.small-logo').removeClass('hide');
				$(".big-logo").remove();
				$(".navbar-0").remove();
				@if($color)
				$('#header').attr('style','background-color: #{{$color->nav_footer_color}}');
				@endif
			} else {
				// $('#promo').addClass('parallax');
				$(".navbar-1").remove();
				@if($color)
				$('#header').attr('style','background-color: transparent');
				@endif
			}
			// var mm = window.matchMedia("(min-width:768px)&&(max-width:990px)");
			// if(mm.matches){
			// }else{
			//  $('#containernav').removeClass('container');
			//  $('#containernav').addClass('container-fluid');
			//  $(".navbar-0").remove();
			// }
			$("iframe[name ='google_conversion_frame']").attr('style', 'height: 0px; display: none !important;');

			var mq = window.matchMedia("(min-width: 1140px)");
			if(mq.matches) {
			} else {
				$('#containernav').removeClass('container');
				$('#containernav').addClass('container-fluid');
			}
			$('body').scrollspy({ target: '#header', offset: 400});
			$(window).bind('scroll', function() {
				if ($(window).scrollTop() > 1) {
					$('.big-logo').addClass('hide');
					$('.small-logo').removeClass('hide');
					@if($color)
					$('#header').attr('style','background-color: #{{$color->nav_footer_color}}');
					@endif
					// $('#nav_home').removeClass('hide');
					// $('#header').removeClass('hide');
				} else {
					$('.big-logo').removeClass('hide');
					$('.small-logo').addClass('hide');
					@if($color)
					if ($(window).width() > 990){
						$('#header').attr('style','background-color: transparent');
					}
					@endif
					// $('#nav_home').addClass('hide');
					// $('#header').addClass('hide');
				}
			});
			@if($color)
			$('p').attr('style','color: #{{$color->nav_footer_color}}');
			$('.first_color').attr('style','color: #{{$color->nav_footer_color}}');
			$('.second_color_btn').css('background-color', '#{{$color->heading_color}}');
			$('.buy-now-btn').css('border-color','#{{$color->heading_color}}');
			$('.buy-now-btn').css('color','#{{$color->nav_footer_color}} !important');
			$('.second_color').css('color','#{{$color->heading_color}}');
			$('.fold-text-color').css('color','#{{$color->fold_text_color}}');
			$("a").mouseover(function() {
				$(this).css('color', '#{{$color->heading_color}}');
			}).mouseout(function() {
				$(this).css('color', '#{{$color->nav_footer_color}} !important');
			});
			$(".a-link").mouseover(function() {
				$(this).css('color', '#{{$color->heading_color}}');
			}).mouseout(function() {
				$(this).css('color', '#fff');
			});
			$('.fold-text-color').mouseout(function () {
				$(this).css('color', '#{{$color->fold_text_color}}');
			});
			@endif
			$('.scrollto').click(function(e) {
				e.preventDefault();
				$(window).stop(true).scrollTo(this.hash, {duration:1000, interrupt:true});
			});
		});
	</script>
	<script type="text/javascript">

		// Remove Scroll effect of reference anchor links
		if ($(window).width() < 768) {
			$('.scroll-links').removeClass('scrollto');
		}

		// Signin bonus message
		@if (Session::has('loginaction'))
		@if(\Cookie::get('login_bonus'))
		swal("Welcome back {{Auth::user()->first_name}}", "We have added {{\Cookie::get('login_bonus')}} KONKRETE as a sign in bonus", "success", {
			buttons: {
				start_over: "Continue to site >>"
			}
		});
		$('.swal-icon').replaceWith('<div style="margin-top: 25px;"><center><a href="https://konkrete.io" target="_blank"><img src="{{asset('assets/images/konkrete_logo_dark.png')}}" width="100px"></a></center></div>');
		$('.swal-text').replaceWith('<div class="swal-text text-center"><p>We have added {{\Cookie::get("login_bonus")}} KONKRETE as a sign in bonus</p><a href="https://konkrete.io" target="_blank" class="konkrete-slide-link">What is the KONKRETE crypto token?</a><br><small class="text-grey">Login everyday to receive bonus KONKRETE every 24 hours</small></div>');
		@else
		$('body').append('<div id="session_flash_message" style=" position: fixed;top: 0;left: 0;width: 100%;height: 100%;z-index: 10000;background-color: rgba(255,255,255,0.7); display: none;"><div class="text-center" style="position: absolute; background-color: rgba(0, 0, 0, 0.7); border-radius: 10px; padding: 30px 30px; color: #fff; top: 50%; left:20%; border: 1px solid rgba(0, 0, 0, 0.2); font-size: 250%; width: 60%"><span>Welcome {{Auth::user()->first_name}}</span></div></div>');
		$('#session_flash_message').show()
		setInterval(function() {
			$('#session_flash_message').fadeOut(500);
		}, 2500);
		@endif
		@endif

		$(document).ready(function(e){

			$('[data-toggle="tooltip"]').tooltip();

			@if(Auth::guest())
			@else
			@if($admin_access == 1)
			$('.brand-big-image').on('mouseenter', function(event){
				$('.edit-brand-img').show('fade', {}, 500);
			});
			$('.brand-big-image').on('mouseleave', function(event){
				if (!$('.edit-brand-img').is(':hover')) {
					setTimeout( function(){$('.edit-brand-img').hide('fade', {}, 500);} , 3000);
				}
			});
			$('.edit-brand-img').on('mouseleave',function(){
				$('.edit-brand-img').hide('fade', {}, 500);
			});
			$('.edit-brand-img').click(function(){
				$('#brand_logo').val('');
				$('#brand_logo').trigger('click');
			});
			$('#brand_logo').change(function(event){
				if($('#brand_logo').val() != ''){
					var formData = new FormData();
					formData.append('brand_logo', $('#brand_logo')[0].files[0]);
					$('.loader-overlay').show();
					$.ajax({
						url: '/configuration/uploadLogo',
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						contentType: false,
						processData: false
					}).done(function(data){
						$('.loader-overlay').hide();
						if(data.status == 1){
							var imgPath = data.destPath+data.fileName;
							var str1 = $('<div class="col-sm-9" id="site_logo"><img src="../../'+imgPath+'" width="530" id="image_cropbox" style="max-width:none !important"><br><span style="font-style: italic; font-size: 13px"><small>Select The Required Area To Crop Logo.</small></span></div><div class="col-sm-2" id="preview_logo" style="float: right;"><img src="../../'+imgPath+'" id="preview_image"></div>');

							$('#image_cropbox_container').html(str1);
							$('#myModal').modal({
								'show': true,
								'backdrop': false,
							});

								$('#image_crop').val(imgPath); //set hidden image value
								$('#image_crop').attr('action', 'brand logo');
								var target_width = 171;
								var target_height = 60;
								var origWidth = data.origWidth;
								var origHeight = data.origHeight;
								$('#image_cropbox').Jcrop({
									boxWidth: 530,
									// aspectRatio: 171/60,
									keySupport: false,
									setSelect: [0, 0, target_width, target_height],
									bgColor: '',
									onSelect: function(c) {
										updateCoords(c, target_width, target_height, origWidth, origHeight);
									},
									onChange: function(c) {
										updateCoords(c, target_width, target_height, origWidth, origHeight);
									},
									onRelease: setSelect,
									minSize: [target_width, target_height],
								});
							} else if (data.status == 0) {
								alert('Please use png image for logo');
							}
						});
				}
			});

			$('#modal_close_btn').click(function(e){
				$('#brand_logo, #brand_logo_name').val('');
			});
			@endif
			@endif

			$('#footer_color_btn').click(function(e){
				changeColor();
			});
			$('.show-social-link-edit-modal-btn').click(function(){
				$('#social_link_edit_modal').modal({
					'show': true,
					'backdrop': false,
				});
			});
			$('.show-sitemap-link-edit-modal-btn').click(function(){
				$('#sitemap_link_edit_modal').modal({
					'show': true,
					'backdrop': false,
				});
			});

			//color main Page overlay
			@if($color)
			@if($color->nav_footer_color)
			var hexColor = '{{trim($color->nav_footer_color)}}';
			var rgb = hex2rgb(hexColor);
			var rgbaColor = 'rgba('+rgb[0]+', '+rgb[1]+', '+rgb[2]+', {{$siteConfiguration->overlay_opacity}})';
			$('.main-fold-overlay-color').css('background', rgbaColor);
			@else
			var rgbaColor = 'rgba(45, 45, 75, {{$siteConfiguration->overlay_opacity}})';
			$('.main-fold-overlay-color').css('background', rgbaColor);
			@endif
			@else
			var rgbaColor = 'rgba(45, 45, 75, {{$siteConfiguration->overlay_opacity}})';
			$('.main-fold-overlay-color').css('background', rgbaColor);
			@endif
			@if(Auth::guest())
			@else
			@if($admin_access == 1)
			//Functionality to Edit Text 1 of Home Page.
			//This can be actioned by only admin
			editHomePageText1();
			//Functionality to change Home Page Main Back Image
			editHomePageBackImg1();
			//Functionality to change Home Page Button 1 text
			editHomePageButton1Text();
			//functionality to edit the investment title1
			editInvestmentTitleText1();
			//functionality to edit the investment title1 Description
			editInvestmentTitle1Description();
			// Edit home page Invesrment Image
			editHomePageInvestmentSectionImg();
			//Edit how it works section content
			editHowItWorksSectionContent();
			//Edit How it works section Images
			editHowItWorksSectionImages();
			//Edit Funding Section Contents
			editFundingSectionContent();
			//Edit Project Thumb Image
			editProjectThumbImage();
			//Update Home Page Overlay Opacity
			updateOverlayOpacity();
			//Rich text editor initialization
			richTextareaFieldInitialization();
			//Swap projects raning
			swapProjectsRanking();
			//Manage testimonial actions
			addTestimonials();
			//Add functionality to notify site admins about the person expressed interest in upcoming projects
			expressInterestInUpcomingProject();
			getGoogleWebDeveloperFonts();
			saveGoogleFontFamily();
			// Validate iPhone executions
			iphoneDeviceConfigurations();
			//Edit Grey Box Note Content
			editGreyBoxNoteContent();
			//Edit the text below project thumbnail image
			editProjectThumbnailText();
			//Edit the smsf reference text above the listed projects
			editSmsfReferenceText();
			@endif
			@endif

			showCountDownOption();
			refreshAskingPrice();
			showCountDownPause();
		});
@if(Auth::guest())
@else
@if($admin_access == 1)
function updateCoords(coords, w, h, origWidth, origHeight){
	var target_width= w;
	var target_height=h;
			//Set New Coordinates
			$('#x_coord').val(coords.x);
			$('#y_coord').val(coords.y);
			$('#w_target').val(coords.w);
			$('#h_target').val(coords.h);
			$('#orig_width').val(origWidth);
			$('#orig_height').val(origHeight);

			// showPreview(coordinates)
			$("<img>").attr("src", $('#image_cropbox').attr("src")).load(function(){
				var rx = target_width / coords.w;
				var ry = target_height / coords.h;

				var realWidth = this.width;
				var realHeight = this.height;

				var newWidth = 530;
				var newHeight = (realHeight/realWidth)*newWidth;

				$('#preview_image').css({
					width: Math.round(rx*newWidth)+'px',
					height: Math.round(ry*newHeight)+'px',
					marginLeft: '-'+Math.round(rx*coords.x)+'px',
					marginTop: '-'+Math.round(ry*coords.y)+'px',
				});

			});
		}

		function setSelect(coords){
			jcrop_api.setSelect([coords.x,coords.y,coords.w,coords.h]);
		}

		$('#perform_crop_btn').click(function(e){
			$('.loader-overlay').show();
			var imageName = $('#image_crop').val();
			var imgAction = $('#image_crop').attr('action');
			var xValue = $('#x_coord').val();
			var yValue = $('#y_coord').val();
			var wValue = $('#w_target').val();
			var hValue = $('#h_target').val();
			var origWidth = $('#orig_width').val();
			var origHeight = $('#orig_height').val();
			var hiwImgAction = $('#image_action').val();
			var projectId = $('#project_id').val();
			// console.log(imageName+'|'+xValue+'|'+yValue+'|'+wValue+'|'+hValue);
			$.ajax({
				url: '/configuration/cropUploadedImage',
				type: 'POST',
				data: {
					imageName: imageName,
					imgAction: imgAction,
					xValue: xValue,
					yValue: yValue,
					wValue: wValue,
					hValue: hValue,
					origWidth: origWidth,
					origHeight: origHeight,
					hiwImgAction: hiwImgAction,
					projectId: projectId
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			}).done(function(data){
				console.log(data);
				if(data.status){
					$('.loader-overlay').hide();
					$('#image_crop').val(data.imageSource);
					if(imgAction != 'testimonial_image'){
						location.reload('/');
					} else {

					}
					$('#myModal').modal('toggle');
				}
				else{
					$('.loader-overlay').hide();
					$('#myModal').modal('toggle');
					if(imgAction == 'brand logo'){
						$('#brand_logo, #brand_logo_name').val('');
					}
					else if (imgAction == 'back image'){
						$('#homepg_back_img, #homepg_back_img_name').val('');
					}
					else if (imgAction == 'investment image'){
						$('#investment_page_image, #investment_page_image_name').val('');
					}
					else if (imgAction == 'howItWorks image'){
						$('#how_it_works_image, #how_it_works_image_name').val('');
					}
					else if (imgAction == 'project_thumbnail'){
						$('#project_thumb_image, #project_thumb_image_name').val('');
					}
					else if (imgAction == 'testimonial_image'){
						$('#testimonial_img_thumbnail, #testimonial_image_name').val('');
					}
					else {}
						alert(data.message);
				}

			});
		});
		//Functionality to Edit Text 1 of Home Page.
		//This can be actioned by only admin
		function editHomePageText1(){
			$('.edit-homepg-text1').click(function(){
				var str1 = $.trim($('.homepg-text1 h2').html()).replace(/\r?\n|\r/g, "");
				// console.log(str1);
				$('.homepg-text1').html('<textarea class="form-control text-textarea" name="homepg_text1_text" id="homepg_text1_text" rows="3" placeholder="You Can Add Description Here"></textarea>' +
					'<br><button type="button" class="btn btn-default text1-update-btn" style="margin-bottom:67px;"><small>Update<small></button>');
				$('#homepg_text1_text').val(str1.replace(/<br ?\/?>/g, "\n"));
				$('#homepg_text1_text').select();
				$('.text1-update-btn').click(function(){
					var text1 = $('#homepg_text1_text').val();
					var newText = text1.replace(/[\n\r\s]+/g, "\n");
					console.log(text1);
					if((newText != '') && (newText != '\n')){
						$.ajax({
							url: '/configuration/saveHomePageText1',
							type: 'POST',
							dataType: 'JSON',
							data: {text1},
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
						}).done(function(data){
							if(data.status){
								location.reload('/');
							}
							else{
								alert('Something went wrong');
							}
						});
					}
					else{
						alert('Please enter Detail.');
					}
				});
			});
		}

		//Functionality to edit Home Page Main Back Image
		function editHomePageBackImg1(){
			$('.edit-homepg-back-img').click(function(e){
				$('#homepg_back_img').trigger('click');
			});
			$('#homepg_back_img').change(function(e){
				if($('#homepg_back_img').val() != ''){
					var formData = new FormData();
					formData.append('homepg_back_img', $('#homepg_back_img')[0].files[0]);
					$('.loader-overlay').show();
					$.ajax({
						url: '/configuration/uploadHomePgBackImg1',
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						contentType: false,
						processData: false
					}).done(function(data){
						if(data.status == 1){
							console.log(data);
							var imgPath = data.destPath+data.fileName;
							var str1 = $('<div class="col-sm-9" id="homepg_back_img1"><img src="../../'+imgPath+'" width="530" id="image_cropbox" style="max-width:none !important"><br><span style="font-style: italic; font-size: 13px"><small>Select The Required Area To Crop Logo.</small></span></div><div class="col-sm-2" id="preview_back_img1" style="float: right;"><img width="530" src="../../'+imgPath+'" id="preview_image"></div>');

							$('#image_cropbox_container').html(str1);
							$('#myModal').modal({
								'show': true,
								'backdrop': false,
							});

							$('#image_crop').val(imgPath); //set hidden image value
							$('#image_crop').attr('action', 'back image');
							var target_width = 171;
							var target_height = 104;
							var origWidth = data.origWidth;
							var origHeight = data.origHeight;
							$('#image_cropbox').Jcrop({
								boxWidth: 530,
								aspectRatio: 171/104,
								keySupport: false,
								setSelect: [0, 0, target_width, target_height],
								bgColor: '',
								onSelect: function(c) {
									updateCoords(c, target_width, target_height, origWidth, origHeight);
								},
								onChange: function(c) {
									updateCoords(c, target_width, target_height, origWidth, origHeight);
								},onRelease: setSelect,
								minSize: [target_width, target_height],
							});
							$('.loader-overlay').hide();
						}
						else{
							$('.loader-overlay').hide();
							$('#homepg_back_img, #homepg_back_img_name').val('');
							alert(data.message);
						}
					});
				}
			});
		}

		//Functionality to change Home Page Button 1 text
		function editHomePageButton1Text(){
			$('.edit-homepg-btn-text1').click(function(e){
				var str1 = $('.homepg-btn1-section a').html();
				$('.homepg-btn1-section').html('<input type="text" class="form-control text-textfield" name="homepg_btn1_text" id="homepg_btn1_text" placeholder="Text to set for Button"><br><span style="float:left;">GoTo Link for he Button: </span><input type="text" class="form-control text-textfield" name="homepg_btn1_gotoid" id="homepg_btn1_gotoid" placeholder="Goto Id for Button" style="margin-bottom:10px; font-size:14px; width:65%; margin-left:auto" value="@if($siteConfiguration->homepg_btn1_gotoid != ''){!!$siteConfiguration->homepg_btn1_gotoid!!}@endif"><br><button type="button" class="btn btn-default btn1-text-update-btn"><small>Update<small></button>');
				var btnText = $('#homepg_btn1_text').val($.trim(str1));
				$('#homepg_btn1_text').keypress(function(e){
					if($(this).val().length > 20){
						e.preventDefault();
						alert('Button text limit is 20');
					}
				});
				$('#homepg_btn1_text').select();
				$('.btn1-text-update-btn').click(function(){
					if($('#homepg_btn1_text').val.length <= 20){
						var text1 = $('#homepg_btn1_text').val();
						var gotoid = $('#homepg_btn1_gotoid').val();
						var newText = text1.replace(/[\s]+/g, "\s");
						if((newText != '') && (newText != '\s') && (gotoid != '')){
							$.ajax({
								url: '/configuration/saveHomePageBtn1Text',
								type: 'POST',
								dataType: 'JSON',
								data: {text1, gotoid},
								headers: {
									'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								},
							}).done(function(data){
								if(data.status){
															// console.log(data);
															location.reload('/');
														}
														else{
															alert('Something went wrong');
														}
													});
						}
						else{
							alert('Please enter Detail.');
						}
					}
					else{
						alert('Button text limit is 20');
					}
				});
			});
		}
		function update(jscolor) {
			// 'jscolor' instance can be used as a string
			document.getElementById('footer').style.backgroundColor = '#' + jscolor;
			$('#footer, #footer_color').attr('style', 'background-color:#'+jscolor);
			$('#footer, #footer_color').attr('value', jscolor);
		}
		function update1(jscolor) {
			// 'jscolor' instance can be used as a string
			document.getElementById('second_color_venture').style.backgroundColor = '#' + jscolor;
			$('#second_color_venture, #second_color').attr('style', 'background-color:#'+jscolor);
			$('#second_color_venture, #second_color').attr('value', jscolor);
		}
		function updateHomePgText1Color(jscolor) {
			$('.fold-text-color').css('color', '#' + jscolor);
			$('#homepg_text1_color').attr('value', jscolor);
		}
		function changeColor(){
			var first_color_code = $('#footer_color').attr('value');
			var second_color_code = $('#second_color').attr('value');
			$.ajax({
				url: '/configuration/changecolor/footer/home',
				type: 'POST',
				dataType: 'JSON',
				data: {first_color_code ,second_color_code},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			}).done(function(data){
				console.log(data);
				alert(data.message);
			});
		}

		function changeFoldTextColor() {
			let foldTextColor = $('#homepg_text1_color').attr('value');
			$.ajax({
				url: '/configuration/changecolor/fold/home',
				type: 'POST',
				dataType: 'JSON',
				data: {
					fold_text_color: foldTextColor
				},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			}).done(function(data){
				alert(data.message);
				location.reload();
			});
		}

		function editInvestmentTitleText1(){
			$('.show-investment-title1-edit-box').click(function(){
				$('.investment-title1-section').html('<div style="margin-bottom: 20px;"><small class="investment-title1-error" style="font-size:11px;color:#d30000;"></small><br><form action="{{ route('configuration.editHomePgInvestmentTitle1') }}" method="POST">{{csrf_field()}}<input type="text" class="form-control" name="investment_title_text1" value="@if($siteConfiguration->compliance_title){{$siteConfiguration->compliance_title}} @else Compliance @endif" id="investment_title_text1" placeholder="Enter Title" style="width: 60%; float: left;">&nbsp;&nbsp;<button type="Submit" class="btn btn-primary submit-investment-title1-text" style="padding: 10px;">Save</button></form></div>');
				/**/
/*        $('.submit-investment-title1-text').click(function(e){
					if($('#investment_title_text1').val()==''){
						e.preventDefault();
						$('.investment-title1-error').html('Title Text cant be empty.');

					}
				});*/
			});
		}

		function editInvestmentTitle1Description(){
			$('.show-investment-title1-desc-edit-box').click(function(){
				$('.investment-title1-description-section').html('<div style="margin-bottom: 20px;"><small class="investment-title1-desc-error" style="font-size:11px;color:#d30000;"></small><br><form action="{{ route('configuration.editHomePgInvestmentTitle1Description') }}" method="POST">{{csrf_field()}}<textarea class="form-control" name="investment_title1_description" id="investment_title1_description" rows="5" placeholder="You Can Add Description Here" style="width: 80%; float: left;"></textarea>&nbsp;&nbsp;<button type="Submit" class="btn btn-primary submit-investment-title1-desc" style="padding: 10px;">Save</button></form></div>');
				var str1 = $.trim($('#hiddent_investment_title1_description').val()).replace(/\r?\n|\r/g, "");
				console.log(str1);
				$('#investment_title1_description').val(str1.replace(/<br ?\/?>/g, "\n"));
/*        $('.submit-investment-title1-desc').click(function(e){
					if($('#investment_title1_description').val()==''){
						e.preventDefault();
						$('.investment-title1-desc-error').html('Description cant be empty.');

					}
				});*/
			});
		}

		function editHomePageInvestmentSectionImg(){
			$('.edit-homepg-investment-img').click(function(e){
				$('#investment_page_image').val('');
				$('#investment_page_image').trigger('click')
			});
			$('#investment_page_image').change(function(event){
				if($('#investment_page_image').val() != ''){
					var formData = new FormData();
					formData.append('investment_page_image', $('#investment_page_image')[0].files[0]);
					$('.loader-overlay').show();
					$.ajax({
						url: '/configuration/uploadHomePgInvestmentImage',
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						contentType: false,
						processData: false
					}).done(function(data){
						if(data.status == 1){
							console.log(data);
							var imgPath = data.destPath+data.fileName;
							var str1 = $('<div class="col-sm-9" id="homepg_investment_img"><img src="../../'+imgPath+'" width="530" id="image_cropbox" style="max-width:none !important"><br><span style="font-style: italic; font-size: 13px"><small>Select The Required Area To Crop Logo.</small></span></div><div class="col-sm-2" id="preview_Investment_img" style="float: right;"><img width="530" src="../../'+imgPath+'" id="preview_image"></div>');

							$('#image_cropbox_container').html(str1);
							$('#myModal').modal({
								'show': true,
								'backdrop': false,
							});

								$('#image_crop').val(imgPath); //set hidden image value
								$('#image_crop').attr('action', 'investment image');
								var target_width = 171;
								var target_height = 220;
								var origWidth = data.origWidth;
								var origHeight = data.origHeight;
								$('#image_cropbox').Jcrop({
									boxWidth: 530,
									aspectRatio: 171/220,
									keySupport: false,
									setSelect: [0, 0, target_width, target_height],
									bgColor: '',
									onSelect: function(c) {
										updateCoords(c, target_width, target_height, origWidth, origHeight);
									},
									onChange: function(c) {
										updateCoords(c, target_width, target_height, origWidth, origHeight);
									},onRelease: setSelect,
									minSize: [target_width, target_height],
								});
								$('.loader-overlay').hide();
							}
							else{
								$('.loader-overlay').hide();
								$('#investment_page_image, #investment_page_image_name').val('');
								alert(data.message);
							}
						});
				}
			});
		}

		function editHowItWorksSectionContent(){
			$('.show-how-it-works-contents-edit-box').click(function(){
				$('.how-it-works-title1-section').html('<input type="text" name="how_it_works_title1" class="form-control" value="{{$siteConfiguration->how_it_works_title1}}"></input>');
				$('.how-it-works-title2-section').html('<input type="text" value="{{$siteConfiguration->how_it_works_title2}}" name="how_it_works_title2" class="form-control"></input>');
				$('.how-it-works-title3-section').html('<input type="text" value="{{$siteConfiguration->how_it_works_title3}}" name="how_it_works_title3" class="form-control"></input>');
				$('.how-it-works-title4-section').html('<input type="text" value="{{$siteConfiguration->how_it_works_title4}}" name="how_it_works_title4" class="form-control"></input>');
				$('.how-it-works-title5-section').html('<input type="text" value="{{$siteConfiguration->how_it_works_title5}}" name="how_it_works_title5" class="form-control"></input>');
				$('.how-it-works-desc1-section').replaceWith('<textarea name="how_it_works_desc1" class="form-control" rows="6">{{$siteConfiguration->how_it_works_desc1}}</textarea>');
				$('.how-it-works-desc2-section').replaceWith('<textarea name="how_it_works_desc2" class="form-control" rows="6">{{$siteConfiguration->how_it_works_desc2}}</textarea>');
				$('.how-it-works-desc3-section').replaceWith('<textarea name="how_it_works_desc3" class="form-control" rows="6">{{$siteConfiguration->how_it_works_desc3}}</textarea>');
				$('.how-it-works-desc4-section').replaceWith('<textarea name="how_it_works_desc4" class="form-control" rows="6">{{$siteConfiguration->how_it_works_desc4}}</textarea>');
				$('.how-it-works-desc5-section').replaceWith('<textarea name="how_it_works_desc5" class="form-control" rows="6">{{$siteConfiguration->how_it_works_desc5}}</textarea><br><button type="Submit" class="btn-default save-how-it-works-content">Save</button>');
				richTextareaFieldInitialization();
			});
		}

		function editGreyBoxNoteContent(){
			$('.show-grey-box-note-edit-box').click(function(){
				$('.grey-box-note-content').replaceWith('<textarea name="grey_box_note" class="form-control" rows="6" required>@if($siteConfiguration->grey_box_note){{$siteConfiguration->grey_box_note}} @else You can download the {{$prospectus}} for the offer on the Project details page which can be accessed by clicking on the Project listing above. The online Application form will be provided alongside the {{$prospectus}}. You should carefully review the {{$prospectus}} in deciding whether to acquire the securities; and anyone who wants to acquire the securities will need to complete the online application form that will accompany the {{$prospectus}}. @endif</textarea><br><button type="Submit" class="btn-default col-md-offset-11">Save</button>');
			});
		}

		function editProjectThumbnailText(){
			$('.show-project-thumbnail-text-edit-box').click(function(){
				$('.project-thumbnail-txt').replaceWith('<input type="text" name="project_thumbnail_text" class="form-control" placeholder="Enter the text here" required ><br><button type="Submit" class="btn btn-primary col-md-offset-10">Save</button>');
			});
		}

		function editSmsfReferenceText(){
			$('.show-smsf-reference-text-edit-box').click(function(){
				$('.smsf-reference-txt').html('<form action="{{ route('configuration.editSmsfReferenceText') }}" method="POST">{{csrf_field()}}<input type="text" class="form-control" name="smsf_reference_text" placeholder="Enter text here" value="{{$siteConfiguration->smsf_reference_txt}}" style="float: left;" required>&nbsp;&nbsp;<button type="Submit" class="btn btn-primary submit-investment-title1-text" style="padding: 10px; width: 80px;">Save</button></form>');
			});
		}

		function editHowItWorksSectionImages(){
			var imgAction = '';
			$('.edit-how-it-works-img1, .edit-how-it-works-img2, .edit-how-it-works-img3, .edit-how-it-works-img4, .edit-how-it-works-img5').click(function(e){
				imgAction = $(this).attr('action');
				$('#how_it_works_image, #how_it_works_image_name').val('');
				$('#how_it_works_image').trigger('click');
			});
			$('#how_it_works_image').change(function(event){
				if($('#how_it_works_image').val() != ''){
					var formData = new FormData();
					formData.append('how_it_works_image', $('#how_it_works_image')[0].files[0]);
					formData.append('imgAction', imgAction);
					$('.loader-overlay').show();
					$.ajax({
						url: '/configuration/uploadHowItWorksImages',
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						contentType: false,
						processData: false
					}).done(function(data){
						if(data.status == 1){
							console.log(data);
							var imgPath = data.destPath+data.fileName;
							var str1 = $('<div class="col-sm-8" id="how_it_works_img"><img src="../../'+imgPath+'" width="530" id="image_cropbox" style="max-width:none !important"><br><span style="font-style: italic; font-size: 13px"><small>Select The Required Area To Crop Logo.</small></span></div><div class="col-sm-2" id="preview_how_it_works_img" style="float: right;"><img width="530" src="../../'+imgPath+'" id="preview_image"></div>');

							$('#image_cropbox_container').html(str1);
							$('#myModal').modal({
								'show': true,
								'backdrop': false,
							});

						$('#image_crop').val(imgPath); //set hidden image value
						$('#image_crop').attr('action', 'howItWorks image');
						$('#image_action').val(imgAction);
						var target_width = 200;
						var target_height = 200;
						var origWidth = data.origWidth;
						var origHeight = data.origHeight;
						$('#image_cropbox').Jcrop({
							boxWidth: 530,
							aspectRatio: 1,
							keySupport: false,
							setSelect: [0, 0, target_width, target_height],
							bgColor: '',
							onSelect: function(c) {
								updateCoords(c, target_width, target_height, origWidth, origHeight);
							},
							onChange: function(c) {
								updateCoords(c, target_width, target_height, origWidth, origHeight);
							},onRelease: setSelect,
							minSize: [target_width, target_height],
						});
						$('.loader-overlay').hide();
					}
					else{
						$('.loader-overlay').hide();
						$('#how_it_works_image, #how_it_works_image_name').val('');
						alert(data.message);
					}
				});
				}
			});
		}
		function editFundingSectionContent(){
			$('.show-funding-section-text-edit-box').click(function(){
				$('.funding-section-title1-field').html('<textarea class="form-control" rows="3" name="funding_section_title1" id="funding_section_title1" placeholder="Funding type 1 text"></textarea>');
				var str1 = $.trim($('#hidden_funding_section_title1').val()).replace(/\r?\n|\r/g, "");
				$('#funding_section_title1').val(str1.replace(/<br ?\/?>/g, "\n"));

				$('.funding-section-title2-field').html('<textarea class="form-control" rows="3" name="funding_section_title2" id="funding_section_title2" placeholder="Funding type 2 text"></textarea>');
				var str2 = $.trim($('#hidden_funding_section_title2').val()).replace(/\r?\n|\r/g, "");
				$('#funding_section_title2').val(str2.replace(/<br ?\/?>/g, "\n"));

				$('.funding-section-btn1-field').html('<small>Funding Type1 Button text</small><input type="text" name="funding_section_btn1_text" id="funding_section_btn1_text" class="form-control" placeholder="Funding type 1 button text" value="{{$siteConfiguration->funding_section_btn1_text}}"><br><small class="funding-section-error" style="font-size:11px;color:#d30000;"></small><br><button type="Submit" class="btn btn-primary" id="save_funding_section_details">Save Details</button>');
				$('.funding-section-btn2-field').html('<small>Funding Type2 Button text</small><input type="text" name="funding_section_btn2_text" id="funding_section_btn2_text" class="form-control" placeholder="Funding type 2 button text" value="{{$siteConfiguration->funding_section_btn2_text}}"><br><small class="funding-section-error" style="font-size:11px;color:#d30000;"></small><br><button type="Submit" class="btn btn-primary" id="save_funding_section_details">Save Details</button>');
				$('#save_funding_section_details').click(function(e){
					if(($('#funding_section_title1').val()=='') || ($('#funding_section_title2').val()=='') || ($('#funding_section_btn1_text').val()=='') || ($('#funding_section_btn2_text').val()=='')){
						e.preventDefault();
						$('.funding-section-error').html('All fields are mandatory');
					}
				});
			});
		}

		function editProjectThumbImage(){
			var imgAction = '';
			var projectId = '';
			$('.edit-project-thumb-img').click(function(e){
				imgAction = $(this).attr('action');
				projectId = $(this).attr('projectid');
				$('#project_id').val(projectId);
				$('#project_thumb_image, #project_thumb_image_name').val('');
				$('#project_thumb_image').trigger('click');
			});
			$('#project_thumb_image').change(function(event){
				if($('#project_thumb_image').val() != ''){
					var formData = new FormData();
					formData.append('project_thumb_image', $('#project_thumb_image')[0].files[0]);
					formData.append('imgAction', imgAction);
					formData.append('projectId', projectId);
					$('.loader-overlay').show();
					$.ajax({
						url: '/configuration/uploadProjectThumbImage',
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						contentType: false,
						processData: false
					}).done(function(data){
						if(data.status == 1){
							console.log(data);
							var imgPath = data.destPath+data.fileName;
							var str1 = $('<div class="col-sm-8" id="project_thumb_img"><img src="../../'+imgPath+'" width="530" id="image_cropbox" style="max-width:none !important"><br><span style="font-style: italic; font-size: 13px"><small>Select The Required Area To Crop Logo.</small></span></div><div class="col-sm-2" id="preview_project_thumb_img" style="float: right;"><img width="530" src="../../'+imgPath+'" id="preview_image"></div>');

							$('#image_cropbox_container').html(str1);
							$('#myModal').modal({
								'show': true,
								'backdrop': false,
							});

						$('#image_crop').val(imgPath); //set hidden image value
						$('#image_crop').attr('action', 'project_thumbnail');
						$('#image_action').val(imgAction);
						var target_width = 150;
						var target_height = 100;
						var origWidth = data.origWidth;
						var origHeight = data.origHeight;
						$('#image_cropbox').Jcrop({
							boxWidth: 530,
							aspectRatio: 3/2,
							keySupport: false,
							setSelect: [0, 0, target_width, target_height],
							bgColor: '',
							onSelect: function(c) {
								updateCoords(c, target_width, target_height, origWidth, origHeight);
							},
							onChange: function(c) {
								updateCoords(c, target_width, target_height, origWidth, origHeight);
							},onRelease: setSelect,
							minSize: [target_width, target_height],
						});
						$('.loader-overlay').hide();
					}
					else{
						$('.loader-overlay').hide();
						$('#project_thumb_image, #project_thumb_image_name').val('');
						alert(data.message);
					}
				});
				}
			});
		}


		function updateOverlayOpacity(){
			$('.update-overlay-opacity').click(function(e){
				var action = $(this).attr('action');
				$.ajax({
					url: '/configuration/home/updateOverlayOpacity',
					type: 'POST',
					dataType: 'JSON',
					data: {action},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				}).done(function(data){
					if(data.status){
						console.log(data.opacity);
						@if($color)
						@if($color->nav_footer_color)
						var hexColor = '{{trim($color->nav_footer_color)}}';
						var rgb = hex2rgb(hexColor);
						var rgbaColor = 'rgba('+rgb[0]+', '+rgb[1]+', '+rgb[2]+', '+data.opacity+')';
						$('.main-fold-overlay-color').css('background', rgbaColor);
						@else
						var rgbaColor = 'rgba(45, 45, 75, '+data.opacity+')';
						$('.main-fold-overlay-color').css('background', rgbaColor);
						@endif
						@else
						var rgbaColor = 'rgba(45, 45, 75, '+data.opacity+')';
						$('.main-fold-overlay-color').css('background', rgbaColor);
						@endif
					}
				});
			});
		}

		function swapProjectsRanking(){
			$('.enable-swap-btn').click(function(){
				$(this).attr('disabled', 'disabled');
				$('.projects-swap-guide-msg').html('Select projects area to swap, then click on Swap icon.');
				$(".swap-select-overlay").mouseenter(function() {
					$(this).children( ".swap-select-overlay-style" ).show();
				}).mouseleave(function() {
					$(this).children( ".swap-select-overlay-style" ).hide();
				});

				//select the projects to swap
				$('.swap-select-overlay-style').click(function(){
					var selectedCount=0;
					$('.swap-select-overlay-style').each(function(){
						if($(this).attr('selected')){
							selectedCount++;
						}
					});
					if($(this).attr('selected')){
						console.log('remove');
						$(this).removeAttr('selected');
						$(this).parent().css('border','none');
					} else {
						if(selectedCount<2){
							console.log('add');
							$(this).attr('selected', 'selected');
							$(this).parent().css('border','1px solid #aaa');
							$(this).parent().css('border-radius','5px');
						}
					}
				});

				//perform Swaping on projects
				$('.swap-projects-btn').click(function(){
					var projectRanks = [];
					$('.swap-select-overlay-style').each(function(){
						if($(this).attr('selected')){
							projectRanks.push($(this).attr('projectRank'));
						}
					});
					if(projectRanks.length == 2){
						$('.loader-overlay').show();
						$.ajax({
							url: '/configuration/home/swapProjectRanking',
							type: 'POST',
							dataType: 'JSON',
							data: {projectRanks},
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							},
						}).done(function(data){
							if(data.status){
								location.reload('/#projects');
							}
							$('.loader-overlay').hide();
						});
					} else {
						alert('Select 2 projects');
					}
				});

			});
		}

		function addTestimonials(){
			$('.show-add-testimonial-form').click(function(e){
				$('.add-testimonial-form').slideToggle();
			});
			$('.read-more').on('click', function(){
				var $parent = $(this).parent();
				if($parent.data('visible')) {
					$parent.data('visible', false).find('.ellipsis').show()
					.end().find('.moreText').hide()
					.end().find('.read-more').html('<small><small><u>read more</u></small></small>');
				} else {
					$parent.data('visible', true).find('.ellipsis').hide()
					.end().find('.moreText').show()
					.end().find('.read-more').html('<small><small><u>read less</u></small></small>');
				}
			});
			// Upload testimonial image
			$('#testimonial_img_thumbnail').change(function(e){
				var imgAction = $(this).attr('action');
				var file = $('#testimonial_img_thumbnail')[0].files[0];
				if (file){
					$('#testimonial_image_name').val(file.name);
				}
				if($('#testimonial_img_thumbnail').val() != ''){
					$('.loader-overlay').show();
					var formData = new FormData();
					formData.append('user_image_url', $('#testimonial_img_thumbnail')[0].files[0]);
					formData.append('imgAction', imgAction);
					$.ajax({
						url: '/pages/testimonial/uploadImg',
						type: 'POST',
						dataType: 'JSON',
						data: formData,
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
						contentType: false,
						processData: false
					}).done(function(data){
						if(data.status == 1){
							console.log(data);
							var imgPath = data.destPath+'/'+data.fileName;
							var str1 = $('<div class="col-sm-9" id="user_img_container"><img src="../../'+imgPath+'" width="530" id="image_cropbox" style="max-width:none !important"><br><span style="font-style: italic; font-size: 13px"><small>Select The Required Area To Crop Logo.</small></span></div><div class="col-sm-2" id="preview_img_container" style="float: right; width:171px; height:171px; padding:0px; overflow:hidden;"><img width="530" src="../../'+imgPath+'" id="preview_image"></div>');

							$('#image_cropbox_container').html(str1);
							$('#myModal').modal({
								'show': true,
								'backdrop': false,
							});

							$('#image_crop').val(imgPath); //set hidden image value
							$('#testimonial_img_path').val(imgPath);
							$('#image_crop').attr('action', data.imgAction);
							$('#image_action').val(imgAction);
							var target_width = 171;
							var target_height = 171;
							var origWidth = data.origWidth;
							var origHeight = data.origHeight;
							$('#image_cropbox').Jcrop({
								boxWidth: 530,
								aspectRatio: 1,
								keySupport: false,
								setSelect: [0, 0, target_width, target_height],
								bgColor: '',
								onSelect: function(c) {
									updateCoords(c, target_width, target_height, origWidth, origHeight);
								},
								onChange: function(c) {
									updateCoords(c, target_width, target_height, origWidth, origHeight);
								},onRelease: setSelect,
								minSize: [target_width, target_height],
							});
							$('.loader-overlay').hide();
						}
						else {
							$('.loader-overlay').hide();
							$('#testimonial_img_thumbnail, #testimonial_image_name').val('');
							alert(data.message);
						}

					});
				}
			});
		}
		@endif
		@endif
		function richTextareaFieldInitialization(){
			tinymce.init({
				forced_root_block : "div",
				selector: '#how-it-works textarea',
				plugins: 'charmap textcolor',
				toolbar: "alignleft aligncenter alignright alignjustify forecolor",
				menubar: false,
				statusbar: false,
			});
		}
		function hex2rgb(hexStr){
			var hex = parseInt(hexStr, 16);
			var r = (hex & 0xff0000) >> 16;
			var g = (hex & 0x00ff00) >> 8;
			var b = hex & 0x0000ff;
			return [r, g, b];
		}
		function expressInterestInUpcomingProject(){
			$('.show-upcoming-project-interest-btn').click(function(e){
				var thisElement = $(this);
				$(thisElement).parent('.project-thumb-overflow').find('.project-interest-error-text').html('');
				var projectId = $(this).attr('projectId');
				var email = $('.project-'+projectId+'-email').val();
				var phone = $('.project-'+projectId+'-phone').val();
				if(email!='' && phone!=''){
					$('.loader-overlay').show();
					$.ajax({
						url: '/pages/home/expressProjectInterest',
						type: 'POST',
						dataType: 'JSON',
						data: {projectId, email, phone},
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
					}).done(function(data){
						if(data.status){
							$(thisElement).parent('.project-thumb-overflow').html('<span style="color: #17723c; text-shadow: 1px 1px #fff; font-size: 1.5em;">Thank you!<br><small><small>We will be in touch when this project is live</small></small></span>');
						}
						else {
							$(thisElement).parent('.project-thumb-overflow').find('.project-interest-error-text').html(data.message);
						}
						$('.loader-overlay').hide();
					});
				}
				else{
					$(thisElement).parent('.project-thumb-overflow').find('.project-interest-error-text').html('Email and Phone is Mandatory');
				}
			});
		}

		function getGoogleWebDeveloperFonts(){
			var webFontAPI = 'AIzaSyBpa6-SZTPSFiyS7cmGqjfQlH2GwCLmAYY';
			$.getJSON("https://www.googleapis.com/webfonts/v1/webfonts?key="+webFontAPI, function(fonts){
				for (var i = 0; i < fonts.items.length; i++) {
					$('#font_style_select')
					.append($("<option></option>")
						.attr("value", fonts.items[i].family)
						.text(fonts.items[i].family));
				}
				$('#font_style_select option[value="{{$siteConfiguration->font_family}}"]').attr('selected', 'selected');
			});
		}

		function saveGoogleFontFamily(){
			$('#font_style_apply_btn').click(function(){
				var fontFamily = $('#font_style_select').val();
				$.ajax({
					url: '/configuration/home/changeFontFamily',
					type: 'POST',
					dataType: 'JSON',
					data: {fontFamily},
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
				}).done(function(data){
					location.reload('/#font_style_select');
				});
			});

			$('#font_style_select').change(function(e){
				var fontFamily = $(this).val();
				if(fontFamily != ''){
					var fontConcat = fontFamily.replace(/ /g,"+");
					$('<link>').appendTo('head').attr({
						type: 'text/css',
						rel: 'stylesheet',
						href: 'https://fonts.googleapis.com/css?family='+fontConcat
					});
					$('.font-select-preview').css('font-family', fontFamily);
				}
			});
		}

		function iphoneDeviceConfigurations(){
			@if($isiosDevice)
			$('.reference-link-with-js').each(function(index){
				$(this).attr('href', 'javascript:void(0)');
			});
			$('.reference-link-with-js').click(function(e){
				$selfLocation = $(this).attr('data-href');
				self.location.href = $selfLocation;
			});
			@endif
		}

		function filterSelection(c) {

			let filterUrl = '{{ route('home') }}?filter=' + c + '#projects';
			window.location.href = filterUrl;
			return;

			// console.log(c);
			$.ajax({
				url: '/projects/filter',
				type: 'get',
				dataType: 'JSON',
				data: {c},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
			}).done(function(data){
				// console.log(data);
			});
		}
		// Add active class to the current button (highlight it)
		var btnContainer = document.getElementById("myBtnContainer");
		var btns = btnContainer.getElementsByClassName("filterbtn");
		for (var i = 0; i < btns.length; i++) {
			btns[i].addEventListener("click", function(){
				var current = document.getElementsByClassName("active");
				current[0].className = current[0].className.replace(" active", "");
				this.className += " active";
			});
		}

		jQuery('.filterbtn').click(function(){
			jQuery('.filterbtn').removeClass('active');
			jQuery(this).addClass('active');
		});

		function showCountDownOption() {
			$('.invoice-due-date').each(function (index, value) {
				let projectId = $(this).attr('data-project-id');
				let dueDateTs = $(this).attr('data-due-date');
				$('#invoice_due_date_' + projectId).countdowntimer({
					dateAndTime: new Date(dueDateTs),
					displayFormat : "D:H:M:S"
				});
			})
		}

		function showCountDownPause(){
			$('.invoice-sold-date').each(function (index, value) {
				let projectId = $(this).attr('data-project-id');
				let dueDateTs = $(this).attr('data-due-date');
				let soldDate = $(this).attr('data-sold-date');
				// console.log(soldDate);
				var datetimeOfdueDateTs = new Date( dueDateTs ).getTime();
				var datetimeOfsoldDate = new Date( soldDate ).getTime();
				var timeDiff = datetimeOfdueDateTs-datetimeOfsoldDate;
				if(timeDiff > 0){
					var difference = timeDiff;

					var daysDifference = Math.floor(difference/1000/60/60/24);
					difference -= daysDifference*1000*60*60*24

					var hoursDifference = Math.floor(difference/1000/60/60);
					difference -= hoursDifference*1000*60*60

					var minutesDifference = Math.floor(difference/1000/60);
					difference -= minutesDifference*1000*60

					var secondsDifference = Math.floor(difference/1000);

					// console.log(daysDifference+':'+hoursDifference+':'+minutesDifference+':'+secondsDifference);
					$('#invoice_sold_date_' + projectId).html(daysDifference+':'+hoursDifference+':'+minutesDifference+':'+secondsDifference);
				}else{
					$('#invoice_sold_date_' + projectId).html('Expired');
				}
				// console.log('sold');
			})
		}

		function refreshAskingPrice() {
			setInterval(function() {
				$('.invoice-asking-amount').each(function (index, value) {
					let projectId = $(this).attr('data-project-id');
					$.ajax({
						url: `/invoice/${projectId}/refresh`,
						type: 'get',
						dataType: 'JSON',
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						},
					}).done(function(data){
						if (data.status) {
							console.log(data);
							$('#invoice_asking_amount_' + projectId).html('$' + number_format(data.data.asking_amount, 3));
						}
					});
				});
			}, 5000);
		}

		let number_format = function (number, decimal_pos, decimal_sep, thousand_sep) {
			let ts = (thousand_sep == null ? ',' : thousand_sep)
			, ds = (decimal_sep == null ? '.' : decimal_sep)
			, dp = (decimal_pos == null ? 2 : decimal_pos)

			, n = Math.abs(Math.floor(number)).toString()

			, i = n.length % 3
			, f = ((number < 0) ? '-' : '') + n.substr(0, i);

			for (; i < n.length; i += 3) {
				if (i != 0) f += ts;
				f += n.substr(i, 3);
			}

			if (dp > 0)
				f += ds + parseFloat(number).toFixed(dp).split('.')[1]

			return f;
		}

	</script>
</body>
</Html>

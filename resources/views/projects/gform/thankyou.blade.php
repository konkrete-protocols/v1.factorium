	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title>Thank You for expressing interest</title>
		{!! Html::style('/css/app2.css') !!}
		{!! Html::style('/css/bootstrap.min.css') !!}
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700,200italic,400italic,700italic' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container">
			<br>
			<section id="section-colors-left" class="color-panel-right panel-open-left center" style="position: static;">
				<div class="color-wrap-left" style="">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2>
								@if($project->projectconfiguration->payment_switch)
								Thank you
								@else
								Thank you <br><div style="margin-top: 1.2rem;"> Please deposit ${{number_format($amount)}} to</div>
								@endif
							</h2>
						</div>
					</div>
					<br>
					@if($project->investment)
					{{-- @if($project->investment->bank) --}}
					<div class="row">
						<div class="col-md-offset-2 col-md-8 text-justify">

							@if($project->projectconfiguration->payment_switch)
							@else

							<table class="table table-bordered">
								<tr><td>Bank</td><td>@if($project->investment->bank){!!$project->investment->bank!!}@else Westpac @endif</td></tr>
								<tr><td>Account Name</td><td>@if($project->investment->bank_account_name){!!$project->investment->bank_account_name!!}@else Konkrete Distributed Registries Ltd @endif</td></tr>
								<tr><td>BSB </td><td>@if($project->investment->bsb){!!$project->investment->bsb!!}@else 033002 @endif</td></tr>
								<tr><td>Account No</td><td>@if($project->investment->bank_account_number){!!$project->investment->bank_account_number!!}@else 968825 @endif</td></tr>
								<tr><td>SWIFT Code</td><td>@if($project->investment->swift_code){!!$project->investment->swift_code!!}@else WPACAU2S @endif</td></tr>
								<tr><td>Reference</td><td>INV{{ $investor->id }}</td></tr>
							</table>

							@if($project->investment->bitcoin_wallet_address)
							<h2 class="text-center" style="font-size: 1.4em; font-weight: 600; margin-bottom: 1.5rem;">Or pay using Bitcoin</h2>
							<table class="table table-bordered">
								<tr><td>Bitcoin wallet address</td><td>{!!$project->investment->bitcoin_wallet_address!!}</td></tr>
							</table>
							@endif

							@endif
						</div>
					</div>
					<br>
					{{-- @endif --}}
					@endif
				</div>
			</section>
			<div class="row">
				<div class="col-md-12 text-center">
					<a href="javascript:void(0);" onclick="top.window.location.href='@if($project->custom_project_page_link) {{$project->custom_project_page_link}} @else {{route('home')}} @endif';">BACK TO HOME</a>
				</div>
			</div>
		</div>
		{!! Html::script('/js/jquery-1.11.3.min.js') !!}
		{!! Html::script('/js/bootstrap.min.js') !!}
		@if($siteConfig=App\Helpers\SiteConfigurationHelper::getConfigurationAttr()->conversion_pixel)
		{!!$siteConfig!!}
		@endif
	</body>
	</html>

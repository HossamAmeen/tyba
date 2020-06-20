<!DOCTYPE html>
<html lang="ar">
<head>
	@include('web._master.header')
</head>
<body>
<header class="header">
	<div class="container">
		<!-- navbar -->
		@include('web._master.nav')
	</div>
</header>
		<section class="header-page ">
			<img src="images/services-head.jpg" alt="about-hospital" class="img-responsive">
			<div class="details container">
				<h1>العيادات الخارجية</h1>
				<ul class="list-unstyled list-inline">
					<li><a href="{{url('/')}}">الرئيسية</a></li>
					<li><i class="fas fa-arrow-left"></i></li>
					<li>العيادات الخارجية</li>
				</ul>
				<p></p>
			</div>
		</section>

		<section class="clinic-details padding">
			<div class="container">
				<div class="row">
					<h1 class="clinic-name">{{$clinic->name}}</h1>
					
					<div class="text-center doc-img">
						<img src="{{asset($clinic->img)}}" class="img-responsive" alt="doctor-img">
					</div>
					<div class="details text-center">
						
						<p class="appoint">{!!$clinic->descriptionPoint!!} </p>
						{{-- <ul class="clinic-desc list-unstyled">
							{!!html_entity_decode($pref->descriptionPoint)!!}
						</ul> --}}
					</div>
				</div>
			</div>
		</section>

<!--		footer section-->
@include('web._master.footer')
</body>
</html>
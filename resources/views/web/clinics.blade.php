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
		<img src="{{asset('resources/assets/web/images/about-header.jpg')}}" alt="about-hospital"
			class="img-responsive">
		<div class="details container">
			<h1>العيادات الخارجيه</h1>
			<ul class="list-unstyled list-inline">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li><i class="fas fa-arrow-left"></i></li>
				<li>العيادات الخارجيه</li>
			</ul>
			<p></p>
		</div>
	</section>


	<section class="clinics-page padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<ul class="nav nav-pills nav-stacked">
						{{-- <li class="active"><a data-toggle="pill" href="#home">عيادة الجراحة </a></li>
						    <li><a data-toggle="pill" href="#menu1">عيادة العيون</a></li> --}}
						@foreach ($clinics as $clinic)
						<li @if ($loop->first) class="active" @endif><a data-toggle="pill" href="#{{$clinic->id}}">{{$clinic->name}} </a></li>
						{{-- <li @if ($loop->first) class="active" @endif><a href="#{{$clinic->id}}">{{$clinic->name}}</a></li> --}}
						@endforeach
					</ul>
				</div>
				<div class="col-sm-8">
					<div class="tab-content">
						@foreach ($clinics as $clinic)
						<div id="{{$clinic->id}}" class=" clinic-details tab-pane fade @if ($loop->first) in active @endif">
							<h1 class="clinic-name">{{$clinic->name}}</h1>
				
						<div class="text-center doc-img">
							<img src="{{asset($clinic->img)}}" class="img-responsive" alt="doctor-img">
						</div>
						<div class="details text-center">
							{{-- <h2 class="doc-name">{{$clinic->doctor}} </h2>
							<p class="doc-title">  {{$clinic->postion}} <br> --}}
							
							</p>
							{{-- <p class="appoint">{{$clinic->appointments}} </p> --}}
							{!!$clinic->descriptionPoint!!}
							{{-- <ul class="clinic-desc list-unstyled">
								
							</ul> --}}
						</div>
					  </div>
					  @endforeach 
						{{-- @foreach ($clinics as $clinic)
						<div id="{{$clinic->id}}" class="tab-pane fade @if ($loop->first) in active @endif">
							<h1 class="clinic-name">{{$clinic->name}}</h1>

							<div class="text-center doc-img">
								<img src="{{asset($clinic->img)}}" class="img-responsive" alt="doctor-img">
							</div>
							<div class="details text-center">
								<h2 class="doc-name">{{$clinic->doctor}}</h2>
								<p class="doc-title"> {{$clinic->postion}}
								</p>
								<p class="appoint">{{$clinic->appointments}}</p>
								{{$clinic->descriptionPoint}}
							</div>
						</div>
						@endforeach --}}
						{{-- <div id="menu1" class="tab-pane fade">
							<h3>Menu 1</h3>
							<p>Some content in menu 1.</p>
						</div>
						<div id="menu2" class="tab-pane fade">
							<h3>Menu 2</h3>
							<p>Some content in menu 2.</p>
						</div> --}}
					</div>
				</div>
			</div>
		</div>
	</section>

	<!--		footer section-->
	@include('web._master.footer')
</body>

</html>
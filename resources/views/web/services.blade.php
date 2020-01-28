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
			<img src="{{asset('resources/assets/web/images/services-head.jpg')}}" alt="about-hospital" class="img-responsive">
			<div class="details container">
				<h1>خدماتنا</h1>
				<ul class="list-unstyled list-inline">
					<li><a href="{{url('/')}}">الرئيسية</a></li>
					<li><i class="fas fa-arrow-left"></i></li>
					<li>خدماتنا</li>
				</ul>
				<p></p>
			</div>
		</section>


		<section class="about padding">
			<div class="container">
				<div class="section-head">
					<h1 class="text-center">مستشفى طيبه رويال  </h1>
					<span class="icon"><i class="fas fa-hospital fa-3x"></i></span>
				</div>
				<div class="row">
					<div class="col-md-6 content">
						<p>{{$pref->arDescription}}</p>
						{!!html_entity_decode($pref->descriptionPoint)!!}

					</div>
					<div class="col-md-6 img text-center">
						<img src="{{asset('resources/assets/web/images/about.png')}}" class="img-responsive" alt="about-hospital">
					</div>
				</div>
			</div>
		</section>
			
		
		
<!--		our services section -->
<section class="services padding">
		<div class="container">
			<div class="row">
				<div class="section-head">
					<h1 class="text-center">خدماتنا </h1>
					<span class="icon"><i class="fas fa-medkit fa-3x"></i></span>
				</div>
				@foreach ($services as $service)
				<div class="col-md-3 col-sm-6">
					<div class="service text-center">
						<img src="{{asset($service->img)}}" class="img-responsive">
						<div class="content">
							<span><i class="fas {{$service->icon}} fa-5x"></i></span>
							<p> {{$service->ar_title}} </p>
						</div>
						<a href="service-detail.html" class="title" title="">
							تفاصيل الخدمات
							<i class="fa fa-caret-right"></i></a>
					</div>
				</div>
				@endforeach
				
			
			</div>
		</div>
	</section>
		
<!--		footer section-->
@include('web._master.footer')
	</body>
</html>
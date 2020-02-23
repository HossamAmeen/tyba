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

		
		
		<section class="service-details padding">
			<div class="container">
		
				<div class="service-details-info">
					<div class="row">
						<div class="col-sm-6 col-12">
							<div class="service-details-photo">
								<img src="{{asset($service->image2)}}" class="img-responsive">
							</div>
						</div>
						<div class="col-sm-6 col-12">
							<div class="service-details-title">
								<h1>{{$service->ar_title}}</h1>
							<p>{{$service->descriptionPoint}}</p>
								
							</div>
						</div>
					</div>
				</div>
				
				<h1 class="related-services">خدمات اخرى</h1>
				
				<section class="services padding">
					<div class="container">
						<div class="row">
							@foreach ($services as $service)
							<div class="col-md-3 col-sm-6">
								<div class="service text-center">
									<img src="{{asset($service->image)}}" class="img-responsive">
									<div class="content">
										<span><i class="fas {{$service->icon}} fa-3x"></i></span>
										<p> {{$service->ar_title}} </p>
									</div>
									<a href="{{url('services/'.$service->id)}}" class="title" title="">
										تفاصيل الخدمات
										<i class="fa fa-caret-right"></i></a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</section>
				
			</div>
		</section>
	<!--		footer section-->

	@include('web._master.footer')
</body>

</html>
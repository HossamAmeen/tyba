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
			<h1>الزيارات</h1>
			<ul class="list-unstyled list-inline">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li><i class="fas fa-arrow-left"></i></li>
				<li>الزيارات </li>
			</ul>
			<p></p>
		</div>
	</section>

	<section class="clinics-page padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<ul class="nav nav-pills nav-stacked">
					
						@foreach ($clinics as $clinic)
					
						<li @if($loop->first) class="active" @endif><a data-toggle="pill" href="#{{$clinic->id}}">{{$clinic->name}} </a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-sm-9">
					<div class="tab-content">
						@foreach ($clinics as $clinic)
						<div id="{{$clinic->id}}"  class=" clinic-details tab-pane fade @if ($loop->first) in active @endif">
							
							<div class="row">
								@foreach ($clinic->events as $event)
								<div class="col-md-6 col-sm-6">
									<div class="row visitss">
										<div class="col-md-4" style="padding: 0;">
											<img class="img-responsive" src="{{asset($event->img)}}">
										</div>
										<div class="col-md-8">
											<div class="content">
												<h2 class="doc-name">{{$event->name}}  </h2>
												<p class="spec">
													{{$event->description}}
												</p>
											</div>
										</div>
										<div class="col-md-12">
											<p class="app">{{$event->appointments}}</p>
										</div>
									</div>
								</div>
								@endforeach 
							</div>

						</div>
						@endforeach 
					
					</div>
				</div>
			</div>
		</div>
	</section>


	<!--		footer section-->
	@include('web._master.footer')
</body>

</html>
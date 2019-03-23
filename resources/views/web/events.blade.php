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
			<img src="{{asset('resources/assets/web/images/about-header.jpg')}}" alt="about-hospital" class="img-responsive">
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
		
<!--		visits section-->
		<section class="visits-page padding">
			<div class="container">
				<div class="row">
					@foreach ($events as $event)
						<div class="col-md-6 col-xs-10 col-xs-offset-1 col-md-offset-0">
							<div class="row visit">
								<div class="col-md-4" style="padding: 0;">
									<img class="img-responsive" src="{{$event->img}}">
								</div>
								<div class="col-md-8">
									<div class="content">
										<h2 class="doc-name">{{$event->name}}</h2>
										<p class="spec">
										{{$event->description}}			
										</p>
									</div>
								</div>
								<div class="col-md-12">
									<p class="app">{{$event->date}}</p>
								</div>
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
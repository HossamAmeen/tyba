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
				<h1>الاطباء</h1>
				<ul class="list-unstyled list-inline">
					<li><a href="{{url('/')}}">الرئيسية</a></li>
					<li><i class="fas fa-arrow-left"></i></li>
					<li>الاطباء</li>
				</ul>
				<p></p>
			</div>
		</section>
		
		<!--		doctors section-->
		<section class="doctors padding">
				<div class="container">
					<div class="section-head text-center">
						<h1>الاطباء</h1>
						<span class="icon"><i class="fas fa-user-md fa-3x"></i></span>
					</div>
					<div class="row">
					@foreach ($doctors as $doctor)
					
							<div class="col-md-3 col-sm-6 doctor">
								<img class="img-responsive" src="{{asset($doctor->img)}}">
								<div class="content text-center">
									<p class="doc-name">{{$doctor->name}}</p>
									<p class="doc-title">{{$doctor->job}}</p>
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
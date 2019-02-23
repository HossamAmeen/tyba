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
				<h1>العيادات الخارجيه</h1>
				<ul class="list-unstyled list-inline">
					<li><a href="index.html">الرئيسية</a></li>
					<li><i class="fas fa-arrow-left"></i></li>
					<li>العيادات الخارجيه</li>
				</ul>
				<p></p>
			</div>
		</section>
		
		<section class="clinics-page padding">
			<div class="container">
				<div class="row">
					@foreach ($clinics as $clinic)
					<div class="col-md-4 col-sm-6">
							<div class="item">
								<img src="{{asset($clinic->img)}}" class="img-responsive">
									<div class="content text-center">
										<p class="clinic-name">{{$clinic->name}}</p>
								
								<p class="app">{{$clinic->appointments}}</p>
								<p class="button">
									 <a href="clinic.html" class="btn"> تفاصيل العيادة </a>   
								 </p>
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
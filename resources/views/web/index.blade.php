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
		
<!--		our revolution slider-->
		<div class="bannercontainer">
			<div class="banner">
				<ul>
					<!-- THE BOXSLIDE EFFECT EXAMPLES  WITH LINK ON THE MAIN SLIDE EXAMPLE -->

					 <li data-transition="boxslide" data-slotamount="7">
					   <img src="{{asset('resources/assets/web/images/slides/img1.jpg')}}" alt="slide-img1">
					   <div class="caption sft big_white" data-x="450" data-y="100" data-speed="700" data-start="1700" data-easing="easeOutBack">
							<img src="{{asset('resources/assets/web/images/logo.png')}}" width="300px"> 
						</div>
					   <div class="caption sfb iso"  data-x="450" data-y="450" data-speed="500" data-start="1900" data-easing="easeOutBack">اول مستشفى تحصل على شهادة ال ISO فى صعيد مصر</div>
					 </li>
					<li data-transition="boxslide" data-slotamount="7">
					   <img src="{{asset('resources/assets/web/images/slides/img3.jpg')}}" alt="slide-img2">
						<div class="caption sft big_white"  data-x="center" data-y="200" data-speed="700" data-start="1700" data-easing="easeOutBack">
							<h1 class="text-center slide2-serv">مستشفى <span style="color: #02adc6;"> طيبه رويال </span></h1>
						</div>
					   
						
					<div class="caption sfl big_orange"  data-x="center" data-y="300" data-speed="500" data-start="1900" data-easing="easeOutBack" style="color: #fff; background-color: #02adc6; padding: 10px">
						 قسم العناية المركزة
					</div>
						
					<div class="caption sfl big_orange"  data-x="center" data-y="350" data-speed="500" data-start="1900" data-easing="easeOutBack" style="color: #fff; background-color: #02adc6; padding: 10px">
						 معامل مجهزة باحدث الاجهزة معامل مجهزة باحدث الاجهزة
					</div>
					
					<div class="caption sfl big_orange"  data-x="center" data-y="400" data-speed="500" data-start="1900" data-easing="easeOutBack" style="color: #fff; background-color: #02adc6; padding: 10px">
						 عيادات فى جميع التخصصات
					</div>
						
					<div class="caption sfl big_orange"  data-x="center" data-y="450" data-speed="500" data-start="1900" data-easing="easeOutBack" style="color: #fff; background-color: #02adc6; padding: 10px" >
						 قسم الاطفال والحضانات
					</div>
					</li>
				</ul>
			</div>
		</div>
		
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
								<span><i class="fas {{$service->icon}} fa-5x" ></i></span>
								<p> {{$service->ar_title}} </p>
							</div>
							
						</div>
					</div>
					@endforeach
					
				
				</div>
			</div>
		</section>
		
<!--		clinics -->
		<section class="clinics padding">
			<div class="container">
				<div class="section-head text-center">
					<h1>العيادات الخارجية</h1>
					<span class="icon"><i class="fas fa-hospital fa-3x"></i></span>
				</div>
				<div class="row">
					<!-- Set up your HTML -->
					<div class="owl-one owl-carousel owl-theme">
						@foreach ($clinics as $clinic)
						<div class="item">
							<img src="{{asset($clinic->img)}}" class="img-responsive">
									<div class="content text-center">
										<p class="clinic-name">{{$clinic->name}}</p>
								
								<p class="app">{{$clinic->appointments}}</p>
								<p class="button">
									<a href="{{url('clinic/'.$clinic->id)}}" class="btn">تفاصيل العيادة </a>   
								 </p>
									</div>
							</div>
						@endforeach
						
					   
					</div>
				</div>
			</div>
		</section>
		
<!--		visits section-->
		<section class="visits padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="desc padding">
							<h1>الزيارات الخارجية</h1>
							<p>
							{{$event->description}} 
							</p>
							<p class="button">
								<a href="{{url('events')}}" class="btn">معرفة الزيارات</a>
							</p>
						</div>
					</div>
					<div class="col-sm-6">
						<img src="{{asset($event->img)}}" class="img-responsive" alt="hosiptal visits">
					</div>
				</div>
			</div>
		</section>
		
<!--		our testimonials-->
		<section class="mission padding">
			<div class="container">
				<div class="row text-center">
					<span class="icon"><i class="fas fa-quote-right fa-5x"></i></span>
					<p class="content">
						يُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف.
					</p>
					<span class="icon"><i class="fas fa-quote-left fa-5x"></i></span>
				</div>
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
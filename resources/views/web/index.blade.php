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
			   <img src="{{asset('resources/assets/web/images/slides/slide1.png')}}" alt="slide-img1">
			   
			   <div class="caption sfb iso iso1"  data-x="300" data-y="450" data-speed="500" data-start="1900" data-easing="easeOutBack" style="color:#2a3d66;font-size:30px;top:305px">اول مستشفى تحصل على شهادة ال ISO فى صعيد مصر</div>
			 </li>
			
			<li data-transition="boxslide" data-slotamount="7">
			   <img src="{{asset('resources/assets/web/images/slides/slide2.png')}}" alt="slide-img2">
				<div class="caption sft big_white"  data-x="center" data-y="200" data-speed="700" data-start="1700"
				 data-easing="easeOutBack" style="font-size:36px;">
					مستشفى <span style="color: #02adc6;"> طيبه رويال </span>
				</div>				
			<div class="caption sfl big_orange"  data-x="center" data-y="300" data-speed="500" data-start="1900" data-easing="easeOutBack" 
			style="color: #fff; background-color: #02adc6; padding: 10px 20px; border-radius: 30px;">
				 وحدة الإستقبال والطوارئ
			</div>
				
			<div class="caption sfl big_orange"  data-x="center" data-y="350" data-speed="500" data-start="1900" 
			data-easing="easeOutBack" style="color: #fff; background-color: #02adc6; padding: 10px 20px; border-radius: 30px;">
				 وحدة العناية المركزة
			</div>
			
			<div class="caption sfl big_orange"  data-x="center" data-y="400" data-speed="500" data-start="1900"
			 data-easing="easeOutBack" style="color: #fff; background-color: #02adc6;  padding: 10px 20px; border-radius: 30px;">
				بنك دم اقليمى
			</div>
				
			<div class="caption sfl big_orange"  data-x="center" data-y="450" data-speed="500" data-start="1900" 
			data-easing="easeOutBack" style="color: #fff; background-color: #02adc6;  padding: 10px 20px; border-radius: 30px;" >
				عيادات فى جميع التخصصات
			</div>
			</li>
			
			{{-- <li data-transition="boxslide" data-slotamount="7">
				<img src="{{asset('resources/assets/web/images/slides//slide3.png')}}" alt="slide-img3">
				<img src="{{asset('resources/assets/web/images/slides/slide1.png')}}" alt="slide-img1">
				   <div class="caption sft big_white" data-x="450" data-y="100" 
					  data-speed="700" data-start="1700" data-easing="easeOutBack">
						<img src="{{asset('resources/assets/web/images/logo.png')}}" width="300px"> 
				   </div>
				<div class="caption sfb iso"  data-x="460" data-y="450" data-speed="500" 
					  data-start="1900" data-easing="easeOutBack" style="color:#2a3d66;font-size:30px;">رعاية ... شفاء ... دواء
				</div>
			</li> --}}
		</ul>
	</div>
</div>

	<!--	Start	News  section-->

	<section class="news padding">
		<div class="container">
			<div class="section-head text-center">
				<h1>أخبار المستشفى</h1>
				<span class="icon"><i class="fas fa-newspaper fa-3x"></i></span>
			</div>
			<div class="news-info">
				<div class="row">
					@foreach ($news as $item)
					<div class="col-md-3 col-sm-6 col-12">
						<div class="new-content">
							<div class="new-photo">
								<img src="{{$item->image}}" class="img-responsive">
							</div>
							<div class="new-details text-center">
							<a href="{{url('news/'.$item->id)}}">
									<h1 class="new-title">{{$item->title}}</h1>
								</a>
								<p class="new-description">{{$item->ar_sub_title}}</p>
							</div>
						</div>
					</div>

					@endforeach

				</div>
			</div>

			<p class="button text-center">
				<a href="{{url('news')}}" class="btn">المزيد من الأخبار</a>
			</p>
		</div>
	</section>
	<!--	End	News  section-->
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
						<img src="{{asset($service->image)}}" class="img-responsive">
						<div class="content">

							<p class="service-tit"> {{$service->ar_title}}</p>
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
	@if(isset($event))
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
	@endif
	<!--		our testimonials-->
	<section class="mission padding">
		<div class="container">
			<div class="row text-center">
				<span class="icon"><i class="fas fa-quote-right fa-5x"></i></span>
				<p class="content">
					@if($pref->description != null)
					{{ $pref->description }}
					@endif
				</p>
				<span class="icon"><i class="fas fa-quote-left fa-5x"></i></span>
			</div>
		</div>
	</section>
	<!--	Start Videos section-->
	<section class="videos-page padding home-videos">
		<div class="container">
			<div class="row">
				@foreach ($videos as $item)
				<div class="col-md-4 col-sm-6 col-xs-offset-1 col-sm-offset-0 col-xs-10">
					<div class="item">
						<iframe width="100%" src="{{$item->path}}" frameborder="0"
							allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
							allowfullscreen></iframe>
						<div class="content">
							<p class="title">{{$item->name}}</p>
						</div>
					</div>
				</div>
				@endforeach



			</div>

			<p class="button text-center">
				<a href="{{url('videos')}}" class="btn">المزيد من الفيديوهات</a>
			</p>
		</div>
	</section>
	<!--	End Videos section-->
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
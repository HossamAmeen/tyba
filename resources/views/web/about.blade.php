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
				<h1>من نحن</h1>
				<ul class="list-unstyled list-inline">
					<li><a href="index.html">الرئيسية</a></li>
					<li><i class="fas fa-arrow-left"></i></li>
					<li>من نحن</li>
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
						<p>لوريم ايبسوم هو نموذج افتراضي يوضع في التصاميم لتعرض على العميل ليتصور طريقه وضع النصوص بالتصاميم سواء كانت تصاميم مطبوعه ... بروشور او فلاير على سبيل المثال ... او نماذج </p>
						<ul class="list">
							<li><span> وحدة اقامه فندقيه </span></li>
							<li><span> وحدات اشعه مجهزة </span></li>
							<li><span>معامل تحاليل على اعلى مستوى </span></li>
							<li><span> وحدة العنايه المركزه </span></li>
							<li><span> مركز رعاية الاطفال و حضانات الاطفال </span></li>
							<li><span> عيادات خارجيه فى جميع التخصصات </span></li>
							<li><span> العمليات والمناظير الجراحيه </span></li>
							<li><span> وحدة جراحات التجميل </span> </li>
							<li><span> وحدة علاج السمنه </span> </li>
						</u>
						
					</div>
					<div class="col-md-6 img text-center">
						<img src="{{asset('resources/assets/web/images/about.png')}}" class="img-responsive" alt="about-hospital">
					</div>
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
				@foreach ($doctors as $doctor)
						
				@endforeach
				<div class="row">
					<div class="col-md-3 col-sm-6 doctor">
						<img class="img-responsive" src="{{asset($doctor->img)}}">
						<div class="content text-center">
							<p class="doc-name">{{$doctor->name}}</p>
							<p class="doc-title">{{$doctor->job}}</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		
<!--		footer section-->
@include('web._master.footer')
	</body>
</html>
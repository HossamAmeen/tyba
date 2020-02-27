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
		<img src="{{asset('resources/assets/web/images/services-head.jpg')}}" alt="about-hospital"
			class="img-responsive">
		<div class="details container">
			<h1>احجز هنا </h1>
			<ul class="list-unstyled list-inline">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li><i class="fas fa-arrow-left"></i></li>
				<li>احجز هنا </li>
			</ul>
			<p></p>
		</div>
	</section>

	<!--		contact details-->
	<section class="contact-details padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="contact">
						<h1 class="contact-head">بيانات التواصل </h1>
						<p> تتشرف مستشفى طيبه رويال بالايجابه على استفساراتكم واتصالاتكم على الارقام التاليه او زيارتكم
							على العنوان الاتى </p>

					</div>
				</div>
				<div class="col-sm-3">
					<div class="item">
						<div class="content text-center">
							<p class="icon"><i class="fas fa-location-arrow fa-3x"></i></p>
							<p class="phone">
								<strong>العنوان</strong><br>
								{{$pref->arAddress}}
							</p>
						</div>
					</div>
				</div>
				@if($pref->phone != null)
				<div class="col-sm-3">
					<div class="item">
						<div class="content text-center">
							<p class="icon"><i class="fas fa-phone fa-3x"></i></p>
							<p class="phone">
								<strong>ارقام التليفون </strong><br>
								{{$pref->phone}}

							</p>
						</div>
					</div>
				</div>
				@endif

			</div>
		</div>
	</section>

	<section class="contact-form padding">
		<div class="container">
			<div class="section-head text-center">
				<h1> احجز هنا </h1>
				<span class="icon"><i class="fas fa-envelope-open fa-3x"></i></span>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<form action="{{ url('book') }}" method="post" class="form-horizontal">
						{{ csrf_field() }}
						@if (session()->get('status') )
						<div class="alert alert-success">
							<strong>{{session()->get('status')}}</strong>
						</div>
						@endif
						@if ($errors->any())
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif

						<div class="form-group">
							<div class="col-md-4">
								<input type="text" class="form-control" name="name" placeholder="الاسم بالكامل"
									value="{{ old('name') }}">
							</div>

							<div class="col-md-4">
								<input type="text" class="form-control" name="phone" placeholder="تلفون"
									value="{{ old('phone') }}">
							</div>
							<div class="col-md-4">
								<input type="text" class="form-control" name="special" placeholder="النخصص"
									value="{{ old('special') }}">
							</div><br><br><br>
						</div>
						<div class="form-group">
							<textarea class="form-control" placeholder="الرسالة" rows="10" name="message" required></textarea>
						</div>
						
						<div class="form-submit text-center">
							<input type="submit" id="submit" class="btn btn-default" value="ارسال">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<section class="map">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1784.3507279843723!2d31.721024805188982!3d26.561857134250847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144f5c027167d6d5%3A0xb146711c3e38895a!2z2YXYs9iq2LTZgdmJINi32YrYqNipINix2YjZitin2YQ!5e0!3m2!1sar!2seg!4v1537638178878"
			width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>

	<!--		footer section-->
	@include('web._master.footer')
</body>

</html>
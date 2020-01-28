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
			<h1>الأخبار</h1>
			<ul class="list-unstyled list-inline">
				<li><a href="{{url('/')}}">الرئيسية</a></li>
				<li><i class="fas fa-arrow-left"></i></li>
				<li>الأخبار</li>
			</ul>
			<p></p>
		</div>
	</section>
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
								<a href="{{url('news/'.$item->id)}}">
									<img src="{{asset($item->image)}}" class="img-responsive">
								</a>
							</div>
							<div class="new-details text-center">
								<a href="{{url('news/'.$item->id)}}">
									<h1 class="new-title">{{$item->title}}</h1>
								</a>
							<p class="new-description">{{$item->ar_sub_des}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="row text-center">
				<ul class="pagination">
					{{$news->links()}}
				</ul>
			</div>
		</div>
	</section>


	<!--		footer section-->
	@include('web._master.footer')
</body>

</html>
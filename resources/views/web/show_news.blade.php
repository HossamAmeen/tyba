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


	<section class="single-new padding">
		<div class="container">

			<div class="single-new-info">
				<div class="row">
					<div class="col-sm-6 col-12">
						<div class="single-photo">
							<img src="{{asset($news->image)}}" class="img-responsive">
						</div>
					</div>
					<div class="col-sm-6 col-12">
						<div class="single-new-title">
							<h1>{{$news->title}}</h1>
							<p>{{$news->description}}
							</p>
						<span><i class="fas fa-calendar-alt"></i>{{$news->date}}</span>
						</div>
					</div>
				</div>
			</div>

			<h1 class="related-news">أخبار متعلقة</h1>
			<section class="news padding allnews">
				<div class="container">
					<div class="news-info">
						<div class="row">
							@foreach ($news2 as $item)
						
				
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
				</div>
			</section>
		</div>
	</section>

	<!--		footer section-->
	@include('web._master.footer')
</body>

</html>
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
        <img src="{{asset('resources/assets/web/images/services-head.jpg')}}" alt="about-hospital" class="img-responsive">
        <div class="details container">
            <h1> مكتبة الفيديوهات </h1>
            <ul class="list-unstyled list-inline">
                <li><a href="index.html">الرئيسية</a></li>
                <li><i class="fas fa-arrow-left"></i></li>
                <li> الفيديوهات </li>
            </ul>
            <p></p>
        </div>
    </section>


    <section class="videos-page padding">
        <div class="container">
            <div class="row">
                @foreach ($videos as $item)
                <div class="col-md-3 col-sm-6 col-xs-offset-1 col-sm-offset-0 col-xs-10">
                    <div class="item">
                        <iframe width="100%" src="{{$item->path}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <div class="content">
                            <p class="title">{{$item->name}}</p>
                          </div>
                    </div>
                </div>
                @endforeach
            </div>
         
            @if($pref->youutbe != null)
            <div class="row">
                <div class="channel text-center">
                    <a href="{{$pref->youutbe}}" class="btn">
                        <span class="icon"><i class="fab fa-youtube"></i> </span>
                        <span class="content">قناتنا على اليوتيوب</span>
                    </a>
                </div>
            </div>
            @endif
        </div>
    </section>


    <!--		footer section-->
    @include('web._master.footer')
</body>

</html>
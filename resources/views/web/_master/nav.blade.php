
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" data-spy="affix" data-offset-top="150">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><img src="{{asset('resources/assets/web/images/logo.png')}}" class="img-responsive" alt="logo"></a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-left">
            <li @if($title == 'مستشفى طيبه رويال' ) class="active"  @endif ><a class="page-scroll" href="{{url('/')}}"> الرئيسية </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - من نحن' ) class="active"  @endif><a class="page-scroll" href="{{url('/about')}}">من نحن</a></li>
            <li  @if($title == 'مستشفى طيبه رويال - خدماتنا' ) class="active"  @endif><a class="page-scroll" href="{{url('/services')}}">خدماتنا </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - العيادات' ) class="active"  @endif><a class="page-scroll" href="{{url('/clinics')}}">العيادات الخارجية </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - الاطباء' ) class="active"  @endif><a class="page-scroll" href="{{url('/doctors')}}">الاطباء </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - الأخبار' ) class="active"  @endif><a class="page-scroll" href="{{url('/news')}}">الأخبار </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - الفديوهات' ) class="active"  @endif><a class="page-scroll" href="{{url('/videos')}}">الفديوهات </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - الزيارات' ) class="active"  @endif><a class="page-scroll" href="{{url('/events')}}">الزيارات  </a></li>
            <li  @if($title == 'مستشفى طيبه رويال - تواصل معانا' ) class="active"  @endif><a class="page-scroll" href="{{url('/contacts')}}">اتصل بنا </a></li>
            <li  @if($title == 'مستشفى طيبه رويال -احجز' ) class="active"  @endif><a class="page-scroll" href="{{ url('/book') }}">احجز </a></li>
            <li><img src="{{asset('resources/assets/web/images/Group2.png')}}" class="img-responsive" alt="logo"></li>
            </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
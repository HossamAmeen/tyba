<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v6.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="1030827263657623"
logged_in_greeting="أهلا بكم فى الموقع الرسمي لمستشفى طيبة رويال"
logged_out_greeting="أهلا بكم فى الموقع الرسمي لمستشفى طيبة رويال">
</div>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h2>مستشفى طيبه رويال</h2>
        <div class="details row">
          <div class="col-xs-5">
            <ul>
              <li><a href="{{url('/')}}"> الرئيسية </a></li>
              <li><a href="{{url('/about')}}">من نحن </a></li>
              <li><a href="{{url('/services')}}">خدماتنا </a></li>
            </ul>
          </div>
          <div class="col-xs-7">
            <ul>
              <li><a href="{{url('/clinics')}}">العيادات الخارجية </a></li>
              <li><a href="{{url('/doctors')}}"> الأطباء </a></li>
              <li><a href="{{url('/contacts')}}">اتصل بنا </a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-md-4 text-center">
        <img src="{{asset('resources/assets/web/images/logo.png')}}" class="img-responsive logo" alt="logo">
      </div>
      <div class="col-md-4">
        @if($pref->arAddress != null)
        <h2>العنوان </h2>
        <div class="contacts">
          <p class="address">
            {{$pref->arAddress}}
          </p>
          @endif
          @if($pref->phone != null)
          <p class="phone"><strong>تليفون: </strong>{{$pref->phone}}</p>
          @endif
          
        
         
        </div>
        <div class="scial-medai">
          <ul class="list-unstyled">
            @if($pref->facebook != null)
            <li><a href="{{$pref->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            @endif
            @if($pref->youtube != null)
            <li><a href="{{$pref->youtube}}" target="_blank"><i class="fab fa-youtube"></i></a></li>
            @endif
          
               <li><a href="https://play.google.com/store/apps/details?id=com.zedy.tibaroyel" target="_blank"><i class="fab fa-android"></i></a></li>
           
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="copywrite" style="direction: ltr;">
    <p class="text-center">created by
      <a href="http://www.z-edy.com/" target="_blank">
        <img src="{{asset('resources/assets/web/images/zedy_logo.png')}}" width="70px" alt="zedy company">
      </a>
    </p>
  </div>
</footer>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156465957-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156465957-1');
</script>
<script src="{{asset('resources/assets/web/js/jquery-2.2.4.min.js')}}"></script>
<script src="{{asset('resources/assets/web/js/bootstrap.min.js')}}"></script>
<script src="{{asset('resources/assets/web/js/video.popup.js')}}"></script>
<!--        our revolution slider-->
<script src="{{asset('resources/assets/web/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('resources/assets/web/js/jquery.themepunch.revolution.min.js')}}"></script>

<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('.banner').revolution({
     delay:9000,
     startwidth: 1200,
     startheight: 650,
     startWithSlide: 0,

     fullScreenAlignForce:"off",
     autoHeight:"on",
     minHeight:"off",

     shuffle:"off",

     onHoverStop:"on",

     thumbWidth:100,
     thumbHeight:50,
     thumbAmount:3,

     hideThumbsOnMobile:"off",
     hideNavDelayOnMobile:1500,
     hideBulletsOnMobile:"off",
     hideArrowsOnMobile:"on",
     hideThumbsUnderResoluition:0,

     hideThumbs:0,
     hideTimerBar:"off",

     keyboardNavigation:"on",

     navigationType:"bullet",
     navigationArrows:"solo",
     navigationStyle:"round",

     navigationHAlign:"center",
     navigationVAlign:"bottom",
     navigationHOffset:30,
     navigationVOffset:30,

     soloArrowLeftHalign:"left",
     soloArrowLeftValign:"center",
     soloArrowLeftHOffset:20,
     soloArrowLeftVOffset:0,

     soloArrowRightHalign:"right",
     soloArrowRightValign:"center",
     soloArrowRightHOffset:20,
     soloArrowRightVOffset:0,


     touchenabled:"on",
     swipe_velocity:"0.7",
     swipe_max_touches:"1",
     swipe_min_touches:"1",
     drag_block_vertical:"false",

     parallax: "mouse",
     parallaxBgFreeze:"on",
     parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
     parallaxDisableOnMobile:"off",

     stopAtSlide:-1,
     stopAfterLoops:-1,
     hideCaptionAtLimit:0,
     hideAllCaptionAtLilmit:0,
     hideSliderAtLimit:0,

     dottedOverlay:"none",

     spinned:"spinner4",

     fullWidth:"off",
     forceFullWidth:"off",
     fullScreen:"off",
     fullScreenOffsetContainer:"#topheader-to-offset",
     fullScreenOffset:"0px",

     panZoomDisableOnMobile:"off",

     simplifyAll:"off",

     shadow:0

    });

 });
</script>

<!--		owl carousel-->
<script src="{{asset('resources/assets/web/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript">
  $('.owl-one').owlCarousel({
        rtl:true,
        loop:true,
        margin:20,
        nav:true,
        autoplay:true,
        autoplayTimeout:1600,
        autoplayHoverPause:true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:2
          },
          1000:{
            items:3
          }
        }
    });
    $('.owl-two').owlCarousel({
        rtl:true,
        loop:true,
        margin:20,
        nav:true,
        autoplay:true,
        autoplayTimeout:1500,
        autoplayHoverPause:true,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:3
          },
          1000:{
            items:4
          }
        }
    })
</script>
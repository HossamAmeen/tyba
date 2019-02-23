<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- iOS webapp icons --> 
    <link rel="apple-touch-icon-precomposed" href="{{asset('resources/assets/admin/images/ios/fickle-logo-72.png')}}"/>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('resources/assets/images/ios/fickle-logo-72.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('resources/assets/images/ios/fickle-logo-114.png')}}" />

    <!-- TODO: Add a favicon -->
    <link rel="shortcut icon" href="{{asset('resources/assets/images/ico/fab.ico')}}">

    <title>{{$title}}</title>

    <!--Page loading plugin Start -->
    <link rel="stylesheet" href="{{asset('resources/assets/admin/css/rtl-css/plugins/pace-rtl.css')}}">
    <script src="{{asset('resources/assets/admin/js/pace.min.js')}}"></script>
    <!--Page loading plugin End   -->

    <!-- Plugin Css Put Here -->
    <link href="{{asset('resources/assets/admin/css/bootstrap-rtl.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('resources/assets/admin/css/rtl-css/plugins/summernote-rtl.css')}}">

    <!-- Plugin Css End -->
    <!-- Custom styles Style -->
    <link href="{{asset('resources/assets/admin/css/rtl-css/style-rtl.css')}}" rel="stylesheet">
    <!-- Custom styles Style End-->

    <!-- Responsive Style For-->
    <link href="{{asset('resources/assets/admin/css/rtl-css/responsive-rtl.css')}}" rel="stylesheet">
    <!-- Responsive Style For-->

    <!-- Custom styles for this template -->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<!--Navigation Top Bar Start-->
<nav class="navigation">
    <div class="container-fluid">
        <!--Logo text start-->
        <div class="header-logo">
            <a target="_blank" href="{{url('/')}}" title="">
                <h1>almaseria</h1>
            </a>
        </div>
        <!--Logo text End-->
        <div class="top-navigation">
            <!--Collapse navigation menu icon start -->
            <div class="menu-control hidden-xs">
                <a href="javascript:void(0)">
                    <i class="fa fa-bars"></i>
                </a>
            </div>

            <!--Collapse navigation menu icon end -->
            <!--Top Navigation Start-->

            <ul>
                <li>
                    <a href="{{url('admin/logout')}}">
                        <i class="fa fa-power-off"></i>
                    </a>
                </li>

            </ul>
            <!--Top Navigation End-->
        </div>
    </div>
</nav>
<!--Navigation Top Bar End-->
@include('admin._masters.left-navigation')

<!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">بيانات الموقع</h3>
                        </div>
                        @if (session()->get('status') )
                            <div class="alert alert-success">
                                <strong>{{session()->get('status')}}</strong>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form id="defaultForm" method="post" class="form-horizontal ls_form" action="{{url('admin/prefs/' . $id)}}"
                                    data-bv-message="This value is not valid"
                                    data-bv-feedbackicons-valid="fa fa-check"
                                    data-bv-feedbackicons-invalid="fa fa-bug"
                                    data-bv-feedbackicons-validating="fa fa-refresh"
                                    enctype="multipart/form-data"
                                    >
                                    {{csrf_field()}}
                                    {{method_field('PUT')}}
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
                                        <label class="col-lg-3 control-label">العنوان بالعربيه</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="arAddress"
                                                data-bv-message="The service is not valid"
                                                required data-bv-notempty-message="The service is required and cannot be empty"
                                                value="{{ $arAddress}} "

                                                    />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="col-lg-3 control-label">الوصف الاساسي بالعربيه</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="arDescription"
                                                    data-bv-message="The username is not valid"
                                                    required data-bv-notempty-message="The username is required and cannot be empty"
                                                    value="{{$arDescription}}"
                                                        />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-lg-3 control-label"> الموبيل</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="phone"
                                                    data-bv-message="The username is not valid"
                                                    required data-bv-notempty-message="The username is required and cannot be empty"
                                                    value="{{$phone}}"
                                                        />
                                            </div>
                                    </div>


                                    <div class="form-group">
                                    <label class="col-lg-3 control-label">  الايميل الاساسي</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" name="mainEmail"
                                            data-bv-message="The username is not valid"
                                            required data-bv-notempty-message="The username is required and cannot be empty"
                                            value="{{$mainEmail}}"
                                                />
                                    </div>
                                    </div>
                                   
                                    <div class="form-group">
                                            <label class="col-lg-3 control-label">facebook account</label>
                                            <div class="col-lg-6">
                                                <input type="url" class="form-control" name="facebook"
                                                    data-bv-message="The username is not valid"
                                                    required data-bv-notempty-message="The username is required and cannot be empty"
                                                    value="{{$facebook}}"
                                                        />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-lg-3 control-label"> twitter account</label>
                                            <div class="col-lg-6">
                                                <input type="url" class="form-control" name="twitter"
                                                    data-bv-message="The username is not valid"
                                                    required data-bv-notempty-message="The username is required and cannot be empty"
                                                    value="{{$twitter}}"
                                                        />
                                            </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-lg-3 control-label"> youtube link</label>
                                            <div class="col-lg-6">
                                                <input type="url" class="form-control" name="video"
                                                    data-bv-message="The username is not valid"
                                                    required data-bv-notempty-message="The username is required and cannot be empty"
                                                    value="{{$video}}"
                                                        />
                                            </div>
                                    </div>
                                    <label class="col-lg-3 control-label">الوصف بالنقاط</label><br>
                                    <div class="panel-heading">
                                       
                                        <ul class="panel-control">
                                            <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                            <li><a class="refresh" href="javascript:void(0)"><i class="fa fa-refresh"></i></a></li>
                                            <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                                        </ul>
                                    </div>
                                    
                                    <div class="panel-body no-padding" >
                                        <textarea class="summernote" name="descriptionPoint" id="demo" >
                                            {{$descriptionPoint}}
                                        </textarea>
                                    </div><br>
                                    <div class="form-group">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            <button type="submit" class="btn btn-primary" onclick="myFunction()">تحديث</button>
                                        </div>
                                    </div>
                             </form>
                        </div>
                    </div>
                </div>
            <!-- Main Content Element  Start-->
            </div>
        </div>
    </section>
     <!--Page main section start-->
    
<!--Right hidden  section end -->
    <div id="change-color">
        <div id="change-color-control">
            <a href="javascript:void(0)"><i class="fa fa-magic"></i></a>
        </div>
        <div class="change-color-box">
            <ul>
                <li class="default active"></li>
                <li class="red-color"></li>
                <li class="blue-color"></li>
                <li class="light-green-color"></li>
                <li class="black-color"></li>
                <li class="deep-blue-color"></li>
            </ul>
        </div>
    </div>
</section>


    <!--Layout Script start -->
    <script type="text/javascript" src="{{asset('resources/assets/admin/js/color.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/admin/js/lib/jquery-1.11.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/admin/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('resources/assets/admin/js/multipleAccordion.js')}}"></script>

    <!--easing Library Script Start -->
    <script src="{{asset('resources/assets/admin/js/lib/jquery.easing.js')}}"></script>
    <!--easing Library Script End -->

    <!--Nano Scroll Script Start -->
    <script src="{{asset('resources/assets/admin/js/jquery.nanoscroller.min.js')}}"></script>
    <!--Nano Scroll Script End -->

    <!--switchery Script Start -->
    <script src="{{asset('resources/assets/admin/js/switchery.min.js')}}"></script>
    <!--switchery Script End -->

    <!--bootstrap switch Button Script Start-->
    <script src="{{asset('resources/assets/admin/js/bootstrap-switch.js')}}"></script>
    <!--bootstrap switch Button Script End-->

    <!--easypie Library Script Start -->
    <script src="{{asset('resources/assets/admin/js/jquery.easypiechart.min.js')}}"></script>
    <!--easypie Library Script Start -->

    <!--bootstrap-progressbar Library script Start-->
    <script src="{{asset('resources/assets/admin/js/bootstrap-progressbar.min.js')}}"></script>
    <!--bootstrap-progressbar Library script End-->

    <script type="text/javascript" src="{{asset('resources/assets/admin/js/pages/layout.js')}}"></script>
    <!--Layout Script End -->

    <!-- summernote Editor Script For Layout start-->
    <script src="{{asset('resources/assets/admin/js/summernote.min.js')}}"></script>
    <!-- summernote Editor Script For Layout End-->

    <!-- Demo Ck Editor Script For Layout Start-->
    <script src="{{asset('resources/assets/admin/js/pages/editor.js')}}"></script>
    <!-- Demo Ck Editor Script For Layout ENd-->
</body>
</html>
@extends('admin.panel')

@section('content')
<!--Navigation Top Bar End-->
<section id="main-container">

    <!--Left navigation section start-->
    @include('admin._masters.left-navigation')
    <!--Left navigation section end-->


    <!--Page main section start-->
    <section id="min-wrapper">
        <div id="main-content">
            <div class="container-fluid">

                <!-- Main Content Element  Start-->




                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">إضافه تصنيف زياره</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('admin/visit-categories')}}" method="post" class="form-horizontal ls_form"
                                    enctype="multipart/form-data">
                                    {{csrf_field()}}
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
                                        <label class="col-lg-3 control-label">اسم التصنيف</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name"
                                                data-bv-message="The username is not valid" required
                                                data-bv-notempty-message="The username is required and cannot be empty"
                                                value="{{ old('name')}}"  />
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="col-lg-9 col-lg-offset-3">
                                            <button type="submit" class="btn btn-primary"
                                                onclick="myFunction()">إضافه</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Main Content Element  End-->

            </div>
        </div>



    </section>
    <!--Page main section end -->
    <!--Right hidden  section start-->
    <section id="right-wrapper">
        <!--Right hidden  section close icon start-->
        <div class="close-right-wrapper">
            <a href="javascript:void(0)"><i class="fa fa-times"></i></a>
        </div>
        <!--Right hidden  section close icon end-->

        <!--Tab navigation start-->
        <ul class="nav nav-tabs" id="setting-tab">
            <li class="active"><a href="#chatTab" data-toggle="tab"><i class="fa fa-comment-o"></i> Chat</a></li>
            <li><a href="#settingTab" data-toggle="tab"><i class="fa fa-cogs"></i> Setting</a></li>
        </ul>
        <!--Tab navigation end -->

        <!--Tab content start-->

        <!--Tab content -->
    </section>
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
@endsection
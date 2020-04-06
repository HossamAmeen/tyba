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
                                <h3 class="panel-title">إضافه عيادة</h3>
                            </div>
                            <div class="panel-body">
                                <form action="{{url('admin/clinic')}}" method="post" class="form-horizontal ls_form"
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
                                        <label class="col-lg-3 control-label">اسم العياده</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" name="name"
                                                data-bv-message="The username is not valid" required
                                                data-bv-notempty-message="The username is required and cannot be empty"
                                                value="{{ old('name')}}" data-bv-stringlength="true"
                                                data-bv-stringlength-min="6" data-bv-stringlength-max="30"
                                                data-bv-stringlength-message="The username must be more than 6 and less than 30 characters long"
                                                data-bv-different="true" data-bv-different-field="password"
                                                data-bv-different-message="The username and password cannot be the same as each other" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label"> اسم الدكتور </label>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="doctor" type="text"
                                                data-bv-emailaddress-message="The input is not a valid email address"
                                                value="{{ old('doctor')}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">وظيفة لدكتور الحالية</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="postion" type="text"
                                                data-bv-emailaddress-message="The input is not a valid email address"
                                                value="{{ old('postion')}}" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">المواعيد</label>
                                        <div class="col-lg-6">
                                            <input class="form-control" name="appointments" type="text"
                                                data-bv-emailaddress-message="The input is not a valid email address"
                                                value="{{ old('appointments')}}" required />
                                        </div>
                                    </div>
                                    <label class="col-lg-3 control-label">الوصف بالنقاط</label><br><br>
                                    <div class="panel-body no-padding">
                                        <textarea class="summernote" name="descriptionPoint" required>
                                                {{ old('descriptionPoint')}}
                                            </textarea>
                                    </div><br>
                                    <div class="row ls_divider last">
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">إضافة صورة</label>

                                            <div class="col-md-10 ls-group-input">
                                                <input id="file-3" type="file" multiple="true" name="img">
                                            </div>

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
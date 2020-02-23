@extends('admin.panel')

@section('content')


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تعديل الخدمه</h3>
                    </div>
                    <div class="panel-body">
                        <form id="defaultForm" method="post" class="form-horizontal ls_form"
                            action="{{url('admin/service/'.$id)}}" data-bv-message="This value is not valid"
                            data-bv-feedbackicons-valid="fa fa-check" data-bv-feedbackicons-invalid="fa fa-bug"
                            data-bv-feedbackicons-validating="fa fa-refresh" enctype="multipart/form-data">
                            {{method_field('PUT')}}
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
                                <label class="col-lg-3 control-label">الخدمة بالعربية</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="ar_title"
                                        data-bv-message="The service is not valid" required
                                        data-bv-notempty-message="The service is required and cannot be empty"
                                        value="{{ $ar_title}}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">صورة الايقونه</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="icon"
                                        data-bv-message="The username is not valid" required
                                        data-bv-notempty-message="The username is required and cannot be empty"
                                        value="{{ $icon}}" />
                                </div>
                            </div>


                            <p style="margin-right: 15%">ملحوظه :
                                للمزيد زور هذا الموقع
                                <a href="https://fontawesome.com/icons?d=gallery">المزيد من الايقونات </a>
                            </p>

                            <div class="row ls_divider last">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" >إضافة صورة</label>

                                    <div class="col-md-10 ls-group-input">
                                        <input id="file-3" type="file"  name="image">

                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">الصورة</label>

                                <div class="goal-user-image">
                                    <img class="rounded" src="{{asset($image)}}" alt="user image" height="15%" width="15%" />
                                </div>
                            </div>


                            <div class="row ls_divider last">
                                <div class="form-group">
                                    <label class="col-md-2 control-label" > 2إضافة صورة</label>

                                    <div class="col-md-10 ls-group-input">
                                        <input id="file-3" type="file"  name="image2">

                                    </div>


                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">الصورة</label>

                                <div class="goal-user-image">
                                    <img class="rounded" src="{{asset($image2)}}" alt="user image" height="15%" width="15%" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <button type="submit" class="btn btn-primary">تحديث</button>
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

<!--Page main section end -->

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
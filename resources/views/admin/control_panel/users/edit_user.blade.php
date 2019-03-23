@extends('admin.panel')

@section('content')

<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">تعديل المستخدم</h3>
                    </div>
                    <div class="panel-body">
                    <form id="defaultForm" method="post" class="form-horizontal ls_form" action="{{url('admin/user/'.$id)}}"
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
                                <label class="col-lg-3 control-label">اسم المستخدم</label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" name="name"
                                           data-bv-message="The username is not valid"
                                           required data-bv-notempty-message="The username is required and cannot be empty"
                                           
                                           data-bv-stringlength="true" data-bv-stringlength-min="6" data-bv-stringlength-max="30" data-bv-stringlength-message="The username must be more than 6 and less than 30 characters long"
                                           data-bv-different="true" data-bv-different-field="password" data-bv-different-message="The username and password cannot be the same as each other"
                                value="{{$name}}"
                                            />
                                </div>
                            </div>
        
                            <div class="form-group">
                                <label class="col-lg-3 control-label">البريد الإكتروني</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="email" type="email"
                                     data-bv-emailaddress-message="The input is not a valid email address" 
                                value="{{$email}}"/>
                                </div>
                            </div>
        
                            <div class="form-group">
                                    <label class="col-lg-3 control-label">كلمة السر</label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" name="password"
                                            value="{{ $password}}"
                                            required data-bv-notempty-message="The password is required and cannot be empty"
                                            data-bv-identical="true" data-bv-identical-field="confirmPassword" data-bv-identical-message="The password and its confirm are not the same"
                                            data-bv-different="true" data-bv-different-field="username" data-bv-different-message="The password cannot be the same as username"/>
                                    </div>
                                </div>
            
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">إعاده كلمة السر</label>
                                    <div class="col-lg-6">
                                        <input type="password" class="form-control" name="password_confirmation"
                                        value="{{ $password}}"
                                            required data-bv-notempty-message="The confirm password is required and cannot be empty"
                                            data-bv-identical="true" data-bv-identical-field="password" data-bv-identical-message="The password and its confirm are not the same"
                                            data-bv-different="true" data-bv-different-field="username" data-bv-different-message="The password cannot be the same as username"/>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">الرتبه</label>
                                <div class="col-lg-5">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="role" value="1" 
                                            @if($role == 1) 
                                                 checked
                                            @endif
                                            /> admin
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" name="role" value="0" 
                                            @if($role == 0) 
                                                 checked
                                            @endif
                                            /> manager                                       
                                         </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row ls_divider last">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" >إضافة صورة</label>

                                        <div class="col-md-10 ls-group-input">
                                            <input id="file-3" type="file"  name="img">
                                           
                                        </div>
                                      
                                        
                                    </div>
                            </div>
                            <div class="form-group">
                                    <label class="col-lg-3 control-label">الصورة</label>
                                    
                                    <div class="goal-user-image">
                                    <img class="rounded" src="{{asset($img)}}" alt="user image" height="15%" width="15%" />
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
@extends('admin.panel')

@section('content')
        <!--Page main section start-->
        <section id="min-wrapper">
            <div id="main-content">
                <div class="container-fluid">
                   
                    <!-- Main Content Element  Start-->
                    @if (session()->get('status') )
                    <div class="alert alert-success">
                        <strong>{{session()->get('status')}}</strong>
                    </div>
                @endif
                @if (session()->get('delete') )
                <div class="alert alert-success">
                    <strong>{{session()->get('delete')}}</strong>
                </div>
                @endif


                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="panel-title">المستخدمين</span>
                                    <a href="{{url('admin/user/create')}}">  <button class="alert-success"> <i class="fa fa-plus"></i> </button> </a>
                          
                                </div>
                                <div class="panel-body">
                                <!--Table Wrapper Start-->
                                    <div class="ls-editable-table table-responsive ls-table">
                                        <table class="table table-bordered table-striped table-bottomless" id="ls-editable-table">
                                            <thead>
                                                <th>#</th>
                                                <th>الاسم</th>
                                                <th>الايميل</th>
                                                <th>صلاحيه</th>
                                                <th>الاخيارات</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                ?>
                                                @foreach ($users as $user)
                                                
                                               
                                                    <tr>
                                                        <td>{{$i++}}</td>
                                                        <td>
                                                            <a href="{{url('/admin/user/'.$user->id.'/edit')}}"
                                                                
                                                                aria-pressed="true">{{$user->name}} </a>
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            @if ($user->role == 1 )
                                                                مدير
                                                            @elseif($user->role == 0)
                                                                موظف
                                                            @elseif($user->role == -1)
                                                            مسؤول حجوزات
                                                            @endif
                                                        </td>
                                                        <td >
                                                                <a href="{{url('/admin/user/'.$user->id.'/edit')}}" class="btn btn-info">تحديث</a>
                                                                <a href="{{url('/admin/user/'.$user->id.'/delete')}}" class="btn btn-danger check">حذف</a>
                                                            
                                                        </td>
                                                    </tr>
                                               @endforeach
                                            </tbody>
                                     
                                        </table>
                                        
                                    </div>
                                    <br>     <br>
                                    <span> ملحوظة </span>
                                <br>
                                <span>المسئول : يستطيع إضافه مسؤولين ومدرين آخرين </span>
                                <br>
                                <span>المدير: يستطيع فقط تعديل الموقع</span>
                                <!--Table Wrapper Finish-->
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
            <div class="tab-content">
                <div class="tab-pane active" id="chatTab">
                    <div class="nano">
                        <div class="nano-content">
                            <div class="chat-group chat-group-fav">
                                <h3 class="ls-header">Favorites</h3>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-online"></span>
                                    Catherine J. Watkins
                                    <span class="badge badge-lightBlue">1</span>
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-idle"></span>
                                    Fernando G. Olson
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-busy"></span>
                                    Susan J. Best
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-offline"></span>
                                    Brandon S. Young
                                </a>
                            </div>
                            <div class="chat-group chat-group-coll">
                                <h3 class="ls-header">Colleagues</h3>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-offline"></span>
                                    Brandon S. Young
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-idle"></span>
                                    Fernando G. Olson
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-online"></span>
                                    Catherine J. Watkins
                                    <span class="badge badge-lightBlue">3</span>
                                </a>

                                <a href="javascript:void(0)">
                                    <span class="user-status is-busy"></span>
                                    Susan J. Best
                                </a>

                            </div>
                            <div class="chat-group chat-group-social">
                                <h3 class="ls-header">Social</h3>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-online"></span>
                                    Catherine J. Watkins
                                    <span class="badge badge-lightBlue">5</span>
                                </a>
                                <a href="javascript:void(0)">
                                    <span class="user-status is-busy"></span>
                                    Susan J. Best
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="chat-box">
                        <div class="chat-box-header">
                            <h5>
                                <span class="user-status is-online"></span>
                                Catherine J. Watkins
                            </h5>
                        </div>

                        <div class="chat-box-content">
                            <div class="nano nano-chat">
                                <div class="nano-content">

                                    <ul>
                                        <li>
                                            <span class="user">Catherine</span>
                                            <p>Are you here?</p>
                                            <span class="time">10:10</span>
                                        </li>
                                        <li>
                                            <span class="user">Catherine</span>
                                            <p>Whohoo!</p>
                                            <span class="time">10:12</span>
                                        </li>
                                        <li>
                                            <span class="user">Catherine</span>
                                            <p>This message is pre-queued.</p>
                                            <span class="time">10:15</span>
                                        </li>
                                        <li>
                                            <span class="user">Catherine</span>
                                            <p>Do you like it?</p>
                                            <span class="time">10:20</span>
                                        </li>
                                        <li>
                                            <span class="user">Catherine</span>
                                            <p>This message is pre-queued.</p>
                                            <span class="time">11:00</span>
                                        </li>
                                        <li>
                                            <span class="user">Catherine</span>
                                            <p>Hi, you there ?</p>
                                            <span class="time">12:00</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="chat-write">
                        <textarea class="form-control autogrow" placeholder="Type your message"></textarea>
                    </div>
                </div>

                <div class="tab-pane" id="settingTab">

                    <div class="setting-box">
                        <h3 class="ls-header">Account Setting</h3>
                        <div class="setting-box-content">
                            <ul>
                                <li><span class="pull-left">Online status: </span><input type="checkbox" class="js-switch-red" checked/></li>
                                <li><span class="pull-left">Show offline contact: </span><input type="checkbox" class="js-switch-light-blue" checked/></li>
                                <li><span class="pull-left">Invisible mode: </span><input class="js-switch" type="checkbox" checked></li>
                                <li><span class="pull-left">Log all message:</span><input class="js-switch-light-green" type="checkbox" checked></li>
                            </ul>
                        </div>
                    </div>
                    <div class="setting-box">
                        <h3 class="ls-header">Maintenance</h3>
                        <div class="setting-box-content">
                            <div class="easy-pai-box">
                                <span class="easyPieChart" data-percent="90">
                                    <span class="easyPiePercent"></span>
                                </span>
                            </div>
                            <div class="easy-pai-box">
                                <button class="btn btn-xs ls-red-btn js_update">Update Data</button>
                            </div>
                        </div>
                    </div>

                    <div class="setting-box">
                        <h3 class="ls-header">Progress</h3>
                        <div class="setting-box-content">

                            <h5>File uploading</h5>
                            <div class="progress">
                                <div class="progress-bar ls-light-blue-progress six-sec-ease-in-out"
                                     aria-valuetransitiongoal="10"></div>
                            </div>

                            <h5>Plugin setup</h5>
                            <div class="progress progress-striped active">
                                <div class="progress-bar six-sec-ease-in-out ls-light-green-progress"
                                     aria-valuetransitiongoal="20"></div>
                            </div>
                            <h5>Post New Article</h5>
                            <div class="progress progress-striped active">
                                <div class="progress-bar ls-yellow-progress six-sec-ease-in-out"
                                     aria-valuetransitiongoal="80"></div>
                            </div>
                            <h5>Create New User</h5>
                            <div class="progress progress-striped active">
                                <div class="progress-bar ls-red-progress six-sec-ease-in-out"
                                     aria-valuetransitiongoal="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
   

@section('footer')
    <!--jqueryui for table start-->
 <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
 <!--jqueryui for table end-->
    <!--Drag & Drop & Sort  table start-->
    <script src="{{asset('resources/assets/admin/js/tsort.js')}}"></script>
    <script src="{{asset('resources/assets/admin/js/jquery.tablednd.js')}}"></script>
    <script src="{{asset('resources/assets/admin/js/jquery.dragtable.js')}}"></script>
    <!--Drag & Drop & Sort table end-->

    <!--Editable-table Start-->
    <script src="{{asset('resources/assets/admin/js/editable-table/jquery.dataTables.js')}}"></script>
    <script src="{{asset('resources/assets/admin/js/editable-table/jquery.validate.js')}}"></script>
    <script src="{{asset('resources/assets/admin/js/editable-table/jquery.jeditable.js')}}"></script>
    <script src="{{asset('resources/assets/admin/js/editable-table/jquery.dataTables.editable.js')}}"></script>
    <!--Editable-table Finish -->



    <!--Demo table script start-->
    <script src="{{asset('resources/assets/admin/js/pages/table.js')}}"></script>
    <!--Demo table script end-->
@endsection

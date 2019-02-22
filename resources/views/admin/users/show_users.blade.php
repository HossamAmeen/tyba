@extends('admin.control-panel')

@section('content')
<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">المستخدمين</h3>
                    </div>
                    
                    @if (session()->get('status') )
                        <div class="alert alert-success">
                            <strong>{{session()->get('status')}}</strong>
                        </div>
                    @endif
                    @if (session()->get('delete') )
                        <div class="alert alert-danger">
                            <strong>{{session()->get('delete')}}</strong>
                        </div>
                    @endif
                    <div class="panel-body">
                        <div class="table-responsive ls-table">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الايميل</th>
                                    <th>رتبه</th>
                                    <th>action</th>
                                   
                                </tr>
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
                                    <td>{{$user->role}}</td>
                                    <td >
                                            <a href="{{url('/admin/user/'.$user->id.'/edit')}}" class="btn btn-info">تحديث</a>
                                            <a href="{{url('/admin/user/delete/'.$user->id)}}" class="btn btn-danger check">حذف</a>
                                            {{-- <form action="{{ url('admin/user/'.$user->id ) }}" method="POST">
                                              {{ csrf_field() }}
                                              {{method_field('DELETE')}}
                                                
                                          <button type="submit" class="btn btn-danger check">حذف</button>
                                            </form> --}}
                                            
                                            
                                    </td>
                                </tr>
                                   @endforeach
                                </tbody>
                            </table>
                        </div>
        
        
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
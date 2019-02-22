<section id="left-navigation">
    <!--Left navigation user details start-->
    <div class="user-image">
        <img src="{{asset('admin/images/demo/avatar-80.png')}}" alt=""/>
        <div class="user-online-status"><span class="user-status is-online  "></span> </div>
    </div>
    
    <!--Left navigation user details end-->
    <!--Left navigation start-->
    <ul class="mainNav">
        <li>
            <a href="{{url('admin/pref')}}">
                <i class="fa fa-dashboard"></i> <span>pref</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fa fa-table"></i> <span>users</span>
            </a>
            <ul>
                    <li><a href="{{url('admin/user/create')}}">add user</a></li>
                    <li><a href="{{url('admin/user')}}">show users</a></li>
            </ul>
            
        </li>
    
   
   
    </ul>
    <!--Left navigation end-->
</section>
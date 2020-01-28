<section id="left-navigation">
    <!--Left navigation user details start-->

    <!--Phone Navigation Menu icon start-->

    <!--Left navigation start-->
    <ul class="mainNav">
        <li >
            <a @if($title == 'اضافه بيانات الموقع' || $title == 'تعديل بيانات الموقع') class="active" @endif href="{{url('admin/prefs')}}">
                <i class="fa fa-bullhorn"></i> <span>بيانات الموقع</span>
            </a>
        </li>
        <li >
            <a  href="#" @if($title == 'اضافه مستخدم' || $title == 'عرض المستخدمين') class="active"  @endif>
                <i class="fa fa-bar-chart-o"></i> <span>المستخدمين</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه مستخدم') class="active"  @endif href="{{url('admin/user/create')}}">اضافه مستخدم</a>
                </li>
                <li>
                    <a @if($title == 'عرض المستخدمين') class="active"  @endif  href="{{url('admin/user')}}">عرض المستخدمين</a>
                </li>

            </ul>
        </li>

        <li >
            <a  href="#" @if($title == 'اضافه خدمه' || $title == 'عرض الخدمات') class="active"  @endif >
                <i class="fa fa-bar-chart-o"></i> <span>الخدمات</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه خدمه') class="active"  @endif href="{{url('admin/service/create')}}">اضافه خدمه</a>
                </li>
                <li>
                    <a @if($title == 'عرض الخدمات') class="active"  @endif  href="{{url('admin/service')}}">عرض الخدمات</a>
                </li>

            </ul>
        </li>
        <li >
            <a  href="#" @if($title == 'اضافه طبيب' || $title == 'عرض الأطباء') class="active"  @endif >
                <i class="fa fa-bar-chart-o"></i> <span>الأطباء</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه طبيب') class="active"  @endif href="{{url('admin/doctor/create')}}">اضافه طبيب</a>
                </li>
                <li>
                    <a @if($title == 'عرض الأطباء') class="active"  @endif  href="{{url('admin/doctor')}}">عرض الأطباء</a>
                </li>

            </ul>
        </li>
        <li >
            <a  href="#" @if($title == 'اضافه خبر' || $title == 'عرض الأخبار') class="active"  @endif >
                <i class="fa fa-bar-chart-o"></i> <span>الأخبار</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه خبر') class="active"  @endif href="{{url('admin/news/create')}}">اضافه خبر</a>
                </li>
                <li>
                    <a @if($title == 'عرض الأخبار') class="active"  @endif  href="{{url('admin/news')}}">عرض الأخبار</a>
                </li>

            </ul>
        </li>
        <li >
            <a  href="#" @if($title == 'اضافه فديو' || $title == 'عرض الفديوهات') class="active"  @endif >
                <i class="fa fa-bar-chart-o"></i> <span>الفديوهات</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه فديو') class="active"  @endif href="{{url('admin/video/create')}}">اضافه فديو</a>
                </li>
                <li>
                    <a @if($title == 'عرض الفديوهات') class="active"  @endif  href="{{url('admin/video')}}">عرض الفديوهات</a>
                </li>

            </ul>
        </li>
        <li >
            <a  href="#" @if($title == 'اضافه عياده' || $title == 'عرض العيادات') class="active"  @endif >
                <i class="fa fa-bar-chart-o"></i> <span>العيادات</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه عياده') class="active"  @endif href="{{url('admin/clinic/create')}}">اضافه عياده</a>
                </li>
                <li>
                    <a @if($title == 'عرض العيادات') class="active"  @endif  href="{{url('admin/clinic')}}">عرض العيادات</a>
                </li>

            </ul>
        </li>
        <li >
            <a  href="#" @if($title == 'اضافه زياره' || $title == 'عرض الزيارات') class="active"  @endif >
                <i class="fa fa-bar-chart-o"></i> <span>الزيارات</span>
            </a>
            <ul>
                <li>
                    <a  @if($title == 'اضافه زياره') class="active"  @endif href="{{url('admin/event/create')}}">اضافه زياره</a>
                </li>
                <li>
                    <a @if($title == 'عرض الزيارات') class="active"  @endif  href="{{url('admin/event')}}">عرض الزيراتا</a>
                </li>

            </ul>
        </li>
        <li >
            <a  href="{{url('admin/logout')}}">
                <i class="fa fa-power-off"></i> <span>تسجيل خروج</span>
            </a>

        </li>


    </ul>
    <!--Left navigation end-->
</section>
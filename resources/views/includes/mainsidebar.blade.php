  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{asset('assets/img/logo.png')}}" alt="" class="" style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" width="160" height="160" onerror="this.src='{{asset('assets/img/user.png')}}'" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>

        <a href="{{route('logout')}}" class="text-center mr-auto"><i class=" nav-icon fa fa-arrow-left" style="vertical-align:bottom"></i></a>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2 pb-5">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
                <a href="{{route('home')}}" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p>الرئيسية</p>
                </a>
                </li>

            <li class="nav-header">البلوكات</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-square"></i>
                <p>
                البلوكات
                <i class="right fas fa-angle-left"></i>
                </p>
                </a>

                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('blocks.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة بلوك جديد</p>
                        </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('blocks.producity')}}" class="nav-link">
                              <i class="fa fa-circle nav-icon"></i>
                              <p>انتاجية البلوكات</p>
                            </a>
                            </li>

                    <li class="nav-item">
                <a href="{{route('blocks.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>جميع البلوكات</p>
                </a>
                </li>

                <li class="nav-item">
                <a href="{{route('blocks.current')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>البلوكات الموجودة</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('blocks.cut')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>بلوكات تم نشرها</p>
                        </a>
                    </li>
                </ul>



            </li>


            <li class="nav-header">الخامات</li>

                <li class="nav-item">
                <a href="{{route('materials.all')}}" class="nav-link">
                  <i class="fa fa-square nav-icon"></i>
                  <p>الخامات</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('materials.create')}}" class="nav-link">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>اضافة خامة جديدة</p>
                    </a>
                    </li>

                <li class="nav-header">الطاولات</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-square"></i>
                <p>
                الطاولات
                <i class="right fas fa-angle-left"></i>
                </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('strips.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة طاولات جديدة</p>
                        </a>
                        </li>
                <li class="nav-item">
                <a href="{{route('strips.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>جميع الطاولات</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{route('strips.current')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>الطاولات الموجودة</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('strips.cut')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>طاولات تم تقطيعها</p>
                        </a>
                    </li>
                </ul>

            </li>

            <li class="nav-header">الترابيع</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-square"></i>
                <p>
                الترابيع
                <i class="right fas fa-angle-left"></i>
                </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pieces.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة ترابيع جديدة</p>
                        </a>
                        </li>
                <li class="nav-item">
                <a href="{{route('pieces.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>جميع الترابيع</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{route('pieces.sizes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>المقاسات </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('pieces.shipped')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>ترابيع تم شحنها</p>
                        </a>
                    </li>
                </ul>

            </li>



            @can('create' , \App\Models\PieceStore::class)
            <li class="nav-header">المخزن</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-square"></i>
                <p>
                    المخزن
                <i class="right fas fa-angle-left"></i>
                </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('pieces-store.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة ترابيع جديدة</p>
                        </a>
                        </li>
                <li class="nav-item">
                <a href="{{route('pieces-store.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>جميع الترابيع</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{route('pieces-store.sizes')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>المقاسات </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('pieces-store.shipped')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>ترابيع تم شحنها</p>
                        </a>
                    </li>
                </ul>

            </li>
            @endcan

            <li class="nav-header">الاوردرات</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="nav-icon fa fa-square"></i>
                <p>
                الاوردرات
                <i class="right fas fa-angle-left"></i>
                </p>
                </a>

                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('orders.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة اوردر جديد</p>
                        </a>
                        </li>
                <li class="nav-item">
                <a href="{{route('orders.all')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>جميع الاوردرات</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="{{route('orders.current')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>اوردرات حالية</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('orders.done')}}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>اوردرات منتهية</p>
                        </a>
                    </li>

                </ul>

            </li>


            <li class="nav-header">الماكينات</li>
            <li class="nav-item">
                <a href="{{route('machines.all')}}" class="nav-link">
                  <i class="fa fa-square nav-icon"></i>
                  <p>الماكينات</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('machines.create')}}" class="nav-link">
                      <i class="fa fa-plus nav-icon"></i>
                      <p>اضافة ماكينة جديدة</p>
                    </a>
                    </li>

                    <li class="nav-header">الموظفين</li>
                    <li class="nav-item">
                        <a href="{{route('employees.all')}}" class="nav-link">
                          <i class="fa fa-square nav-icon"></i>
                          <p>كل الموظفين</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employees.attendance')}}" class="nav-link">
                          <i class="fa fa-square nav-icon"></i>
                          <p>حضور الموظفين</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employees.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة موظف جديد</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employees.lines.all')}}" class="nav-link">
                          <i class="fa fa-square nav-icon"></i>
                          <p>الخطوط</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('employees.lines.create')}}" class="nav-link">
                          <i class="fa fa-plus nav-icon"></i>
                          <p>اضافة خط جديد</p>
                        </a>
                    </li>


                    <li class="nav-header">المستخدمين</li>
                    <li class="nav-item">
                        <a href="{{route('users.all')}}" class="nav-link">
                          <i class="fa fa-users nav-icon"></i>
                          <p>المستخدمين</p>
                            </a>
                        </li>

                        @can('create' , \App\Models\User::class)
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link">
                              <i class="fa fa-plus nav-icon"></i>
                              <p>اضافة مستخدم جديد</p>
                            </a>
                            </li>
                        @endcan

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

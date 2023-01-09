<style>
   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active{
    background-color: rgb(110, 110, 110) !important;
    color: #fff;
   }
   [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover{
    /* color: rgb(214, 203, 203) ; */
    color: #d4d8da;
   }
   /* .navPan{
    padding-left: 28px !important;
   } */
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-info elevation-4" >
    <!-- Brand Logo -->
    <a href="#!" class="brand-link">
        <img src="" alt="" class="brand-image img-circle elevation-4" style="opacity: .8">
        <span class="brand-text font-weight-light">Wedding SYSTEM</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="{{asset('admin/img/anon.jpg')}}" class="img-circle elevation-2 " alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
              <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
                </button>
              </div>
            </div>
          </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item ">
                    <a href="{{url('dashboard')}}" class="nav-link {{ Request::is('dashboard') ? 'active':'' }}">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <p style="padding-left: 20px">{{__('Dashboard')}}</p>
                    </a>
                </li>
                {{-- faculties  --}}
                <li class="nav-item {{ Request::is('guests*')|| Request::is('villages*')  ? 'menu-open active':'' }}">
                    <a href="#" class="nav-link {{ Request::is('guests*') || Request::is('villages*') ? 'active':'' }}">
                        <i class="fa fa-snowflake-o" aria-hidden="true"></i>
                        <p style="padding-left: 20px">
                            Wedding
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="#" class="nav-link  {{ Request::is('guests*')  ? 'active':''  }}">
                                <i class="fa fa-circle-o pl-3" aria-hidden="true"></i>
                                <p class="pl-3">Guests</p>
                            </a>
                        </li>
                    </ul>            
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{route('villages.index')}}" class="nav-link  {{ Request::is('villages*')  ? 'active':''  }}">
                                <i class="fa fa-circle-o pl-3" aria-hidden="true"></i>
                                <p class="pl-3">Village</p>
                            </a>
                        </li>
                    </ul>                
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

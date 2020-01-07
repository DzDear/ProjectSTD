<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
    <!--  <li class="header">MAIN NAVIGATION</li>-->

      <li class="treeview {{ (request()->is('maindata/view*')) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>ข้อมูลหลัก</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        @if(auth::user()->type == 1)
          <ul class="treeview-menu">
              <li>
                <a href="#"><i class="fa fa-circle-o"></i> Administator
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{ route('ViewMaindata') }}"><i class="fa fa-bookmark"></i> ข้อมูลผู้ใช้งานระบบ</a></li>
                </ul>
              </li>
          </ul>
        @endif
      </li>

      <li class="treeview {{ (request()->is('import/*')) ? 'active' : '' }}">
        <a href="#">
          <i class="fa fa-share-alt"></i> <span>นำเข้าข้อมูล</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li>
              <a href="{{ route('indexImport', 1) }}"><i class="fa fa-steam"></i> Import รายชื่อนักเรียน</a>
          </li>
          <li>
              <a href="{{ route('indexImport', 2) }}"><i class="fa fa-steam"></i> Import ข้อมูลเช็ค</a>
          </li>
        </ul>
      </li>

      <li class="treeview menu-open {{ (request()->is('student/view*')) ? 'active' : '' }}" style="height: auto;">
        <a href="#">
          <i class="fa fa-share"></i> <span>ระบบการจัดการ</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="treeview" style="height: auto;">
            <a href="#"><i class="fa fa-circle-o"></i> ระบบรายชื่อนักเรียน
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" style="display: none;">
              <li><a href="{{ route('ViewStudent',1) }}"><i class="fa fa-circle-o"></i> รายชื่อนักเรียน</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span>รายงาน</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ route('ViewStudent',11) }}"><i class="fa fa-book"></i>นักเรียนชั้นมัธยมที่ 1</a></li>
          <li><a href="{{ route('ViewStudent',21) }}"><i class="fa fa-book"></i>นักเรียนชั้นมัธยมที่ 2</a></li>
          <li><a href="{{ route('ViewStudent',31) }}"><i class="fa fa-book"></i>นักเรียนชั้นมัธยมที่ 3</a></li>
          <li><a href="{{ route('ViewStudent',41) }}"><i class="fa fa-book"></i>นักเรียนชั้นมัธยมที่ 4</a></li>
          <li><a href="{{ route('ViewStudent',51) }}"><i class="fa fa-book"></i>นักเรียนชั้นมัธยมที่ 5</a></li>
          <li><a href="{{ route('ViewStudent',61) }}"><i class="fa fa-book"></i>นักเรียนชั้นมัธยมที่ 6</a></li>
        </ul>
      </li>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

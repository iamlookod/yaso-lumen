<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">เมนูหลัก</li>
            <li class="{{ $data['menu'] == 'member' ? 'active' : '' }}">
                <a href="{{ route('member.index') }}"><i class="fa fa-users" aria-hidden="true"></i> <span>สมาชิก</span></a>
            </li>
          
            <li class="treeview {{ $data['menu'] == 'user' || $data['menu'] == 'config' ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-folder"></i> <span>ตั้งค่าพื้นฐานระบบ</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
                <ul class="treeview-menu">
                    <li class="{{ $data['menu'] == 'user' ? 'active' : '' }}"><a href="{{ route('user.index') }}"><i class="fa fa-user-secret"></i> ผู้ดูแลระบบ</a></li>
                    <li class="{{ $data['menu'] == 'config' ? 'active' : '' }}"><a href="{{ route('config.index') }}"><i class="fa fa-cog"></i> ค่าพื้นฐานระบบ</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
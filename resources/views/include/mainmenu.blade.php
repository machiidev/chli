      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
        
        @if (Auth::guest())
       
          @else
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{ URL::asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->name }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          
          @endif
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
          
          
          <ul class="sidebar-menu">
          	<li class="header">MAIN NAVIGATION</li>
          	<li class="treeview">
              <a href="/test">
                <i class="fa fa-dashboard"></i> <span>Start</span> 
                <span class="label label-danger pull-right">4</span>
              </a>
            </li>
          	@if (Auth::check())
            <li class="header">ADMIN NAVIGATION</li>
            <li class="treeview">
              <a href="/dashboard">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
                <span class="label label-danger pull-right">3</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>@lang('useradmin.authorization')</span>
                <span class="label label-primary pull-right">4</span>
              </a>
              <ul class="treeview-menu">
                <li><a href="/useradmin/users"><i class="fa fa-circle-o"></i> @lang('useradmin.users')</a></li>
                <li><a href="/useradmin/groups"><i class="fa fa-circle-o"></i> @lang('useradmin.groups')</a></li>
                <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> @lang('useradmin.roles')</a></li>
                <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> free</a></li>
              </ul>
            </li>
            <li>
              <a href="pages/widgets.html">
                <i class="fa fa-th"></i> <span>Widgets</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
			@endif
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


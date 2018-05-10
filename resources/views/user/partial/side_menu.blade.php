 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img style="width: 100px;height: 100px;" src="{{ Auth::user()->profile }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN FUNCTION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('news')}}"><i class="fa fa-circle-o"></i>News</a></li>
            <li><a href="{{route('home')}}"><i class="fa fa-circle-o"></i>Profile</a></li>
            <li><a href="{{route('notes')}}"><i class="fa fa-circle-o"></i>Notes</a></li>
            <li><a href="{{route('followers')}}"><i class="fa fa-circle-o"></i>Followers</a></li>
            <li><a href="{{route('following')}}"><i class="fa fa-circle-o"></i>Following</a></li>
             <li><a href="{{route('feedback')}}"><i class="fa fa-circle-o"></i>Feedback</a></li>
          </ul>
        </li>
       </ul>
     </section>
   </aside>

    <!-- /.sidebar -->
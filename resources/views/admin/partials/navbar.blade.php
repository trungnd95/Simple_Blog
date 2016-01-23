<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->

      <!-- Category -->
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>Category Manage</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.cate.index')}}">List category</a></li>
          <li><a href="{{route('admin.cate.add')}}">Add  new category</a></li>
        </ul>
      </li>

      <!-- User  -->
      @if(\Auth::check())
          
            <li class="treeview">
              <a href="#"><i class="fa fa-user"></i><span>Author Manage</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{route('admin.user.index')}}">List author</a></li>
                @if(\Auth::user()->role == 'admin')
                  <li><a href="{{route('admin.user.add')}}">Add  new author</a></li>
                @endif
              </ul>
            </li>
          
      @endif

      <!-- Articles -->
      <li class="treeview">
        <a href="#"><i class="fa fa-file-text"></i> <span>Articles Manage</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{route('admin.article.index')}}">List Articles</a></li>
          <li><a href="{{route('admin.article.add')}}">Add  new article</a></li>
        </ul>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
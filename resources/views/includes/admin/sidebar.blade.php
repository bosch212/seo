<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Dashboard</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
              <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul>
          </li>
          <li class="menu-header">Starter</li>
          <li class="nav-item dropdown active">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><span>Category</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('category-index') }}"><i class="fas fa-list"></i>List Category</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown active">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><span>Tags</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('tag.index') }}"><i class="fas fa-list"></i>List Tags</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown active">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><span>Posts</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('post.index') }}"><i class="fas fa-list"></i>List Posts</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>

        </ul>
    </aside>
</div>
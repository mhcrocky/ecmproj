<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
      <p class="app-sidebar__user-name">John Doe</p>
      <p class="app-sidebar__user-designation">Frontend Developer</p>
 </div>
</div>
<ul class="app-menu">
     <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : null }}" href="{{ route('admin.dashboard') }}">
               <i class="app-menu__icon fa fa-dashboard"></i>
               <span class="app-menu__label">Dashboard</span>
          </a>
     </li>
     <li>
          <a class="app-menu__item {{ Route::currentRouteName() == 'admin.settings' ? 'active' : '' }}" href="{{ route('admin.settings') }}">
               <i class="app-menu__icon fa fa-cogs"></i>
               <span class="app-menu__label">Settings</span>
          </a>
     </li>
     <li>
          <a class="app-manu__item {{ Route::currentRouteNmae() == 'admin.create.index' ? 'active' : null}}" href="{{ route('admin.categories.index' }}">
               <i class="app-manu__icon fa fa-tags"></i>
               <span class="app-manu__lable">Categories</span>
          </a>
     </li>
</ul>
</aside>
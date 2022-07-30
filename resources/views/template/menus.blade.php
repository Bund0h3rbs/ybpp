@php
    $users = Auth::user() ?? [];
@endphp

<div class="sidebar sidebar-style-2">
  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <div class="user">
        <div class="avatar-sm float-left mr-2">
          <img src="{{asset('assets/img/icon.png')}}" alt="..." class="avatar-img rounded-circle">
        </div>
        <div class="info">
          <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
            <span>
                {{isset($users->name) ? ucwords($users->name) : '-' }}
              <span class="user-level"> {{ $users->email  ?? '-' }}</span>
            </span>
          </a>
          <div class="clearfix"></div>
        </div>
      </div>
      <ul class="nav nav-primary ">
        <li class="nav-item">
          <a href="{{url('home')}}" class="collapsed" style="background:#DFDFDF">
            <i class="fas fa-home"></i>
            <p>Home</p>
          </a>
        </li>
        <li class="nav-section">
          <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
          </span>
          <h4 class="text-section ">System</h4>
        </li>
        {!! \App\Librari\Menusakses::instance()->getMenus() !!}

        <li class="nav-section b-0">
            <h4 class="text-section ">@copy -YBPP {{date('Y')}}</h4>
          </li>
      </ul>
    </div>
  </div>
</div>

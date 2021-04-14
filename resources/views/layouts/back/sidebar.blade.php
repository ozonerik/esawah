      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" name="menu-home" class="nav-link {{$sidemenu['menu-home'] ?? false}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <!-- pawongan menu -->
          <li class="nav-item has-treeview {{$sidemenu['menu-pawongan']?? false}}">
            <a href="#" name="menu-pawongan" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Pawongan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @canany(['isAdmin','isPro'])
              <li class="nav-item">
                <a href="{{route('pawongan',Crypt::encryptString(Auth::user()->id) )}}" name="menu-daftar-pawongan" class="nav-link {{$sidemenu['menu-daftar-pawongan']?? false}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daftar Pawongan</p>
                </a>
              </li>
            @endcanany
            </ul>
          </li>
          <!-- sawah menu -->
          <li class="nav-item has-treeview {{$sidemenu['menu-sawah']?? false}}">
            <a href="#" name="menu-sawah" class="nav-link">
              <i class="nav-icon fa fa-map"></i>
              <p>
                Sawah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('isAdmin')
              <li class="nav-item">
                <a href="#" name="menu-admin-user" class="nav-link {{$sidemenu['menu-admin-user']?? false}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu Admin User</p>
                </a>
              </li>
            @elsecan('isPro')
              <li class="nav-item">
                <a href="#" name="menu-pro-user" class="nav-link {{$sidemenu['menu-pro-user']?? false}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu Pro User</p>
                </a>
              </li>
            @elsecan('isFree')
              <li class="nav-item">
                <a href="#" name="menu-free-user" class="nav-link {{$sidemenu['menu-free-user']?? false}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu Free User</p>
                </a>
              </li>
            @endcan
            </ul>
          </li>
          <li class="nav-item has-treeview {{$sidemenu['menu-options']?? false}}">
            <a href="#" name="menu-options" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Options
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            @can('isAdmin')
              <li class="nav-item">
                <a href="{{route('userlist')}}" name="menu-userlist" class="nav-link {{$sidemenu['menu-userlist']?? false}}">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Users</p>
                </a>
              </li>
            @endcan
              <li class="nav-item">
                <a href="{{ route('myprofile',Crypt::encryptString(Auth::user()->id)) }}" name="menu-myprofile" class="nav-link {{$sidemenu['menu-myprofile']?? false}}">
                  <i class="nav-icon fas fa-user"></i>
                  <p>My Profile</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
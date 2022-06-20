 <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li style="margin-top:25px"></li>
                    <li>
                       <a href="/" target="_blank"> <i class="menu-icon fa fa-th"></i>Frontend</a>
                    </li>
                    <li class="{{  Request::is('dashboard') ? 'active' : ''  }}">
                        <a href="/dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    @if(auth()->user()->role == 1)
                        <li class="menu-item-has-children dropdown {{ Request::is('districts','districts/*','assemblys','assemblys/*') ? 'active' : ''  }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"> <i class="menu-icon fa fa-map-marker"></i>Locations</a>
                            <ul class="sub-menu children dropdown-menu">                            
                                <li><a href="{{ route('districts.index') }}">Districts</a></li>
                                <li><a href="{{ route('assemblys.index') }}">Assemblies</a></li>
                            </ul>
                        </li>
                        <li class="{{  Request::is('media', 'media/') ? 'active' : ''  }}">
                            <a href="{{ route('media.index') }}"><i class="menu-icon fa fa-video-camera"></i>Media</a>
                        </li>
                        <li class="{{  Request::is('slider', 'slider/') ? 'active' : ''  }}">
                            <a href="{{ route('slider.index') }}"><i class="menu-icon fa fa-picture-o"></i>Home sliders</a>
                        </li>
                        <li class="{{  Request::is('media/*') ? 'active' : ''  }}">
                            <a href="{{ route('leadership.index') }}"><i class="menu-icon fa fa-tasks"></i>Leadership</a>
                        </li>
                       
                    @endif
                        <li class="{{  Request::is('transactions') ? 'active' : ''  }}">
                            <a href="{{ route('transactions.index') }}"><i class="menu-icon fa fa-credit-card"></i>Transactions </a>
                        </li>
                        <li class="{{  Request::is('save_profile', 'update_profile') ? 'active' : ''  }}">
                            <a href="/update_profile"><i class="menu-icon fa fa-user"></i>Profile </a>
                        </li>
                    @if(auth()->user()->role == 1)
                        <li class="{{  Request::is('users') ? 'active' : ''  }}">
                            <a href="{{ route('users.index') }}"><i class="menu-icon fa fa-users"></i> Users</a>
                        </li>
                        <li class="{{  Request::is('setting', 'setting/*') ? 'active' : ''  }}">
                            <a href="{{ route('setting.edit') }}"><i class="menu-icon fa fa-cog"></i>Settings </a>
                        </li>
                    @endif
                        <li class="{{  Request::is('/logout') ? 'active' : ''  }}">
                            <a href="{{route('logout')}}" aria-haspopup="true" aria-expanded="false" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="menu-icon fa fa-sign-out"></i>
                                Logout
                            </a> 
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
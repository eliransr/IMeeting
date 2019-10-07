<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
        <span class="avatar avatar-sm rounded-circle">
            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
        </span>
            <p>{{ auth()->user()->name }}</p>
            



        </a>
       
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('meetings.index') }}">
                        <i class="ni ni-calendar-grid-58 text-primary"></i> {{ __('Meetings') }}
                    </a>
                </li>
                @cannot('employee')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mail.index') }}">
                    <i class="fas fa-envelope-square"></i></i> {{ __('Mail') }}
                    </a>
                </li>
                @endcannot
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('task') }}">
                    <i class="fas fa-tasks"></i> {{ __('Tasks & Topics') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('userPage') }}">
                        <i class="ni ni-circle-08 text-primary"></i> {{ __('Users List') }}
                    </a>
                </li>

                
                
                <li class="nav-item">
                    <a class="nav-link " href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-settings-gear-65" ></i>
                        <span class="nav-link-text" >{{ __('Settings') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('User Profile') }}
                                </a>
                            </li>
                            @can('admin') <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li> 
                            @endcan
                        </ul>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-key-25"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
                </li>
            </ul>
           
        </div>
    </div>
</nav>
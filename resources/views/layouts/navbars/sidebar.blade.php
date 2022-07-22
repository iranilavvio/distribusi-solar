<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('assets') }}/img/gab/gab.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
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
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
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
                    <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>
                <li class="nav-item">
                    @can('karyawan')
                        <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button"
                            aria-expanded="true" aria-controls="navbar-examples">
                            <i class="fas fa-table text-primary"></i>
                            <span class="nav-link-text">{{ __('Master Data') }}</span>
                        </a>
                        <div class="collapse show" id="navbar-examples">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('karyawan.index') }}">
                                        <i class="fas fa-user-tie text-primary"></i> {{ __('Karyawan') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customer.index') }}">
                                        <i class="fas fa-people-carry text-primary"></i> {{ __('Customer') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('truck.index') }}">
                                        <i class="fas fa-truck text-primary"></i> {{ __('Truck') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endcan
                </li>


            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">Data</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                @can('driver')
                    <li class="nav-item">
                        <a href="{{ route('driver.index') }}"
                            class="nav-link {{ request()->routeIs('driver.index') ? 'mm-active' : '' }}">
                            <i class="fas fa-truck-loading text-blue"></i> {{ __('Driver') }}
                        </a>
                    </li>
                @endcan

                @can('order')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('orderreal.index') }}">
                            <i class="fas fa-shopping-cart text-blue"></i> {{ __('Order & Real') }}
                        </a>
                    </li>
                @endcan
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('purchase.index') }}">
                        <i class="fas fa-mail-bulk text-orange"></i> {{ __('Purchase Order') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('suratjalan.index') }}">
                        <i class="fas fa-mail-bulk text-orange"></i> {{ __('Surat Jalan') }}
                    </a>
                </li>

                @can('distribusi')
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('distribusi.index') }}">
                            <i class="fas fa-store text-orange"></i> {{ __('Pendistribusian') }}
                        </a>
                    </li>
                @endcan

                @can('delivery')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('delivery.index') }}">
                            <i class="fas fa-truck-loading text-pink"></i> {{ __('Delivery') }}
                        </a>
                    </li>
                @endcan

                @can('control')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('control.index') }}">
                            <i class="fas fa-shopping-basket text-pink"></i> {{ __('Control Delivery') }}
                        </a>
                    </li>
                @endcan

                @can('tt')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tandaterima.index') }}">
                            <i class="fas fa-clipboard text-pink"></i> {{ __('Tanda Terima') }}
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</nav>

@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('content_top_nav_right')


    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="far fa-bell"></i>
        
            @if (count(auth()->user()->unreadNotifications))
                <span class="badge badge-warning navbar-badge">{{count(auth()->user()->unreadNotifications)}}</span>
            @endif
        
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <span class="dropdown-item dropdown-header">Notificaciones no leidas</span>
            @forelse (auth()->user()->unreadNotifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-calendar mr-2"></i> {{ $notification->data['title'] }}
                    <div class="text-right text-muted text-sm">{{ $notification->data['time']}}</div>
                </a>

                @empty
                    <div class="dropdown-divider"></div>
                    <div class="text-center text-muted text-sm">Sin notificaciones no leidas</div>
            @endforelse
            
            <div class="dropdown-divider"></div>
            <span class="dropdown-item dropdown-header">Notificaciones leidas</span>

            @forelse (auth()->user()->readNotifications as $notification)
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> {{ $notification->data['title']}}
                    <div class="text-right text-muted text-sm">{{ $notification->read_at->diffForHumans()}}</div>
                </a>

                @empty
                    <div class="dropdown-divider"></div>
                    <div class="text-center text-muted text-sm">Sin notificaciones leidas</div>
            @endforelse
           
            <div class="dropdown-divider"></div>
            <a href="{{ route('admin.notifications.markAsRead') }}" class="dropdown-item dropdown-footer">Marcar como leidas</a>
        </div>
    </li>

@endsection

@section('body')
    <div class="wrapper">

        {{-- Preloader Animation --}}
        @if($layoutHelper->isPreloaderEnabled())
            @include('adminlte::partials.common.preloader')
        @endif

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        @empty($iFrameEnabled)
            @include('adminlte::partials.cwrapper.cwrapper-default')
        @else
            @include('adminlte::partials.cwrapper.cwrapper-iframe')
        @endempty

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop

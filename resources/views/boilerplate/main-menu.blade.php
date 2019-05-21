@php
    $routeArray = app('request')->route()->getAction();
    $controllerAction = class_basename($routeArray['controller']);
    list($controller, $action) = explode('@', $controllerAction);
@endphp

@php
    $class = '';

    if ($controller == 'HomeController') {
        $class = 'active';
    }
@endphp

<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ $class }}">
        <i class="nav-icon fa fa-home"></i>
        <p>Home</p>
    </a>
</li>

@php
    $class = '';

    if ($controller == 'PedidosController') {
        $class = 'active';
    }
@endphp

<li class="nav-item">
    <a href="{{ route('pedidos.index') }}" class="nav-link {{ $class }}">
        <i class="nav-icon fa fa-tasks"></i>
        <p>Pedidos</p>
    </a>
</li>

@php
    $class = '';

    if ($controller == 'ClientesController') {
        $class = 'active';
    }
@endphp

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ $class }}">
        <i class="nav-icon fa fa-users"></i>
        <p>Clientes</p>
    </a>
</li>

@php
    $class = '';

    if (($controller == 'UsersController') || ($controller == 'BairrosController') || ($controller == 'MarmitexController') || ($controller == 'CardapiosController') || ($controller == 'CarnesController')) {
        $class = 'menu-open';
    }
@endphp

<li class="nav-item has-treeview {{ $class }}">
    <a href="#" class="nav-link">
        <i class="nav-icon fa fa-cog"></i>
        <p>Configurações <i class="fa fa-angle-left right"></i></p>
    </a>
    
    <ul class="nav nav-treeview">

        @php
            $class = '';

            if ($controller == 'BairrosController') {
                $class = 'active';
            }
        @endphp

        <li class="nav-item">
            <a href="{{ route('bairros.index') }}" class="nav-link {{ $class }}">
                <i class="nav-icon fa fa-road"></i>
                <p>Bairros</p>
            </a>
        </li>


        @php
            $class = '';

            if ($controller == 'CardapiosController') {
                $class = 'active';
            }
        @endphp

        <li class="nav-item">
            <a href="{{ route('cardapios.index') }}" class="nav-link {{ $class }}">
                <i class="nav-icon fa fa-utensils"></i>
                <p>Cardapios</p>
            </a>
        </li>

        @php
            $class = '';

            if ($controller == 'CarnesController') {
                $class = 'active';
            }
        @endphp

        <li class="nav-item">
            <a href="{{ route('carnes.index') }}" class="nav-link {{ $class }}">
                <i class="nav-icon fa fa-drumstick-bite"></i>
                <p>Carnes</p>
            </a>
        </li>

        @php
            $class = '';

            if ($controller == 'MarmitexController') {
                $class = 'active';
            }
        @endphp

        <li class="nav-item">
            <a href="{{ route('marmitas.index') }}" class="nav-link {{ $class }}">
                <i class="nav-icon fa fa-plus"></i>
                <p>Marmitex</p>
            </a>
        </li>

        @can('index', \App\User::class)    
            @php
                $class = '';
            
                if ($controller == 'UsersController' && $action <> 'profile') {
                    $class = 'active';
                }
            @endphp

            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link {{ $class }}">
                    <i class="fa fa-users nav-icon"></i>
                    <p>Usuários</p>
                </a>
            </li>
        @endcan

        @php
            $class = '';
        
            if ($controller == 'UsersController' && $action == 'profile') {
                $class = 'active';
            }
        @endphp

        <li class="nav-item">
            <a href="{{ route('users.profile') }}" class="nav-link {{ $class }}">
                <i class="fa fa-user nav-icon"></i>
                <p>Perfil</p>
            </a>
        </li>
    </ul>
</li>
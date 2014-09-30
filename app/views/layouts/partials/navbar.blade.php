<nav class="navbar navbar-inverse navbar-fixed-top sticky" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ChileAgrícola.org </a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Inicio</a></li>
                <li><a href="#">Productos</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Another action</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if ( ! Auth::guest())
                <li class="dropdown" id="user-options">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- <img src="//www.gravatar.com/avatar/8834e60b12f7a3a47454f81245d9376c" class="nav-gravatar" alt="cabrerabywaters"> -->

                        {{ Auth::check() ? Auth::user()->email : "Regístrate" }} <b class="caret"></b>
                    </a>

                    @if (! Auth::guest())

                    <ul class="dropdown-menu dropdown-with-icons">
                        <li>
                            <a href="/providers/{{ Auth::user()->provider_id }}/profile">
                                <i class="glyphicon glyphicon-user"></i> Perfil
                            </a>
                        </li>


                        <li>
                            <a href="/providers/{{ Auth::user()->provider_id }}/edit">
                                <i class="glyphicon glyphicon-cog"></i> Configuración
                            </a>
                        </li>

                        <li>
                            <a href="//laracasts.uservoice.com/">
                                <i class="glyphicon glyphicon-bullhorn"></i> Requests
                            </a>
                        </li>

                    </ul>
                </li>

                @endif
                @endif

                <!-- Search Bubble -->
                <li>
                    @if (Auth::guest())
                <li><a href="/login">Ingresa</a>
                <li><a href="/register">Regístrate</a>
                    @else
                <li><a href="/logout">Salir</a>
                    @endif
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
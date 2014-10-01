<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar centeredTitle">
        <li class="active"><a href="{{ URL::route('companies.banks.index',['companies' => Auth::user()->company_id ]) }}">Bancos</a></li>
        <li><a href="#">Bodegas</a></li>
        <li class="dropdown">
            <a id="drop5" role="button" data-toggle="dropdown" href="#">Centros de Costos <span
                    class="caret"></span></a>
            <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Centro de
                        Costos</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Familias</a></li>
            </ul>
        </li>
        <li><a href="#">Ciudades</a></li>
        <li class="dropdown">
            <a id="drop5" role="button" data-toggle="dropdown" href="#">Clientes <span
                    class="caret"></span></a>
            <ul id="menu2" class="dropdown-menu" role="menu" aria-labelledby="drop5">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Clientes</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Zonas</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Rutas</a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Sucursales</a>
                </li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="http://twitter.com/fat">Tipos</a></li>
            </ul>
        </li>

        <li><a href="#">Cobradores</a></li>
        <li><a href="#">Códigos de movimientos de Cheques</a></li>
        <li><a href="#">Cobradores</a></li>
        <li><a href="#">Códigos de movimientos de Cheques</a></li>
        <li><a href="#">Cobradores</a></li>
        <li><a href="#">Códigos de movimientos de Cheques</a></li>
        <li><a href="#">Cobradores</a></li>
        <li><a href="#">Códigos de movimientos de Cheques</a></li>
   </ul>

</div>
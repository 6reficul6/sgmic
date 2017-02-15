<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

        <!--{{ config('app.name', 'SGMIC') }} -->
        <title>SGMIC</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="/css/estilos.css">

        <!-- Thema -->
        <link type="text/css" rel="stylesheet" href="/css/sb-admin.css">

        <!-- DataTable -->
        <link type="text/css" rel="stylesheet" href="/datatable/css/dataTables.bootstrap.min.css">

        <!-- Scripts -->
        <script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="/js/geral.js"></script>
        <!--<script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
        </script>-->
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/home">SIS MICRO</a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">          
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li>
                            <a href="/home"><i class="fa fa-fw fa-dashboard"></i>
                                <span class="glyphicon glyphicon-home"></span> Home
                            </a>
                        </li>
                        <!-- Menu Clientes -->
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#Clientes"><i class="fa fa-fw fa-arrows-v"></i>
                                <span class="glyphicon glyphicon-user"></span> Clientes 
                                <i class="fa fa-fw fa-caret-down caret"></i>
                            </a>
                            <ul id="Clientes" class="collapse">
                                <li>
                                    <a href=""><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>
                                </li>
                                <li>
                                    <a href=""><span class="glyphicon glyphicon-list-alt"></span> Lista</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                        </li>
                        <li>
                            <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                        </li>
                        <li>
                            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                        </li>
                        <li>
                            <a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Bootstrap Grid</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down caret"></i></a>
                            <ul id="demo" class="collapse">
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                                <li>
                                    <a href="#">Dropdown Item</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Menu Categoria -->
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#Categoria"><i class="fa fa-fw fa-arrows-v"></i> Categoria <i class="fa fa-fw fa-caret-down caret"></i></a>
                            <ul id="Categoria" class="collapse">
                                <li>
                                    <a href="/categorias/new"><span class="glyphicon glyphicon-plus"></span> Inserir</a>
                                </li>
                                <li>
                                    <a href="/categorias/list"><span class="glyphicon glyphicon-list-alt"></span> Lista</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                        </li>
                        <li>
                            <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">

                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->


        <script type="text/javascript" src="/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="/datatable/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="/datatable/js/dataTables.bootstrap.min.js"></script>

        <script>
$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
        </script>
        <script type="text/javascript">
            $('#teste').dataTable({
                "language": {
                    "lengthMenu": "Exibir _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - desculpe",
                    "info": "Mostrando a página _PAGE_ de _PAGES_",
                    "infoEmpty": "Nenhum registro disponível",
                    "infoFiltered": "(Filtrada de _MAX_ registros totais)",
                    "search": "Buscar"
                }
            });
        </script>
    </body>
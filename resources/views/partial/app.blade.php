<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>P.E.B.Co BETHESDA</title>

    <!-- Favicons -->
    <link href="{{ asset('img/pebco.jpeg')}}" rel="icon" style="height:50px; width:50px;">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--
         bootstrap
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <!--external css-->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css')}}" rel="stylesheet">
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--  accordeon -->
    <link rel="stylesheet" href="{{ asset('css/accordeon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/formstep.css')}}">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!--Script presence -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

    <script src="{{ asset('js/presence.js')}}"></script>

    <!-- Importation de l'API AJAX Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    @if ($message = Session::get('success'))
    <div>
        <p>
            <script>
                swal("Bravo!", "{{ $message }}", "success");
            </script>
        </p>
    </div>
    @endif

    <!-- message d'erreur -->
    @if ($error = Session::get('error'))
    <div>
        <script>
            swal({
                title: "Echec",
                text: "{{$error}}",
                icon: "warning",
                // buttons: true,
                dangerMode: true,
            })
        </script>
    </div>
    @endif
</head>

<body>
    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo"><b>P.E.B.Co-<span>BETHESDA</span></b></a>
            <!--logo end-->

            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li>
                        <a class="logout" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i>
                            {{ __('Déconnexion') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </header>
        <!--header end-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <p class="centered"><a href="#">

                            <img src="{{ asset('img/pebco.jpeg')}}" class="img-circle" width="80"></a></p>

                    <h5 class="nom">{{Auth::user()->nom}} {{Auth::user()->prenom}}</h5>

                    <li class="mt {{(request()->is('/')) ? 'activ' : '' }}">
                        <a href="/">
                            <i class="fa fa-dashboard"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    @if ( Auth::user()->role == 1)
                    <li class="sub-menu {{(request()->is('direction/poste') || request()->is('direction/region')) ? 'activ' : '' }}">
                        <a href="javascript:;">
                            <i class="fa fa-bookmark"></i>
                            <span>Utilitaires</span>
                        </a>
                        <ul class="sub">
                            <!--  <li><a href="{{ route('poste.index')}}">Postes</a></li> -->
                            <li><a href="{{ route('region.index')}}"><i class="fa fa-tasks" aria-hidden="true"></i>Régions/Agences</a></li>
                            @if (Auth::user()->role == 1)
                            <li class="sub-menu {{ request()->is('direction/user') ||  request()->is('direction/user/create') ||  request()->is('direction/user/*')? 'activ': ''}}">
                                <a href="javascript:;">
                                    <i class="fa fa-users"></i>
                                    <span>Utilisateurs</span>
                                </a>
                                <ul class="sub">
                                    <li><a href="{{ route('user.create')}}">Enrégistrer un utilisateur</a></li>
                                    <li><a href="{{ route('user.index')}}">Liste des utilisateurs</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </li>
                    @endif

                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-line-chart" aria-hidden="true"></i>

                            <span>Suivi budgetaire</span>
                        </a>
                        <ul class="sub">
                            <li class="sub-menu {{ request()->is('direction/interet') ||  request()->is('direction/interet/create') ||  request()->is('direction/interet/*')? 'activ': ''}}">
                                <a href="javascript:;">
                                    <i class="fa fa-industry "></i>
                                    <span>Intérêt</span>
                                </a>
                                <ul class="sub">
                                    @if ( Auth::user()->role == 1 || Auth::user()->role == 3)
                                    <li><a href="{{ route('interet.create')}}">Enrégistrer la prevision </a></li>
                                    @endif
                                    <li><a href="{{ route('interet.index')}}">Liste des prévisions </a></li>
                                </ul>
                            </li>
                            <li class="sub-menu {{ request()->is('direction/fraisClient') ||  request()->is('direction/fraisClient/create') ||  request()->is('direction/fraisClient/*')? 'activ': ''}}">
                                <a href="javascript:;">
                                    <i class="fa fa-square"></i>
                                    <span>Frais client</span>
                                </a>
                                <ul class="sub">
                                    @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                    <li><a href="{{ route('fraisClient.create')}}">Enrégistrer une prévision</a></li>
                                    @endif
                                    <li><a href="{{ route('fraisClient.index')}}">Liste des prévisions</a></li>
                                </ul>
                            </li>
                            <li class="sub-menu {{ request()->is('direction/depense') ||  request()->is('direction/depense/create') ||  request()->is('direction/depense/*')? 'activ': ''}}">
                                <a href="javascript:;">
                                    <i class="fa-solid fa-coins "></i>
                                    <span>Dépense</span>
                                </a>
                                <ul class="sub">
                                    @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                    <li><a href="{{ route('depense.create')}}">Enrégistrer une prévision </a></li>
                                    @endif
                                    <li><a href="{{ route('depense.index')}}">Liste des prévisions</a></li>
                                </ul>
                            </li>
                            @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                            <li class="sub-menu">
                                <a data-toggle="modal" data-target="#ModalImport" href="#">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                    <span>Import du fichier excel</span>

                                </a>
                            </li>
                            @endif

                        </ul>
                    </li>

                    <!-- <li class="sub-menu {{ request()->is('direction/interet') ||  request()->is('direction/interet/create') ||  request()->is('direction/interet/*')? 'activ': ''}}">
                        <a href="javascript:;">
                            <i class="fa fa-industry "></i>
                            <span>Intérêt</span>
                        </a>
                        <ul class="sub">
                            @if ( Auth::user()->role == 1)
                            <li><a href="{{ route('interet.create')}}">Enrégistrer la prevision </a></li>
                            @endif
                            <li><a href="{{ route('interet.index')}}">Liste des prévisions </a></li>
                        </ul>
                    </li>
                    <li class="sub-menu {{ request()->is('direction/fraisClient') ||  request()->is('direction/fraisClient/create') ||  request()->is('direction/fraisClient/*')? 'activ': ''}}">
                        <a href="javascript:;">
                            <i class="fa fa-square"></i>
                            <span>Frais client</span>
                        </a>
                        <ul class="sub">
                            @if (Auth::user()->role == 1)
                            <li><a href="{{ route('fraisClient.create')}}">Enrégistrer une prévision</a></li>
                            @endif
                            <li><a href="{{ route('fraisClient.index')}}">Liste des prévisions</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu {{ request()->is('direction/depense') ||  request()->is('direction/depense/create') ||  request()->is('direction/depense/*')? 'activ': ''}}">
                        <a href="javascript:;">
                            <i class="fa-solid fa-coins "></i>
                            <span>Dépense</span>
                        </a>
                        <ul class="sub">
                            @if (Auth::user()->role == 1)
                            <li><a href="{{ route('depense.create')}}">Enrégistrer une prévision </a></li>
                            @endif
                            <li><a href="{{ route('depense.index')}}">Liste des prévisions</a></li>
                        </ul>
                    </li> -->
                    <li class="sub-menu {{ request()->is('direction/prevision') || request()->is('direction/prevision/filtrage') ? 'activ' : ''}}">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>

                            <span>Réalisation</span>

                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('prevision')}}">Réalisations des agences</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu {{ request()->is('direction/prevision') || request()->is('direction/prevision/filtrage') ? 'activ' : ''}}">
                        <a href="javascript:;">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>

                            <span>Suivi opérationnel</span>

                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('operation')}}">Opération</a></li>
                        </ul>
                    </li>
                    <!-- @if (Auth::user()->role == 1)
                    <li class="sub-menu {{ request()->is('direction/user') ||  request()->is('direction/user/create') ||  request()->is('direction/user/*')? 'activ': ''}}">
                        <a href="javascript:;">
                            <i class="fa fa-users"></i>
                            <span>Utilisateurs</span>
                        </a>
                        <ul class="sub">
                            <li><a href="{{ route('user.create')}}">Enrégistrer un utilisateur</a></li>
                            <li><a href="{{ route('user.index')}}">Liste des utilisateurs</a></li>
                        </ul>
                    </li>
                    @endif -->




                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('content')
            </section>
            <!-- /wrapper -->
        </section>
        @include('admin.depense.import')
    </section>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('lib/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
    <script class="include" type="text/javascript" src="{{ asset('lib/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('lib/jquery.scrollTo.min.js')}}"></script>
    <script src="{{ asset('lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <!--common script for all pages-->
    <script src="{{ asset('lib/common-scripts.js')}}"></script>
    <!--accordeon-->
    <script src="{{ asset('js/accordeon.js')}}"></script>
    <!-- form step by step -->
    <script src="{{ asset('js/formstep.js')}}"></script>

</body>


</html>

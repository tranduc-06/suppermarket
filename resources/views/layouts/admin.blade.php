<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>OGANI</title>

    {{-- <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}" />
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/plugins/footable/footable.core.css') }}" rel="stylesheet">
    <link href="{{asset('admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">

    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-multiselect.css') }}" type="text/css" />

</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                                <img alt="image" class="img-circle" src="{{ asset('admin/img/logo.jpg') }}"
                                    width="50px" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear"> <span class="block m-t-xs"> <strong
                                            class="font-bold">{{ Auth::user()->name }}</strong>
                                    </span> <span class="text-muted text-xs block">{{ Auth::user()->type }}</span>
                            </a>
                        </div>
                        <div class="logo-element">
                            EC+
                        </div>
                    </li>
                    <li class="{{ 'category-management' == request()->path() ? 'active' : '' }}">
                        <a href="{{route('category-management.index')}}"><i class="fa fa-list-alt" aria-hidden="true"></i>
                            <span class="nav-label">Danh mục sản
                                phẩm</span></a>
                    </li>
                    <li class="{{ 'product-management' == request()->path() ? 'active' : '' }}">
                        <a href="{{route('product-management.index')}}"><i class="fa fa-user"></i> <span class="nav-label">Sản
                                phẩm</span></a>
                    </li>

                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i
                                class="fa fa-bars"></i> </a>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">

                        <li>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"> Log out</i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>

                </nav>
            </div>
            <div>
                @yield('content')
            </div>
        </div>
    </div>
    {{-- </div> --}}
    <!-- Mainly scripts -->
    <script src="{{ asset('admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- Custom and plugin admin/javascript -->
    <script src="{{ asset('admin/js/inspinia.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{asset('admin/js/plugins/footable/footable.all.min.js')}}"></script>


    <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-multiselect.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.time.js') }}"></script>

    <script src="{{ asset('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js') }}"></script>

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js') }}"></script>


    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>


    @yield('script')

    <script>

        $(document).ready(function() {

            $('.footable').footable();
        });
    </script>
    
</body>

</html>

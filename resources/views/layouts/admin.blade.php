<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Ecenter</title>

    {{-- <link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css')}}" /> --}}
    <link rel="stylesheet"
        href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}" />
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/plugins/footable/footable.core.css') }}" rel="stylesheet"> --}}
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
                    <li>
                        <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Quản lý sản
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

    <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/bootstrap-multiselect.js') }}"></script>

    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/flot/jquery.flot.time.js') }}"></script>

    {{-- <script src="{{ asset('js/demo/flot-demo.js')}}"></script> --}}
    <script src="{{ asset('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js') }}"></script>

    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js') }}"></script>


    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js') }}"></script>





    @yield('script')

    <script>
        // Lấy tham chiếu đến tất cả các bảng sắp xếp được
        var tbls = document.querySelectorAll("table.sortable");
        // Tiền xử lý các bảng, cột sắp xếp được
        for (var i = 0; i < tbls.length; i++)
            preProcessSortableTbl(tbls[i]);
        // Hàm tiền xử lý
        function preProcessSortableTbl(tbl) {
            // Do chưa biết trước số bảng sắp xếp được
            // nên không thể dùng các biến toàn cục để
            // biểu thị cột và chiều đang được sắp xếp cho từng bảng
            // như ở ví dụ đơn giản.

            // Giải pháp: Thêm vào trước mỗi bảng sắp xếp được 
            // 2 đối tượng hidden để lưu thông tin
            // cột và chiều đang được sắp xếp trên bảng.

            var col = document.createElement("input");
            var dir = document.createElement("input");
            col.type = "hidden";
            dir.type = "hidden";
            col.value = "-1";
            dir.value = "";
            tbl.parentNode.insertBefore(col, tbl);
            tbl.parentNode.insertBefore(dir, tbl);

            // Tiền xử lý các ô tiêu đề cột sắp xếp được
            var hcells = tbl.rows[0].cells;
            for (var i = 0; i < hcells.length; i++)
                if (hcells[i].classList.contains("sortcol")) { // là cột sắp xếp được
                    // Chèn đối tượng <span class="arrow"></span> vào cuối tiêu đề
                    // để biểu thị mũi tên chiều sắp xếp.
                    hcells[i].innerHTML += '<span class="arrow"></span>';

                    // Xử lý sự kiện kích chuột trên ô tiêu đề
                    hcells[i].onclick = function() {
                        // Cột và chiều đang được sắp xếp trên bảng chứa ô tiêu đề
                        var d = this.parentNode.parentNode.parentNode.previousSibling;
                        var c = d.previousSibling;

                        // Bỏ biểu thị cột đang được sắp xếp (nếu có)
                        var j;
                        for (j = 0; j < this.parentNode.cells.length; j++) {
                            this.parentNode.cells[j].classList.remove("asc");
                            this.parentNode.cells[j].classList.remove("desc");
                        }

                        // Lấy chỉ mục của ô tiêu đề
                        // (có thể gộp với vòng for trên cho tối ưu nhưng
                        //  được tác ra cho dễ hiểu)
                        for (j = 0; j < this.parentNode.cells.length; j++)
                            if (this.parentNode.cells[j] == this) break;

                        if (c.value == j.toString()) {
                            // Cột chứa ô tiêu đề đang được sắp xếp, đảo chiều
                            d.value = (d.value == "desc" ? "asc" : "desc");

                        } else {
                            // Mặc định sắp xếp tăng dần
                            c.value = j.toString();
                            d.value = "asc";
                        }

                        // Thêm biểu thị cột được sắp xếp
                        this.classList.add(d.value);

                        // Sắp xếp
                        sortTbl(this.parentNode.parentNode.parentNode);
                    };
                }
        }


        // Sắp xếp dữ liệu trong bảng, trừ cột 1
        // Có thể mở rộng hàm này để cho biết có đảo cả cột 1 hay không
        function sortTbl(tbl) {
            var dir = tbl.previousSibling.value;
            var col = parseInt(tbl.previousSibling.previousSibling.value);

            for (var i = 1; i < tbl.rows.length; i++)
                for (var j = i + 1; j < tbl.rows.length; j++)
                    if ((dir == "asc" && tbl.rows[i].cells[col].innerHTML.toLowerCase() >
                            tbl.rows[j].cells[col].innerHTML.toLowerCase()) ||
                        (dir == "desc" && tbl.rows[i].cells[col].innerHTML.toLowerCase() <
                            tbl.rows[j].cells[col].innerHTML.toLowerCase())) {
                        //hoán vị
                        for (var t = 0; t < tbl.rows[i].cells.length; t++) {
                            tmp = tbl.rows[i].cells[t].innerHTML;
                            tbl.rows[i].cells[t].innerHTML = tbl.rows[j].cells[t].innerHTML;
                            tbl.rows[j].cells[t].innerHTML = tmp;
                        }
                    }
        }
    </script>
</body>

</html>

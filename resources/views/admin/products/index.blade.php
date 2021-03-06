@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div id="wrapper">

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-11">
                <h2> <a href="{{ route('product-management.index') }}">List products</a> </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="active">
                        <strong>List products</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-1">
                <h2>
                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalCreate">
                        <i class="fa fa-plus" aria-hidden="true"></i></a>
                </h2>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <div class="input-group" style="display:flex">
                                <form action="{{ route('product-management.index') }}" method="get">
                                    @csrf
                                    <div class="col-lg-5">
                                        <div class="form-outline">
                                            <input type="search" id="keyword" name="keyword"
                                                value="{{ old('keyword', $keyword) }}" class="form-control"
                                                placeholder="Search anything ..." />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <select name="category_search" id="category_search" class="form-control">
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-1">
                                        <button type="submit" class="btn btn-primary-sm">
                                            Filter
                                        </button>
                                    </div>
                                </form>
                            </div>


                        </div>

                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="footable table sortable table-stripped toggle-arrow-tiny">
                                    <thead>
                                        <tr>
                                            <th data-sort-ignore="true">Id</th>
                                            <th>Name</th>
                                            <th data-sort-ignore="true">Category</th>
                                            <th data-sort-ignore="true">Code</th>
                                            <th data-sort-ignore="true">Quantity_Instock</th>
                                            <th data-sort-ignore="true">Price</th>
                                            <th data-sort-ignore="true">Image</th>
                                            <th data-sort-ignore="true"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($products as $key => $value)
                                            <tr class="gradeX">
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->categories->name }}</td>
                                                <td>{{ $value->code }}</td>
                                                <td>{{ $value->quantity_instock }}</td>
                                                <td>{{ $value->price }}</td>
                                                <td class="center"><img src="{{ $value->image }}" alt="error"
                                                        width="100" height="100"></td>

                                                <td>
                                                    <div style="display:flex;">
                                                        <a href="{{ route('product-management.edit', [$value->id]) }}"
                                                            class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                                                aria-hidden="true"></i></a>
                                                        <form
                                                            action="{{ route('product-management.destroy', [$value->id]) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button style="margin-left: 5px;"
                                                                onclick="return confirm('Do you want delete this product?')"
                                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                                                    aria-hidden="true"></i></button>

                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            {{-- <a class="btn btn-success btn-sm" href="{{ route('product.fileexport') }}">Export
                                                data</a> --}}
                                            <a class="btn btn-success btn-sm" href="#">Export
                                                data</a>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="pull-right">
                                    {{ $products->appends(['keyword' => $keyword])->links('vendor.pagination.custom') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <div class="pull-right">
                    Ecenter
                </div>
                <div>
                    <strong>Copyright</strong>
                </div>
            </div>


        </div>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title">{{ __('Create New Product') }}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </h3>

                        </div>
                        <div class="modal-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="ibox float-e-margins">

                                        <div class="ibox-content">
                                            <form method="POST" class="form-horizontal"
                                                action="{{ route('product-management.store') }}"
                                                enctype="multipart/form-data">

                                                @csrf

                                                <div class="form-group"><label class="col-sm-12 control-label">Name
                                                        <span class="require">*</span></label>

                                                    <div class="col-sm-12 m-b"><input type="text" name="name"
                                                            value="{{ old('name') }}"
                                                            class="form-control @error('name') is-invalid @enderror">
                                                        @error('name')
                                                            <span class="alert-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-12 control-label">Category</label>
                                                    <div class="col-sm-12">
                                                        <select class="form-control m-b" name="category_id"
                                                            id="category_id">
                                                            @foreach ($categories as $categories)
                                                                <option value="{{ $categories->id }}">
                                                                    {{ $categories->name }} </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>


                                                <div class="form-group"><label class="col-sm-12 control-label">Code
                                                        <span class="require">*</span></label>

                                                    <div class="col-sm-12">
                                                        <input type="text" name="code" value="{{ old('code') }}"
                                                            class="form-control m-b @error('code') is-invalid @enderror">
                                                        @error('code')
                                                            <span class="alert-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="form-group"><label
                                                        class="col-sm-12 control-label">Description
                                                        <span class="require">*</span></label>

                                                    <div class="col-sm-12"><input type="text" name="description"
                                                            value="{{ old('description') }}"
                                                            class="form-control m-b @error('description') is-invalid @enderror">
                                                        @error('description')
                                                            <span class="alert-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group"><label
                                                        class="col-sm-12 control-label">Quantity_instock
                                                        <span class="require">*</span></label>

                                                    <div class="col-sm-12"><input type="number" name="quantity_instock" id="quantity_instock"
                                                            value="{{ old('quantity_instock') }}"
                                                            class="form-control m-b @error('quantity_instock') is-invalid @enderror">
                                                        @error('quantity_instock')
                                                            <span class="alert-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group"><label class="col-sm-12 control-label">Price
                                                        <span class="require">*</span></label>

                                                    <div class="col-sm-12"><input type="text" name="price"
                                                            value="{{ old('price') }}"
                                                            class="form-control m-b @error('price') is-invalid @enderror">
                                                        @error('price')
                                                            <span class="alert-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group"><label class="col-sm-12 control-label">Image
                                                        <span class="require">*</span></label>

                                                    <div class="col-sm-12"><input type="file" name="image"
                                                            class="form-control m-b @error('image') is-invalid @enderror">
                                                        @error('image')
                                                            <span class="alert-danger" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-4 col-sm-offset-10">
                                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                                        <a href="{{ route('product-management.index') }}"
                                                            class="btn btn-success btn-sm">Back</a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endsection

    @section('script')
        <script type="text/javascript">
            @if (count($errors) > 0)
                $('#ModalCreate').modal('show');
            @endif
        </script>
    @endsection

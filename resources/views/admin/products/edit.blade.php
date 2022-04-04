@extends('layouts.admin')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="wrapper">

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Edit {{ $product->name }} product</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('product-management.index') }}">List products</a>
                    </li>
                    <li class="active">
                        <strong>Edit product</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form method="POST" class="form-horizontal" action="{{ route('product-management.update', [$product->id]) }}"
                        enctype="multipart/form-data">
                        @method('PUT')

                        @csrf

                        <div class="form-group"><label class="col-sm-2 control-label">Name <span
                                    class="require">*</span></label>

                            <div class="col-sm-10"><input type="text" value="{{ old('phone', $product->name) }}"
                                    name="name" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Category <span
                                    class="require">*</span></label>
                                    <div class="col-sm-10">
                                    <select class="form-control m-b" name="category_id" id="category_id">
                                        @foreach ($categories as $categories)
                                            <option {{ $product->category_id == $categories->id ? 'selected' : '' }} value="{{ $categories->id }}"> {{ $categories->name }} </option>
                                        @endforeach
                                        
                                    </select>
                                    </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Code</label>

                            <div class="col-sm-10"><input type="text" value="{{ $product->code }}"
                                    class="form-control"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Quantity_Instock</label>

                            <div class="col-sm-10"><input type="number" name="quantity_instock" class="form-control"></div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group"><label class="col-sm-2 control-label">Price </label>

                            <div class="col-sm-10"><input type="text" name="price"
                                    class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-10">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                <a href="{{ route('product-management.index') }}" class="btn btn-success btn-sm">Back</a>
                            </div>
                            <div class="col-sm-10"><input type="hidden" name="type" class="form-control"></div>
                        </div>
                        <div class="hr-line-dashed"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

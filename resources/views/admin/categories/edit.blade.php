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
            <div class="col-lg-10">
                <h2>Edit {{ $category->name }} class </h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('category-management.index') }}">List Categories</a>
                    </li>
                    <li class="active">
                        <strong>Edit category</strong>
                    </li>
                </ol>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <form method="POST" class="form-horizontal" action="{{ route('category-management.update', [$category->id]) }}"
                        enctype="multipart/form-data">

                        @method('PUT')
                        @csrf

                        <div class="form-group"><label class="col-sm-2 control-label">Name <span
                                    class="require">*</span></label>

                            <div class="col-sm-10"><input type="text" value="{{ old('name', $category->name) }}"
                                    name="name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <span class="alert-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                    
                        <div class="form-group"><label class="col-sm-2 control-label">Description <span
                            class="require">*</span></label>

                    <div class="col-sm-10"><input type="text" value="{{ old('description', $category->description) }}"
                            name="description" class="form-control @error('description') is-invalid @enderror">
                        @error('description')
                            <span class="alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <input type="hidden" value="{{ $category->id }}" name="id" id="id" class="form-control">
                            <div class="col-sm-4 col-sm-offset-10">
                                <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                <a href="{{ route('category-management.index') }}" class="btn btn-success btn-sm">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
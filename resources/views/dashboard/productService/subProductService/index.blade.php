@extends('layouts.SupUserMaster')

@section('title', 'Index Product and Service - Techno Apogee Limited')
@section('SupUserContent')
@include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Index Product & Service</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.ProductSerIndex') }}">Product & Service</a></li>
                <li class="breadcrumb-item active">Product & Service Sub Menu</li>
            </ol>
        </nav>
    </div>
    <hr>
                        @if (Session::get('ProDelSuc'))
                            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('ProDelSuc') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        @if (Session::get('prodelerr'))
                            <div class="alert alert-primary bg-warning text-light border-0 alert-dismissible fade show"
                                role="alert">
                                {{ Session::get('prodelerr') }}
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
    
    <div class="card-header">
        <a href="{{ URL::previous() }}" class="btn btn-info">&larr; Back</a>
        <div class="float-right">
            <a href="{{ route('SupUserProduct.SubMenuInsert',['menu_slug'=>$menu_slug]) }}" class="btn btn-primary btn-sm">+ Sub Product</a>
        </div>
    </div>
    <table class="table table-hover datatable table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Slug</th>
                <th scope="col">image</th>
                <th scope="col">Parent</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ProductServiceSubMenu as $key => $ProductServiceSubMenu)
                <tr>
                    <td>{{ $ProductServiceSubMenu->id }}</td>
                    <td><a href="{{ route('SupUserProduct.SubMenuUpdateShow',['subProUpdate_slug'=>$ProductServiceSubMenu->__proserslug]) }}">{{ $ProductServiceSubMenu->__proserslug }}</a></td>
                    <td><img src="{{ asset('public/image/productservice/subproduct') }}/{{ $ProductServiceSubMenu->__proserheadimage }}" height="55px" width="55px" alt="{{ $ProductServiceSubMenu->__prosername }}"></td>
                    <td>{{ $ProductServiceSubMenu->__prosermaincateslug }}</td>
                    <td>
                        <div class="button-group">
                            
                            <a href="{{ route('SupUserProduct.SubMenuUpdateShow',['subProUpdate_slug'=>$ProductServiceSubMenu->__proserslug]) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            <button type="button" value="{{ $ProductServiceSubMenu->id }}" class="btn btn-danger deleteProductServiceSub btn-sm"><i class="bi bi-trash"></i></button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@include('dashboard.productService.subProductService.partials.modal')
@endsection
@section('js')
@include('dashboard.productService.subProductService.partials.js')
@endsection
@extends('layouts.SupUserMaster')
@section('title', 'File Insert - Techno Apogee')
@section('SupUserContent')
    @include('dashboard.summernote.summernote')

    <div class="pagetitle">
        <h1>Files</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUserDownload.indexList') }}">File Index</a></li>
                <li class="breadcrumb-item active">Insert</li>
            </ol>
        </nav>
    </div>

    @if (Session::get('fileUploadSuccess'))
        <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('fileUploadSuccess') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::get('fileUploadFailed'))
        <div class="alert alert-primary bg-warning text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('fileUploadFailed') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (Session::get('fileCategoryError'))
        <div class="alert alert-primary bg-warning text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('fileCategoryError') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    File Upload
                </div>
                <div class="card-body">
                    <form action="{{ route('SupUserDownloadFileSave') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <span style="color: rgb(0, 0, 0);">is it <b>Blog, Project, Product</b> file? then click, <b>otherwise
                                    leave it blank!</b></span>
                            <select name="othersCategory" id="othersCategory" class="form-control">
                                <option value="null" selected>Click to select</option>
                                <option value="" style="font-style:italic;color:black;"> ----------- Blog -----------
                                </option>
                                @foreach ($BlogCateg as $blog)
                                    <option value="blog.{{ $blog->id }}">{{ $blog->__blog_name }}</option>
                                @endforeach
                                <option value="" style="font-style:italic;color:black;"> ---------- Product Service
                                    ----------</option>
                                @foreach ($ProductService as $product)
                                    <option value="product.{{ $product->id }}">{{ $product->__prosername }}</option>
                                @endforeach
                                <option value="" style="font-style:italic;color:black;"> ------------ Project
                                    ----------- </option>
                                @foreach ($Project as $project)
                                    <option value="project.{{ $project->id }}">{{ $project->project_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <b>Must select this category<span style="color: red;"> *</span></b>
                            <select class="form-control" name="file_category" id="file_category">
                                <option value="null" selected>Selecte File category type</option>
                                <option value="1.enlistment-document">ENLISTMENT DOCUMENTS</option>
                                <option value="2.product-datasheet">PRODUCT DATASHEET</option>
                            </select>
                            @error('file_category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <b>Image<span style="color: red;"> *</span></b>
                            <input type="file" class="form-control" name="image" id="image">
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <b>File Name<span style="color: red;"> * </span></b>
                            <textarea name="fileRemarks" class="form-control" id="fileRemarks">{{ old('fileRemarks') }}</textarea>
                            @error('fileRemarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <span>Description</span>
                            <textarea name="description" class="form-control" id="summernote">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <span>Upload file <span style="color:red;">Single file</span></span>
                            <input type="file" name="uploadFileName" class="form-control" id="uploadFileName">
                            @error('uploadFileName')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="button-group">
                                <button type="submit" class="btn btn-primary">Insert File</button> &nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Preview
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#summernote').summernote({
            placeholder: 'Type something about this file...',
            tabsize: 2,
            height: 200
        });
    </script>
    @include('dashboard.download.partials.modal')
@endsection
@section('js')
    @include('dashboard.download.partials.js')
@endsection

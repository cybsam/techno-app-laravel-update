@extends('layouts.SupUserMaster')

@section('title', 'Insert New Project Details - Techno Apogee Limited')
@section('SupUserContent')


    <div class="pagetitle">
        <h1>Project Category List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Project</a></li>
                <li class="breadcrumb-item active">Project Category List</li>
            </ol>
        </nav>
    </div>




    <div class="card">
        @if (Session::get('categoryDeleteCom'))
            <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show" role="alert">
                {{ Session::get('categoryDeleteCom') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        
        @if (Session::get('categoryDeleteProb'))
            <div class="alert alert-primary bg-danger text-light border-0 alert-dismissible fade show" role="alert">
                {{ Session::get('categoryDeleteProb') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="card-header">
            <a href="{{ URL::previous() }}" class="btn btn-secondary"><- Back</a>
                    <div class="float-right">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#projectcategory">+
                            Project Category</button>
                    </div>
        </div>
        <div class="card-body">
            <table class="table table-hover datatable table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Category Slug</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listAllCategory as $key => $listCategory)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $listCategory->project_category }}</td>
                            <td>{{ $listCategory->project_category_slug }}</td>
                            <td>
                                <a href="{{ route('SupUser.ProjectCategoryDelete', ['category_id' => $listCategory->id]) }}"
                                    class="btn btn-danger"><i class="bi bi-trash" aria-hidden="true"></i></a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



    @include('dashboard.project.partials.modal')
@endsection

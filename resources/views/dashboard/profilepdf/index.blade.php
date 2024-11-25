@extends('layouts.SupUserMaster')

@section('title', 'Company Profile - Techno Apogee')
@section('SupUserContent')


<div class="pagetitle">
    <h1>Company Profiles</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
            
            <li class="breadcrumb-item active">Company Profile</li>
        </ol>
    </nav>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    @if (Session::get('pdfInsertComplete'))
                    <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('pdfInsertComplete') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::get('pdfhavingProblem'))
                        <div class="alert alert-primary bg-danger text-light border-0 alert-dismissible fade show"
                            role="alert">
                            {{ Session::get('pdfhavingProblem') }}
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table table-border datatable">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>PDF</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listPdf as $key => $list)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $list->pdf }}</td>
                                <td>
                                    <button class="badge {{ $list->status == 'Active' ? 'bg-primary':'bg-warning'; }}" type="submit">
                                        @if ($list->status == 'Active')
                                            <a class="text-white" href="{{ route('supUser.companyProfileDeactive',['pdf_id'=>$list->id,'pdf'=>$list->pdf]) }}">Active</a>
                                        @else
                                            <a class="text-white" href="{{ route('supUser.companyProfileActive',['pdf_id'=>$list->id,'pdf'=>$list->pdf]) }}">InActive</a>
                                        @endif
                                    </button>
                                </td>
                                <th><a href="{{ route('supUser.companyProfileDelete',['pdf_id'=>$list->id,'pdf'=>$list->pdf]) }}" class="btn btn-danger"><i class="bi bi-trash" aria-hidden="true"></i></a></th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <a href="{{ route('supUser.companyProfileInsert') }}" class="btn btn-primary btn-block">+ Add New File</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
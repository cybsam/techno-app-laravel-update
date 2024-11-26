@extends('layouts.SupUserMaster')
@section('title', 'Our Team ~ About Us - Techno Apogee Limited')
@section('SupUserContent')

    <div class="pagetitle">
        <h1>Our Team</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('Administrator.index') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.AboutUsIndex') }}">About Us</a></li>
                <li class="breadcrumb-item"><a href="{{ route('SupUser.OurTeam') }}">Our Members</a></li>
                <li class="breadcrumb-item active">Update Members</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Member's Details</h4>
                        <a href="{{ route('SupUser.OurTeam') }}" class="btn btn-secondary float-right"><-- Team List</a>
                    </div>
                    <div class="card-body">
                        <div class="text-info">
                            @if (Session::get('membupdcom'))
                                <div class="alert alert-primary bg-primary text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {{ Session::get('membupdcom') }}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                
                            @endif
                        </div>
                        <div class="text-info">
                            @if (Session::get('memupderr'))
                                <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show"
                                    role="alert">
                                    {{ Session::get('memupderr') }}
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                                
                            @endif
                        </div>
                        
                        <div class="">
                            @if ($errors->all())
                                <span class="text-danger">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </span>
                            @endif
                        </div>
                        <form action="{{ route('SupUser.OurTeamUpdatePost') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Member's Name <span style="color: red">*</span></label>
                                <input type="text" name="name" value="{{ $membersInfor->name }}" class="form-control">
                            </div>
                            <label for="">Member's Department and Desigination <span
                                    style="color: red">***</span></label>
                            <div class="input-group mb-3">

                                <select name="department" id="department" class="form-control">
                                    <option value="{{ $membersInfor->department }}" selected>{{ $membersInfor->department }}</option>
                                    @foreach ($empSectionCategory as $empSection)
                                        <option value="{{ $empSection->team_department_slug }}">{{ $empSection->team_department }}</option>
                                    @endforeach
                                </select>

                                <span class="input-group-text">--</span>
                                <select name="degination" id="degination" class="form-control">
                                    @foreach ($empDeginationCategory as $empDegination)
                                        <option value="{{ $empDegination->team_department_sub }}">{{ $empDegination->team_department_sub }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Member's Email <span style="color: red">*</span></label>
                                <input type="email" class="form-control" name="email" value="{{ $membersInfor->email }}">
                            </div>
                            <div class="form-group">
                                <label for="">Member's Mobile Number <span style="color: red">*</span></label>
                                <input type="number" class="form-control" name="mobile" value="{{ $membersInfor->mobile }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="">Member's Whatsapp Number <span style="color: red">*</span></label>
                                <input type="hidden" name="id" value="{{ $membersInfor->id }}">
                                <input type="number" class="form-control" name="whatsapp" value="{{ $membersInfor->whatsapp }}">
                            </div>
                            <div class="form-group">
                                <label for="">Member's Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <label for="">Member's Status<span style="color: red">**</span></label>
                                <select name="activeDeac" class="form-control" id="activeDeac">
                                    <option value="{{ $membersInfor->is_active }}" selected>Select Status</option>
                                    <option value="{{ __('1') }}">Active</option>
                                    <option value="{{ __('0') }}">Deactive</option>
                                </select>
                            </div>
                            <br>
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-outline-warning text-black">Update Member</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Member's Image
                        </div>
                        <img src="{{ asset('image/about-us/our-team') }}/{{ $membersInfor->image }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

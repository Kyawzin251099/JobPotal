@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">

                @if (empty(Auth::user()->company->logo))
                    <img src="{{ asset('avatar/profile.jpg') }}" width="100" style="width:100%">
                @else
                    <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" style="width:100%">
                @endif



                <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">@csrf
                    <br>

                    <div class="card-header">Update Logo</div><br>
                    <div class="card-body">
                        <input type="file" class="form-control" name="company_logo"><br>
                        <button class="btn btn-success" type="submit">Update</button>

                        @if ($errors->has('company_logo'))
                            <div class="error" style="color:red">{{ $errors->first('company_logo') }}
                            </div>
                        @endif

                    </div>
                </form>

            </div>

            <div class="col-md-5">
                <div class="card">
                    <form action="{{ route('company.store') }}" method="POST">@csrf
                        <div class="card-header">Update Your Company Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ Auth::user()->company->address }}">
                            </div>

                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" name="phone"
                                    value="{{ Auth::user()->company->phone }}">
                            </div>

                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website"
                                    value="{{ Auth::user()->company->website }}">
                            </div>

                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan"
                                    value="{{ Auth::user()->company->slogan }}">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" class="form-control">{{ Auth::user()->company->description }}</textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                            </div>
                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">About Your </div>
                    <div class="card-body">
                        <p>Company Name: {{ Auth::user()->company->cname }}</p>
                        <p>Address : {{ Auth::user()->company->address }}</p>
                        <p>Phone Number: {{ Auth::user()->company->phone }}</p>
                        <p> Website:<a href="{{ Auth::user()->company->website }}">
                                {{ Auth::user()->company->website }}
                            </a>
                        </p>
                        <p>Slogan: {{ Auth::user()->company->slogan }}</p>
                        <p>Description: {{ Auth::user()->company->description }}</p>
                        <p>Company Page :<a href="{{ Auth::user()->company->slug }}">View</a>

                        </p>
                    </div>
                </div><br>
                <div class="card">
                    <form action="{{ route('cover.photo') }}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="card-header">Update Cover Letter</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo"><br>
                            <button class="btn btn-success float-end" type="submit">Update</button>
                            @if ($errors->has('cover_photo'))
                                <div class="error" style="color:red">{{ $errors->first('cover_photo') }}
                                </div>
                            @endif
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

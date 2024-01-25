@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create a Job') }}</div>
                    <div class="card-body">

                        <form action="{{ route('job.store') }}" method="post">@csrf

                            @if (Session::has('message'))
                                <div class="alert alert-success">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="title">Title :</label>
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role">Role:</label>
                                <textarea name="roles" class="form-control @error('roles') is-invalid @enderror">{{ old('roles') }}</textarea>

                                @error('roles')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="category">Category:</label>
                                <select name="category" class="form-control">
                                    @foreach (App\Models\Category::all() as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="position">Position:</label>
                                <input type="text" name="position"
                                    class="form-control @error('position') is-invalid @enderror">

                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="number_of_vacany">No of Vacancy:</label>

                                <input type="text" name="number_of_vacany"
                                    class="form-control @error('number_of_vacany') is-invalid @enderror"
                                    value="{{ old('number_of_vacany') }}">

                                @error('number_of_vacany')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="experience">Year of Experience:</label>

                                <input type="text" name="experience"
                                    class="form-control @error('experience') is-invalid @enderror"
                                    value="{{ old('experience') }}">
                                @error('experience')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label type="gender">Gender:</label>
                                <select name="gender" class="form-control">
                                    <option value="any">Any</option>
                                    <option value="male">Male</option>
                                    <option value="female">Femle</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label type="type">Salary:</label>
                                <select name="salary" class="form-control">
                                    <option value="negotiable">Negotiable</option>
                                    <option value="2000-5000">2000-5000</option>
                                    <option value="50000-10000">50000-10000</option>
                                    <option value="100000-200000">100000-200000</option>
                                    <option value="300000-500000">300000-500000</option>
                                    <option value="600000 plus">600000 plus</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid @enderror">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label for="type">Type:</label>
                                <select name="type" class="form-control">
                                    <option value="fulltime">Fulltime</option>
                                    <option value="parttime">Parttime</option>
                                    <option value="casusal">Casual</option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="status">Status:</label>
                                <select name="status" class="form-control">
                                    <option value="1">live</option>
                                    <option value="0">draft</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="lastdate">Last Date:</label>
                                <input type="date" name="last_date"
                                    class="form-control @error('last_date') is-invalid @enderror">

                                @error('last_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-success">Submit</button>
                            </div>



                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

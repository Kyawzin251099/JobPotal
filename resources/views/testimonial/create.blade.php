@extends('layouts.app')
@section('content')
    <div class="container">


        <div class="row">

            <div class="col md-4">
                @include('admin.left-menu')
            </div>

            <div class="col md-8">
                <div class="card">
                    <div class="card-header">
                        Add Posts
                    </div>
                    <div class="card-body">
                        <form action="{{ route('testimonial.store') }}" method="POST">@csrf
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" required="" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" required=""
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Profession</label>
                                <input type="text" name="profession" required=""
                                    class="form-control {{ $errors->has('profession') ? 'is-invalid' : '' }}"
                                    value="{{ old('profession') }}">
                                @if ($errors->has('profession'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Viemo Video Id</label>
                                <input type="text" name="video_id" required=""
                                    class="form-control {{ $errors->has('video_id') ? 'is-invalid' : '' }}"
                                    value="{{ old('video_id') }}">
                                @if ($errors->has('video_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('video_id') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <br>
                            <div class="form-groupp">
                                <button type="submit" class="btn btn-success form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

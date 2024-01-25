@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif

        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <div class="row">
            <div class="col md-4">
                @include('admin.left-menu')
            </div>
            <div class="col md-8">

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Content</th>
                            <th scope="col">Name</th>
                            <th scope="col">Profession</th>
                            <th scope="col">Viemo Video Id</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($testimonials as $testimonial)
                            <tr>

                                <td>{{ $testimonial->content }}</td>
                                <td>{{ $testimonial->name }}</td>
                                <td>{{ $testimonial->profession }}</td>
                                <td>{{ $testimonial->video_id }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

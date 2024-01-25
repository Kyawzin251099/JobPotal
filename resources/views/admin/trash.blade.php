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
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td><img src="{{ asset('storage/' . $post->image) }}" width="80"></td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>
                                    @if ($post->status == '0')
                                        <a href="" class="badge badge-success">Draft</a>
                                    @else
                                        <a href="" class="badge badge-info">Live</a>
                                    @endif

                                </td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('post.restore', [$post->id]) }}">
                                        <button class="btn btn-success btn-sm">Restore</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

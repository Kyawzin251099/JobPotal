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
                                        <a href="{{ route('post.toggle', [$post->id]) }}"
                                            class="badge badge-success">Draft</a>
                                    @else
                                        <a href="{{ route('post.toggle', [$post->id]) }}" class="badge badge-info">Live</a>
                                    @endif

                                </td>
                                <td>{{ $post->created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('post.edit', [$post->id]) }}">
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                    </a>

                                    <form method="post" action="{{ route('dashboard.destroy', $post->id) }}"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#exampleModal1{{ $post->id }}">Delete</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        {{-- <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are You Sure Delete</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

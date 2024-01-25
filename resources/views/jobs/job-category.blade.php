@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $categoryName->name }}</h2>
            <br><br>
            <table class="table">
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>

                            <td><img src="{{ asset('avatar/profile.jpg') }}" width="80"></td>
                            <td>Position :{{ $job->position }}
                                <br>
                                <i class="fa-regular fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                            </td>

                            <td><i class="fa-solid fa-location-dot" aria-hidden="true"></i>Address :{{ $job->address }}</td>
                            <td>
                                <i class="fa-solid fa-globe" aria-hidden="true"></i>
                                &nbsp; Date:{{ $job->created_at->diffForHumans() }}
                            </td>
                            <td>
                                <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                                    <button class="btn btn-success btn-sm"> Apply </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- {{ $jobs->links() }} --}}
            {{ $jobs->appends(Illuminate\Support\Facades\Request::except('page'))->links() }}


        </div>
    </div>
@endsection

<style>
    fa {
        color: rgba(22, 143, 236, 0.649)
    }
</style>

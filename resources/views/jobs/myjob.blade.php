@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td>
                                            @if (empty(Auth::user()->company->logo))
                                                <img src="{{ asset('avatar/profile.jpg') }}" width="80">
                                            @else
                                                <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}"
                                                    style="width::20%">
                                            @endif
                                        </td>
                                        <td>Position :{{ $job->position }}
                                            <br>
                                            <i class="fa-regular fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                                        </td>

                                        <td><i class="fa-solid fa-location-dot" aria-hidden="true"></i>Address
                                            :{{ $job->address }}</td>
                                        <td>
                                            <i class="fa-solid fa-globe" aria-hidden="true"></i>
                                            &nbsp; Date:{{ $job->created_at->diffForHumans() }}
                                        </td>
                                        <td>
                                            <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">
                                                <button type="submit" class="btn btn-success btn-sm"> Apply </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('job.edit', ['id'=>$job->id]) }}">
                                                <button type="submit" class="btn btn-success btn-sm">Edit</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

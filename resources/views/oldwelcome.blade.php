@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('search') }}" method="get">
                    <input type="text" name="search" class="form-control" placeholder="Search Jobs....">
                    <br>
                    <button type="submit" class="btn btn-info">Search</button>
                </form>
            </div>
            <br><br>
            <h1>Recent Jobs</h1>

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
        </div>
        <div>
            <a href="{{ route('alljobs') }}">
                <button type="submit" class="btn btn-success" style="width: 100%;">Browser all jobs</button></a>
        </div>
        <br><br>
        <h1>Featured Companies</h1>
    </div>
    <div class="container">
        <div class="row">

            @foreach ($companies as $company)
                <div class="col-md-3">

                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80">
                        <div class="card-body">
                            <h5 class="card-title">{{ $company->cname }}</h5>
                            <p class="card-text">{{ str_limit($company->description, 20) }}</p>
                            <a href="{{ route('company.index', [$company->id, $company->slug]) }}"
                                class="btn btn-primary btn-sm">Visit Company</a>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
@endsection
<style>
    fa {
        color: rgba(22, 143, 236, 0.649)
    }
</style>

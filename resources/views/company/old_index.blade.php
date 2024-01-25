@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="company-profile">

                    @if ($company->cover_photo)
                        {{-- <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" style="width::100%"> --}}
                        <img src="{{ asset('cover/cover.jpg') }}" style="width::50%;">
                    @endif


                    <div class="company-desc">
                        @if (!empty($company->logo))
                            <img src="{{ asset('avatar/profile.jpg') }}" width="100">
                        @else
                            <img src="{{ asset('uploads/logo') }}//{{ $company->logo }}" width="100">
                        @endif

                        <p>{{ $company->description }}</p>
                        <h1>{{ $company->cname }}</h1>
                        <p>
                            {{ $company->slogan }}-&nbsp;
                            {{ $company->address }}-&nbsp;
                            {{ $company->phone }}-&nbsp;
                            {{ $company->website }}-
                        </p>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </thead>
                    <tbody>
                        {{-- @dd($company) --}}
                        @foreach ($company->jobs as $job)
                            <tr>

                                <td><img src="{{ asset('avatar/profile.jpg') }}" width="80"></td>
                                <td>Position :{{ $job->position }}
                                    <br>
                                    <i class="fa-regular fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                                </td>

                                <td><i class="fa-solid fa-location-dot" aria-hidden="true"></i>Address :{{ $job->address }}
                                </td>
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
        </div>

    </div>
@endsection

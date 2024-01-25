@extends('layouts.main')
@section('content')
    <div class="album text-muted">
        <div class="container">
            <div class="row" id="app">
                <div class="title" style="margin-top:20px;">
                    <h2>

                    </h2>
                </div>
                @if ($company->cover_photo)
                    {{-- <img src="{{ asset('uploads/coverphoto') }}/{{ $company->cover_photo }}" style="width::100%"> --}}
                    <img src="{{ asset('cover/cover.jpg') }}" style="width::50%;">
                @endif


                <div class="col-lg-12">

                    <div class="p-4 mb-8 bg-white">
                        <div class="company-desc">
                           
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

                        <tbody>
                            {{-- @dd($company) --}}
                            @foreach ($company->jobs as $job)
                                <tr>

                                    <td><img src="{{ asset('avatar/profile.jpg') }}" width="80"></td>
                                    <td>Position :{{ $job->position }}
                                        <br>
                                        <i class="fa-regular fa-clock" aria-hidden="true"></i>&nbsp;{{ $job->type }}
                                    </td>

                                    <td><i class="fa-solid fa-location-dot" aria-hidden="true"></i>Address
                                        :{{ $job->address }}
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
    </div>
@endsection

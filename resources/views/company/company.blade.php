@extends('layouts.main')
@section('content')
    {{-- <div class="container">
        <h3>Companies</h3>
        <div class="row">

            @foreach ($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">

                        @if (!empty($company->logo))
                            <img src="{{ asset('avatar/profile.jpg') }}" width="100">
                        @else
                            <img src="{{ asset('uploads/logo') }}//{{ $company->logo }}" width="100">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $company->cname }}</h5>

                            <center>
                                <a href="{{ route('company.index', [$company->id, $company->slug]) }}"
                                    class="btn btn-primary">View Company</a>

                            </center>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $companies->links() }}
    </div> --}}


    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5">Companies</h2>
                </div>
            </div>
            <div class="row">
                @foreach ($companies as $company)
                    <div class="col-sm-6 col-md-4 col-lg-3 mb-3" data-aos="fade-up" data-aos-delay="100">
                        <a href="{{ route('company.index', [$company->id, $company->slug]) }}" class="h-100 feature-item">
                            <span class="mb-3 text-primary">
                                @if (!empty($company->logo))
                                    <img src="{{ asset('avatar/profile.jpg') }}" width="100">
                                @else
                                    <img src="{{ asset('uploads/logo') }}//{{ $company->logo }}" width="100">
                                @endif
                            </span>
                            <h3>{{ $company->cname }}</h3>
                            {{-- <button class="mb-3 btn-primary">View Company</button> --}}
                        </a>
                    </div>
                @endforeach
            </div>
            {{-- {{ $companies->links() }}  --}}
        </div>
    </div>
@endsection

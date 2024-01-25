@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                {{-- @dd($searchDatas); --}}
                @foreach ($searchDatas as $searchData)
                    <div class="card">
                        <div class="card-header">{{ $searchData->title }}</div>
                        <div class="card-body">

                            <p>
                            <h3>Description</h3>
                            {{ $searchData->description }}
                            </p>
                            <p>
                            <h3>Duties</h3>
                            {{ $searchData->roles }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>



        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            {{-- <form action="{{ route('alljobs') }}" method="get">

                <div class="form-inline">

                    <div class="form-group">
                        <label>Keyword&nbsp;</label>
                        <input type="text" name="title" class="form-control">&nbsp;&nbsp;
                    </div>

                    <div class="form-group">
                        <label>Employment type&nbsp;</label>
                        <select name="type" class="form-control">
                            <option value="fulltime">Select</option>
                            <option value="fulltime">Fulltime</option>
                            <option value="parttime">Parttime</option>
                            <option value="casusal">Casual</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Category&nbsp;</label>
                        <select name="category_id" class="form-control">
                            <option value="">-select-</option>
                            @foreach (App\Models\Category::all() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label>Address&nbsp;</label>
                        <input type="text" name="address" class="form-control">&nbsp;&nbsp;
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-outline-success">Search</button>
                    </div>

                </div>

            </form> --}}

            <div class="col-md-12">
                <div class="rounded border jobs-wrap">

                    @foreach ($jobs as $job)
                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}   "
                            class="job-item d-block d-md-flex align-items-center  border-bottom fulltime">
                            {{-- <div class="company-logo blank-logo text-center text-md-left pl-3">
                                <img src="{{ asset('avatar/profile.jpg') }}" alt="Image" class="img-fluid mx-auto">
                            </div> --}}
                            <div class="job-details h-100">
                                <div class="p-3 align-self-center">
                                    <h3>{{ $job->position }}</h3>
                                    <div class="d-block d-lg-flex">
                                        <div class="mr-3"><span class="icon-suitcase mr-1"></span>
                                            {{ $job->company->cname }}
                                        </div>
                                        <div class="mr-3">
                                            <span class="icon-room mr-1"></span>
                                            {{ str_limit($job->address, 20) }}
                                        </div>
                                        <div>
                                            <span class="icon-money mr-1"></span>{{ $job->salary }}
                                        </div>
                                        <div>
                                            <span class="fa fa-clock-o mr-1"></span>{{ $job->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="job-category align-self-center">
                                @if ($job->type == 'fulltime')
                                    <div class="p-3">
                                        <span class="text-info p-2 rounded border border-info">{{ $job->type }}</span>
                                    </div>
                                @elseif ($job->type == 'partime')
                                    <div class="p-3">
                                        <span
                                            class="text-danger p-2 rounded border border-danger">{{ $job->type }}</span>
                                    </div>
                                @else
                                    <div class="p-3">
                                        <span
                                            class="text-warning p-2 rounded border border-warning">{{ $job->type }}</span>
                                    </div>
                                @endif
                            </div>
                        </a>
                    @endforeach

                </div>

            </div>

            {{-- {{ $jobs->links() }} --}}
            {{-- {‌{$jobs->appends(Illuminate\Support\Facades\Request::except('page')}->links()}} --}}
            {{-- {{ $job->appends(Illuminate\Support\Facades\Request::except('page'))->links() }} --}}


        </div>
    </div>
@endsection

<style>
    fa {
        color: rgba(22, 143, 236, 0.649)
    }
</style>

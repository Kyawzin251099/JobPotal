@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <form action="{{ route('alljobs') }}" method="get">

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

            </form>


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

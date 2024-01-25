<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function saveJob($id){
    $jobId = Job::find($id);
    $jobId->favourite()->attach(auth()->user()->id);
    return redirect()->back();
    }

    public function unsaveJob($id){
        $jobId = Job::find($id);
        $jobId->favourite()->detach(auth()->user()->id);
        return redirect()->back();

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobPostRequest;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{

    public function __construct(){
        $this->middleware(['employer','verified'],['except'=>array('index','show','apply','alljobs','searchJobs')]);
    }

    public function index(){
        // $jobs = Job::all()->take(5);
        $jobs = Job::latest()->limit(7)->where('status',1)->get();

        $categories = Category::with('jobs')->get();

        $testiomonial =Testimonial::orderBy('id','DESC')->first();

        $posts = Post::where('status',1)->get();

        $companies = Company::get()->random(12);
        return view('welcome',compact('jobs','companies','posts','categories','testiomonial'));
    }

    public function show($id,Job $job){
        // $job = Job::findOrFail($id);  //This one is similar to write show($id,Job $job)
        // dd($job->position);

     $jobRecommendations =$this->jobRecommendations($job);
      return view('jobs.show',compact('job','jobRecommendations'));
    }

    public function jobRecommendations($job){
        $data = [];

     $jobBasedOnCategories = Job::latest()
            ->where('category_id',$job->category_id)
        //    ->whereDate('last_date','>',date('Y-m-d'))
        //    ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(2)
            ->get();
        //  dd($jobBasedOnCategories);
        array_push($data,$jobBasedOnCategories);

     $jobBasedOnCompany = Job::latest()
            ->where('company_id',$job->company_id)
            // ->whereDate('last_date','>',date('Y-m-d'))
            // ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(2)
            ->get();

    ////// dd($jobBasedOnCompany);
array_push($data,$jobBasedOnCompany);

     $jobBasedOnPosition = Job::latest()
            ->where('position','LIKE','%'.$job->position.'%')
            // ->where('id','!=',$job->id)
            ->where('status',1)
            ->limit(2);
        array_push($data,$jobBasedOnPosition);

        $collection = collect($data);
        $unique = $collection->unique("id");
        $jobRecommendations= $unique->values()->first();

        return $jobRecommendations;
    }


    public function myjob(){
        // dd(Auth::user());
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view ('jobs.myjob',compact('jobs'));
    }

    public function create(){
        return view('jobs.create');
    }

    public function edit($id){
        dd('hello');
        $job= Job::findOrFail($id);

        return view('jobs.edit',compact('job'));
    }

    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found for the user.');
        }

        // $company_id = $company->id;
        $company_id = $company->id;
        Job::create([
            'usre_id'=>$user_id,
            'company_id'=>$company_id,
            'title'=>request('title'),
            'slug'=>str_slug(request('slug')),
            'description'=>request('description'),
            'roles'=>request('roles'),
            'category_id'=>request('category'),
            'position'=>request('position'),
            'address'=>request('address'),
            'type'=>request('type'),
            'status'=>request('status'),
            'last_date'=>request('last_date'),
            'number_of_vacany'=>request('number_of_vacany'),
            'experience'=>request('experience'),
            'gender'=>request('gender'),
            'salery'=>request('salery')
        ]);
        return redirect()->back()->with('message','Job Successfully Update!');
    }

    public function apply(Request $request,$id){
        $jobId = Job::findOrFail($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message','Application Sent!');
    }

    public function applicant(){
       $applicants = Job::has('users')
                ->where('user_id',auth()->user()->id)->get();
                return view('jobs.applicant',compact('applicants'));
    }

    public function alljobs(Request $request){
     //front search
     $search = $request->search;
     $address = $request->address;
    //  dd($address);
     if($search && $address){
        $jobs = Job::where('position', 'LIKE', '%' . $search . '%')
                    ->orWhere('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('type', 'LIKE', '%' . $search . '%')
                    ->orWhere('address', 'LIKE', '%' . $address . '%')
                    ->Where('address', 'LIKE', '%' . $address . '%')
                    ->paginate(10);
             return view('jobs.alljobs',compact('jobs'));

     }
         $keyword = $request->get('title');
         $type = $request->get('type');
         $category = $request->get('category_id');
         $address = $request->get('address');
        //  dd($keyword);
         if ($keyword||$type||$category||$address) {
            $jobs = Job::where('title','LIKE','%'.$keyword.'%')
                    ->orWhere('type',$type)
                    ->orWhere('category_id',$category)
                    ->orWhere('address',$address)
                    ->paginate(10);
                    return view('jobs.alljobs',compact('jobs'));
         } else {
            $jobs = Job::latest()->paginate(10);
            return view('jobs.alljobs',compact('jobs'));
         }
    }

    // public function searchJobs(Request $request){
    //         $keyword = $request->get('keyword');
    //         $users = Job::where('title','like','%'.$keyword.'%')
    //                 ->orWhere('position','%'.$keyword.'%')
    //                 ->limit(5)->get();
    //         return response()->json($users);
    // }

     public function searchJobs(Request $request){
            $data = $request ->input('search');

           $searchDatas= DB::table('jobs')->where('title','like','%'.$data.'%')
                            ->orWhere('position','like','%'.$data.'%')
                            ->get();
                            // return view('welcome',compact('searchDatas'));
                            return view('jobs.searchjobshow',compact('searchDatas'));
    }

}

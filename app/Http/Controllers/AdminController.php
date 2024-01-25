<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Post;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware(['admin']);
    }
    public function index(){
        $posts = Post::paginate(20);
        return view('admin.index',compact('posts'));
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request,[
           'title'=>'required|min:3',
           'content'=>'required|min:5',
           'image'=>'required|mimes:png,jpg,jpeg'
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');
            Post::create([
                // 'title'=>$request->get('title'),
                // 'slug'=>str_slug($request->get('title')),
                // 'content'=>$request->get('content'),
                // 'image'=>$path,
                // 'status'=>$request->get('status')

                'title'=>request('title'),
                'slug'=>str_slug(request('title')),
                'content'=>request('content'),
                'image'=>$path,
                'status'=>request('status'),
            ]);
         return redirect('/dashboard')->with('message','Post Created Successfully');

        }

    }


    public function edit($id){
        $post = Post::find($id);
        return view('admin.edit',compact('post'));
    }

    public function update($id,Request $request){
        $this->validate($request,[
           'title'=>'required|min:3',
           'content'=>'required'
        ]);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $path = $file->store('uploads','public');

            Post::where('id',$id)->update([
                'title'=>request('title'),
                'slug'=>str_slug(request('title')),
                'content'=>request('content'),
                'image'=>$path,
                'status'=>request('status'),
            ]);

        }
        $this->updateAllExceptImage($request,$id);

        return redirect('/dashboard')->with('message','Post Upload Successfully');
    }

        public function updateAllExceptImage(Request $request,$id){
         return Post::where('id',$id)->update([
             'title'=>request('title'),
             'content'=>request('content'),
             'status'=>request('status')
         ]);
        }

        public function destroy(Post $post){
            $post->delete();
            return redirect()->back()->with('error','Post deleted Successfully');
        }

        public function trash(){
            $posts = Post::onlyTrashed()->latest()->paginate(20);
          return view('admin.trash',compact('posts'));
        }

        public function restore($id){
          Post::onlyTrashed()->where('id',$id)->restore();
          return redirect('/dashboard')->with('message','Post Restore Successfully');
        }

        public function toggle(Post $post){
         $post->status = !$post->status;
         $post->save();

         return redirect()->back()->with('message','Status Updated Successfully');
        }

        public function postread($id){
            $post = Post::findOrFail($id);
            return view('admin.post_read',compact('post'));
        }

        public function jobs(){
            $jobs = Job::latest()->paginate(10);
            return view('admin.alljob',compact('jobs'));
        }

        public function changeJobStatus($id){
            $job = Job::findOrFail($id);
            $job->status = !$job->status;
            $job->save();
            return redirect()->back()->with('message','Status Changed Successfully');
        }

    }

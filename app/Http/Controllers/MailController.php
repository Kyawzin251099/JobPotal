<?php

namespace App\Http\Controllers;


use App\Mail\SendJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{    public function send(Request $request){

      // Validate request data
      $request->validate([
        'your_name' => 'required|string',
        'your_email' => 'required|email',
        'friend_name' => 'required|string',
        'friend_email' => 'required|email',
        'job_id' => 'required|numeric',
        'job_slug' => 'required|string',
    ]);

     $homeUrl = url('/');     //http://127.0.0.1:8000
     $jobId = $request->get('job_id');
     $jobSlug = $request->get('job_slug');

     $jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

    $data= [
        'your_name' => $request->get('your_name'),
        'your_email' => $request->get('your_email'),
        'friend_name' => $request->get('friend_name'),
        'jobUrl' => $jobUrl,
    ];
 $emailTo = $request->get('friend_email');

       try{
        // Send email using the SendJob Mailable
        Mail::to($emailTo)->send(new SendJob($data));
       // Redirect with success message
        return redirect()->back()->with('message', 'Job sent successfully.'.$emailTo);

       }catch(\Exception $e){
           return redirect()->back()->with('err_message','Failed to send the job.');
       }

    }
}

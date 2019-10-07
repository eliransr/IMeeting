<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Mail\SendEmail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('mail.index');
    }

    public function sendemail(Request $get)
    {
        $this->validate($get,[
            "email"=>"required",
            "subject"=>"required",
            "message"=>"required",
        ]);
            
        $email=$get->email;
        $subject=$get->subject;
        $message=$get->message;

        Mail::to($email)->send(new SendEmail($subject, $message) );
        Session::flash("Successfull");
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $id= Auth::id();
    //     $orgs= Organization::find($id);
    //     return view('topic.create',['orgs' => Organization::where('user_id', $id)->get()]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $topic= new Topic();
    //     $id = Auth::id(); //the idea of the current user
    //     $topic->topic_title = $request->topic_title;
    //     $topic->status = 0;
    //     $topic->meeting_id = $id;
    //     $topic->topic_hour = $request->topic_hour;
    //     $topic->save();
    //     return redirect('task');   
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $orgs= Organization::find($id);
    //     $topic = Topic::findOrFail($id);
    //     return view('topic.edit',['topic'=>$topic,'orgs' => Organization::where('user_id', $id)->get()]);
        
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $topic = Topic::findOrFail($id);            
    //     $topic->update($request->except(['_token'])); 
    //     return redirect('task');    
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     if (Gate::denies('admin')) {
    //         abort(403,"Sorry you are not allowed to create topic");
    //     }
 
    //     $topic = Topic::find($id);
    //     $topic->delete();
    //     return redirect('task');
    // }
    public function done($id)
    {
        //only if this todo belongs to user 
        if (Gate::denies('admin')) {
            abort(403,"You are not allowed to mark topics as done");
         }          
        $topic = Topic::findOrFail($id);            
        $topic->status = 1; 
        $topic->save();
        return redirect('task');    
    }    
}

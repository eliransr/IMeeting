<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Collection;
use App\Topic;
use App\Organization;
use App\User;
use App\Task;
use App\Meeting;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $id= Auth::id();
        $orgs= Organization::find($id);
        return view('topic.create',['orgs' => Organization::where('user_id', $id)->get()]);    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $topic= new Topic();
        $id = Auth::id(); //the idea of the current user
        $topic->topic_title = $request->topic_title;
        $topic->status = 0;
        $topic->meeting_id = $id;
        $topic->topic_hour = $request->topic_hour;
        $topic->save();
        return redirect('task');   
    }

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
    public function edit($id)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $orgs= Organization::find($id);
        $topic = Topic::findOrFail($id);
        return view('topic.edit',['topic'=>$topic,'orgs' => Organization::where('user_id', $id)->get()]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
        $topic = Topic::findOrFail($id);            
        $topic->update($request->except(['_token'])); 
        return redirect('task');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check())
            {
                if (Gate::denies('admin')) 
                {
                    if (Gate::denies('meetingorganizer')) 
                    {
                        abort(403,"Permission Denied");
                    }
                }
            }
 
        $topic = Topic::find($id);
        $topic->delete();
        return redirect('task');
    }
    public function done($id)
    {
        //only if this todo belongs to user 
        if (Auth::check())
        {
            if (Gate::denies('admin')) 
            {
                if (Gate::denies('meetingorganizer')) 
                {
                    abort(403,"Permission Denied");
                }
            }
        }        
        $topic = Topic::findOrFail($id);            
        $topic->status = 1; 
        $topic->save();
        return redirect('task');    
    }    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Topic;
use App\Organization;
use App\User;
use App\Task;
use App\Meeting;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::id();
        $meetingid = DB::table('meetings')->where('id',$id)->first();
        $met = $meetingid->id;
        $task = Meeting::find($id);
        $user = User::find($id);
        $tasks = Task::find($id);
        $topics = Topic::find($id);
        $orgs= Organization::find($id);
        return view('task.index',['users' => User::all(),'tasks'=> Task::all(),'topics'=> Topic::all(),'orgs' => Organization::where('user_id', $id)->get()]);
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
        return view('task.create',['orgs' => Organization::where('user_id', $id)->get()]);
    }

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
        $task = new Task();
        $id = Auth::id(); //the idea of the current user
        $task->title = $request->title;
        $task->status = 0;
        $task->name = $request->name;
        $task->user_id = $id;
        $task->due_date = $request->due_date;
        $task->meeting_id = $id;
        $task->save();
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
        $task = Task::findOrFail($id);
        return view('task.edit',['task'=>$task,'orgs' => Organization::where('user_id', $id)->get()]);
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
        $task = Task::findOrFail($id);            
        $task->update($request->except(['_token'])); 
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
        if (Gate::denies('admin')) {
            abort(403,"Sorry you are not allowed to create tasks!");
        }
 
        $task = Task::find($id);
        $task->delete();
        return redirect('task');
    }
    public function doneTask($id)
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
        $task = Task::findOrFail($id);            
        $task->status = 1; 
        $task->save();
        return redirect('task');    
    }    
}

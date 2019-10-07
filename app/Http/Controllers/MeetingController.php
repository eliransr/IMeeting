<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Meeting;
use App\Topic;
use App\Organization;
use App\Participant;
use App\User;
use App\Task;
class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id= Auth::id();
        $user = User::find($id);
        $participant = $user-> participants;
        $meeting = Meeting::all();
        $orgs= Organization::find($id);
        return view('meetings.index',['users' => User::all(),'meetings'=>$meeting,'orgs' => Organization::where('user_id', $id)->get()]);
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
                if (Gate::denies('admin')) {
                    if (Gate::denies('meetingorganizer')) {
                        abort(403,"Permission Denied");
                   }
            }
            return view ('meetings.create', ['organization'=>Auth::user()->organization, 'users'=>User::all()]);
            }
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
        $meeting = new Meeting();
        $id = Auth::id();
        $meeting->title = $request->name;
        $meeting->user_id = $id;
        $meeting->date = $request->date;
        $meeting->hour = $request->hour;
        $meeting->participants=$request->participants;
        $meeting->save();
        
        $mid = $meeting->id;
        $topic_title = $request->input('topic_title');
        $topic_hour = $request->input('topic_hour');
        for ($i=0; $i <count($topic_title) ; $i++) { 
            $topic = new Topic();
            $topic->topic_title = $topic_title[$i];
            $topic->topic_hour = $topic_hour[$i];
            $topic->meeting_id = $mid;
            $topic->save();
        }
        

        
        $participant = new Participant();
        $participant->user_id = $request->participants;
        $participant->meeting_id = $mid;
        $participant->save();
        
        return redirect('meetings');

        
       
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
        $meeting = Meeting::find($id);
        return view('meetings.edit',['meeting'=>$meeting,'orgs' => Organization::where('user_id', $id)->get()]);

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
        $meeting = Meeting::find($id);
        $meeting ->update($request->all());    
        return redirect('meetings');
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
        $meeting = Meeting::find($id);
            $meeting ->delete();
        
        $meeting_id = $id;
        $topic = Topic::where('meeting_id',$id);
            $topic ->delete();
        $participant = Participant::where('meeting_id',$id);
            $participant ->delete(); 
        
        return redirect('meetings');
    }
}

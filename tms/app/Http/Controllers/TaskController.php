<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use File;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Tasks::all();
        return view('task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee_name = Employees::all();
        return view('task.create',compact('employee_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id'=>'required|numeric|exists:users,id',
            'title'=>'required|string|min:3|max:500',
            'description'=>'required|string|min:10',
            'file' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5242880',  //5MB = 5242880 KB
            'voice' => 'nullable|mimes:audio/mpeg,mp3,wav,3g,acc',
            'creator_id' => 'numeric'
        ]);
        

        $task = new Tasks();
        $task->employee_id = $request->employee_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->voice = $request->voice;
        $task->status = $request->status;

        if($request->hasFile('file')){
            $imgName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/uploads/files/'),$imgName);
            $task->file = 'storage/uploads/files/'.$imgName;
        }

        if($request->hasFile('voice')){
            $voiceName = time().'.'.$request->file('voice')->getClientOriginalName();
            $request->file('voice')->move(public_path('storage/uploads/voice/'),$voiceName);
            $task->voice = 'storage/uploads/voice/'.$voiceName;
        }
       
       
        $admin = Auth::User();
        $task->creator_id = $admin->id;
        
        $task->save();
        return redirect(route('task'))->with('success','Task Added Successfuly');

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
        $employee_name = Employees::all();
        $task = Tasks::find($id);
        return view('task.edit',compact('task','employee_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $request->validate([
            'employee_id'=>'required|numeric|exists:users,id',
            'title'=>'required|string|min:3|max:500',
            'description'=>'required|string|min:10',
            'file' =>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5242880',  //5MB = 5242880 KB
            'voice' => 'nullable|mimes:audio/mpeg,mp3,wav,3g,acc',
            'creator_id' => 'numeric'
        ]);

        $task = Tasks::find($id);

        $task->employee_id = $request->employee_id;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->voice = $request->voice;
        $task->status = $request->status;

        if($request->hasFile('file')){
            $imgName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('storage/uploads/files/'),$imgName);
            $task->file = 'storage/uploads/files/'.$imgName;
        }

        if($request->hasFile('voice')){
            $voiceName = time().'.'.$request->file('voice')->getClientOriginalName();
            $request->file('voice')->move(public_path('storage/uploads/voice/'),$voiceName);
            $task->voice = 'storage/uploads/voice/'.$voiceName;
        }

        $admin = Auth::User();
        $task->creator_id = $admin->id;
        
        $task->update();

        return redirect(route('task'))->with('success','Task Editted Successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $task)
    {
        $task->delete();
        if($task->file){
        unlink($task->file);
        }

        if($task->voice){
            unlink($task->voice);
            }
        return back()->with('success','Task Deleted Successfully');
    }
}

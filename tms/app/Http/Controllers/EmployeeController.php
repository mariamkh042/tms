<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = Employees::all();
        $data = User::all();
        return view('admin.index',compact('employee','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create')->with('success','Created Successfully');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type'=>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = Employees::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' =>$request->type,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('employee'))->with('success','User Added Successfuly');

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
        $employee = Employees::find($id);  
        return view('employee.edit',compact('employee'));

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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'type'=>['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'type' =>$request->type,
            'password' => Hash::make($request->password),
        ];

        Employees::where('id', $id)->update($update);
        return redirect()->route('employee')->with('success','Employee Editted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Employees::find($id);
        $user->delete();
        return back()->with('success',"Employee Deleted Succcessfuly");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProjectUser;

class ProjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectUsers=ProjectUser::all();
        return view('display')->with('projectUsers',$projectUsers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectUser = new ProjectUser();
        $projectUser->name = $request->name;
        $projectUser->age=$request->age;
        $projectUser->email=$request->email;
        $projectUser->password=$request->password;
        $projectUser->save();
        return redirect()->route('display')->with(ProjectUser::all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projectUser = ProjectUser::find($id);
        return view('show')->with('projectUser',$projectUser);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectUser = ProjectUser::find($id);

        return view('edit')->with('projectUser',$projectUser);
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
        $projectUser = ProjectUser::find($id);
        $projectUser->name=$request->name;
        $projectUser->age=$request->age;
        $projectUser->email=$request->email;
        $projectUser->save();
        return redirect()->route('display');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectUser=ProjectUser::find($id);
        $projectUser->delete();
        return redirect()->route('display');
    }
}

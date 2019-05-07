<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('user')->orderBy('id','DESC')->paginate(2);
        return view('pages.role.show')->with('roles',$roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request,[
            'name' => 'required|max:200',
            'description' => 'required|max:200',
        ]);

        $role = new Role;
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->user_id = auth()->user()->id;
        $role->save();

        return redirect('role')->with('success','Role Created successfully');
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
        $role = Role::find($id);
        return view('pages.role.edit')->with('role',$role);
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
        $this->validate( $request,[
            'name' => 'required|max:200',
            'description' => 'required|max:200',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->description = $request->input('description');
        $role->user_id = auth()->user()->id;
        $role->save();

        return redirect('role')->with('success','Role Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect('role')->with('success','Role Delete successfully');
    }
}

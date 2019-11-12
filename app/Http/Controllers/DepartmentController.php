<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller
{
     private $departments = "ord_departments";
    private $users = "ord_users";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $departments = Department::with('user')->orderBy('id','DESC')->paginate(2);
        $departments = DB::table($this->departments)
        ->join($this->users, $this->departments. '.user_id', '=', $this->users.'.id')
        ->select($this->departments.'.*', $this->users.'.name')
        ->orderBy($this->departments.'.created_at','desc')
        ->paginate(5);
        return view('pages.department.show')->with('departments', $departments);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {			
        return view('pages.department.create');
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

        $department = new Department;
        $department->dept_name = $request->input('name');
        $department->description = $request->input('description');
        $department->user_id = auth()->user()->id;
        $department->save();

        return redirect('department')->with('success','Department Created successfully');
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
        $department = Department::find($id);
        return view('pages.department.edit')->with('department',$department);
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

        $department = Department::find($id);
        $department->dept_name = $request->input('name');
        $department->description = $request->input('description');
        $department->user_id = auth()->user()->id;
        $department->save();

        return redirect('department')->with('success','Department Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $department = Department::find($id);
        $department->delete();

        return redirect('department')->with('success','Department Delete successfully');
    }
}

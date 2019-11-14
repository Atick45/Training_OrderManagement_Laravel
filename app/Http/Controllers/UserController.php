<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Role;
use App\Department;


class UserController extends Controller
{
     private $departments = "ord_departments";
      private $roles = "ord_roles";
     private $users = "ord_users";
    /**
     * Display a listing of the resource.
     *id, name, email, password, remember_token, created_at, updated_at, role_id, dept_id, picture
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::with(['role','department'])->orderBy('id','DESC')->paginate(2);
       // dd($users);
        $users = DB::table($this->users)
            ->join($this->roles, $this->users. '.role_id', '=', $this->roles.'.id')
            ->join($this->departments, $this->users.'.dept_id', '=', $this->departments.'.id')
            ->select($this->users.'.*', $this->roles.'.role_name', $this->departments.'.dept_name')
            ->orderBy($this->users.'.created_at','desc')
            ->paginate(5);
        return view('pages.user.show')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {	
	    //departments also Created
		$data = [
			'roles' => Role::pluck('role_name','id'),
			'departments' => Department::pluck('dept_name','id'),
		];
		//end of departments
		
        return view('pages.user.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *id, name, email, password, remember_token, created_at, updated_at, role_id, dept_id, picture
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:ord_users',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|numeric|max:99',
            'department_id' => 'required|numeric|max:99',
            'image' => 'image|nullable|max:1900'
        ]);


          //Handle File Upload
        if($request->hasFile('image')){
            //Get filname with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            Input::file('image')->move('uploads/users', $fileNameToStore);
        } else {
            $fileNameToStore = 'nomiage.jpg';
        }
        
        DB::table($this->users)->insert(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role_id' => $request->input('role_id'),
                'dept_id' => $request->input('department_id'),
                'picture' => $fileNameToStore,
                'created_at' => DB::raw('now()')
            ]
        );      
          return redirect('/user')->with('success', 'User Added Successfull'); 
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
       $user = User::find($id);
       $data = [
            'user' => User::find($id),
            'roles' => Role::pluck('role_name','id'),
            'departments' => Department::pluck('dept_name','id'),
        ];
        return view('pages.user.edit')->with($data);
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required|numeric|max:99',
            'department_id' => 'required|numeric|max:99',
            'image' => 'image|nullable|max:1900'
        ]);


          //Handle File Uploadid, name, email, password, remember_token, created_at, updated_at, role_id, dept_id, picture
        if($request->hasFile('image')){
            //Get filname with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            Input::file('image')->move('uploads/users', $fileNameToStore);

            DB::table($this->users)->where('id', $id)->update(
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'role_id' => $request->input('role_id'),
                    'dept_id' => $request->input('department_id'),
                    'picture' => $fileNameToStore,
                    'updated_at' => DB::raw('now()')

                ]
            );

        } else {
            DB::table($this->users)->where('id', $id)->update(
                [
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'role_id' => $request->input('role_id'),
                    'dept_id' => $request->input('department_id'),
                    'picture' => $fileNameToStore,
                    'updated_at' => DB::raw('now()')
                ]
            );
        }

        return redirect('/user')->with('success', 'User Update Successfull'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('user')->with('success','User Delete successfully');
    }
}

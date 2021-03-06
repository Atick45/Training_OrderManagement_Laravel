<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Producttype;

class ProducttypeController extends Controller
{
    private $producttypes = "ord_producttypes";
    private $users = "ord_users";
    /**
     * Display a listing of the resource.
     *ptype_name
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $producttypes = Producttype::with('user')->orderBy('id','DESC')->paginate(2);

     $producttypes = DB::table($this->producttypes)
        ->join($this->users, $this->producttypes. '.user_id', '=', $this->users.'.id')
        ->select($this->producttypes.'.*', $this->users.'.name')
        ->orderBy($this->producttypes.'.created_at','desc')
        ->paginate(5);

        return view('pages.producttype.show')->with('producttypes',$producttypes);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.producttype.create');
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

        $producttype = new Producttype;
        $producttype->ptype_name = $request->input('name');
        $producttype->description = $request->input('description');
        $producttype->user_id = auth()->user()->id;
        $producttype->save();

        return redirect('producttype')->with('success','Producttype Created successfully');
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
        $producttype = Producttype::find($id);
        return view('pages.producttype.edit')->with('producttype',$producttype);
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

        $producttype = Producttype::find($id);
        $producttype->ptype_name = $request->input('name');
        $producttype->description = $request->input('description');
        $producttype->user_id = auth()->user()->id;
        $producttype->save();

        return redirect('producttype')->with('success','Producttype Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producttype = Producttype::find($id);
        $producttype->delete();

        return redirect('producttype')->with('success','Producttype Delete successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Uom;
class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uoms = Uom::with('user')->orderBy('id','DESC')->paginate(2);
        return view('pages.uom.show')->with('uoms',$uoms);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.uom.create');
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

        $uom = new Uom;
        $uom->name = $request->input('name');
        $uom->description = $request->input('description');
        $uom->user_id = auth()->user()->id;
        $uom->save();

        return redirect('uom')->with('success','Uom Created successfully');
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
        $uom = Uom::find($id);
        return view('pages.uom.edit')->with('uom',$uom);
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

        $uom = Uom::find($id);
        $uom->name = $request->input('name');
        $uom->description = $request->input('description');
        $uom->user_id = auth()->user()->id;
        $uom->save();

        return redirect('uom')->with('success','Uom Update successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uom = Uom::find($id);
        $uom->delete();

        return redirect('uom')->with('success','Unit Of Measurement Delete successfully');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Supplier;
class SupplierController extends Controller
{
    private $suppliers = "ord_suppliers";
    private $users = "ord_users";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $suppliers = Supplier::with('user')->orderBy('id','DESC')->paginate(2);
        
        $suppliers = DB::table($this->suppliers)
        ->join($this->users, $this->suppliers. '.user_id', '=', $this->users.'.id')
        ->select($this->suppliers.'.*', $this->users.'.name')
        ->orderBy($this->suppliers.'.created_at','desc')
        ->paginate(5); 
        return view('pages.supplier.show')->with('suppliers',$suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("pages.supplier.create");
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

        $supplier = new Supplier;
        $supplier->supp_name = $request->input('name');
        $supplier->description = $request->input('description');
        $supplier->user_id = auth()->user()->id;
        $supplier->save();

        return redirect('supplier')->with('success','Supplier Created successfully');
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
        $supplier = Supplier::find($id);
        return view('pages.supplier.edit')->with('supplier',$supplier);
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

        $supplier = Supplier::find($id);
        $supplier->supp_name = $request->input('name');
        $supplier->description = $request->input('description');
        $supplier->user_id = auth()->user()->id;
        $supplier->save();

        return redirect('supplier')->with('success','Supplier Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('supplier')->with('success','Supplier Delete successfully');
    }
}

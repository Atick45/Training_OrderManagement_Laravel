<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\Uom;
use App\Producttype;

class ProductController extends Controller
{
     private $producttypes = "ord_producttypes";
    private $uoms = "ord_uoms";
    private $products = "ord_products";
    /**
     * Display a listing of the resource

     id, name, description, picture, ord_uom_id, ord_producttype_id, user_id, created_at, updated_at
     *id, name, description, picture, uom_id, producttype_id, user_id, created_at, updated_at
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::with(['uom','producttype'])->orderBy('id','DESC')->paginate(10);
       // dd($users);

        $products = DB::table($this->products)
        ->join($this->producttypes, $this->products. '.producttype_id', '=', $this->producttypes.'.id')
        ->join($this->uoms, $this->products. '.uom_id', '=', $this->uoms.'.id')
        ->select($this->products.'.*', $this->producttypes.'.ptype_name', $this->uoms.'.uom_name')
        ->orderBy($this->products.'.created_at','desc')
        ->paginate(5);

        return view('pages.product.show')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'uoms' => Uom::pluck('uom_name','id'),
            'producttypes' => Producttype::pluck('ptype_name','id'),
        ];
        //end of departments
        
        return view('pages.product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'image|nullable|max:1900',
            'uom_id' => 'required|numeric|max:99',
            'producttype_id' => 'required|numeric|max:99'
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
            Input::file('image')->move('uploads/products', $fileNameToStore);
        } else {
            $fileNameToStore = 'nomiage.jpg';
        }
        
        //Create Product
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->uom_id = $request->input('uom_id');
        $product->producttype_id = $request->input('producttype_id');
        $product->picture = $fileNameToStore;
        $product->user_id = auth()->user()->id;
        $product->save();
        return redirect('/product')->with('success', 'Product Added Successfull'); 
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
        $product = Product::find($id);
       $data = [
            'product' => Product::find($id),
            'uoms' => Uom::pluck('uom_name','id'),
            'producttypes' => Producttype::pluck('ptype_name','id'),
        ];
        return view('pages.product.edit')->with($data);
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
            'description' => 'required|string|max:500',
            'image' => 'image|nullable|max:1900',
            'uom_id' => 'required|numeric|max:99',
            'producttype_id' => 'required|numeric|max:99'
            
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
        
        //Create Product
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->uom_id = $request->input('uom_id');
        $product->producttype_id = $request->input('producttype_id');
        $product->picture = $fileNameToStore;
        $product->update();
        return redirect('/product')->with('success', 'Product Update Successfull'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $product = Product::find($id);
        $product->delete();

        return redirect('product')->with('success','Product Delete successfully');
    }
}

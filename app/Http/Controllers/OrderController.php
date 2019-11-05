<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Uom;
use App\Producttype;
use App\Supplier;
use App\Order;
use App\OrderDetails;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'products' => Product::pluck('name','id'),
            'uoms' => Uom::pluck('name','id'),
        ];
        //dd($data);
        return view('pages.order.order_create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate( $request, [
            'product' => 'required|numeric|max:200',
            'qty' => 'required|numeric|max:9999',
            'uom' => 'required|numeric|max:9999',
            'price' => 'required|numeric|max:999999',
        ]);

		$item_id = $request->input('product');
		$uom_id = $request->input('uom');
        $item = Product::where('id',$item_id)->first();
        $uom = Uom::where('id',$uom_id)->first();

        Cart::add([
            [
            'id' => $item_id, 
            'name' => $item->name, 
            'qty' => $request->input('qty'), 
            'price' => $request->input('price'), 
            'options' => [
                'uom_id' => $uom->id,
                'uom' => $uom->name,
                ]
            ],
        ]);
        //dd(Cart::content());
		return back()->with('success', 'Select cart Added successfully');
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
    public function edit($rowId)
    {
        $data = [
            'products' => Product::pluck('name','id'),
            'uoms' => Uom::pluck('name','id'),
            'CartRow' => Cart::get($rowId),
        ];
        return view('pages.order.edit_view')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $this->validate( $request, [
            'product' => 'required|numeric|max:200',
            'qty' => 'required|numeric|max:9999',
            'uom' => 'required|numeric|max:9999',
            'price' => 'required|numeric|max:999999',
        ]);

		$item_id = $request->input('product');
		$uom_id = $request->input('uom');
        $item = Product::where('id',$item_id)->first();
        $uom = Uom::where('id',$uom_id)->first();

		Cart::update($rowId, [
            'id' => $item_id, 
            'name' => $item->name, 
            'qty' => $request->input('qty'), 
            'price' => $request->input('price'), 
            'options' => [
                'uom_id' => $uom->id,
                'uom' => $uom->name,
            ]
		]);
		
		return redirect('order/create')->with('success', 'Select cart updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect('order/create')->with('success', 'Romove Item form the cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function order_clear()
    {
        Cart::destroy();
        return back()->with('success', 'Cart clear successfully');
    }


    // checkout method
    public function checkout()
    {
        $data = [
            'suppliers' => Supplier::pluck('name','id'),
        ];
        return view('pages.order.checkout')->with($data);
    }

    // checkout method
    public function checkout_save(Request $request)
    {
        $this->validate( $request, [
            'customer' => 'required|numeric|max:199',
            'reference' => 'required|max:9999',
            'remarks' => 'required|max:999999',
        ]);
        
        //id, suppliers_id, user_id, reference, total, remarks, created_at, updated_at
        $order = new Order;
        $order->suppliers_id = $request->input('customer');
        $order->user_id = auth()->user()->id;
        $order->reference = $request->input('reference');
        $order->total = Cart::total('00', '.', '');
        $order->remarks = $request->input('remarks');
        $order->save();
        $invId = $order->id;
        
        foreach(Cart::content() as $content ){
            //id, order_id, product_id, uom_id, qty, price,
            $orderDetails = new OrderDetails;
            $orderDetails->order_id = $invId;
            $orderDetails->product_id = $content->id;
            $orderDetails->uom_id = $content->options->uom_id;
            $orderDetails->qty = $content->qty;
            $orderDetails->price = $content->price;
            $orderDetails->save();
		}
		Cart::destroy();
        return redirect('order/create')->with('success', 'Order saved successfully');
    }



}

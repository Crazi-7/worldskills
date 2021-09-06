<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Order;
use App\Models\order_product;
use App\models\Product;
use App\models\Customer;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $orders = Order::all();
         dd($orders);
        return view('orders-placed')->with('orders', $orders);    
    }


    public function order()
    {
        //$orders = Order::all();
         $products = Product::all();
        
        return view('order')->with('products', $products);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                
        // $request -> validate([

        //     'product[]' => 'required',
        //     'local' => '',
        //     'pickup' => 'required',            
        //     'address' => '',            
        //     'number' => 'required',
        //     'city' => 'required',

        // ]);
        $newaddress = $request->address . ', ' . $request->number . ', ' . $request->city;
        
        $order = new Order;
        $order->home = $request->local;
        $order->address = $newaddress;
        $order->pickup = $request->time;
        $order->cid = 1; //placerholder
        $order->value = 50.0; //placeholder        
        $order->save();
        $i=0;


        foreach ($request->quantity as $qtt)
        {
            if (isset($qtt)) {
                $op = new order_product;
                $op->oid = $order->id;
                $op->qtt = $qtt;
                $op->pid = $request->product[$i];
                $i++;
                $op->save();
        }}
        return redirect('/orders');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

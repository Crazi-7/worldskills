<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Order;
use App\models\Product;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$orders = Order::all();
         $products = Product::all();
       
        return view('layouts.order')->with('products', $products);    
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
        $order->pickup = $request->pickup;
        $order->cid = 1; //placerholder
        $order->value = 50; //placeholder        

        $order->save();
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

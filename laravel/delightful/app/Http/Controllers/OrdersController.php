<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;
use App\models\Order;
use App\Models\order_product;
use App\models\Product;
use App\models\Customer;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $orders = Order::with('user')->get();
        return view('orders-placed')->with('orders', $orders);    
    }


    public function place_order()
    {
        //$orders = Order::all();
        $products = Product::all();

        return view('order')->with(compact('products'));    
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
        $order->cid = Auth::id();  
        $order->value = 0.0; //placeholder      
        $order->save();
        
        $i=0;
        $totalPrice = 0;
        
        foreach ($request->quantity as $qtt)
        {
            if (isset($qtt)) {
                $op = new order_product;
                $op->oid = $order->id;
                $op->qtt = $qtt;
                $op->pid = $request->product[$i];
                $totalPrice += $qtt * $this->getPriceById($request->product[$i]);
                $i++;
                $op->save();
            }

        }        

        Order::where('id', $order->id)->update(['value' => $totalPrice]);

        return redirect('/historic');
    }

    private function getPriceById($id)
    {
        return Product::find($id)->price;
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        $orders = Order::all()->where('cid', Auth::id());        
        
        return view('historic')->with(compact('orders'));          
    }




    public function show($id)
    {
        $order = Order::with('products')->find($id);
        $products = $order->products;
        $fee = Config::find(1)->tax;
        return view('order-details')->with(compact('order', 'products', 'fee'));
         
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
        Order::where('id', $id)->update(['status' => $request->status]);
        return redirect()->back();
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

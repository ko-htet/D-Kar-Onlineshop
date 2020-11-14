<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $pending_orders = Order::where('status', 0)->get();
        $confirm_orders = Order::where('status', 1)->get();
        $cancel_orders = Order::where('status', 2)->get();
        $delivery_orders = Order::where('status', 3)->get();
        return view('order.index', compact('pending_orders', 'confirm_orders', 'cancel_orders', 'delivery_orders'));
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
        // dd($request)

        // validation

        // data store
        $myorder = json_decode($request->order);
        $notes = $request->notes;
        $orderdate = date('Y-m-d');
        $totalamount = 0;
        
        foreach ($myorder as $row)
        {
            $totalamount += $row->price * $row->qty;
        }
        $order = new Order;
        $order->orderno = uniqid();
        $order->orderdate = $orderdate;
        $order->totalamount = $totalamount;
        $order->notes = $notes;
        $order->user_id = Auth::id(); // current logined user
        $order->save();

        foreach ($myorder as $row)
        {
            $order->items()->attach($row->id, ['quantity'=>$row->qty]);
        }

        // return 'Successful Your Order.';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function datesearch(Request $request)
    {
        $dates = Order::where('order_date','>=',$request->from)
                ->where('order_date','<=',$request->to)
                ->get();

        dd($dates); 
        // $pending_orders = Order::where('status', 0)->get();
        // $confirm_orders = Order::where('status', 1)->get();
        // $cancel_orders = Order::where('status', 2)->get();
        // $delivery_orders = Order::where('status', 3)->get();
        // return view('order.index', compact('pending_orders', 'confirm_orders', 'cancel_orders', 'delivery_orders'));
    }

    public function confirm($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();
        return back();
    }

    public function cancel($id)
    {
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        return back();
    }

    public function delivery($id)
    {
        $order = Order::find($id);
        $order->status = 3;
        $order->save();
        return back();
    }
}

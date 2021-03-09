<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $order = Order::create([
            'products' => $request->products,
            'cart_total' => $request->cart_total,
            'delivery_method' => $request->delivery_method,
            'delivery_price' => $request->delivery_price,
            'payment_method' => $request->payment_method,
            'cashback' => $request->cashback,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'street' => $request->street,
            'building' => $request->building,
            'flat' => $request->flat,
            'entrance' => $request->entrance,
            'floor' => $request->floor,
            'code' => $request->code,
            'comment' => $request->comment,
            'status_id' => 1
        ]);
        $order->save();

        return response($order->id, Response::HTTP_CREATED);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

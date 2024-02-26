<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ShopController;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $order = Order::all()->where('user_id','=',"{$userId}");
        $allDone = false;
        foreach($order as $item){
            if($item->status == "done"){
                $allDone = true;
            }else{
                $allDone = false;
                break;
            }
        }
        if(Count($order) == 0 ||  $allDone == true)
        {
            return redirect()->route('home');
        }else{
            $i = 0;
            foreach($order as $item){
                if($item->status != "done"){
                    $order_detail[$i] = DB::table('order_details')
                    ->join('products', 'products.id', '=', 'order_details.product_id')
                    ->join('orders', 'orders.id', '=', 'order_details.order_id')
                    ->select('order_details.*', 'products.name', 'products.img', 'products.saleprice', 'orders.*')
                    ->where('order_id','=',"{$item->id}")
                    ->get();
                    $i ++;
                }
            }
            return view("order-status", compact("order_detail"));
        }
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Cart::clear();
        foreach($request->order_id as $key=>$order_id){
            $order_detail = new OrderDetail;
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $request->product_id[$key];
            $order_detail->Quantity = $request->quantity[$key];
            $order_detail->price_total = $request->price_total[$key];
            $order_detail->created_at = $request->created_at[$key];
            $order_detail->save();
        }
        // return view('/test', compact('product'));
        return redirect()->action([OrderDetailController::class,'index']);
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
        $order = Order::findOrFail($id);
        $order->status = "done";
        $order->save();
        return redirect()->action([OrderDetailController::class,'index']);
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

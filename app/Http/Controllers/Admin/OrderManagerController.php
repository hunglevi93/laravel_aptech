<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class OrderManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view("admin/orders/list",compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        $search = $request->input('search');
        $order = Order::query()
        ->where('id', 'LIKE', "%{$search}")
        ->orWhere('phone_number','LIKE', "%{$search}%")       
        ->orWhere('user_id','LIKE', "%{$search}%")       
        ->orWhere('adress','LIKE', "%{$search}%")       
        ->orWhere('status','LIKE', "%{$search}%")       
        ->orWhere('Name','LIKE', "%{$search}%") 
        ->orWhere('email','LIKE', "%{$search}%") 
        ->orWhere('created_at','LIKE', "%{$search}%")
        ->get();
        return view("admin/orders/list",compact('order'));      
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
        if($order->status == "Processing"){
            $order->status = "Delivering";
            $order->save();
            $order_detail = OrderDetail::query()
            ->where("order_id","=","$id")
            ->get();
            foreach($order_detail as $value){
                $product[$value->id] = Products::query()
                ->where("id","=","$value->product_id")
                ->get();
                $product[$value->id][0]->quantity -= $value->Quantity;
                $product[$value->id][0]->save();
            }
        }
        // return view("test", compact('product'));

            return redirect()->action([OrderManagerController::class,'index']);
        
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
        $order = Order::Find($id);
        $order->delete();
        return redirect()->action([OrderManagerController::class,'index']);
    }
}

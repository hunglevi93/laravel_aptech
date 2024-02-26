<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class RevenueManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annual_revenue = 0;
        $month = 1;
        while ($month <= 12) {
            $monthly_revenue[$month] = 0;
            if ($month < 10) {
                $number_orders[$month] = Order::query()
                ->where('updated_at', 'LIKE', "%-0{$month}-%")
                ->where('status','=','done')
                ->count();
                $monthly_orders[$month] = Order::query()
                ->where('updated_at', 'LIKE', "%-0{$month}-%")
                ->where('status','=','done')
                ->get();
            } else {
                $number_orders[$month] = Order::query()
                ->where('updated_at', 'LIKE', "%-{$month}-%")
                ->count();
                $monthly_orders[$month] = Order::query()
                ->where('updated_at', 'LIKE', "%-{$month}-%")
                ->where('status','=','done')
                ->get();
            }
            foreach($monthly_orders[$month] as $item){
                $monthly_revenue[$month] += $item->total_price;
            }
            $annual_revenue += $monthly_revenue[$month];
            $month++;
        }
        return view("admin/revenue/index", compact( 'number_orders','monthly_revenue','annual_revenue'));
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
        $monthly_revenue = 0;
        if($id < 10){
            $order = Order::query()
            ->where('updated_at', 'LIKE', "%-0{$id}-%")
            ->where('status','=','done')
            ->get();
        }
        else{
            $order = Order::query()
            ->where('updated_at', 'LIKE', "%-{$id}-%")
            ->where('status','=','done')
            ->get();
        }
        foreach($order as $item){
            $monthly_revenue += $item->total_price;
        }
        return view('admin/revenue/detail', compact('order','monthly_revenue'));
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

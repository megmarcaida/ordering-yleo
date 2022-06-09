<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_details;
use Carbon\Carbon;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        //dashboard
        $orders = orders::where("enabled",1)->cursorPaginate(10);

        return view('orders.admin.order', ['orders' => $orders]);
    }

    public function dashboard(Request $request)
    {
        //dashboard
        $orders = orders::where("enabled",1)->get();

        return view('dashboard', ['orders' => $orders]);
    }

    public function orderForm(Request $request)
    {
        $message = "";

        if($request->post()){

            $order = new orders();
            $order->customer_member_id  = $request->post('member_id');
            $order->customer_name       = $request->post('member_name');
            $order->customer_pin        = $request->post('member_pin');
            $order->order_type          = $request->post('order_type');
            $order->payment_method      = $request->post('order_type') == "Points" ? "" : $request->post('payment_method');
            $order->last_four_digit     = $request->post('payment_method') == "card_on_file" ? $request->post('last_four_digit') : "";
            $order->queue_number        = $request->post('queue_number');
            $order->total_pv            = $request->post('total_pv');
            $order->total_price         = $request->post('total_price');
            $order->status              = 1;
            $order->enabled             = 1;
            $order->date                = Carbon::now();
            $order->save();


            $order_id = $order->id;
            foreach($request->post('product_id') as $key => $val){
                if(!empty($request->post('product_id')[$key])){
                    $order_details = new order_details();
                    $order_details->order_id = $order_id;
                    $order_details->product_id = $request->post('product_id')[$key];
                    $order_details->qty_ordered = $request->post('product_qty')[$key];
                    $order_details->price = !empty($request->post('product_unit_price')[$key]) ? $request->post('product_qty')[$key] * $request->post('product_unit_price')[$key] : 0;
                    $order_details->pv = !empty($request->post('product_pv')[$key]) ? $request->post('product_qty')[$key] * $request->post('product_pv')[$key] : 0;
                    $order_details->save();
                }
            }

            $message = "Thank you! Please wait your queuebee to be called";

        }

        return view('orders.order-form', ["message" => $message]);
    }

    public function pickUpForm(Request $request)
    {
        //$orders = orders::where("enabled",1)->cursorPaginate(10);

        return view('orders.pick-up-form');
    }


}

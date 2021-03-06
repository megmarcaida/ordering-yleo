<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\orders;
use App\Models\products;
use App\Models\order_details;
use App\Models\pickup_orders;
use App\Models\pickup_order_details;
use App\Models\enrollments;
use Carbon\Carbon;
use Auth;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        //orders

        $location = $request->get('location');
        
        if(isset($location))
            $orders = orders::where("enabled",1)->where("experience_center",$location)->where("queue_number","like","%".$request->input('q')."%")->orderBy('status','desc')->paginate(10);
        else
            $orders = orders::where("enabled",1)->where("queue_number","like","%".$request->input('q')."%")->orderBy('status','desc')->paginate(10);
        
        
        

        return view('orders.admin.order', ['orders' => $orders]);
    }

    public function indexPickUp(Request $request)
    {
        //dashboard
        $location = $request->get('location');
        if(isset($location))
            $orders = pickup_orders::where("enabled",1)->where("experience_center",$location)->where("queue_number","like","%".$request->input('q')."%")->orderBy('status','desc')->paginate(10);
        else
            $orders = pickup_orders::where("enabled",1)->where("queue_number","like","%".$request->input('q')."%")->orderBy('status','desc')->paginate(10);
            

        return view('orders.admin.pickup-order', ['orders' => $orders]);
    }

    public function dashboard(Request $request)
    {
        //dashboard

        $select = "";
        switch(Auth::user()['role_id']){
            case 1:
                $select = "";
                break;
            case 2:
                $select = "davao";
                break;
            case 3:
                $select = "manila";
                break;
        }


        $orders = DB::table('orders')->select('queue_number','experience_center')->where("status",1)->where('experience_center','like','%'.$select.'%')->groupBy('queue_number','experience_center')->get();//orders::where("status",1)->groupBy('queue_number')->get();
        $pickup_orders = DB::table('pickup_orders')->select('queue_number','id','experience_center')->where("status",1)->where('experience_center','like','%'.$select.'%')->groupBy('experience_center','queue_number','id')->get(); //pickup_orders::where("status",1)->groupBy('queue_number')->get();
        $enrollments = DB::table('enrollments')->select('queue_number','id','experience_center')->where("status",1)->where('experience_center','like','%'.$select.'%')->groupBy('experience_center','queue_number','id')->get();

        return view('dashboard', ['orders' => $orders,'pickup_orders' => $pickup_orders, 'enrollments' => $enrollments]);
    }

    public function orderForm(Request $request)
    {
        $message = "";
        $date = Carbon::now();
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
            $order->experience_center   = $request->post('experience_center');
            $order->date                = $request->post('date');
            $order->total_price         = $request->post('total_price');
            $order->current_page        = $request->post('current_page');
            $order->total_page          = $request->post('total_page');
            $order->status              = 1;
            $order->enabled             = 1;
            $order->save();


            $order_id = $order->id;
            $total_qty = 0;
            foreach($request->post('product_id') as $key => $val){
                if(!empty($request->post('product_id')[$key])){
                    $total_qty += $request->post('product_qty')[$key];
                    $order_details = new order_details();
                    $order_details->order_id = $order_id;
                    $order_details->product_id = $request->post('product_id')[$key];
                    $order_details->qty_ordered = $request->post('product_qty')[$key];
                    $order_details->price = !empty($request->post('product_unit_price')[$key]) ? $request->post('product_qty')[$key] * $request->post('product_unit_price')[$key] : 0;
                    $order_details->pv = !empty($request->post('product_pv')[$key]) ? $request->post('product_qty')[$key] * $request->post('product_pv')[$key] : 0;
                    $order_details->save();
                }
            }

            $order->total_qty             = $total_qty;
            $order->save();

            $message = "Thank you! Please wait your queuebee to be called";

        }

        return view('orders.order-form', ["message" => $message,"date" => $date->format('Y-m-d')]);
    }

    public function completeForm($id,$ec)
    {
        //complete order
        $select = "";
        switch(Auth::user()['role_id']){
            case 1:
                $select = "";
                break;
            case 2:
                $select = "davao";
                break;
            case 3:
                $select = "manila";
                break;
        }
        
        $orders = orders::where("enabled",1)->where('queue_number',$id)->where('experience_center','like','%'.$ec.'%')->get();
        $merge = array();
        foreach($orders as $key => $value){

            $order_details = order_details::where('order_id',$value->id)->get();
            $order_detailed = array();
            foreach($order_details as $k => $v){

                $products = products::find($v->product_id);
                $arr['product_name'] = $products->product_name;
                $arr['product_sku'] = $products->product_sku;
                $arr['qty_ordered'] = $v['qty_ordered'];
                $arr['pv'] = $v['pv'];
                $arr['price'] = $v['price'];
                $arr['total_pv'] = $v['price'] * $v['qty_ordered'];
                $arr['total_price'] = $v['price'] * $v['qty_ordered'];
                array_push($order_detailed,$arr);
            }
            
            $array["order_id"] = $value->id;
            $array["queue_number"] = $value->queue_number;
            $array["date"] = $value->date;
            $array["experience_center"] = $value->experience_center;
            $array["customer_member_id"] = $value->customer_member_id;
            $array["customer_name"] = $value->customer_name;
            $array["customer_pin"] = $value->customer_pin;
            $array["order_type"] = $value->order_type;
            $array["total_pv"] = $value->total_pv;
            $array["total_price"] = $value->total_price;
            $array["current_page"] = $value->current_page;
            $array["total_page"] = $value->total_page;
            $array["payment_method"] = $value->payment_method;
            $array["last_four_digit"] = $value->last_four_digit;
            
            $array["order_details"] = $order_detailed;
            array_push($merge, $array);
            
        }
        
        return view('orders.complete-form', ['orders' => $orders,"merge" => $merge]);
    }

    public function completePickupForm($id)
    {
        //complete order
        $pickup_orders = pickup_orders::where("enabled",1)->where('id',$id)->first();
        
        $pickup_order_details = pickup_order_details::where('pickup_order_id',$id)->get();

        $pickup_order_detailed = array();
        foreach($pickup_order_details as $k => $v){
            $arr['order_id'] = $v['order_id'];
            $arr['pin'] = $v['pin'];
            array_push($pickup_order_detailed,$arr);
        }

        return view('orders.complete-pickup-form', ['pickup_orders' => $pickup_orders,"pickup_order_details" => $pickup_order_detailed]);
    }

    public function updateStatus($id){
        $orders = orders::where("enabled",1)->where('queue_number',$id)->get();
        foreach($orders as $key => $val){
            $orderdetails = order_details::where('order_id',$val->id)->delete();
            $val->delete();
        }
        

        return json_encode("Updated");
    }

    public function updateStatusPickup($id){
        $orders = pickup_orders::where("enabled",1)->where('id',$id)->first();
        $orders->delete();
        
        return json_encode("Updated");
    }

    public function pickUpForm(Request $request)
    {
        $message = "";
        $date = Carbon::now();
        if($request->post()){

            $pickup_orders = new pickup_orders();
            $pickup_orders->customer_member_id  = $request->post('member_id');
            $pickup_orders->customer_name       = $request->post('member_name');
            $pickup_orders->queue_number        = $request->post('queue_number');
            $pickup_orders->experience_center   = $request->post('experience_center');
            $pickup_orders->date                = $request->post('date');
            $pickup_orders->status              = 1;
            $pickup_orders->enabled             = 1;
            $pickup_orders->save();


            $pickup_order_id = $pickup_orders->id;
            
            foreach($request->post('order_id') as $key => $val){
                if(!empty($request->post('order_id')[$key])){
                    $pickup_order_details = new pickup_order_details();
                    $pickup_order_details->pickup_order_id = $pickup_order_id;
                    $pickup_order_details->order_id = $request->post('order_id')[$key];
                    $pickup_order_details->pin = $request->post('pin')[$key];
                    $pickup_order_details->save();
                }
            }


            $message = "Thank you! Please wait your queuebee to be called";

        }

        return view('orders.pick-up-form', ["message" => $message,"date" => $date->format('Y-m-d')]);
    }




}

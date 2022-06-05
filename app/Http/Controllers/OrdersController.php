<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\order_details;

class OrdersController extends Controller
{
    public function index(Request $request)
    {
        //dashboard
        $orders = orders::where("enabled",1)->cursorPaginate(10);

        return view('orders.admin.order', ['orders' => $orders]);
    }

    public function orderForm(Request $request)
    {
        //$orders = orders::where("enabled",1)->cursorPaginate(10);

        return view('orders.order-form');
    }

    public function pickUpForm(Request $request)
    {
        //$orders = orders::where("enabled",1)->cursorPaginate(10);

        return view('orders.pick-up-form');
    }
}

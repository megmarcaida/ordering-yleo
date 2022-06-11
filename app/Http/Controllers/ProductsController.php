<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class ProductsController extends Controller
{
    public function autoComplete(Request $request)
    {
        $order_type = $request->input('order_type');

        switch($order_type){
            case "ER":
                $selected = "er";
            case "QO":
                $selected = "qo";
                break;
            case "Points":
                $selected = "points";
                
                break;
        }
        $products = products::select("product_name")->where("product_name","LIKE","%{$request->input('query')}%")->where($selected,'YES')->get();
        $data = array();
        foreach ($products as $val)
        {
            $data[] = $val->product_name;
        }
   
        return response()->json($data);
    }

    public function getProductByName(Request $request)
    {
        $products = products::where("product_name",$request->input('item'))->get();

        
   
        return response()->json($products);
    }
}

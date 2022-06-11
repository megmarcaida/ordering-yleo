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
            default:
                $selected = "";
        }
        if($selected == ""){
            $products = products::select("product_name")->where("product_name","LIKE","%{$request->input('query')}%")->where('status',1)->get();
        }else{
            $products = products::select("product_name")->where("product_name","LIKE","%{$request->input('query')}%")->where($selected,'YES')->where('status',1)->where('enabled',1)->get();
        }
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

    public function productsList(Request $request){
        $products = products::where("status", 1)->where("product_name","like","%".$request->input('q')."%")->orderBy('id','desc')->paginate(20);

        return view('products.products', ['products' => $products]);
    }

    public function addProduct(Request $request){
       
        $message ='';
        
        if($request->post()){
            $product = new products();
            $product->product_sku           = $request->post('product_sku');
            $product->product_name          = $request->post('product_name');
            $product->product_description   = $request->post('product_description');
            $product->product_category      = $request->post('product_category');
            $product->product_price         = $request->post('product_price');
            $product->pv                    = $request->post('pv');
            $product->product_qty           = $request->post('product_qty');
            $product->product_unit          = $request->post('product_unit');
            $product->with_limit_qty        = $request->post('with_limit_qty');
            $product->er                    = $request->post('er');
            $product->qo                    = $request->post('qo');
            $product->points                = $request->post('points');
            $product->enabled               = $request->post('enabled');
            $product->status               = 1;
            $product->save();

            $message = "Successfully added!";
        }

        

        return view('products.add-product', ['message' => $message]);
    }

    public function productInfo(Request $request, $id){
        $product = products::find($id);
        $message ='';
        
        if($request->post()){
            $product->product_sku           = $request->post('product_sku');
            $product->product_name          = $request->post('product_name');
            $product->product_description   = $request->post('product_description');
            $product->product_category      = $request->post('product_category');
            $product->product_price         = $request->post('product_price');
            $product->pv                    = $request->post('pv');
            $product->product_qty           = $request->post('product_qty');
            $product->product_unit          = $request->post('product_unit');
            $product->with_limit_qty        = $request->post('with_limit_qty');
            $product->er                    = $request->post('er');
            $product->qo                    = $request->post('qo');
            $product->points                = $request->post('points');
            $product->enabled               = $request->post('enabled');
            $product->update();

            $message = "Successfully saved!";
        }

        

        return view('products.product-info', ['message' => $message,'product' => $product]);
    }

    public function deleteProduct(Request $request){
        
        $message = '';
        if(!empty($request->input('id'))){
            $product = products::find($request->input('id'));
            $product->status = 0;
            $product->update();

            $message = $product->product_name . " has been remove!";
        }

        return response()->json($message);
    }
}

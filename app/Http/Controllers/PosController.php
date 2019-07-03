<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PosController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$product = DB::table('products')
    			  ->join('categories','products.cat_id','categories.id')
    			  ->select('categories.category_name','products.*')
    			  ->get();
        $customer = DB::table('customers')->get();
        $category = DB::table('categories')->get();
    	return view('pos',compact('product','customer','category'));
    }

    //PENDING ORDER ROUTES ARE HERE....
    public function PendingOrder()
    {
       $pending = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','pending')
        ->get();
        // echo "<pre>";
        // print_r($pending);
        return view('pending_orders',compact('pending'));
    }

    public function ViewOrder($id)
    {
         $order = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.*','orders.*','orders.id as order_id')
        ->where('orders.id',$id)
        ->first();
        // echo "<pre>";
        // print_r($order);

        $order_details = DB::table('orderdetails')
        ->join('products','orderdetails.product_id','products.id')
        ->select('products.product_name','products.product_code','orderdetails.*')
        ->where('order_id',$id)
        ->get();

        return view('order-confirm',compact('order','order_details'));

        // echo "<pre>";
        // print_r($order);
        // echo "<br>";
        // echo "<pre>";
        // print_r($order_details);
    }
    public function PosDone($id)
    {
        //return $id;
        $approve = DB::table('orders')->where('id',$id)->update(['order_status' => 'Approved']);

        if ($approve) {
                $notification=array(
                'messege'=>'Successfully order confirmed ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('pending.order')->with($notification);                      
            }else{
                $notification=array(
                'messege'=>'Something wrong! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            }

    }
     public function SuccessOrder(){
        $success = DB::table('orders')
        ->join('customers','orders.customer_id','customers.id')
        ->select('customers.name','orders.*')
        ->where('order_status','Approved')
        ->get();
        // echo "<pre>";
        // print_r($pending);
        return view('success_orders',compact('success'));
    }


}

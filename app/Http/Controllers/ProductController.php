<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
class ProductController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
//ADD PRODUCT
    public function AddProduct()
    {
    	return view('add_product');
    }

 //ALL PRODUCT
 public function AllProduct()
 {
 	$product = DB::table('products')->get();
 	return view('all_product',compact('product'));
 }   
//INSERT PRODUCT.......
 public function InsertProduct(Request $request)
 {
 	     $validatedData = $request->validate([
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:255',
            'product_image' => 'required',
            'buy_date' => 'required',
            'expire_date' => 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            
          ]);
 	   $data = array();
 	   $data['product_name'] = $request->product_name;
 	   $data['product_code'] = $request->product_code;
 	   $data['buying_price'] = $request->buying_price;
 	   $data['selling_price'] = $request->selling_price;
 	   $data['buy_date'] = $request->buy_date;
 	   $data['cat_id'] = $request->cat_id;
 	   $data['sup_id'] = $request->sup_id;
 	   $data['expire_date'] = $request->expire_date;
 	   $data['product_garage'] = $request->product_garage;
 	   $data['product_route'] = $request->product_route;
 	   
 	   $image=$request->file('product_image');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;
                $product=DB::table('products')
                         ->insert($data);
              if ($product) {
                 $notification=array(
                 'messege'=>'Successfully Product Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->back()->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }
        }
 }

 //Delete single Product
public function DeleteProduct($id)
{
    $delete = DB::table('products')->where('id',$id)->first();
    $product_image=$delete->product_image;
    unlink($product_image);
    $delproduct = DB::table('products')->where('id',$id)->delete();
    
           if ($delproduct) {
                 $notification=array(
                 'messege'=>'Successfully Product deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.product')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
        }
//View Single Product....
		 public function ViewProduct($id)
		 {
		    $product = DB::table('products')
		               ->join('categories','products.cat_id','categories.id')
		               ->join('suppliers','products.sup_id','suppliers.id')
		               ->select('categories.category_name','suppliers.name','products.*')
		               ->where('products.id',$id)
		               ->first();
		        return view('view_product',compact('product'));
		 }        
//Edit product......
		 public function EditProduct($id)
		 {
		 	$product = DB::table('products')->where('id',$id)->first();
		 	return view('edit_product',compact('product'));
		 }

//Update Product.....
		 public function UpdateProduct(Request $request,$id)
		 {

			 	   $data = array();
			 	   $data['product_name'] = $request->product_name;
			 	   $data['product_code'] = $request->product_code;
			 	   $data['buying_price'] = $request->buying_price;
			 	   $data['selling_price'] = $request->selling_price;
			 	   $data['buy_date'] = $request->buy_date;
			 	   $data['cat_id'] = $request->cat_id;
			 	   $data['sup_id'] = $request->sup_id;
			 	   $data['expire_date'] = $request->expire_date;
			 	   $data['product_garage'] = $request->product_garage;
			 	   $data['product_route'] = $request->product_route;

					   $image=$request->file('product_image');
				       if ($image) {
				       $image_name=str_random(20);
				       $ext=strtolower($image->getClientOriginalExtension());
				       $image_full_name=$image_name.'.'.$ext;
				       $upload_path='public/product/';
				       $image_url=$upload_path.$image_full_name;
				       $success=$image->move($upload_path,$image_full_name);  
				       if ($success) {
				          $del = DB::table('products')->where('id',$id)->first();
				          $image_path = $del->product_image;
				          unlink($image_path);
				          $data['product_image']=$image_url;
				          $product=DB::table('products')->where('id',$id)->update($data); 
				         if ($product) {
				                $notification=array(
				                'messege'=>'Product Updated Successfully With Image ! ',
				                'alert-type'=>'success'
				                 );
				               return Redirect()->route('all.product')->with($notification);                      
				            }else{
				                $notification=array(
				                'messege'=>'Product Does not Updated ! ',
				                'alert-type'=>'error');
				              return Redirect()->back()->with($notification);
				            } 
				       }else{
				            return Redirect()->back();
				       }
				    }else{
				                $product=DB::table('products')->where('id',$id)->update($data);
				                if($product){
				                    $notification=array(
				                        'messege'=>'Product Updated Successfully Without Image ! ',
				                        'alert-type'=>'success'
				                         );
				                return Redirect()->route('all.product')->with($notification);
				               }else{
				                    $notification=array(
				                    'messege'=>'Supplier Does not Updated ! ',
				                    'alert-type'=>'error');
				                  return Redirect()->back()->with($notification);
				                     }
				             }
		 }

// IMPORT PRODUCT...
		 public function ImportProduct()
		 {
		 	return view('import_product');
		 }

		 public function export()
		 {
		 	return excel::download(new ProductsExport,'products.xlsx');
		 }

		 public function import(Request $request)
		 {
		 	$import = Excel::import(new ProductsImport, $request->file('import_file'));
        if($import){
          $notification=array(
                'messege'=>'Product Import Successfully ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->route('all.product')->with($notification);
        }else{
            $notification=array(
            'messege'=>'Product Does not Import ! ',
            'alert-type'=>'error');
        return Redirect()->route('all.product')->with($notification);
             }
             
		 }




}

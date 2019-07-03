<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class CategoryController extends Controller
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
//Adding category
    public function AddCategory()
    {
    	return view('add_category');
    }
    //Insert category
    public function InsertCategory(Request $request)
    {
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$cat = DB::table('categories')->insert($data);
    	if ($cat) {
                 $notification=array(
                 'messege'=>'Successfully Category Inserted ',
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
//Showing all category
    public function AllCategory()
    {
    	$category = DB::table('categories')->get();
    	return view('all_category',compact('category'));
    }
//Delete Category
    public function DeleteCategory($id)
    {
    	$dlt = DB::table('categories')->where('id',$id)->delete();
    	if ($dlt) {
                 $notification=array(
                 'messege'=>'Successfully Category Deleted ',
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
  //Edit Category
    public function EditCategory($id)
    {
    	$edt = DB::table('categories')->where('id',$id)->first();
    	return view('edit_category',compact('edt'));
    }
 //Update Category
    public function UpdateCategory(Request $request,$id)
    {
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$cat = DB::table('categories')->where('id',$id)->update($data);
    	if ($cat) {
                 $notification=array(
                 'messege'=>'Successfully Category Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.category')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             } 
    }

}

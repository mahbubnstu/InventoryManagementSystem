<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;
class SupplierController extends Controller
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
    public function index()
    {
    	return view('add_supplier');
    }
    //Store information obout supplier
    public function Store(Request $request)
    {
    	 $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:suppliers|max:255',
            'address' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'accountnumber'=>'required|unique:suppliers|max:255'
          ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop'] = $request->shop;
        $data['bankname'] = $request->bankname;
        $data['accountholder'] = $request->accountholder;
        $data['accountnumber'] = $request->accountnumber;
        $data['branchname'] = $request->branchname;
        $data['city'] = $request->city;
        $data['type'] = $request->type;

        $image=$request->file('photo');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $supplier=DB::table('suppliers')
                         ->insert($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Suppliers Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
                
            }
        }else{
              return Redirect()->back();
        }
    }
//View all supplier
public function AllSupplier()
{
       $supplier = Supplier::all();
        return view('all_supplier',compact('supplier'));
}

/// View single supplier information
    public function ViewSupplier($id)
    {
        $single = DB::table('suppliers')->where('id',$id)->first();
        return view('view_supplier',compact('single'));
    }

    //delete single supplier
public function DeleteSupplier($id)
{
    $delete = DB::table('suppliers')->where('id',$id)->first();
    $photo=$delete->photo;
    unlink($photo);
    $deluser = DB::table('suppliers')->where('id',$id)->delete();
    
           if ($deluser) {
                 $notification=array(
                 'messege'=>'Successfully Supplier deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
        }

    ////show single editing supplier details
        public function EditSupplier($id)
        {
        
            $edit = DB::table('suppliers')->where('id',$id)->first();
            return view('edit_supplier',compact('edit'));
        
        }
      //Update supplier information

        public function UpdateSupplier(Request $request,$id)
        {
             $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required',
            'accountnumber'=>'required|max:255'
             ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop'] = $request->shop;        
        $data['bankname'] = $request->bankname;
        $data['accountholder'] = $request->accountholder;
        $data['accountnumber'] = $request->accountnumber;
        $data['branchname'] = $request->branchname;
        $data['city'] = $request->city;
        $data['type'] = $request->type;

        $image=$request->file('photo');
       if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/supplier/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $del = DB::table('suppliers')->where('id',$id)->first();
          $image_path = $del->photo;
          unlink($image_path);
          $data['photo']=$image_url;
          $supplier=DB::table('suppliers')->where('id',$id)->update($data); 
         if ($supplier) {
                $notification=array(
                'messege'=>'Suppliers Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.supplier')->with($notification);                      
            }else{
                $notification=array(
                'messege'=>'Supplier Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
            return Redirect()->back();
       }
    }else{
                $supplier=DB::table('suppliers')->where('id',$id)->update($data);
                if($supplier){
                    $notification=array(
                        'messege'=>'Supplier Updated Successfully Without Image ! ',
                        'alert-type'=>'success'
                         );
                return Redirect()->route('all.supplier')->with($notification);
               }else{
                    $notification=array(
                    'messege'=>'Supplier Does not Updated ! ',
                    'alert-type'=>'error');
                  return Redirect()->back()->with($notification);
                     }
             }
        
        }





}
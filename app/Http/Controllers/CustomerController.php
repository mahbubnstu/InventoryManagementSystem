<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;
class CustomerController extends Controller
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
    	return view('add_customer');
    }
    public function Store(Request $request)
    {
         $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:customers|max:255',
            'address' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'account_number'=>'required|unique:customers|max:255'
          ]);
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop_name'] = $request->shop_name;
        $data['bank_name'] = $request->bank_name;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['account_branch'] = $request->account_branch;
        $data['city'] = $request->city;

        $image=$request->file('photo');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Customer Inserted ',
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
    //View All customer
    public function AllCustomer()
    {
        $customer = Customer::all();
        return view('all_customer',compact('customer'));
    }
/// View single customer information
    public function ViewCustomer($id)
    {
        $single = DB::table('customers')->where('id',$id)->first();
        return view('view_customer',compact('single'));
    }

    //delete single customer
public function DeleteCustomer($id)
{
    $delete = DB::table('customers')->where('id',$id)->first();
    $photo=$delete->photo;
    unlink($photo);
    $deluser = DB::table('customers')->where('id',$id)->delete();
    
           if ($deluser) {
                 $notification=array(
                 'messege'=>'Successfully Employee deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.customer')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
        }

        //show single editing customer details
        public function EditCustomer($id)
        {
        
            $edit = DB::table('customers')->where('id',$id)->first();
            return view('edit_customer',compact('edit'));
        
        }

        //Update customer information

        public function UpdateCustomer(Request $request,$id)
        {
             $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required',
            'photo' => 'required',
            'account_number'=>'required|max:255'
             ]);

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['shop_name'] = $request->shop_name;        
        $data['bank_name'] = $request->bank_name;
        $data['account_holder'] = $request->account_holder;
        $data['account_number'] = $request->account_number;
        $data['account_branch'] = $request->account_branch;
        $data['city'] = $request->city;

        $image=$request->file('photo');
       if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/customer/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
          $del = DB::table('customers')->where('id',$id)->first();
          $image_path = $del->photo;
          unlink($image_path);
          $data['photo']=$image_url;
          $customer=DB::table('customers')->where('id',$id)->update($data); 
         if ($customer) {
                $notification=array(
                'messege'=>'Customer Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.customer')->with($notification);                      
            }else{
                $notification=array(
                'messege'=>'Customer Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
         return Redirect()->back();
       }
    }else{
                $customer=DB::table('customers')->where('id',$id)->update($data);
                if($employee){
                    $notification=array(
                        'messege'=>'Customer Updated Successfully Without Image ! ',
                        'alert-type'=>'success'
                         );
                return Redirect()->route('all.customer')->with($notification);
               }else{
                    $notification=array(
                    'messege'=>'Customer Does not Updated ! ',
                    'alert-type'=>'error');
                  return Redirect()->back()->with($notification);
                     }
             }

        }

}

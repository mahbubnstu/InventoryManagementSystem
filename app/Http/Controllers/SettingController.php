<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SettingController extends Controller
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

    public function Setting()
{
	    $setting = DB::table('settings')->first();
    	return view('setting',compact('setting'));
}

//Update settings.....
public function UpdateSetting(Request $request,$id)
{
	$validatedData = $request->validate([
        'company_name' => 'required|max:255',
        'company_address' => 'required',
        'company_email' => 'required',
        'company_phone' => 'required',
        // 'company_logo' => 'required',
        'company_city' => 'required',
        'company_country' => 'required',
        'company_zipcode' => 'required',
        
         ]);
	  $data = array();
     	$data['company_name'] = $request->company_name;
     	$data['company_address'] = $request->company_address;
     	$data['company_email'] = $request->company_email;
     	
     	$data['company_city'] = $request->company_city;
     	$data['company_country'] = $request->company_country;
     	$data['company_zipcode'] = $request->company_zipcode;
     	$data['company_zipcode'] = $request->company_zipcode;
     	$data['company_mobile'] = $request->company_mobile;

	  $image=$request->file('company_logo');
      if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/company/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
       	  $del = DB::table('settings')->where('id',$id)->first();
	      $image_path = $del->company_logo;
	      unlink($image_path);
          $data['company_logo']=$image_url;
          $setting=DB::table('settings')->where('id',$id)->update($data); 
         if ($setting) {
                $notification=array(
                'messege'=>'Company Information Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Company Information Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	 return Redirect()->back();
       }
    }else{
       	$setting=DB::table('settings')->where('id',$id)->update($data);
       	if($setting){
       		$notification=array(
                'messege'=>'Company Information Updated Successfully Without Image ! ',
                'alert-type'=>'success'
                 );
        return Redirect()->back()->with($notification);
       }else{
        	$notification=array(
            'messege'=>'Company Information Does not Updated ! ',
            'alert-type'=>'error');
          return Redirect()->back()->with($notification);
             }
     }



  }


}


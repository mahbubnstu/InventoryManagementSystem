<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;
class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('add_employee');
    }

    //Insert employees here
    public function Store(Request $request){
        $validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|unique:employees|max:255',
	        'nid' => 'required|unique:employees|max:255',
	        'address' => 'required',
	        'phone' => 'required|max:13',
	        'photo' => 'required',
	        'salary' => 'required',
    	  ]);
    	$data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['address'] = $request->address;
    	$data['experience'] = $request->experience;
    	$data['nid'] = $request->nid;
    	$data['salary'] = $request->salary;
    	$data['vacation'] = $request->vacation;
    	$data['city'] = $request->city;
      $image=$request->file('photo');
        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('home')->with($notification);                      
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
//return all employees here
public function AllEmployees()
{
	$employees = DB::table('employees')->get();
  
	return view('all_employee',compact('employees'));
}

//view single employee
public function ViewEmployee($id)
{
	$single = DB::table('employees')->where('id',$id)->first();
	return view('view_employee',compact('single'));
}
//delete single employee
public function DeleteEmployee($id)
{
	$delete = DB::table('employees')->where('id',$id)->first();
	$photo=$delete->photo;
	unlink($photo);
	$deluser = DB::table('employees')->where('id',$id)->delete();
	
	       if ($deluser) {
                 $notification=array(
                 'messege'=>'Successfully Employee deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }  
        }
//Edit single employee
        public function EditEmployee($id)
        {
        	$edit = DB::table('employees')->where('id',$id)->first();
        	return view('edit_employee',compact('edit'));
        }

//Update single employee
        public function UpdateEmployee(Request $request,$id)
        {
        	$validatedData = $request->validate([
	        'name' => 'required|max:255',
	        'email' => 'required|max:255',
	        'nid' => 'required|max:255',
	        'address' => 'required',
	        'phone' => 'required|max:13',
	        'salary' => 'required',
    	  ]);

        $data = array();
    	$data['name'] = $request->name;
    	$data['email'] = $request->email;
    	$data['phone'] = $request->phone;
    	$data['address'] = $request->address;
    	$data['experience'] = $request->experience;
    	$data['nid'] = $request->nid;
    	$data['salary'] = $request->salary;
    	$data['vacation'] = $request->vacation;
    	$data['city'] = $request->city;

       $image=$request->file('photo');
       if ($image) {
       $image_name=str_random(20);
       $ext=strtolower($image->getClientOriginalExtension());
       $image_full_name=$image_name.'.'.$ext;
       $upload_path='public/Employee/';
       $image_url=$upload_path.$image_full_name;
       $success=$image->move($upload_path,$image_full_name);  
       if ($success) {
       	  $del = DB::table('employees')->where('id',$id)->first();
	      $image_path = $del->photo;
	      unlink($image_path);
          $data['photo']=$image_url;
          $employee=DB::table('employees')->where('id',$id)->update($data); 
         if ($employee) {
                $notification=array(
                'messege'=>'Employee Updated Successfully With Image ! ',
                'alert-type'=>'success'
                 );
               return Redirect()->route('all.employee')->with($notification);                      
            }else{
            	$notification=array(
                'messege'=>'Employee Does not Updated ! ',
                'alert-type'=>'error');
              return Redirect()->back()->with($notification);
            } 
       }else{
       	 return Redirect()->back();
       }
    }else{
               	$employee=DB::table('employees')->where('id',$id)->update($data);
               	if($employee){
               		$notification=array(
                        'messege'=>'Employee Updated Successfully Without Image ! ',
                        'alert-type'=>'success'
                         );
                return Redirect()->route('all.employee')->with($notification);
               }else{
                	$notification=array(
                    'messege'=>'Employee Does not Updated ! ',
                    'alert-type'=>'error');
                  return Redirect()->back()->with($notification);
                     }
             }
    }

 
 }










      
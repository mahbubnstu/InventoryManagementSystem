<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
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

//Adding of advanced salaries
    public function AddAdvancedSalary()
    {
    	return view('advanced_salary');
    }


//Viewing of all salary
    public function AllSalary()
    {
    	$salary = DB::table('advance_salaries')
    			->join('employees','advance_salaries.emp_id','employees.id')
    			->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
    			->orderBy('id','DESC')
    			->get();
    	return view('all_advanced_salary',compact('salary'));
    }

//Insertion of advanced salary

    public function InsertAdvanced(Request $request)
    {
    	$month = $request->month;
    	$emp_id = $request->emp_id;
    	$advanced = DB::table('advance_salaries')
    				->where('month',$month)
    				->where('emp_id',$emp_id)
    				->first();
    	if ($advanced===NULL) {
		    	$data=array();
		    	$data['emp_id']=$request->emp_id;
		    	$data['advanced_salary']=$request->advanced_salary;
		    	$data['month']=$request->month;
		    	$data['year']=$request->year;

		    	$advance = DB::table('advance_salaries')->insert($data);
		    	if ($advance) {
                 $notification=array(
                 'messege'=>'Successfully advanced paid ',
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
    	
    	}else
    	{
    		    $notification=array(
                 'messege'=>'Advanced in this table is already paid ',
                 'alert-type'=>'error'
                  );
                 return Redirect()->back()->with($notification);
    	}
    }

    public function PaySalary()
    {
    	// $salary = DB::table('advance_salaries')
    	    	    		//	->join('employees','advance_salaries.emp_id','employees.id')
    	    	    			//->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
    	    	    			//->orderBy('id','DESC')
    	    	    			//->get();
			$employee=DB::table('employees')->get(); 
    	return view('pay_salary',compact('employee'));
    }


}

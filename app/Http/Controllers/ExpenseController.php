<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Expense;
class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddExpense()
    	{
    		return view('add_expense');
    	}
  //Insert Expense...
    	public function InsertExpense(Request $request)
    	{
    		$data = array();
    		$data['details']=$request->details;
    		$data['amount']=$request->amount;
    		$data['month']=$request->month;
    		$data['year']=$request->year;
    		$data['date']=$request->date;
    		
    		$exp = DB::table('expenses')->insert($data);
    		if ($exp) {
                 $notification=array(
                 'messege'=>'Successfully Expense deleted ',
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

    	//show today expense
    	public function TodayExpense()
    	{
    		$date = date("d/m/y");
    		$today = DB::table('expenses')->where('date',$date)->get();
    		return view('today_expense',compact('today'));
    	}

    	//Edit Expense
    	public function EditExpense($id)
    	{
    		$tdy = DB::table('expenses')->where('id',$id)->first();
    		return view('edit_expense',compact('tdy'));
    	}

    	//Update Expense
    	public function UpdateExpense(Request $request,$id)
    	{
    		$data = array();
    		$data['details']=$request->details;
    		$data['amount']=$request->amount;
    		$data['month']=$request->month;
    		$data['year']=$request->year;
    		$data['date']=$request->date;
    		
    		$exp = DB::table('expenses')->where('id',$id)->update($data);
    		if ($exp) {
                 $notification=array(
                 'messege'=>'Successfully Expense Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('today.expense')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             } 
    	}

    	//Monthly Expense
    	public function MonthlyExpense()
    	{
    		$month = date("F");
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}


    	//Yearly Expense
    	public function YearlyExpense()
    	{
    		$year = date("Y");
    		$yr = DB::table('expenses')->where('year',$year)->get();
    		return view('monthly_expense',compact('yr'));
    	}

    	public function JanuaryExpense()
    	{
    		$month = "January";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function FebruaryExpense()
    	{
    		$month = "February";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function MarchExpense()
    	{
    		$month = "March";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function AprilExpense()
    	{
    		$month = "April";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function MayExpense()
    	{
    		$month = "May";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function JulyExpense()
    	{
    		$month = "July";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function AugustExpense()
    	{
    		$month = "August";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function SeptemberExpense()
    	{
    		$month = "September";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function OctoberExpense()
    	{
    		$month = "October";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function NovemberExpense()
    	{
    		$month = "November";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function DecemberExpense()
    	{
    		$month = "December";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

    	public function JuneExpense()
    	{
    		$month = "June";
    		$mnt = DB::table('expenses')->where('month',$month)->get();
    		return view('monthly_expense',compact('mnt'));
    	}

}

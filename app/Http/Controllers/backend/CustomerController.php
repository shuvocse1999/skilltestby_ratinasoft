<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class CustomerController extends Controller
{
	public function index()
	{
		$data = DB::table("customer")->orderBy('id','DESC')->get();
		return view('backend.customer.index',compact('data'));
	}

	public function create()
	{
		return view('backend.customer.create');
	}


	public function insert(Request $r){


		$validated = $r->validate([
			'name'    => 'required|max:30',
			'email'   => 'required|unique:customer',
			'phone'   => 'required|numeric',
			'address' => 'required',
		]);

		$data = DB::table("customer")->insert([

			'name'       => $r->name,
			'email'      => $r->email,
			'phone'      => $r->phone,
			'address'    => $r->address,
			'created_at' => now(),
		]);

		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Customer Added Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Customer Added Unsuccessfully'));
		}


	}

	public function delete($id){

		$data = DB::table("customer")->where('id',$id)->delete();
		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Customer Delete Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Customer Delete Unsuccessfully'));
		}

	}



// Income Expense





	public function index2()
	{
		$data = DB::table("cusincomeexpense")
		->join('customer','customer.id','cusincomeexpense.customer_id')
		->select('cusincomeexpense.*','customer.name','customer.phone','customer.address')
		->orderBy('cusincomeexpense.id','DESC')
		->get();
		return view('backend.cusincomeexpense.index',compact('data'));
	}

	public function create2()
	{

		$data = DB::table("customer")->get();
		return view('backend.cusincomeexpense.create',compact('data'));
	}


	public function insert2(Request $r){


		$validated = $r->validate([
			'customer_id'    => 'required',
			'type'           => 'required',
			'amount'         => 'required|numeric',
		]);

		$data = DB::table("cusincomeexpense")->insert([

			'customer_id' => $r->customer_id,
			'type'        => $r->type,
			'amount'      => $r->amount,
			'created_at'  => now(),
		]);

		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Income/Expense Added Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Income/Expense Added Unsuccessfully'));
		}


	}

	public function delete2($id){

		$data = DB::table("cusincomeexpense")->where('id',$id)->delete();
		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Income/Expense Delete Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Income/Expense Delete Unsuccessfully'));
		}

	}



	public function report(){

		$data = DB::table("customer")->get();
		return view('backend.cusincomeexpense.report',compact('data'));
	}





}

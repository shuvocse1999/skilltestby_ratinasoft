<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class SupplierController extends Controller
{
	public function index()
	{
		$data = DB::table("supplier")->orderBy('id','DESC')->get();
		return view('backend.supplier.index',compact('data'));
	}

	public function create()
	{
		return view('backend.supplier.create');
	}


	public function insert(Request $r){


		$validated = $r->validate([
			'name'    => 'required|max:30',
			'email'   => 'required|unique:supplier',
			'phone'   => 'required|numeric',
			'address' => 'required',
		]);

		$data = DB::table("supplier")->insert([

			'name'       => $r->name,
			'email'      => $r->email,
			'phone'      => $r->phone,
			'address'    => $r->address,
			'created_at' => now(),
		]);

		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Supplier Added Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Supplier Added Unsuccessfully'));
		}


	}

	public function delete($id){

		$data = DB::table("supplier")->where('id',$id)->delete();
		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Supplier Delete Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Supplier Delete Unsuccessfully'));
		}

	}






// Income Expense





	public function index2()
	{
		$data = DB::table("suppincomeexpense")
		->join('supplier','supplier.id','suppincomeexpense.supplier_id')
		->select('suppincomeexpense.*','supplier.name','supplier.phone','supplier.address')
		->orderBy('suppincomeexpense.id','DESC')
		->get();
		return view('backend.suppincomeexpense.index',compact('data'));
	}

	public function create2()
	{

		$data = DB::table("supplier")->get();
		return view('backend.suppincomeexpense.create',compact('data'));
	}


	public function insert2(Request $r){


		$validated = $r->validate([
			'supplier_id'    => 'required',
			'type'           => 'required',
			'amount'         => 'required|numeric',
		]);

		$data = DB::table("suppincomeexpense")->insert([

			'supplier_id' => $r->supplier_id,
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

		$data = DB::table("suppincomeexpense")->where('id',$id)->delete();
		if ($data) {
			return redirect()->back()->with(Session::flash('message', 'Income/Expense Delete Successfully Done'));

		}
		else{
			return redirect()->back()->with(Session::flash('message', 'Income/Expense Delete Unsuccessfully'));
		}

	}




	public function report(){

		$data = DB::table("supplier")->get();
		return view('backend.suppincomeexpense.report',compact('data'));
	}






}

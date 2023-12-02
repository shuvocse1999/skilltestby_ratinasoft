@extends('backend.layouts.index')
@section('content')


@php

$customer = DB::table("customer")->count();
$customerincome = DB::table("cusincomeexpense")->where("type",'income')->sum('amount');
$customerexpense = DB::table("cusincomeexpense")->where("type",'expense')->sum('amount');


$supplier = DB::table("supplier")->count();
$supplierincome = DB::table("suppincomeexpense")->where("type",'income')->sum('amount');
$supplierexpense = DB::table("suppincomeexpense")->where("type",'expense')->sum('amount');

@endphp





<div class="content-body">

    <div class="container-fluid mt-3">


        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h6 class="card-title text-white">Total Customer</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ $customer }}</h3>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h6 class="card-title text-white">Customer Income</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ number_format($customerincome) }}/-</h3>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h6 class="card-title text-white">Customer Expense</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ number_format($customerexpense) }}/-</h3>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h6 class="card-title text-white">Customer Profit</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ number_format($customerincome-$customerexpense) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>




        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h6 class="card-title text-white">Total Supplier</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ $supplier }}</h3>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h6 class="card-title text-white">Supplier Income</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ number_format($supplierincome) }}/-</h3>
                        </div>
                    </div>
                </div>
            </div>





            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h6 class="card-title text-white">Supplier Expense</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ number_format($supplierexpense) }}/-</h3>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h6 class="card-title text-white">Supplier Profit</h6>
                        <div class="d-inline-block">
                            <h3 class="text-white">{{ number_format($supplierincome-$supplierexpense) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>




    </div>

</div>





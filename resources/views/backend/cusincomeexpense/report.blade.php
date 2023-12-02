@extends('backend.layouts.index')
@section('content')


<div class="content-body">
	<div class="container-fluid mt-3">


		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Customer Reports</h4>
					
					<div class="table-responsive">
						<table class="table table-striped table-bordered zero-configuration">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Customer Info</th>
									<th>Income</th>
									<th>Expense</th>
									<th>Profit</th>
									<th>Note</th>
								</tr>
							</thead>
							<tbody>

								@php $i =1; $totalincome = 0; $totalexpense = 0;  $totalprofit = 0; @endphp
								@if(isset($data))
								@foreach($data as $d)

								@php
								$income  = DB::table("cusincomeexpense")->where("customer_id",$d->id)->where('type','income')->sum('amount');
								$expense = DB::table("cusincomeexpense")->where("customer_id",$d->id)->where('type','expense')->sum('amount');

								$customerprofit =  $income - $expense;

								$totalincome += $income;
								$totalexpense += $expense;
								$totalprofit = $totalincome - $totalexpense;
								@endphp


								@if($customerprofit == 0)
								@else

								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $d->name }}<br>{{ $d->phone }}<br>{{ $d->address }}</td>
									<td>{{ number_format($income) }}/-</td>
									<td>{{ number_format($expense) }}/-</td>
									<td>{{ number_format($customerprofit) }}/-</td>
									<td>
										@if($customerprofit > 0)
										<b class="text-success">Positive Balance</b>
										@else
										<b class="text-danger">Negative Balance</b>
										@endif
									</td>
									


								</tr>

								@endif

								@endforeach
								@endif


								<tfoot>
									<tr class="bg-success text-white">
										<th class="text-right" colspan="2">Total</th>
										<th>{{ number_format($totalincome) }}/-</th>
										<th>{{ number_format($totalexpense) }}/-</th>
										<th class="@if($totalprofit < 0) bg-danger   @endif">{{ number_format($totalprofit) }}/-</th>
									</tr>
								</tfoot>

							</table>
						</div>
					</div>
				</div>
			</div>




		</div>
	</div>

	@endsection
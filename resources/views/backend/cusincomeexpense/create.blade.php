@extends('backend.layouts.index')
@section('content')


<div class="content-body">
	<div class="container-fluid mt-3">


		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Customer Income/Expense <a href="{{ url('customer_incomeexpense') }}" class="float-right btn btn-dark btn-sm">Manage Income/Expense</a></h4><br>

					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif

					@if(Session::has('message'))
					<h5 class="alert alert-success">{{ Session::get('message') }}</h5>
					@endif
					


					<div class="basic-form">
						<form method="post" class="row" action="{{ url("insertcustomer_incomeexpense") }}" enctype="multipart/form-data">

							@csrf

							<div class="form-group col-md-12">
								<label>Customer Name:</label>
								<select class="form-control" name="customer_id" required="">
									<option value="0">Select Customer</option>
									@if(isset($data))
									@foreach($data as $c)
									<option value="{{ $c->id }}">{{ $c->name }}</option>
									@endforeach
									@endif
								

								</select>
							</div>


							<div class="form-group col-md-6">
								<label>Type:</label>
								<select class="form-control" name="type">
									<option value="income">Income</option>
									<option value="expense">Expense</option>
								</select>
							</div>


							<div class="form-group col-md-6">
								<label>Amount:</label>
								<input type="text" name="amount" class="form-control" required="">
							</div>






							<div class="form-group col-md-12">
								<button type="submit" class="btn btn-dark">Save Now</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection



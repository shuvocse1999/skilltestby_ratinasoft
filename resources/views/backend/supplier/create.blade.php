@extends('backend.layouts.index')
@section('content')


<div class="content-body">
	<div class="container-fluid mt-3">


		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Supplier <a href="{{ url('supplier') }}" class="float-right btn btn-dark btn-sm">Manage Supplier</a></h4><br>

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
					<br>


					<div class="basic-form">
						<form method="post" class="row" action="{{ url("insertsupplier") }}" enctype="multipart/form-data">

							@csrf


							<div class="form-group col-md-12">
								<label>Name:</label>
								<input type="text" name="name" class="form-control" required="">
							</div>


							<div class="form-group col-md-6">
								<label>Phone:</label>
								<input type="text" name="phone" class="form-control" required="">
							</div>


							<div class="form-group col-md-6">
								<label>Email:</label>
								<input type="email" name="email" class="form-control" required="">
							</div>





							<div class="form-group col-md-12">
								<label>Address:</label>
								<textarea rows="4" class="form-control" name="address" required=""></textarea>
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



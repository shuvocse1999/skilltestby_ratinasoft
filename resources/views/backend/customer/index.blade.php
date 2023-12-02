@extends('backend.layouts.index')
@section('content')


<div class="content-body">
	<div class="container-fluid mt-3">


		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">All Customer <a href="{{ url('addcustomer') }}" class="float-right btn btn-dark btn-sm">Add Customer</a></h4>

					@if(Session::has('message'))
					<h5 class="alert alert-success">{{ Session::get('message') }}</h5>
					@endif
					<br>

					
					<div class="table-responsive">
						<table class="table table-striped table-bordered zero-configuration">
							<thead>
								<tr>
									<th>SL.</th>
									<th>Date</th>
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Address</th>
									<th>Option</th>
								</tr>
							</thead>
							<tbody>

								@php $i =1; @endphp
								@if(isset($data))
								@foreach($data as $d)
								<tr>
									<td>{{ $i++ }}</td>
									<td>{{ $d->created_at }}</td>
									<td>{{ $d->name }}</td>
									<td>{{ $d->phone }}</td>
									<td>{{ $d->email }}</td>
									<td>{{ $d->address }}</td>
									
									<td>
										<div class="dropdown">
											<button class="btn btn-primary text-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Select an Option
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												{{-- <a class="dropdown-item" href="{{ url("editcustomer/".$d->id) }}">Edit</a> --}}
												<a class="dropdown-item" href="{{ url("deletecustomer/".$d->id) }}" onclick="return confirm('Are you sure?')">Delete</a>
											</div>
										</div>
										
									</td>

								</tr>

								@endforeach
								@endif

							</table>
						</div>
					</div>
				</div>
			</div>




		</div>
	</div>

	@endsection
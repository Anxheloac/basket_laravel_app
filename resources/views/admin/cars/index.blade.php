@extends('layouts.admin')

@section('links')
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"></link>
@endsection

@section('body')
<div class="row">
<!-- ============================================================== -->
<!-- basic table  -->
<!-- ============================================================== -->
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	    <div class="card">
	        <h5 class="card-header">
	        	Cars Table 
	        	<div class="float-right">
	        		<a href="{{ route('admin.cars.create') }}" >Store new car</a>
	        	</div>
	        </h5>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped table-bordered first" id="carsDatatable">
	                    <thead>
	                        <tr>
	                        	<th>Id</th>
	                            <th>Make</th>
	                            <th>Model</th>
	                            <th>Registration Date</th>
	                            <th>Engine Size</th>
	                            <th>Price</th>
	                            <th>Active</th>
	                            <th></th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($cars as $car)
		                        <tr>
		                        	<td>{{ $car->id }}</td>
		                            <td>{{ $car->make }}</td>
		                            <td>{{ $car->model }}</td>
		                            <td>{{ $car->registration_date->format('m/d/Y') }}</td>
		                            <td>{{ $car->engine_size }}</td>
		                            <td>{{ $car->price }}</td>
		                            <td>{{ $car->active ? 'Yes' : 'No' }}</td>
		                            <td>
		                            	<a href="{{ route('admin.cars.edit', $car->id) }}">
		                            		Edit
		                            	</a>
		                            </td>
		                        </tr>
	                        @endforeach
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
<!-- ============================================================== -->
<!-- end basic table  -->
<!-- ============================================================== -->
</div>
@endsection

@push('scripts')
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
	    $('#carsDatatable').DataTable({
	    	"columnDefs": [
			    { "orderable": false, "targets": 7 }
			  ]
	    });
	} );
</script>

@endpush
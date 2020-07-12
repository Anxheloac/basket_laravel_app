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
	        	Orders Table 
	        </h5>
	        <div class="card-body">
	            <div class="table-responsive">
	                <table class="table table-striped table-bordered first" id="ordersDatatable">
	                    <thead>
	                        <tr>
	                        	<th>Id</th>
	                            <th>User</th>
	                            <th>Total</th>
	                            <th>Number of cars</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    	@foreach($orders as $order)
		                        <tr>
		                        	<td>{{ $order->id }}</td>
		                            <td>{{ $order->user->email }}</td>
		                            <td>{{ $order->totalAmount() }}$</td>
		                            <td>{{ $order->numberOfCars() }}</td>
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
	    $('#ordersDatatable').DataTable();
	} );
</script>

@endpush
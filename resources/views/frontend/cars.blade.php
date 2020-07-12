@extends('layouts.frontend_theme')

@section('links')
    <style type="text/css">
        .purchase-btn{
            cursor: pointer;
        }
    </style>
@endsection

@section('body')
	 <!-- Car Section Begin -->
    <section class="car spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.car_search_form')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                    	@foreach($cars as $car)
                    		@include('frontend.car_item')
                    	@endforeach
                    </div>
                    @if($cars instanceof \Illuminate\Pagination\LengthAwarePaginator )
                        {{ $cars->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Car Section End -->
@endsection

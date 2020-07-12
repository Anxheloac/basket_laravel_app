@extends('layouts.frontend_theme')

@section('links')
    <style type="text/css">
        .purchase-btn{
            cursor: pointer;
        }
    </style>
@endsection

@section('body')

    <section class="">
        <div class="container mb-4">
            <div class="row">
                @if(empty($basketData))
                    <div class="col-12">
                        <h3>The basket is empty</h3>
                    </div>
                    <br>
                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-6">
                                <a class="btn btn-block btn-light" href="{{ route('frontend.cars.index') }}">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="table-responsive">
                            <form method="POST" action="{{ route('frontend.basket.update') }}" id="basketForm">
                                @csrf
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"> </th>
                                            <th scope="col">Car</th>
                                            <th scope="col">Available</th>
                                            <th scope="col" class="text-center">Quantity</th>
                                            <th scope="col" class="text-right">Price</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($basketData as $carItem)
                                            @php $carModel = $carItem['carModel']; @endphp
                                            <input type="hidden" name="items[{{$carItem['car_id']}}][id]" value="{{ $carItem['car_id']  }}">
                                            <tr>
                                                <td>
                                                    <img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                                                <td>{{ $carModel->make }} {{ $carModel->model }}</td>
                                                <td>In stock</td>
                                                <td>
                                                    <input class="form-control" name="items[{{$carItem['car_id']}}][quantity]" type="number" min="0" value="{{ $carItem['quantity'] }}" />
                                                </td>
                                                <td class="text-right">{{ $carModel->price }} €</td>
                                                <td class="text-right">
                                                    <a class="btn btn-sm btn-danger remove-item-btn" href="{{ route('frontend.basket.remove_item', $carModel->id) }}">
                                                        <i class="fa fa-trash" style="color:white"></i> 
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($errors->any())
                                    {{ json_encode($errors->all()) }}
                                @endif
                            </form>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="row">
                            <div class="col-sm-12  col-md-4">
                                <button class="btn btn-block btn-light" type="submit" form="basketForm">Update basket</a>
                            </div>
                            <div class="col-sm-12  col-md-4">
                                <a class="btn btn-block btn-light" href="{{ route('frontend.cars.index') }}">Continue Shopping</a>
                            </div>
                            <div class="col-sm-12 col-md-4 text-right">
                                <a class="btn btn-lg btn-block btn-success text-uppercase white-color" id="checkoutBtn" data-register={{ Auth::check() ? 1 : 0 }}>
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

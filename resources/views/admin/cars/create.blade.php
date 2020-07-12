@extends('layouts.admin')

@section('links')

	<link rel="stylesheet" href="/admin_theme/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/admin_theme/assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
     <link rel="stylesheet" href="/admin_theme/assets/libs/boostrap-input-tags/bootstrap-tagsinput.css"></link>
    <style type="text/css">
        .bootstrap-tagsinput .tag{
            background: #0e0c28;
            color: white
        }
    </style>
@endsection

@section('body')

 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="section-block" id="basicform">
            <h3 class="section-title">Add new car</h3>
        </div>
        <div class="card">
            <h5 class="card-header">Car Form</h5>
            <div class="card-body">
                <form action="{{ route('admin.cars.store') }}" id="createForm" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="make" class="col-form-label">Make</label>
                        <input id="make" type="text" name="make" value="{{ old('make') }}" class="form-control 
                        @error('make') is-invalid @enderror" >
                        @error('make')
                            <div class="invalid-feedback">
    							{{ $message}}
    						</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input id="model" type="text" name="model" value="{{ old('model') }}" placeholder="" class="form-control @error('model') is-invalid @enderror" >
                        @error('model')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="registration" class="col-form-label">Registration</label>
                        <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                            <input type="text" name="registration_date" class="form-control datetimepicker-input @error('registration_date') is-invalid @enderror" value="{{ old('registration_date') }}" data-target="#datetimepicker4" />
                            <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
                                <div class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </div>
                            </div>
                            @error('registration_date')
                                <div class="invalid-feedback">
                                    {{ $message}}
                                </div>
                            @enderror
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="engineSize">Engine Size</label>
                        <input id="engineSize" type="number" value="{{ old('engine_size') }}" name="engine_size" placeholder="" class="form-control @error('engine_size') is-invalid @enderror">
                        @error('engine_size')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="any" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" id="price">
                        @error('price')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Categorize Tags</label>
                        <input type="text" data-role="tagsinput" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ old('tags') }}" id="tags">
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" name="active" value="1" @if(old('active'))checked="" @endif class="custom-control-input">
                            <span class="custom-control-label">Active</span>
                        </label>
                    </div>
                    <button class="btn btn-primary" type="button" id="createFormSubmitBtn">Save car</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script src="/admin_theme/assets/vendor/datepicker/moment.js"></script>
<script src="/admin_theme/assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
<script src="/admin_theme/assets/vendor/datepicker/datepicker.js"></script>
<script type="text/javascript" src="/admin_theme/assets/libs/boostrap-input-tags/bootstrap-tagsinput.js"></script>
<script type="text/javascript">
    $('#createFormSubmitBtn').click(function(){
        $('#createForm').submit();
    })
</script>

@endpush
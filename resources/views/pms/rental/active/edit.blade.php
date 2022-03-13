@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Edit Active Rental')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('active-rental.update', 0) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" name="rental_name">
                                    <option value="">Select Rental Name</option>
                                    <option value="1">Genesis Lista</option>
                                    <option value="2">Mary Grace Lista</option>
                                </select>
                                @if($errors->has('rental_name'))
                                <span class="text-danger">{{ $errors->first('rental_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" name="rental_location">
                                    <option value="">Select Rental Location</option>
                                    <option value="1">Sampaloc</option>
                                    <option value="2">Sta. Mesa</option>
                                    <option value="3">Roxas District</option>
                                    <option value="4">ALR Building</option>
                                </select>
                                @if($errors->has('rental_location'))
                                <span class="text-danger">{{ $errors->first('rental_location') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" name="rental_room_number">
                                    <option value="">Select Room Number</option>
                                    <option value="201">201</option>
                                    <option value="202">202</option>
                                    <option value="203">203</option>
                                    <option value="204">204</option>
                                </select>
                                @if($errors->has('rental_room_number'))
                                <span class="text-danger">{{ $errors->first('rental_room_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_monthly" value="{{ old('rental_monthly') }}" placeholder="Rental monthly *">
                                @if($errors->has('rental_monthly'))
                                <span class="text-danger">{{ $errors->first('rental_monthly') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_start_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Rental start date - mm/dd/yyyy *">
                                </div>
                                @if($errors->has('rental_start_date'))
                                <span class="text-danger">{{ $errors->first('rental_start_date') }}</span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_end_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Rental end date - mm/dd/yyyy *">
                                </div>
                                @if($errors->has('rental_end_date'))
                                <span class="text-danger">{{ $errors->first('rental_end_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Update</button>
                            <a class="btn btn-warning" href="{{ route('active-rental.show', 0) }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}" />
@stop

@section('page-script')
<script src="{{ asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/js/core.js') }}"></script>
<script src="{{ asset('public/js/form/form-advanced.js') }}"></script>
@stop
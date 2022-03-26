@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Edit Active Rental')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('active-rental.update', $rental->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_tenant_name" value="{{ $rental->tenant->name }}" readonly>
                                <input type="hidden" name="tenant_id" value="{{ $rental->tenant_id }}" />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_location" value="{{ $rental->apartment->location_list->name }}" readonly>
                                <input type="hidden" name="apartment_id" value="{{ $rental->apartment_id }}" />
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                            <input type="text" class="form-control" name="rental_room_number" value="{{ $rental->apartment->room }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_monthly" value="{{ $rental->monthly_rental }}">
                                @if($errors->has('rental_monthly'))
                                <span class="text-danger">{{ $errors->first('rental_monthly') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_start_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" value="{{ date('m/d/Y',strtotime($rental->start_date)) }}" autocomplete="false">
                                </div>
                                @if($errors->has('rental_start_date'))
                                <span class="text-danger">{{ $errors->first('rental_start_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_end_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" value="{{ old('rental_end_date') }}" placeholder="End date" autocomplete="false">
                                </div>
                                @if($errors->has('rental_end_date'))
                                <span class="text-danger">{{ $errors->first('rental_end_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Update</button>
                            <a class="btn btn-warning" href="{{ route('active-rental.show', $rental->id) }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
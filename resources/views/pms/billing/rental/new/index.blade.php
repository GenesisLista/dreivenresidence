@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Rental Billing')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" href="{{ route('rental-new.index') }}">New</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-sampaloc.index') }}">Sampaloc</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-sta-mesa.index') }}">Sta. Mesa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-roxas-district.index') }}">Roxas District</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-alr-building.index') }}">ALR Building</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('active-rental.store') }}" method="POST" enctype="multipart/form-data" autocomplete="false">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing Code</label>
                                <input type="text" class="form-control" name="bill_rental_code" value="BR123QYDH" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                &nbsp;
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing date - mm/dd/yyyy *</label>
                                <input name="bill_rental_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" value="{{ old('bill_rental_date') }}" placeholder="4/20/2022" autocomplete="false">
                                @if($errors->has('rental_monthly'))
                                <span class="text-danger">{{ $errors->first('rental_monthly') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing period - mm/dd/yyyy *</label>
                                <div class="input-daterange input-group" data-provide="datepicker">
                                    <input type="text" class="input-sm form-control" name="start">
                                    <span class="input-group-addon range-to">to</span>
                                    <input type="text" class="input-sm form-control" name="end">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing location *</label>
                                <select class="form-control show-tick" name="rental_tenant_name">
                                    <option value="">Select Location</option>
                                    <option value="">Sta. Mesa</option>
                                </select>
                                @if($errors->has('rental_tenant_name'))
                                <span class="text-danger">{{ $errors->first('rental_tenant_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Add</button>
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
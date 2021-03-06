@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Show Active Rental')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Active Rental</h2>
                <div class="card-options">
                    <a href="{{ route('active-rental.edit', $rental->id) }}"><i class="fe fe-edit"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Rental Name</label>
                            <div class="form-control-plaintext">{{ $rental->tenant->name }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Rental Start Date</label>
                            <div class="form-control-plaintext">{{ date('m/d/Y',strtotime($rental->start_date)) }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Rental Monthly</label>
                            <div class="form-control-plaintext">{{ $rental->monthly_rental }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Rental Location</label>
                            <div class="form-control-plaintext">{{ $rental->apartment->location_list->name }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Rental Room</label>
                            <div class="form-control-plaintext">{{ $rental->apartment->room }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Bed Number</label>
                            <div class="form-control-plaintext">{{ $rental->bed_number }}</div>
                        </div>
                    </div>
                    
                    
                    <div class="col-12">
                        <a class="btn btn-warning" href="{{ route('active-rental.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
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
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
                    <a href="{{ route('active-rental.edit', $tenant[0]->id) }}"><i class="fe fe-edit"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Name</label>
                            <div class="form-control-plaintext">{{ $tenant[0]->name }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Start Date</label>
                            <div class="form-control-plaintext">{{ $tenant[0]->start_date == null ? '':date('m/d/Y',strtotime($tenant[0]->start_date)) }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental End Date</label>
                            <div class="form-control-plaintext">{{ $tenant[0]->end_date == null ? '':date('m/d/Y',strtotime($tenant[0]->end_date)) }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Monthly</label>
                            <div class="form-control-plaintext">{{ number_format($tenant[0]->monthly_rental) }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Location</label>
                            <div class="form-control-plaintext">{{ $tenant[0]->apartment[0]->location_list->name }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Room</label>
                            <div class="form-control-plaintext">{{ $tenant[0]->apartment[0]->room }}</div>
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
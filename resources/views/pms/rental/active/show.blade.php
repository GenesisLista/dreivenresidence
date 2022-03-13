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
                    <a href="{{ route('active-rental.edit', 0) }}"><i class="fe fe-edit"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Name</label>
                            <div class="form-control-plaintext">Genesis Lista</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Location</label>
                            <div class="form-control-plaintext">Sampaloc</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Room</label>
                            <div class="form-control-plaintext">201</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Monthly</label>
                            <div class="form-control-plaintext">5,000</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental Start Date</label>
                            <div class="form-control-plaintext">03/13/2022</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Rental End Date</label>
                            <div class="form-control-plaintext">03/13/2023</div>
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
@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Add Tenant')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Tenant name *">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email address *">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Mobile number *">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <input data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="mm/dd/yyyy *">
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <select class="form-control show-tick">
                                <option>Select Tenant Status</option>
                                <option>Active</option>
                                <option>Not Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a class="btn btn-warning" href="{{ route('tenant.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('page-styles')
<link rel="stylesheet" href="{{ asset('public/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}"/>
@stop

@section('page-script')
<script src="{{ asset('public/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('public/js/core.js') }}"></script>
<script src="{{ asset('public/js/form/form-advanced.js') }}"></script>
@stop
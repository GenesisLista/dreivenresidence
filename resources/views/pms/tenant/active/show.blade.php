@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Show Active Tenant')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Active Tenants</h2>
                <div class="card-options">
                    <a href="{{ route('active-tenant.edit', $tenant->id) }}"><i class="fe fe-edit"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Name</label>
                            <div class="form-control-plaintext">{{ $tenant->name }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Email Address</label>
                            <div class="form-control-plaintext">{{ $tenant->email }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Mobile Number</label>
                            <div class="form-control-plaintext">{{ $tenant->mobile }}</div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <div class="form-control-plaintext">{{ $tenant->address }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">School / Company Name</label>
                            <div class="form-control-plaintext">{{ $tenant->school_company }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Person to notify in case of emergency</label>
                            <div class="form-control-plaintext">{{ $tenant->person_to_notify }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Person contact number</label>
                            <div class="form-control-plaintext">{{ $tenant->person_contact_number }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Date move in</label>
                            <div class="form-control-plaintext">{{ $tenant->rental_list == null ? '' : date('m/d/Y',strtotime($tenant->rental_list->start_date)) }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Location</label>
                            <div class="form-control-plaintext">{{ $tenant->rental_list == null ? '' : $tenant->rental_list->apartment->location_list->name }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Room Number</label>
                            <div class="form-control-plaintext">{{ $tenant->rental_list == null ? '' : $tenant->rental_list->apartment->room }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="form-group">
                            <label class="form-label">Bed Number</label>
                            <div class="form-control-plaintext">{{ $tenant->rental_list == null ? '' : $tenant->rental_list->bed_number }}</div>
                        </div>
                    </div>

                    <div class="col-12">
                        <a class="btn btn-warning" href="{{ route('active-tenant.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
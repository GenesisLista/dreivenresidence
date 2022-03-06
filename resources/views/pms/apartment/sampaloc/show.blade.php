@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Show Sampaloc Apartment')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Sampaloc Apartment</h2>
                <div class="card-options">
                    <a href="{{ route('sampaloc.edit', $apartment_list->id) }}"><i class="fe fe-edit"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Room number</label>
                            <div class="form-control-plaintext">{{ $apartment_list->room }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <div class="form-control-plaintext">{{ $apartment_list->apartment_status->status_name }}</div>
                        </div>
                    </div>
                    <div class="col-12">
                        <a class="btn btn-warning" href="{{ route('sampaloc.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
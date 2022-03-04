@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Edit Tenant Status')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form class="card" action="{{ route('tenant-status.update', $tenant_details->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="status_name" class="form-control" value="{{ $tenant_details->status_name }}">
                                @if($errors->has('status_name'))
                                <span class="text-danger">{{ $errors->first('status_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Update</button>
                            <a class="btn btn-warning" href="{{ route('tenant-status.show', $tenant_details->id) }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
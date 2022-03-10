@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Add Active Tenant')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('active-tenant.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tenant_name" value="{{ old('tenant_name') }}" placeholder="Tenant name *">
                                @if($errors->has('tenant_name'))
                                <span class="text-danger">{{ $errors->first('tenant_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="email" class="form-control" name="tenant_email_address" value="{{ old('tenant_email_address') }}" placeholder="Email address *">
                                @if($errors->has('tenant_email_address'))
                                <span class="text-danger">{{ $errors->first('tenant_email_address') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="tenant_mobile_number" value="{{ old('tenant_mobile_number') }}" placeholder="Mobile number *">
                                @if($errors->has('tenant_mobile_number'))
                                <span class="text-danger">{{ $errors->first('tenant_mobile_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Add</button>
                            <a class="btn btn-warning" href="{{ route('active-tenant.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
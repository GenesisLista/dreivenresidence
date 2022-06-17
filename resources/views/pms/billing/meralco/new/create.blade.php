@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Meralco Billing')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" href="{{ route('meralco-new.index') }}">New</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Sampaloc</a></li>
                <li class="nav-item"><a class="nav-link " href="javascript:void(0)">Sta. Mesa</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0)">Roxas District</a></li>
                <li class="nav-item"><a class="nav-link" href="javascript:void(0)">ALR Building</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('meralco-new.store') }}" method="POST" enctype="multipart/form-data" autocomplete="false">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing Code</label>
                                <input type="text" class="form-control" name="bill_code" value="{{ $bcode }}" readonly>
                                @if($errors->has('bill_code'))
                                <span class="text-danger">{{ $errors->first('bill_code') }}</span>
                                @endif
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
                                <input name="bill_rental_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" value="" autocomplete="false">
                                @if($errors->has('bill_rental_date'))
                                <span class="text-danger">{{ $errors->first('bill_rental_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing period - mm/dd/yyyy *</label>
                                <div class="input-daterange input-group" data-provide="datepicker">
                                    <input type="text" class="input-sm form-control" name="bill_period_start" value="" autocomplete="false">
                                    <span class="input-group-addon range-to">to</span>
                                    <input type="text" class="input-sm form-control" name="bill_period_end" value="" autocomplete="false">
                                </div>
                                @if($errors->has('bill_period_start'))
                                <span class="text-danger">{{ $errors->first('bill_period_start') }}</span>
                                @endif
                                @if($errors->has('bill_period_end'))
                                <span class="text-danger" style="margin-left: 40px;">{{ $errors->first('bill_period_end') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing location *</label>
                                <select class="form-control show-tick" name="bill_location">
                                    <option value="">Select Location</option>
                                    @foreach($location as $locationList)
                                    <option value="{{ $locationList->id }}">{{ $locationList->name  }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('bill_location'))
                                <span class="text-danger">{{ $errors->first('bill_location') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Add</button>
                            <a class="btn btn-warning" href="{{ route('meralco-new.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
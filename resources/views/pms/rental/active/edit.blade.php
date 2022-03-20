@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Edit Active Rental')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('active-rental.update', $tenant[0]->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}
{{ $tenant[0]->apartment[0]->id }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_tenant_name" value="{{ $tenant[0]->name }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_location" value="{{ $tenant[0]->apartment[0]->location_list->name }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                            <input type="text" class="form-control" name="rental_room_number" value="{{ $tenant[0]->apartment[0]->room }}" readonly>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_monthly" value="{{ $tenant[0]->monthly_rental }}">
                                @if($errors->has('rental_monthly'))
                                <span class="text-danger">{{ $errors->first('rental_monthly') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_start_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" value="{{ $tenant[0]->start_date == null ? '':date('m/d/Y',strtotime($tenant[0]->start_date)) }}" autocomplete="false">
                                </div>
                                @if($errors->has('rental_start_date'))
                                <span class="text-danger">{{ $errors->first('rental_start_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_end_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" value="{{ $tenant[0]->end_date == null ? '':date('m/d/Y',strtotime($tenant[0]->end_date)) }}" placeholder="End date" autocomplete="false">
                                </div>
                                @if($errors->has('rental_end_date'))
                                <span class="text-danger">{{ $errors->first('rental_end_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Update</button>
                            <a class="btn btn-warning" href="{{ route('active-rental.show', $tenant[0]->id) }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
                            <input type="hidden" name="apartment_id" value="{{ $tenant[0]->apartment[0]->id }}"/>
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
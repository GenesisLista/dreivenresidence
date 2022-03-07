@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Add Sta. Mesa Apt.')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('sta-mesa.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" name="apartment_room_number" value="{{ old('apartment_room_number') }}" class="form-control" placeholder="Room number *">
                                @if($errors->has('apartment_room_number'))
                                <span class="text-danger">{{ $errors->first('apartment_room_number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" name="apartment_status_name">
                                    <option value="">Select Apartment Status</option>
                                    @foreach($apartment_status as $aptstatus)
                                    <option value="{{ $aptstatus->id }}" {{ old('apartment_status_name') == $aptstatus->id ? 'selected' : ''}}>{{ $aptstatus->status_name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('apartment_status_name'))
                                <span class="text-danger">{{ $errors->first('apartment_status_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-plus mr-2"></i>Add</button>
                            <a class="btn btn-warning" href="{{ route('sta-mesa.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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
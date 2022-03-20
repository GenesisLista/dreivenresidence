@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Add Active Rental')

@section('content')
<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('active-rental.store') }}" method="POST" enctype="multipart/form-data" autocomplete="false">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" name="rental_tenant_name">
                                    <option value="">Select Tenant Name</option>
                                    @foreach($tenant as $tenantlist)
                                    <option value="{{ $tenantlist->id }}">{{ $tenantlist->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('rental_name'))
                                <span class="text-danger">{{ $errors->first('rental_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" id="rental_location" name="rental_location">
                                    <option value="">Select Location</option>
                                    @foreach($location as $locationlist)
                                    <option value="{{ $locationlist->id }}">{{ $locationlist->name }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('rental_location'))
                                <span class="text-danger">{{ $errors->first('rental_location') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <select class="form-control show-tick" id="rental_room_number" name="rental_room_number">
                                    <option value="">Select Room Number</option>
                                </select>
                                @if($errors->has('rental_room_number'))
                                <span class="text-danger">{{ $errors->first('rental_room_number') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="rental_monthly" value="{{ old('rental_monthly') }}" placeholder="Rental monthly *">
                                @if($errors->has('rental_monthly'))
                                <span class="text-danger">{{ $errors->first('rental_monthly') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_start_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Rental start date - mm/dd/yyyy *" autocomplete="false">
                                </div>
                                @if($errors->has('rental_start_date'))
                                <span class="text-danger">{{ $errors->first('rental_start_date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <input name="rental_end_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Rental end date - mm/dd/yyyy *" autocomplete="false">
                                </div>
                                @if($errors->has('rental_end_date'))
                                <span class="text-danger">{{ $errors->first('rental_end_date') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Add</button>
                            <a class="btn btn-warning" href="{{ route('active-rental.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
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

<script>
    jQuery(document).ready(function() {

        /* When location is selected it will display the room
        based on the selected location */
        $('#rental_location').on('change', function () {
            $('#rental_room_number').empty().append('<option value="">Select Room Number</option>');

            var location_id = $(this).val();
            
            console.log('GBL '  + location_id);

            $.ajax({
                url: "{{ route('active-rental.room-list') }}",
                headers: {'X-CSRF-TOKEN': $('[name="_token"]').val()},
                type: 'POST',
                data: {'location_id': location_id},
                success: function(result) {

                    // console.log(result);

                    jQuery.each(result, function(index, itemData) {

                        console.log(itemData);

                        $('#rental_room_number').append('<option value="' + itemData['room'] + '">' + itemData['room'] + '</option>');

                        // Check the current language
                        // if (lang == 'en') {
                        //     var city_name = itemData['name_en'];
                        // } else {
                        //     var city_name = itemData['name_ar'];
                        // }
                        // $('#city').append('<option value="' + itemData['id'] + '">' + city_name + '</option>');
                    });
                }
            });
        });

        
    });
</script>
@stop


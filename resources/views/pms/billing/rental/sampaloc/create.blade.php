@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Rental Billing')

@section('content')

<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-new.index') }}">New</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('rental-sampaloc.index') }}">Sampaloc</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-sta-mesa.index') }}">Sta. Mesa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-roxas-district.index') }}">Roxas District</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-alr-building.index') }}">ALR Building</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <form action="{{ route('rental-sampaloc.store') }}" method="POST" enctype="multipart/form-data" autocomplete="false">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing Code</label>
                                <input type="text" class="form-control" name="bill_code" value="{{ $bill_rental[0]->bill_code }}" readonly>
                                <input type="hidden" name="bill_rental_id" value="{{ $bill_rental[0]->id }}" />
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing Date</label>
                                <input type="text" class="form-control" name="bill_date" value="{{ date('m/d/Y',strtotime($bill_rental[0]->bill_date)) }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Billing Period</label>
                                <input type="text" class="form-control" name="bill_period" value="{{ date('m/d/Y',strtotime($bill_rental[0]->bill_period_start)) }} - {{ date('m/d/Y',strtotime($bill_rental[0]->bill_period_end)) }}" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Apartment Room Number *</label>
                                <select class="form-control show-tick" id="apartment_id" name="apartment_id">
                                    <option value="">Select room number</option>
                                    @foreach($apartments as $alist)
                                    <option value="{{ $alist->id }}">{{ $alist->room }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="tenant_id" name="tenant_id" />
                                @if($errors->has('apartment_id'))
                                <span class="text-danger">{{ $errors->first('apartment_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Tenant Name</label>
                                <input type="text" class="form-control" id="bill_tenant_name" name="bill_tenant_name" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Rent Amount</label>
                                <input type="text" class="form-control" id="bill_amount" name="bill_amount" readonly>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary"><i class="fe fe-check mr-2"></i>Add</button>
                            <a class="btn btn-warning" href="{{ route('rental-sampaloc.index') }}"><i class="fe fe-arrow-left mr-2"></i>Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="section-body mt-3">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">

                <!-- alert -->
                @if(session('success_add'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success_add') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('success_update'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success_update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('success_delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success_delete') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Tenant Name</th>
                                        <th>B/Amnt</th>
                                        <th>D/Paid</th>
                                        <th>Pd/Amnt</th>
                                        <th>Bal/Amnt</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Room</th>
                                        <th>Tenant Name</th>
                                        <th>B/Amnt</th>
                                        <th>D/Paid</th>
                                        <th>Pd/Amnt</th>
                                        <th>Bal/Amnt</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($bill_rental_sampaloc as $brsampaloc)
                                    <tr>
                                        <td>{{ $brsampaloc->apartment->room }}</td>
                                        <td>{{ $brsampaloc->tenant->name }}</td>
                                        <td>{{ number_format($brsampaloc->billed_amount) }}</td>
                                        <td>{{ $brsampaloc->billed_date_paid }}</td>
                                        <td>{{ number_format($brsampaloc->billed_paid_amount) }}</td>
                                        <td>{{ number_format($brsampaloc->billed_balance_amount) }}</td>
                                        <td>{{ $brsampaloc->payment_status->name }}</td>
                                        <td class="actions">
                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">
                                                <button class="btn btn-sm btn-icon on-default button-remove" data-toggle="tooltip" data-original-title="Delete"><i class="icon-trash" aria-hidden="true"></i></button>
                                            </a>
                                            <form method="post" action="{{ route('rental-sampaloc.destroy', $brsampaloc->id) }}">
                                                @method('DELETE')
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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

<script>
    jQuery(document).ready(function() {

        /* When apartment room is selected it will display the tenant details
        based on the selected room */
        $('#apartment_id').on('change', function () {
            var apartment_id = $(this).val();

            $.ajax({
                url: "{{ route('rental-sampaloc.rental-list') }}",
                headers: {'X-CSRF-TOKEN': $('[name="_token"]').val()},
                type: 'POST',
                data: {'apartment_id': apartment_id},
                success: function(result) {
                    jQuery.each(result, function(index, itemData) {
                        $('#tenant_id').val(itemData['tenant']['id']);
                        $('#bill_tenant_name').val(itemData['tenant']['name']);
                        $('#bill_amount').val(itemData['monthly_rental']);
                    });
                }
            });
        });
    });
</script>
@stop
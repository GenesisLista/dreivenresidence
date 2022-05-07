@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Rental Roxas District Billing')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-new.index') }}">New</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-sampaloc.index') }}">Sampaloc</a></li>
                <li class="nav-item"><a class="nav-link " href="{{ route('rental-sta-mesa.index') }}">Sta. Mesa</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('rental-roxas-district.index') }}">Roxas District</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-alr-building.index') }}">ALR Building</a></li>
            </ul>
        </div>
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success_update') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                </div>
                @elseif(session('success_delete'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
                                        <th>Billing Code</th>
                                        <th>Billing Date</th>
                                        <th>Billing Period</th>
                                        <th>Billed Amount</th>
                                        <th>Billed Paid</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Billing Code</th>
                                        <th>Billing Date</th>
                                        <th>Billing Period</th>
                                        <th>Billed Amount</th>
                                        <th>Billed Paid</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($bill_rental as $billRental)
                                    <tr>
                                        <td>{{ $billRental->bill_code }}</td>
                                        <td>{{ $billRental->bill_date }}</td>
                                        <td>{{ $billRental->bill_period_start }} - {{ $billRental->bill_period_end }}</td>
                                        <td>{{ number_format($billRental->billed_amount_sum) }}</td>
                                        <td>{{ number_format($billRental->billed_paid_amount_sum) }}</td>
                                        <td class="actions">
                                            <a href="{{ route('rental-roxas-district.rental-add-rd', $billRental->id) }}"><button class="btn btn-sm btn-icon on-default m-r-5" data-toggle="tooltip" data-original-title="Add"><i class="icon-users" aria-hidden="true"></i></button></a>
                                            <!-- <a href="{{ route('rental-sampaloc.show', 0) }}"><button class="btn btn-sm btn-icon on-default m-r-5" data-toggle="tooltip" data-original-title="Show"><i class="icon-doc" aria-hidden="true"></i></button></a>
                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">
                                                <button class="btn btn-sm btn-icon on-default button-remove" data-toggle="tooltip" data-original-title="Delete"><i class="icon-trash" aria-hidden="true"></i></button>
                                            </a>
                                            <form method="post" action="{{ route('rental-sampaloc.destroy', 0) }}">
                                                @method('DELETE')
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            </form> -->
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
<link rel="stylesheet" href="{{ asset('public/plugins/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('public/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('public/js/core.js') }}"></script>
<script src="{{ asset('public/js/table/datatable.js') }}"></script>
@stop
@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Rental Billing')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" href="{{ route('rental-new.index') }}">New</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-sampaloc.index') }}">Sampaloc</a></li>
                <li class="nav-item"><a class="nav-link " href="{{ route('rental-sta-mesa.index') }}">Sta. Mesa</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-roxas-district.index') }}">Roxas District</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('rental-alr-building.index') }}">ALR Building</a></li>
            </ul>
            <div class="header-action">
                <a class="btn btn-primary" href="{{ route('rental-new.create') }}"><i class="fe fe-plus mr-2"></i> Add</a>
            </div>
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

                


                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6>Samplaoc</h6>
                                <h3 class="pt-3">Php 
                                    <span class="counter">
                                    @php($sampaloc_total = 0)
                                    @foreach($sampaloc_sum as $ssum)
                                        @php($sampaloc_total += $ssum->billed_amount_sum)
                                    @endforeach
                                    {{ number_format($sampaloc_total) }}
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6>Sta. Mesa</h6>
                                <h3 class="pt-3">Php 
                                    <span class="counter">
                                    @php($sta_mesa_total = 0)
                                    @foreach($sta_mesa_sum as $stmsum)
                                        @php($sta_mesa_total += $stmsum->billed_amount_sum)
                                    @endforeach
                                    {{ number_format($sta_mesa_total) }}
                                    </span>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6>Roxas District</h6>
                                <h3 class="pt-3">Php <span class="counter">0</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6>ALR Building</h6>
                                <h3 class="pt-3">Php <span class="counter">0</span></h3>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                        <th>Billing Code</th>
                                        <th>Billing Date</th>
                                        <th>Billing Period</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Location</th>
                                        <th>Billing Code</th>
                                        <th>Billing Date</th>
                                        <th>Billing Period</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($bill_rental as $billRental)
                                    <tr>
                                        <td>{{ $billRental->location->name }}</td>
                                        <td>{{ $billRental->bill_code }}</td>
                                        <td>{{ date('m/d/Y',strtotime($billRental->bill_date)) }}</td>
                                        <td>{{ date('m/d/Y',strtotime($billRental->bill_period_start)) }} - {{ date('m/d/Y',strtotime($billRental->bill_period_end)) }}</td>
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
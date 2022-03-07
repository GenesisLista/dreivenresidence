@extends('layouts.master')
@section('parentPageTitle', 'PMS')
@section('title', 'Sta. Mesa Apartment')

@section('content')
<div class="section-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs page-header-tab">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0)">Sta. Mesa Apartment List</a></li>
            </ul>
            <div class="header-action">
                <a class="btn btn-primary" href="{{ route('sta-mesa.create') }}"><i class="fe fe-plus mr-2"></i> Add</a>
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

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover js-basic-example dataTable table_custom border-style spacing5">
                                <thead>
                                    <tr>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                        <th>Room</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($apartment_list as $aptlist)
                                    <tr>
                                        <td>{{ $aptlist->room }}</td>
                                        <td>{{ $aptlist->apartment_status->status_name }}</td>
                                        <td class="actions">
                                            <a href="{{ route('sta-mesa.show', $aptlist->id) }}"><button class="btn btn-sm btn-icon on-default m-r-5" data-toggle="tooltip" data-original-title="Show"><i class="icon-doc" aria-hidden="true"></i></button></a>
                                            <a href="javascript:void(0)" onclick="$(this).parent().find('form').submit()">
                                                <button class="btn btn-sm btn-icon on-default button-remove" data-toggle="tooltip" data-original-title="Delete"><i class="icon-trash" aria-hidden="true"></i></button>
                                            </a>
                                            <form method="post" action="{{ route('sta-mesa.destroy', $aptlist->id) }}">
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
<link rel="stylesheet" href="{{ asset('public/plugins/datatable/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/plugins/datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css') }}">
@stop

@section('page-script')
<script src="{{ asset('public/bundles/dataTables.bundle.js') }}"></script>
<script src="{{ asset('public/js/core.js') }}"></script>
<script src="{{ asset('public/js/table/datatable.js') }}"></script>
@stop
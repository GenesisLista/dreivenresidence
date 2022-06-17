<?php

namespace App\Http\Controllers\Pms;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;

class ActiveTenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        // Active only
        $tenant_list = Tenant::where('tenant_status_id', 1)->get();

        return view('pms.tenant.active.index')->with([
            'tenant_list' => $tenant_list

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the form
        return view('pms.tenant.active.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTenantRequest $request, Tenant $tenant)
    {
        // Save the data

        // Validate
        $validated = $request->validated();

        $tenant->name = $request->tenant_name;
        $tenant->email = $request->tenant_email_address;
        $tenant->mobile = $request->tenant_mobile_number;
        $tenant->address = $request->tenant_address;
        $tenant->school_company = $request->tenant_school_company;
        $tenant->person_to_notify = $request->tenant_person_to_notify;
        $tenant->person_contact_number = $request->tenant_person_contact_number;
        $tenant->tenant_status_id = 1;
        $tenant->save();

        return redirect()->route('active-tenant.index')->with('success_add', 'Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Display the details
        $tenant = Tenant::with([
            'rental_list',
            'rental_list.apartment',
            'rental_list.apartment.location_list'
        ])->findOrFail($id);

        return view('pms.tenant.active.show')->with([
            'tenant' => $tenant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Display the form
        $tenant = Tenant::findOrFail($id);

        return view('pms.tenant.active.edit')->with([
            'tenant' => $tenant
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTenantRequest $request, $id)
    {
        // Save the data

        // Validate
        $validated = $request->validated();

        $tenant = Tenant::findOrFail($id);
        $tenant->name = $request->tenant_name;
        $tenant->email = $request->tenant_email_address;
        $tenant->mobile = $request->tenant_mobile_number;
        $tenant->address = $request->tenant_address;
        $tenant->school_company = $request->tenant_school_company;
        $tenant->person_to_notify = $request->tenant_person_to_notify;
        $tenant->person_contact_number = $request->tenant_person_contact_number;
        $tenant->save();

        return redirect()->route('active-tenant.index')->with('success_update', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete the data
        Tenant::destroy($id);

        return redirect()->route('active-tenant.index')->with('success_delete', 'Record deleted successfully');
    }
}

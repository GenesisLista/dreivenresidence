<?php

namespace App\Http\Controllers\Pms;

use App\Http\Controllers\Controller;
use App\Models\TenantStatus;
use Illuminate\Http\Request;

class TenantStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list of tenant status
        $status_list = TenantStatus::all();
        return view('pms.tenant_status.index')->with([
            'status_list' => $status_list
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the add form
        return view('pms.tenant_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TenantStatus $tenantStatus)
    {
        // Save the data
        
        // Validate
        $request->validate([
            'status_name' => 'required'
        ]);

        $tenantStatus->status_name = $request->status_name;
        $tenantStatus->save();

        return redirect()->route('tenant-status.index')->with('success_add', 'Record added successfully');
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
        $tenantStatus = TenantStatus::findOrFail($id);
        return view('pms.tenant_status.show')->with([
            'tenant_details' => $tenantStatus
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
        // Display the edit form
        $tenantStatus = TenantStatus::findOrFail($id);
        return view('pms.tenant_status.edit')->with([
            'tenant_details' => $tenantStatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Save the data

        // Validate
        $request->validate([
            'status_name' => 'required'
        ]);

        $tenantStatus = TenantStatus::findOrFail($id);
        $tenantStatus->status_name = $request->status_name;
        $tenantStatus->save();

        return redirect()->route('tenant-status.index')->with('success_update', 'Record updated successfully');
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
        TenantStatus::destroy($id);
        
        return redirect()->route('tenant-status.index')->with('success_delete', 'Record deleted successfully');
    }
}

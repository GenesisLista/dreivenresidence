<?php

namespace App\Http\Controllers\Pms;

use Carbon\Carbon;
use App\Models\Tenant;
use App\Models\Location;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        // Active rentals - tenants only
        $rental = Tenant::where('status_id', 1)
        ->with([
            'apartment',
            'apartment.location_list'
        ])
        ->get();
        
        return view('pms.rental.active.index')->with([
            'rental' => $rental
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
        $tenant = Tenant::whereNull('status_id')
        ->whereNull('start_date')->get();

        $location = Location::all();

        return view('pms.rental.active.create')->with([
            'tenant' => $tenant,
            'location' => $location
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Save the data

        // Tenant details
        $tenant_id = $request->rental_tenant_name;

        // Tenant details
        $apartment_location_id = $request->rental_location;
        $apartment_room = $request->rental_room_number;
        $apartment = Apartment::where('location', $apartment_location_id)->where('room', $apartment_room)->get();
        $apartment_id = $apartment[0]->id;

        $monthly_rental = $request->rental_monthly;

        $startDate = $request->rental_start_date;
        $start_date = Carbon::createFromFormat('m/d/Y', $startDate)->format('Y-m-d');

        $endDate = $request->rental_end_date;
        $end_date = Carbon::createFromFormat('m/d/Y', $endDate)->format('Y-m-d');

        // Update the tenant
        $update_tenant = Tenant::findOrFail($tenant_id);
        $update_tenant->status_id = 1;
        $update_tenant->start_date = $start_date;
        $update_tenant->end_date = $end_date;
        $update_tenant->monthly_rental = $monthly_rental;

        if($update_tenant->save()) {
            // Update the apartment
            $update_apartment = Apartment::findOrFail($apartment_id);
            $update_apartment->apartment_status_id = 2;
            $update_apartment->save();

            // Attached Pivot Table
            $update_apartment->tenant()->attach($tenant_id);
        }

        return redirect()->route('active-rental.index')->with('success_add', 'Record added successfully');
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
        $tenant = Tenant::whereId($id)
        ->with([
            'apartment',
            'apartment.location_list'
        ])
        ->get();
        return view('pms.rental.active.show')->with([
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
        $tenant = Tenant::whereId($id)
        ->with([
            'apartment',
            'apartment.location_list'
        ])
        ->get();

        return view('pms.rental.active.edit')->with([
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
    public function update(Request $request, $id)
    {
        // Save the data

        // $id is tenant ID
        // Check if the End Date is empty
        // If YES
        // Update the tenant to not active
        $tenant_id = $id;

        // Update the apartment to vacant
        $apartment_id = $request->apartment_id;

        if($request->rental_end_date==null)
        {
            // Update the tenant details only
            $tenant = Tenant::findOrFail($tenant_id);
            $tenant->start_date = Carbon::createFromFormat('m/d/Y', $request->rental_start_date)->format('Y-m-d');
            $tenant->monthly_rental = $request->rental_monthly;
            $tenant->save();

            return redirect()->route('active-rental.index')->with('success_update', 'Record updated successfully');
        }else {

            // Update the tenant and apartment details

            // Update tenant details
            $tenant = Tenant::findOrFail($tenant_id);
            $tenant->status_id = 2;
            $tenant->start_date = Carbon::createFromFormat('m/d/Y', $request->rental_start_date)->format('Y-m-d');
            $tenant->end_date = Carbon::createFromFormat('m/d/Y', $request->rental_end_date)->format('Y-m-d');
            $tenant->monthly_rental = $request->rental_monthly;
            
            // Update apartment details
            if($tenant->save()) {
                $apartment = Apartment::findOrFail($apartment_id);
                $apartment->apartment_status_id = 1;
                $apartment->save();
            }

            return redirect()->route('active-rental.index')->with('success_update', 'Record updated successfully');
        }
        
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

        // Get the apartment id using the tenant because it use pivot table
        $tenant_id = $id;
        $tenant = Tenant::whereId($tenant_id)
        ->with([
            'apartment',
            'apartment.location_list'
        ])
        ->get();

        $apartment_id = $tenant[0]->apartment[0]->id;

        // Update the apartment status
        $apartment = Apartment::findOrFail($apartment_id);
        $apartment->apartment_status_id = 1;
        $apartment->save();

        // Detached the tenant and apartment pivot table
        $apartment->tenant()->detach();

        // Delete the tenant details
        Tenant::destroy($tenant_id);

        return redirect()->route('active-rental.index')->with('success_delete', 'Record deleted successfully');
    }

    /* This is for the room list */
    public function room_list(Request $request)
    {
        // Display the room list based on the given location
        $location_id = $request->location_id;

        return $room_list = Apartment::where('location', $location_id)
        ->where('apartment_status_id', 1)
        ->get();
    }
}

<?php

namespace App\Http\Controllers\Pms;

use Carbon\Carbon;
use App\Models\Rental;
use App\Models\Tenant;
use App\Models\Location;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRentalRequest;
use App\Http\Requests\UpdateRentalRequest;

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
        $rental = Rental::whereNull('end_date')
        ->with([
            'tenant',
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
        $tenant = Tenant::where('tenant_status_id',1)
        ->whereDoesntHave('rental_list', function ($query) {
            $query->whereNull('end_date');
        })
        ->get();
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
    public function store(StoreRentalRequest $request, Rental $rental)
    {
        // Save the data

        // Validate
        $validated = $request->validated();
        
        $rental_location = $request->rental_location;
        $rental_room_number = $request->rental_room_number;

        // Get the apartment id using the location and room number
        $apartment = Apartment::where('location', $rental_location)
        ->where('room', $rental_room_number)
        ->get();

        // Save Rental details
        $rental->tenant_id = $request->rental_tenant_name;
        $rental->apartment_id = $apartment[0]->id;
        $rental->monthly_rental = $request->rental_monthly;
        $rental->start_date = Carbon::createFromFormat('m/d/Y', $request->rental_start_date)->format('Y-m-d');
        $rental->save();

        // Update tenant status
        $tenant = Tenant::findOrFail($request->rental_tenant_name);
        $tenant->tenant_status_id = 1;
        $tenant->save();

        // Update apartment status
        $apartment = Apartment::findOrFail($apartment[0]->id);
        $apartment->apartment_status_id = 2;
        $apartment->save();

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
        $rental = Rental::with([
            'tenant',
            'apartment',
            'apartment.location_list'
        ])->findOrFail($id);

        return view('pms.rental.active.show')->with([
            'rental' => $rental
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
        $rental = Rental::with([
            'tenant',
            'apartment',
            'apartment.location_list'
        ])->findOrFail($id);

        return view('pms.rental.active.edit')->with([
            'rental' => $rental
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRentalRequest $request, $id)
    {
        // Save the data

        // Validate
        $validated = $request->validated();

        // Check if the End date is empty
        if($request->rental_end_date == null) {
            // Update monthly rental, start date
            $rental = Rental::findOrFail($id);
            $rental->monthly_rental = $request->rental_monthly;
            $rental->start_date = Carbon::createFromFormat('m/d/Y', $request->rental_start_date)->format('Y-m-d');
            $rental->save();
        }else {
            // Update monthly rental, start date, end date
            $rental = Rental::findOrFail($id);
            $rental->monthly_rental = $request->rental_monthly;
            $rental->start_date = Carbon::createFromFormat('m/d/Y', $request->rental_start_date)->format('Y-m-d');
            $rental->end_date = Carbon::createFromFormat('m/d/Y', $request->rental_end_date)->format('Y-m-d');
            $rental->save();

            // Update tenant status
            $tenant = Tenant::findOrFail($request->tenant_id);
            $tenant->tenant_status_id = 2;
            $tenant->save();

            // Update apartment status
            $apartment = Apartment::findOrFail($request->apartment_id);
            $apartment->apartment_status_id = 1;
            $apartment->save();
        }

        return redirect()->route('active-rental.index')->with('success_update', 'Record updated successfully');

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
        
        // Get the tenant_id, apartment_id
        $rental = Rental::findOrFail($id);
        $tenant_id = $rental->tenant_id;
        $apartment_id = $rental->apartment_id;

        // Update tenant
        $tenant = Tenant::findOrFail($tenant_id);
        $tenant->tenant_status_id = 2;
        $tenant->save();

        // Update apartment
        $apartment = Apartment::findOrFail($apartment_id);
        $apartment->apartment_status_id = 1;
        $apartment->save();

        // Delete rental
        Rental::destroy($id);

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

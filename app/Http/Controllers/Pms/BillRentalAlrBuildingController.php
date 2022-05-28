<?php

namespace App\Http\Controllers\Pms;

use App\Models\Rental;
use App\Models\Apartment;
use App\Models\BillRental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRentalAlrBuildingRequest;
use App\Models\BillAlrBuilding;

class BillRentalAlrBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        // bill_alr_building -> relation on BillAlrBuilding Model
        $billRental = BillRental::where('location_id',4)
        ->withCount([
            'bill_alr_building AS billed_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_amount) AS billed_amount_sum"));
            }
        ])
        ->withCount([
            'bill_alr_building AS billed_paid_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_paid_amount) AS billed_paid_amount_sum"));
            }
        ])->get();
        return view('pms.billing.rental.alr_building.index')->with([
            'bill_rental' => $billRental
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillRentalAlrBuildingRequest $request, BillAlrBuilding $billAlrBuilding)
    {
        // This will save the data

        // Validate
        $validated = $request->validated();

        $billAlrBuilding->bill_rental_id = $request->bill_rental_id;
        $billAlrBuilding->tenant_id = $request->tenant_id;
        $billAlrBuilding->apartment_id = $request->apartment_id;
        $billAlrBuilding->bill_payment_status_id = 2; // Not paid
        $billAlrBuilding->bill_type_id = 1; // Rental
        $billAlrBuilding->billed_amount = $request->bill_amount;
        $billAlrBuilding->save();

        return redirect()->route('rental-alr-building.rental-add-alrb', $request->bill_rental_id)->with('success_add', 'Record added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Bill ALR Building
        $billAlrBuilding = BillAlrBuilding::findOrFail($id);
        $bill_rental_id = $billAlrBuilding->bill_rental_id;

        // Delete the data
        BillAlrBuilding::destroy($id);

        return redirect()->route('rental-alr-building.rental-add-alrb', $bill_rental_id)->with('success_delete', 'Record deleted successfully');
    }

    /**
     * This will display the form to add bill rental
     * Get the bill rental details
     */
    public function rental_add_alrb($id)
    {
        // Display the form
        $billRental = BillRental::whereId($id)->get();
        $apartments = Apartment::where('location',4)
        ->where('apartment_status_id',2)
        ->get();

        // Get the bill ALR Building - rental
        $billAlrBuilding = BillAlrBuilding::where('bill_rental_id', $id)
        ->with([
            'tenant', 'apartment', 'payment_status'
        ])->get();

        return view('pms.billing.rental.alr_building.create')->with([
            'apartments' => $apartments,
            'bill_rental' => $billRental,
            'bill_rental_alr_building' => $billAlrBuilding
        ]);

    }

    /**
     * This is for the rental list
     */
    public function rental_list(Request $request)
    {
        // Display the room list based on the given location
        $apartment_id = $request->apartment_id;

        return $rental_list = Rental::where('apartment_id', $apartment_id)
        ->with([
            'tenant'
        ])
        ->get();
    }
}

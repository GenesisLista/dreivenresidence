<?php

namespace App\Http\Controllers\Pms;

use App\Models\Rental;
use App\Models\Apartment;
use App\Models\BillRental;
use App\Models\BillSampaloc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRentalSampalocRequest;

class BillRentalSampalocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        $billRental = BillRental::where('location_id',1)
        ->withCount([
            'bill_sampaloc AS billed_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_amount) AS billed_amount_sum"));
            }
        ])
        ->withCount([
            'bill_sampaloc AS billed_paid_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_paid_amount) AS billed_paid_amount_sum"));
            }
        ])->get();
        return view('pms.billing.rental.sampaloc.index')->with([
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
    public function store(StoreBillRentalSampalocRequest $request, BillSampaloc $billSampaloc)
    {
        // This will save the data

        // Validate
        $validated = $request->validated();

        $billSampaloc->bill_rental_id = $request->bill_rental_id;
        $billSampaloc->tenant_id = $request->tenant_id;
        $billSampaloc->apartment_id = $request->apartment_id;
        $billSampaloc->bill_payment_status_id = 2; // Not paid
        $billSampaloc->bill_type_id = 1; // Rental
        $billSampaloc->billed_amount = $request->bill_amount;
        $billSampaloc->save();

        return redirect()->route('rental-sampaloc.rental-add-spl', $request->bill_rental_id)->with('success_add', 'Record added successfully');
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
        // Bill Sampaloc
        $billSampaloc  = BillSampaloc::whereId($id)->get();
        $bill_rental_id = $billSampaloc[0]->bill_rental_id;

        // Delete the data
        BillSampaloc::destroy($id);

        return redirect()->route('rental-sampaloc.rental-add-spl', $bill_rental_id)->with('success_delete', 'Record deleted successfully');
    }

    /**
     * This will display the form to add bill rental
     * Get the bill rental details
     */
    public function rental_add_spl($id)
    {
        // Display the form
        $billRental = BillRental::whereId($id)->get();
        $apartments = Apartment::where('location',1)
        ->where('apartment_status_id',2)
        ->get();

        // Get the bill sampaloc - rental
        $billRentalSampaloc = BillSampaloc::where('bill_rental_id', $id)
        ->with([
            'tenant', 'apartment', 'payment_status'
        ])->get();

        return view('pms.billing.rental.sampaloc.create')->with([
            'apartments' => $apartments,
            'bill_rental' => $billRental,
            'bill_rental_sampaloc' => $billRentalSampaloc
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

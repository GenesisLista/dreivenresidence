<?php

namespace App\Http\Controllers\Pms;

use App\Models\Rental;
use App\Models\Apartment;
use App\Models\BillRental;
use App\Models\BillStaMesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBillRentalStaMesaRequest;

class BillRentalStaMesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        // bill_sta_mesa -> relation on BillRental Model
        $billRental = BillRental::where('location_id',2)
        ->withCount([
            'bill_sta_mesa AS billed_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_amount) AS billed_amount_sum"));
            }
        ])
        ->withCount([
            'bill_sta_mesa AS billed_paid_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_paid_amount) AS billed_paid_amount_sum"));
            }
        ])->get();
        return view('pms.billing.rental.sta_mesa.index')->with([
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
    public function store(StoreBillRentalStaMesaRequest $request, BillStaMesa $billStaMesa)
    {
        // This will save the data

        // Validate
        $validated = $request->validated();

        $billStaMesa->bill_rental_id = $request->bill_rental_id;
        $billStaMesa->tenant_id = $request->tenant_id;
        $billStaMesa->apartment_id = $request->apartment_id;
        $billStaMesa->bill_payment_status_id = 2; // Not paid
        $billStaMesa->bill_type_id = 1; // Rental
        $billStaMesa->billed_amount = $request->bill_amount;
        $billStaMesa->save();

        return redirect()->route('rental-sta-mesa.rental-add-stm', $request->bill_rental_id)->with('success_add', 'Record added successfully');
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
        // Bill Sta Mesa
        $billStaMesa = BillStaMesa::findOrFail($id);
        $bill_rental_id = $billStaMesa->bill_rental_id;

        // Delete the data
        BillStaMesa::destroy($id);

        return redirect()->route('rental-sta-mesa.rental-add-stm', $bill_rental_id)->with('success_delete', 'Record deleted successfully');
    }

    /**
     * This will display the form to add bill rental
     * Get the bill rental details
     */
    public function rental_add_stm($id)
    {
        // Display the form
        $billRental = BillRental::whereId($id)->get();
        $apartments = Apartment::where('location',2)
        ->where('apartment_status_id',2)
        ->get();

        // Get the bill Sta. Mesa - rental
        $billRentalStaMesa = BillStaMesa::where('bill_rental_id', $id)
        ->with([
            'tenant', 'apartment', 'payment_status'
        ])->get();

        return view('pms.billing.rental.sta_mesa.create')->with([
            'apartments' => $apartments,
            'bill_rental' => $billRental,
            'bill_rental_sta_mesa' => $billRentalStaMesa
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

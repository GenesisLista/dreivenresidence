<?php

namespace App\Http\Controllers\Pms;

use Carbon\Carbon;
use App\Models\Location;
use App\Models\Apartment;
use App\Models\BillRental;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillRentalStoreRequest;

class BillRentalNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        
        // Bill Sampaloc
        $sampalocSum = BillRental::where('location_id',1)
        ->withCount([
            'bill_sampaloc AS billed_amount_sum' => function ($query) {
                $query->select(DB::raw("SUM(billed_amount) AS billed_amount_sum"));
            }
        ])->get();

        $billRental = BillRental::with([
            'location'
        ])->get();
        return view('pms.billing.rental.new.index')->with([
            'bill_rental' => $billRental,
            'sampaloc_sum' => $sampalocSum
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Display the  add form
        $location = Location::all()->sortBy('name');
        $billingCode = Str::upper(Str::random(8));
        return view('pms.billing.rental.new.create')->with([
            'location' => $location,
            'bcode' => $billingCode
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRentalStoreRequest $request, BillRental $billRental)
    {
        // Save the data

        // Validate
        $validated = $request->validated();

        $billRental->bill_code = $request->bill_code;
        $billRental->bill_date = Carbon::createFromFormat('m/d/Y', $request->bill_rental_date)->format('Y-m-d');
        $billRental->bill_period_start = Carbon::createFromFormat('m/d/Y', $request->bill_period_start)->format('Y-m-d');
        $billRental->bill_period_end = Carbon::createFromFormat('m/d/Y', $request->bill_period_end)->format('Y-m-d');
        $billRental->location_id = $request->bill_location;
        $billRental->save();

        return redirect()->route('rental-new.index')->with('success_add', 'Billed Rental added successfully');
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
        //
    }
}

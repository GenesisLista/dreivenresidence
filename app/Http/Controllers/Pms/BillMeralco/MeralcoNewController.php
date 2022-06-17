<?php

namespace App\Http\Controllers\Pms\BillMeralco;

use Carbon\Carbon;
use App\Models\Location;
use App\Models\BillMeralco;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BillMeralcoStoreRequest;

class MeralcoNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billMeralco = BillMeralco::with([
            'location'
        ])->get();
        return view('pms.billing.meralco.new.index')->with([
            'bill_meralco' => $billMeralco
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
        return view('pms.billing.meralco.new.create')->with([
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
    public function store(BillMeralcoStoreRequest $request, BillMeralco $billMeralco)
    {
        // Save the data

        // Validate
        $validated = $request->validated();

        $billMeralco->bill_code = $request->bill_code;
        $billMeralco->bill_date = Carbon::createFromFormat('m/d/Y', $request->bill_rental_date)->format('Y-m-d');
        $billMeralco->bill_period_start = Carbon::createFromFormat('m/d/Y', $request->bill_period_start)->format('Y-m-d');
        $billMeralco->bill_period_end = Carbon::createFromFormat('m/d/Y', $request->bill_period_end)->format('Y-m-d');
        $billMeralco->location_id = $request->bill_location;
        $billMeralco->save();

        return redirect()->route('meralco-new.index')->with('success_add', 'Billed Meralco added successfully');
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

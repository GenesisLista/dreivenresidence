<?php

namespace App\Http\Controllers\Pms;

use Illuminate\Http\Request;
use App\Models\ApartmentStatus;
use App\Http\Controllers\Controller;
use App\Models\Apartment;

class AlrBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display the list
        $apartment_list = Apartment::where('location',4)->with([
            'apartment_status'
        ])->get();

        return view('pms.apartment.alr_building.index')->with([
            'apartment_list' => $apartment_list
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
        $apartment_status = ApartmentStatus::all();
        
        return view('pms.apartment.alr_building.create')->with([
            'apartment_status' => $apartment_status
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
        // Save the data

        // Validate
        $request->validate([
            'apartment_room_number' => 'required|alpha_num',
            'apartment_status_name' => 'required'
        ]);

        $apartment->location = 4; // ALR Building
        $apartment->room = $request->apartment_room_number;
        $apartment->apartment_status_id = $request->apartment_status_name;
        $apartment->save();

        return redirect()->route('alr-building.index')->with('success_add', 'Record added successfully');
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
        $apartment_list = Apartment::findOrFail($id);

        return view('pms.apartment.alr_building.show')->with([
            'apartment_list' => $apartment_list
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
        $apartment_list = Apartment::with([
            'apartment_status'
        ])->findOrFail($id);
        $apartment_status = ApartmentStatus::all();

        return view('pms.apartment.alr_building.edit')->with([
            'apartment_list' => $apartment_list,
            'apartment_status' => $apartment_status
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
            'apartment_room_number' => 'required|alpha_num',
            'apartment_status_name' => 'required'
        ]);

        $apartment_list = Apartment::findOrFail($id);
        $apartment_list->room = $request->apartment_room_number;
        $apartment_list->apartment_status_id = $request->apartment_status_name;
        $apartment_list->save();

        return redirect()->route('alr-building.index')->with('success_update', 'Record updated successfully');
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
        Apartment::destroy($id);

        return redirect()->route('alr-building.index')->with('success_delete', 'Record deleted successfully');
    }
}

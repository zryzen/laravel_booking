<?php

namespace App\Http\Controllers\v1;
use App\Http\Controllers\Controller;

use App\Models\Trip;
use App\Http\Requests\StoreTripRequest;
use App\Http\Requests\UpdateTripRequest;
use App\Http\Resources\v1\TripResource;
use App\Http\Resources\v1\TripCollection;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Trip::all();
        return new TripCollection(Trip::all());
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
     * @param  \App\Http\Requests\StoreTripRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTripRequest $request)
    {
        $request->validation([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);
        return Trip::create($request->all());
        // risky (request must match values from front  to backend)
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show($slug) //Trip $trip
    {
        //return $trip;
        $trip = Trip::where('slug', '=', "$slug")->first();
        return new TripResource($trip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTripRequest  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTripRequest $request, $id)
    {
        $request->validation([
            'title'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'location'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'price'=>'required',
        ]);
        return Trip::where('id',$id)->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trip = Trip::where('id',$id)->first();
        return $trip->delete();;

    }
}

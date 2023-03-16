<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function __construct()
    {
        $this->middleware('auth:api');
    }*/


    public function index()
    {
        //
        $countries = Country::all();
        return response()->json($countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $country = Country::find($id);
        if ($country) {
            return response()->json($country);
        } else {
            return response()->json(["message" => "Country not found"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        if ($country) {
            $country->update($request->all());
            return response()->json($country);
        } else {
            return response()->json(["message" => "Country not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $country = Country::find($id);
        if ($country) {
            $country->delete();
            return response()->json(["message" => "Country deleted"]);
        } else {
            return response()->json(["message" => "Country not found"], 404);
        }
    }

    public function getCitiesByCountryId($id)
    {
        $country = Country::findOrFail($id);
        $cities = $country->cities;
        return response()->json($cities);
    }
}

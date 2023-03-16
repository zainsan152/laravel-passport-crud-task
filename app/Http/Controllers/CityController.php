<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
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
        $cities = City::all();
        return response()->json($cities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city = City::create($request->all());
        return response()->json($city, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        if ($city) {
            return response()->json($city);
        } else {
            return response()->json(["message" => "City not found"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        if ($city) {
            $city->update($request->all());
            return response()->json($city);
        } else {
            return response()->json(["message" => "City not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        if ($city) {
            $city->delete();
            return response()->json(["message" => "City deleted"]);
        } else {
            return response()->json(["message" => "City not found"], 404);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class LocationController extends Controller
{
    public function index(Location $location)
    {
        return view('locations.index')->with(['own_locations' => $location->getLocationPaginateByLimit()]);
    }
    public function store(Request $request, Location $location)
    {
        $input = ['latitude' => $request->latitude];
        $input += ['longitude' => $request->longitude];
        $input += ['user_id' => $request->user()->id];
        $location->fill($input)->save();
        return redirect('/');
    }
}
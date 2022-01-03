<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class LocationController extends Controller
{
    public function store(Request $request, Location $location)
    {
        $input = ['latitude' => $request->latitude];
        $input += ['longitude' => $request->longitude];
        $input += ['user_id' => $request->user()->id];
        $location->fill($input)->save();
        return redirect('/');
    }
}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class LocationController extends Controller
{
    public function index(Location $location)
    {
        return view('locations.index')->with(['own_locations' => $location->getLocationPaginateByLimit()]);
    }
    public function store(PostRequest $request, Location $location)
    {
        $input = $request['location'];
        $input += ['user_id' => $request->user()->id];
        $post->fill($input)->save();
        return redirect('/');
    }
}
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    public function postindex(User $user)
    {
        return view('User.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
    public function locationindex(Location $location)
    {
        return view('locations.index')->with(['own_locations' => $user->getOwnLocationPaginateByLimit()]);
    }
}
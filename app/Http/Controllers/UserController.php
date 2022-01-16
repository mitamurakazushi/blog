<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    public function postindex(User $user)
    {
        return view('User.index')->with(['own_posts' => $user->getOwnPostPaginateByLimit()]);
    }
    public function locationindex(User $user)
    {
        return view('locations.index')->with(['own_locations' => $user->getOwnLocationPaginateByLimit()]);
    }
    public function mymap(User $user)
    {
        return view('locations.mymap')->with(['all_posts' => $user->getAllPosts()]);
    }
    public function mymapsearch(Request $request, User $user)
    {
        $category = $request->category;
        if($category=="all"){
            return view('locations.mymap')->with(['all_posts' => $user->getAllPosts()]);
        }
        else{
            return view('locations.mymap')->with(['all_posts' => $user->getAllPosts()->where('category', $category)]);
        }
    }
}
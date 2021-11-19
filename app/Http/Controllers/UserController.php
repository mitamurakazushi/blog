<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('User.index')->with(['own_posts' => $user->getOwnPaginateByLimit()]);
    }
}
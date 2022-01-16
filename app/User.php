<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function posts()
    {
        return $this->hasMany('App\Post');  
    }
    public function locations()
    {
        return $this->hasMany('App\Location');  
    }
    public function getOwnPostPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('posts')->find(Auth::id())->posts()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function getAllPosts()
    {
        return $this::with('posts')->find(Auth::id())->posts()->get();
    }
    public function getOwnLocationPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('locations')->find(Auth::id())->locations()->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}

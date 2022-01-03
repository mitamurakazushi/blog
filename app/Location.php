<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    public function getLocationPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    protected $fillable = ['latitude', 'longitude', 'user_id'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

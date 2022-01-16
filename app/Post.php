<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    public function getAllPosts()
    {
        return $this::with('posts')->find(Auth::id())->posts()->get();
    }
    public function getByLimit(int $limit_count = 10)
    {
    return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    public function getPaginateByLimit(int $limit_count = 5)
    {
    return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    protected $fillable = ['title', 'body', 'category', 'image', 'latitude', 'longitude', 'iconurl', 'user_id'];
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

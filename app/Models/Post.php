<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use Searchable;

    public function searchableAs()
    {
        return 'posts_index';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'user_id', 'offer_count', 'like_count', 'status',
    ];

    /**
     * The user that owns the post.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The offers made on the post.
     */
    
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function likers()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withTimestamps();
    }

    public function hasOffer()
    {
        $user_id = auth()->id();
        $offer = Offer::where('post_id', $this->id)->where('user_id', $user_id)->first();
        return $offer ? true : false;
    }

}

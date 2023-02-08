<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', 'title', 'description', 'user_id', 'status',
    ];

    /**
     * The post that the offer is made on.
     */

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * The user that made the offer.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    // returns true if the selected post is posted by the current logged in user
    public function ownedBy(User $user)
    {
        return $user->id === $this->user_id;    
    }

    // Relationships
    // A post belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

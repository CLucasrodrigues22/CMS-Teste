<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Task extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        "user_id",
        "title",
        "description",
        "status"
    ];

    // A task belongs to a user
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

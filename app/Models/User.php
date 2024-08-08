<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import the Authenticatable class
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable // Extend Authenticatable instead of Model
{
    use HasFactory;

    /**
     * Get the shops owned by the user.
     */
    public function shops()
    {
        return $this->belongsTo(Shop::class, 'owner_id');
    }


    // Optionally, you can specify guarded attributes if needed.
    protected $guarded = [];

    // You may also add other necessary attributes or methods related to the authentication system.
}

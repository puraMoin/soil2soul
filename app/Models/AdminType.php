<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminType extends Model
{
    use HasFactory;

     protected $fillable = ['name', 'active','created_at','updated_at'];

    // Define the hasMany relationship
    public function users()
    {
        return $this->hasMany(User::class, 'admin_type_id', 'id');
    }
}

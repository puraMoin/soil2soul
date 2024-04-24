<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;
    // Define the hasMany relationship
    public function city()
    {
        return $this->hasMany(City::class, 'timezone_id', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
  
}

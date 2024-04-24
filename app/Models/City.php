<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false; // Disable Laravel's default timestamps

    protected $fillable = ['country_id', 'state_id', 'timezone_id', 'name' ,'active','created','modified'];

     protected $table = 'cities';

    // Define the belongsTo relationship
    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function timezone()
    {
        return $this->belongsTo(Timezone::class);
    }
}

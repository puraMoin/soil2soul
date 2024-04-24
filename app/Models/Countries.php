<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{

	public $timestamps = false; // Disable Laravel's default timestamps
	
	protected $fillable = [
        'name',
        'alpha_2_code','alpha_3_code','calling_code','active','created','modified'
        // add all other fields
    ];

    protected $table = 'countries';

    use HasFactory;
    // Assuming your primary key is 'id', adjust if needed
    protected $primaryKey = 'id';

    // Define the hasMany relationship
    public function countryDetails()
    {
        return $this->hasMany(CountryDetail::class, 'country_id', 'id');
    }

    // Define the hasMany relationship
    public function states()
    {
        return $this->hasMany(States::class, 'country_id', 'id');
    }
    // Define the hasMany relationship
    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }
    // Define the hasMany relationship
    public function timezones()
    {
        return $this->hasMany(Timezone::class, 'country_id', 'id');
    }

}

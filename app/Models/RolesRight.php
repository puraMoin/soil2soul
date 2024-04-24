<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesRight extends Model
{
    use HasFactory;
   
    public $timestamps = false; // Disable Laravel's default timestamps

    protected $fillable = ['role_name', 'role_description', 'active','created','modified'];

    protected $table = 'roles_rights';

   public function menuLinks() 
    {
        return $this->belongsToMany(MenuLink::class, 'roles_rights_menu_links', 'role_id', 'menu_link_id');
    }

    // Define the hasMany relationship
    public function users()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }
}

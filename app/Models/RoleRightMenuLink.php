<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleRightMenuLink extends Model
{

    use HasFactory;
    public $timestamps = false; // Disable Laravel's default timestamps

    protected $fillable = ['role_id', 'menu_link_id','created','modified'];

    protected $table = 'roles_rights_menu_links';
}

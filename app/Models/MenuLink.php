<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Kalnoy\Nestedset\NodeTrait;

class MenuLink extends Model
{   
    // use NodeTrait;
    protected $table = 'menu_links'; // Ensure correct table name

    protected $fillable = ['title', 'link', 'parent_id','created_by', 'updated_by','active','order'];

    public function parent()
    {
        return $this->belongsTo(MenuLink::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(MenuLink::class, 'parent_id');
    }


    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'roles_rights_menu_links', 'menu_link_id', 'role_id');
    }
}

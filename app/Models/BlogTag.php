<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false; // Disable Laravel's default timestamps      

    protected $fillable = ['name','page_title','page_slug','page_url','meta_description','active','created','modified'];
}

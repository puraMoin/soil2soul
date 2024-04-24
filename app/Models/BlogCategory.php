<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','page_title','page_slug','page_url','meta_description','active','created_at','updated_at'];

    // Define the hasMany relationship
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false; // Disable Laravel's default timestamps
      
    protected $fillable = ['blog_date','blog_category_id','blog_author_id','title','page_slug','page_title','header_text','description','active','created','modified'];

    // Define the belongsTo relationship
    public function blogcategory()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }
    // Define the belongsTo relationship
    public function blogauthor()
    {
        return $this->belongsTo(BlogAuthor::class, 'blog_author_id', 'id');
    }

    public function blogtags()
    {
        return $this->belongsToMany(BlogTag::class, 'blogs_blog_tags', 'blog_id', 'blog_tag_id');
    }
}

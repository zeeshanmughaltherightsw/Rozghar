<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected static function booted()
    {
        parent::boot();

        /*s*
         * Handle the product "creating" event.
         *
         * @return void
        */
        static::creating(function (BlogCategory $category) {
            $category->slug = Str::slug($category->name);
        });

        /**
         * Handle the product "created" event.
         *
         * @return void
        */
    }

    public function subBlogCategory()
    {
        return $this->hasMany(BlogCategory::class, 'parent_id');
    }
    public function parents()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id');
    }

    public function blogs()
    {
        return $this->hasMany(BlogPost::class);
    }

    public function scopeActive($query)
    {
        $query->where('status', 'active');
    }

    public function scopeParent($query)
    {
        $query->whereNull('parent_id');
    }
}

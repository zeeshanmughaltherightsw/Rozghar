<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected static function booted()
    {
        parent::boot();

        /*s*
         * Handle the product "creating" event.
         *
         * @return void
        */
        static::creating(function (Category $category) {
            $category->slug = Str::slug($category->name);
        });

        /**
         * Handle the product "created" event.
         *
         * @return void
        */
    }

    public function subCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
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

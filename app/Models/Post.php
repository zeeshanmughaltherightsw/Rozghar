<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
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
        static::creating(function (Post $post) {
            $post->slug = Str::slug($post->title);
        });

        /**
         * Handle the product "created" event.
         *
         * @return void
        */
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function location(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function scopeActive($query)
    {
        $query->where('status', 'active')->whereDate('last_date', '>', Carbon::now());
    }

    public function scopeLatest($query)
    {
        $query->orderBy('created_at', 'desc');
    }

    public function scopeWithCategory($query, $category_id)
    {
        $query->where('category_id', $category_id);
    }
}

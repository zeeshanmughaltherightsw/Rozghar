<?php

namespace App\Providers;

use App\Models\BlogCategory;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(Schema::hasTable('categories')){
            //its just a dummy data object.
            View::share('key', 'value');
            Schema::defaultStringLength(191);
            $categories = Category::with('subCategory')->active()->parent()->get();
            View::share(compact('categories'));
        }

        if(Schema::hasTable('blog_categories')){
            // Blog Categories for Menu bar
            $mbc = BlogCategory::with('subBlogCategory')->active()->parent()->get();
            View::share(compact('mbc'));
        }

    }
}

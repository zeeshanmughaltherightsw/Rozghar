<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        
        $posts = Post::latest()->where(function($query){
                if(request()->input('keyword')){
                    $query->where('title', 'LIKE', '%'.request()->input('keyword').'%');
                }
                if(request()->input('category')){
                    $query->whereHas('category', function($cat){
                        $cat->where('name', request()->input('category'));
                    });
                }
                if(request()->input('location')){
                    $query->whereHas('location', function($subQuery){
                        $subQuery->where('name', request()->input('location'));
                    });
                }
        })->active()->get();
        $govtJobs = Category::whereSlug('govt-jobs')->first();
        $ids = Arr::flatten([$govtJobs->id, $govtJobs->subCategory->pluck('id')->toArray()]);
        
        $privateJobs = Category::whereSlug('private-jobs')->first();
        $idss = Arr::flatten([$privateJobs->id, $privateJobs->subCategory->pluck('id')->toArray()]);
        
        $data = [
            'page_title' => 'Home',
            'govtJobs' => $posts->whereIn('category_id', $ids)->take(8) ,
            'privateJobs' => $posts->where('category_id', $idss)->take(8),
            'posts' => $posts,
            'locations' => City::where('status', 'active')->get(),
        ];
        return view('home', $data);
    }

    public function postDetail($slug){
        $post = Post::latest()->active()->where('slug', $slug)->first();
        $data = [
            'post' => $post,
            'page_title' => $post->title
        ];
        return view('posts.deatail', $data);
    }

    public function search($category=null)
    {
        $posts = Post::latest()->where(function($query) use ($category){
                    if(request()->input('keyword')){
                        $query->where('title', 'LIKE', '%'.request()->input('keyword').'%');
                    }
                    if(request()->input('location')){
                        $query->where('city_id', request()->input('location'));
                    }
                    if(request()->input('category_id')){
                        $categories = Category::find(request()->input('category_id'));
                        $ids = Arr::flatten([$categories->id, $categories->subCategory->pluck('id')->toArray()]);
                        $query->whereIn('category_id', $ids);
                    }
                    if(request()->input('category') || $category){
                        $query->whereHas('category', function($subQuery) use ($category){
                            $subQuery->where('slug', request()->input('category') ? request()->input('category') : $category);
                        });
                    }
        })->active()->paginate(8);
        $data = [
            'posts' => $posts->appends(request()->query()),
            'locations' => City::where('status', 'active')->get(),
            'page_title' => request()->input('keyowrd') ? request()->input('keyowrd') : ($category ? $category : null),
        ];
        return view('posts.list', $data);
    }
}

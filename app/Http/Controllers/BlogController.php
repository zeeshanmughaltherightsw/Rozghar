<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Blogs',
            'blogs' => BlogPost::orderByDesc('id')->active()->paginate(8),
            'recentPosts' => BlogPost::orderByDesc('id')->active()->limit(7)->get()
        ];

        return view('blogs.index', $data);
    }

    public function blogPost($slug)
    {
        $post = BlogPost::where('slug', $slug)->active()->firstOrFail();
        $previous_record = BlogPost::where('id', '<', $post->id)->active()->first();
        $next_record = BlogPost::where('id', '>', $post->id)->active()->first();

        $data = [
            'post' => $post,
            'recentPosts' => BlogPost::orderByDesc('id')->active()->limit(7)->get(),
            'previous_record' => $previous_record,
            'next_record' => $next_record
        ];

        return view('blogs.post', $data);
    }

    public function blogCategory($slug)
    {
        dd('dd');
        $category = BlogCategory::where('slug', $slug)->active()->firstOrFail();
        $data = [
            'page_title' => ' Archives',
            'category' => $category,
            'blogs' => $category->blogs()->paginate(8),
            'recentPosts' => BlogPost::orderByDesc('id')->active()->limit(7)->get()
        ];

        return view('blogs.categories', $data);
    }

    public function search(Request $request)
    {
        // dd('ds');
        $search = $request->input('search');
        // $posts = BlogPost::query()
        //     ->where('title', 'LIKE', '%{$search}%')
        //     ->orWhere('description', 'LIKE', '%{$search}%')
        //     ->active()->get();

        $posts = BlogPost::latest()->where(function ($query) use ($search) {
            if($search){
                $query->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('description', 'LIKE', '%' . $search . '%')
                    ->orWhere('short_description', 'LIKE', '%'. $search .'%');
            }
        })->active()->paginate(8);

        $data = [
            'page_title' => 'Search',
            'posts' => $posts,
            'recentPosts' => BlogPost::orderByDesc('id')->active()->limit(7)->get()
        ];

        return view('blogs.search', $data);
    }
}

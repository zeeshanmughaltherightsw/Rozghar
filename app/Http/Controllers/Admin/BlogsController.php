<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Carbon\Carbon;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::orderByDesc('id')->get();

        $data = [
            'page_title' => 'All blog posts',
            'blogPosts' => $blogPosts
        ];
        return view('admin.blogs.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_title' => 'Create blog post',
            'blog_categories' => BlogCategory::parent()->active()->get(),
        ];
        return view('admin.blogs.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        try{
            DB::beginTransaction();
            $data = $request->except('category');
            if($request->has('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('storage/blogPosts'), $filename);
                $data['image']  = 'storage/blogPosts/' . $filename;    
            }
            BlogPost::create($data);
            DB::commit();
            $notify[] = ['success', 'Blog post Created Successfully'];
            return redirect()->route('admin.blogs.index')->withNotify($notify);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $notify[] = ['error', $e->getMessage() ];
            return back()->withNotify($notify);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blog)
    {
        $data = [
            'page_title' => 'Edit Blog'. $blog->title,
            'blogPost' => $blog,
            'blog_categories' => BlogCategory::parent()->active()->get(),
        ];
        return view('admin.blogs.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blog)
    {
        try{
            DB::beginTransaction();
            $data = $request->except('category');
            if($request->has('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('storage/blogPosts'), $filename);
                $data['image'] = 'storage/blogPosts/' . $filename;    
            }
            $blog->update($data);
            DB::commit();
            $notify[] = ['success', 'Blog Updated Successfully'];
            return redirect()->route('admin.blogs.index')->withNotify($notify);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $notify[] = ['error', $e->getMessage() ];
            return back()->withNotify($notify);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPost $blog)
    {
        try{
            DB::beginTransaction();
            $blog->delete();
            DB::commit();
            $notify[] = ['success', 'Blog Deleted Successfully'];
            return redirect()->route('admin.blogs.index')->withNotify($notify);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $notify[] = ['error', $e->getMessage() ];
            return back()->withNotify($notify);
        }
    }
}

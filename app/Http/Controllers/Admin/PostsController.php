<?php

namespace App\Http\Controllers\Admin;

use Image;
use Exception;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderByDesc('id')->get();

        $data = [
            'page_title' => 'All jobs',
            'posts' => $posts
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_title' => 'Create jobs',
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try{
            DB::beginTransaction();
            $data = $request->except('category');
            if($request->has('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('storage/posts'), $filename);
                $data['image'] = 'storage/posts/' . $filename; 
            }
            Post::create($data);
            DB::commit();
            $notify[] = ['success', 'Post Created Successfully'];
            return redirect()->route('admin.posts.index')->withNotify($notify);
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
        $notify[] = ['error', 'You have committees in pending or you have not paid all installments .'];
        return back()->withNotify($notify);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $data = [
            'page_title' => 'Edit post'. $post->title,
            'post' => $post
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        try{
            DB::beginTransaction();
            $data = $request->except('category');
            if($request->has('image')){
                $file= $request->file('image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('storage/posts'), $filename);
                $data['image'] = 'storage/posts/' . $filename; 
            }
            $post->update($data);
            DB::commit();
            $notify[] = ['success', 'Post Updated Successfully'];
            return redirect()->route('admin.posts.index')->withNotify($notify);
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
    public function destroy(Post $post)
    {
        try{
            DB::beginTransaction();
            $post->delete();
            DB::commit();
            $notify[] = ['success', 'Post Deleted Successfully'];
            return redirect()->route('admin.posts.index')->withNotify($notify);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $notify[] = ['error', $e->getMessage() ];
            return back()->withNotify($notify);
        }
    }
}

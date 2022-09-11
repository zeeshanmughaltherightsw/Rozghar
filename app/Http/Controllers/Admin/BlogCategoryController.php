<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogCategories = BlogCategory::orderByDesc('id')->get();

        $data = [
            'page_title' => 'All Blog Categories',
            'categoriesAll' => $blogCategories
        ];
        return view('admin.blog-categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_title' => 'Create Blog category',
            'blogCategories' => BlogCategory::parent()->active()->get()
        ];
        return view('admin.blog-categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            BlogCategory::create($request->all());
            DB::commit();
            $notify[] = ['success', 'Category Created Successfully'];
            return redirect()->route('admin.blog-categories.index')->withNotify($notify);
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
    public function edit(BlogCategory $blogCategory)
    {
        $data = [
            'page_title' => 'Edit category'. $blogCategory->name,
            'category' => $blogCategory,
            'blogCategories' => BlogCategory::parent()->active()->get()
        ];
        return view('admin.blog-categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogCategory $blogCategory)
    {
        try{
            DB::beginTransaction();
            $blogCategory->update($request->all());
            DB::commit();
            $notify[] = ['success', 'Blog Category Updated Successfully'];
            return redirect()->route('admin.blog-categories.index')->withNotify($notify);
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
    public function destroy(BlogCategory $blogCategory)
    {
        try{
            DB::beginTransaction();
            $blogCategory->delete();
            DB::commit();
            $notify[] = ['success', 'Blog Category Deleted Successfully'];
            return redirect()->route('admin.blog-categories.index')->withNotify($notify);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $notify[] = ['error', $e->getMessage() ];
            return back()->withNotify($notify);
        }
    }

    public function getSubBlogCategories(BlogCategory $categories)
    {
        return $categories->subBlogCategory;
    }
}

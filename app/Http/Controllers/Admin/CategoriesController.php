<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderByDesc('id')->get();

        $data = [
            'page_title' => 'All Categories',
            'categoriesAll' => $categories
        ];
        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'page_title' => 'Create category',
        ];
        return view('admin.categories.create', $data);
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
            Category::create($request->all());
            DB::commit();
            $notify[] = ['success', 'Category Created Successfully'];
            return redirect()->route('admin.categories.index')->withNotify($notify);
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
    public function edit(Category $category)
    {
        $data = [
            'page_title' => 'Edit post'. $category->name,
            'category' => $category
        ];
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        try{
            DB::beginTransaction();
            $category->update($request->all());
            DB::commit();
            $notify[] = ['success', 'Category Updated Successfully'];
            return redirect()->route('admin.categories.index')->withNotify($notify);
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
    public function destroy(Category $category)
    {
        try{
            DB::beginTransaction();
            $category->delete();
            DB::commit();
            $notify[] = ['success', 'Category Deleted Successfully'];
            return redirect()->route('admin.categories.index')->withNotify($notify);
        }catch(Exception $e){
            DB::rollBack();
            dd($e->getMessage());
            $notify[] = ['error', $e->getMessage() ];
            return back()->withNotify($notify);
        }
    }

    public function getSubcategories(Category $categories)
    {
        return $categories->subCategory;
    }
}

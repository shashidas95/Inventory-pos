<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ListCategory(Request $request)
    {
        $user_id = $request->header('id');
        return Category::where('user_id', $user_id)->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function CategoryCreate(Request $request)
    {
        $user_id = $request->header('id');
        return  $newCategory = Category::create([
            'name' => $request->name,
            'user_id' => $user_id
        ]);

        // if ($newCategory) {
        //     return response()->json(['message' => 'Category created successfully'], 201);
        // } else {
        //     return response()->json(['message' => 'Category creation failed'], 500);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function CategoryPage(Category $category)
    {
        return view('pages.dashboard.category-page');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function CategoryUpdate(Request $request, Category $category)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('id');
        return Category::where('user_id', $user_id)->where('id', $category_id)->update([
            'name' => $request->input('name')
        ]);
    }
    public function CategoryById(Request $request, Category $category)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('id');
        return Category::where('user_id', $user_id)->where('id', $category_id)->first();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function CategoryDelete(Request $request, Category $category)
    {
        $user_id = $request->header('id');
        $category_id = $request->input('id');
        return Category::where('user_id', $user_id)->where('id', $category_id)->delete();
    }
}

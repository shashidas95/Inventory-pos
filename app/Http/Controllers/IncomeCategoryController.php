<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\IncomeCategory;
use App\Http\Requests\IncomeCategoryRequest;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $email = $request->header('email');
        // $user = User::where('email', '=', $email)->first();
        // return  $incomeCategories = IncomeCategory::where('user_id', $user->id)->get();
        // Fetch income categories for the authenticated user
        return $incomeCategories = auth()->user()->incomeCategories;

        //return view('income_categories.index', compact('incomeCategories'));
    }

    public function store(IncomeCategoryRequest $request)
    {
        // Create a new income category associated with the authenticated user
        auth()->user()->incomeCategories()->create($request->validated());

        return redirect()->route('income_categories.index')->with('success', 'Income category created.');
    }

    // Implement edit and update methods

    // Implement destroy method

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

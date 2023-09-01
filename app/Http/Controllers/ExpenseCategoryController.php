<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch expense categories for the authenticated user
        return $expenseCategories = auth()->user()->expenseCategories;

       // return view('expense_categories.index', compact('expenseCategories'));
    }

    public function store(ExpenseCategoryRequest $request)
    {
        // Create a new expense category associated with the authenticated user
        auth()->user()->expenseCategories()->create($request->validated());

        return redirect()->route('expense_categories.index')->with('success', 'Expense category created.');
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

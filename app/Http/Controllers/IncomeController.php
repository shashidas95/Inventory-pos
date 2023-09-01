<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IncomeRequest;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch income records for the authenticated user
        $incomes = auth()->user()->incomes;

        return view('incomes.index', compact('incomes'));
    }

    public function store(IncomeRequest $request)
    {
        // Create a new income record associated with the authenticated user
        auth()->user()->incomes()->create($request->validated());

        return redirect()->route('incomes.index')->with('success', 'Income record created.');
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

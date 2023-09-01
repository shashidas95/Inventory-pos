<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Requests\ExpenseRequest;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch expense records for the authenticated user
        $expenses = auth()->user()->expenses;

        return view('expenses.index', compact('expenses'));
    }

    public function store(ExpenseRequest $request)
    {
        // Create a new expense record associated with the authenticated user
        auth()->user()->expenses()->create($request->validated());

        return redirect()->route('expenses.index')->with('success', 'Expense record created.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


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

    public function CreateExpense(ExpenseRequest $request)
    {
        try {


            $userEmail = $request->input('email');
            Expense::where('email', '=', $userEmail)->create([
                'amount' => $request->input('amount'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'user_id' => $request->input('user_id'),
                'expense_category_id' => $request->input('expense_category_id'),
            ]);

            return response()->json([
                'status' => "success",
                'message' => " expense created successful"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => "fail",
                // 'message' => " expense created Failed"
                'message' => $e->getMessage()
            ], 401);
        }
    }
}

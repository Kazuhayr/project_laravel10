<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $expn = Expense::get();

        return view('home', compact('expn'));
    }
   
    public function create()
    {
        $edit = false;
        return view('expenses.form', compact('edit'));
    }

    public function edit($id)
    {
        $edit = true;
        $expense = Expense::where('id', $id)->first();
        
        return view('expenses.form', compact('expense', 'edit'));
    }

    public function update(Request $request, $id)
    {
        Expense::where('id', $id)->update([
            'date' => $request->date,
            'payment_method' => $request->payment_method,
            'description' => $request->description,
            'amount' => $request->amount,
        ]);

        return redirect()->route('home')->with('success', 'Expense updated successfully!');
    }
    
    public function store(Request $request)
    {
       Expense::insert([
            'date' => $request->date,
            'payment_method' => $request->payment_method,
            'description' => $request->description,
            'amount' => $request->amount,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('home')->with('success', 'Expense added successfully!');
    }
    
    public function destroy($id)
    {
        // Find the expense by its ID
        $expense = Expense::find($id);

        if (!$expense) {
            // Redirect back with an error message if expense not found
            return redirect()->route('home')->with('error', 'Expense not found!');
        }

        // Delete the expense
        $expense->delete();

        // Redirect back with a success message
        return redirect()->route('home')->with('success', 'Expense deleted successfully!');
    }

}

 


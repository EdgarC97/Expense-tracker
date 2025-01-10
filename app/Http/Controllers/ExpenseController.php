<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        $query = Expense::with('category')->orderBy('date', 'desc');
        $totalQuery = Expense::query(); // Query para el total general sin filtros

        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        if ($request->has('start_date') && $request->has('end_date') && $request->start_date != '' && $request->end_date != '') {
            $query->whereBetween('date', [$request->start_date, $request->end_date]);
        }

        $expenses = $query->paginate(10);

        $totalCurrentPage = $expenses->sum('amount');
        $totalOverall = $totalQuery->sum('amount');
        $totalFiltered = $query->sum('amount');

        $categories = Category::all();
        $totalByCategory = Category::leftJoin('expenses', 'categories.id', '=', 'expenses.category_id')
            ->selectRaw('categories.name, COALESCE(SUM(expenses.amount), 0) as total')
            ->groupBy('categories.id', 'categories.name')
            ->get();

        $colors = ['primary', 'success', 'info', 'warning', 'danger', 'secondary'];

        return view('expenses.index', compact('expenses', 'categories', 'totalCurrentPage', 'totalOverall', 'totalFiltered', 'totalByCategory', 'colors'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['date'] = \Carbon\Carbon::parse($validatedData['date'])->format('Y-m-d');
        Expense::create($validatedData);
        return redirect()->route('expenses.index')->with('success', 'Gasto creado exitosamente.');
    }

    public function edit(Expense $expense)
    {
        $categories = Category::all();
        return view('expenses.edit', compact('expense', 'categories'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $validatedData = $request->validated();
        $validatedData['date'] = \Carbon\Carbon::parse($validatedData['date'])->format('Y-m-d');
        $expense->update($validatedData);
        return redirect()->route('expenses.index')->with('success', 'Gasto actualizado exitosamente.');
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Gasto eliminado exitosamente.');
    }
}

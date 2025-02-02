<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpenseController;

Route::get('/', function () {
    return redirect()->route('expenses.index');
});

Route::resource('expenses', ExpenseController::class);

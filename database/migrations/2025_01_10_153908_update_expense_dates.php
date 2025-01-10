<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Expense;

class UpdateExpenseDates extends Migration
{
    public function up()
    {
        $expenses = Expense::all();
        foreach ($expenses as $expense) {
            $expense->date = \Carbon\Carbon::parse($expense->date)->format('Y-m-d');
            $expense->save();
        }
    }

    public function down()
    {
        
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategories extends Model
{
    protected $fillable = [
        'name', 'description', 
    ];

    protected $table = 'expense_category';
}

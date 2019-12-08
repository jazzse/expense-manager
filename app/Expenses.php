<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $fillable = [
        'expense_category', 'amount', 'entry_date',
    ];

    protected $table = 'expenses';
}

<?php

namespace App\Models;

use App\Enums\MonthEnum;
use App\Enums\BudgetType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Expense extends Model
{
    use HasUuids;

    protected $fillable = [
        'user_id',
        'type_detail_id',
        'payment_id',
        'date',
        'description',
        'nominal',
        'type',
        'month',
        'year',
        'notes',
    ];

    protected function casts(): array
    {
        return [
            'type' => BudgetType::class,
            'month' => MonthEnum::class,
        ];
    }
}
